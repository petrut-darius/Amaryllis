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
        <Head title="Email Verification" />

        <div class="mb-6 text-[11px] uppercase tracking-[0.2em] text-brand-charcoal/60 leading-relaxed">
            Thanks for signing up! Before getting started, could you verify your
            email address by clicking on the link we just emailed to you? If you
            didn't receive the email, we will gladly send you another.
        </div>

        <div
            class="mb-6 text-[10px] uppercase tracking-[0.2em] text-green-600 font-bold"
            v-if="verificationLinkSent"
        >
            A new verification link has been sent to the email address you
            provided during registration.
        </div>

        <form @submit.prevent="submit">
            <div class="mt-8 flex items-center justify-between">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Resend Email
                </PrimaryButton>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="text-[10px] uppercase tracking-[0.2em] text-brand-charcoal/40 hover:text-brand-ruby transition-colors duration-300 underline underline-offset-4"
                    >Log Out</Link
                >
            </div>
        </form>
    </AuthLayout>
</template>
