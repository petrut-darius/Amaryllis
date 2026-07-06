<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { computed } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthLayout from '@/Layouts/AuthLayout.vue';

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(
    () => props.status === 'verification-link-sent',
);
</script>

<template>
    <AuthLayout>
        <Head title="Verificare email" />

        <div class="mb-6 text-[11px] uppercase tracking-[0.2em] text-brand-charcoal/60 leading-relaxed">
            Îți mulțumim pentru înregistrare! Înainte de a începe, ai putea să îți verifici adresa de email dând click pe link-ul pe care tocmai ți l-am trimis? Dacă nu ai primit emailul, îți vom trimite cu plăcere un altul.
        </div>

        <div
            class="mb-6 text-[10px] uppercase tracking-[0.2em] text-green-600 font-bold"
            v-if="verificationLinkSent"
        >
            Un nou link de verificare a fost trimis către adresa de email furnizată în timpul înregistrării.
        </div>

        <form @submit.prevent="submit">
            <div class="mt-8 flex items-center justify-between">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Retrimite emailul
                </PrimaryButton>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="text-[10px] uppercase tracking-[0.2em] text-brand-charcoal/40 hover:text-brand-ruby transition-colors duration-300 underline underline-offset-4"
                    >Deconectare</Link
                >
            </div>
        </form>
    </AuthLayout>
</template>
