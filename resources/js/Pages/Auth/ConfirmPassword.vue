<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthLayout from '@/Layouts/AuthLayout.vue';

const form = useForm({
    password: '',
});

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <AuthLayout>
        <Head title="Confirmă parola" />

        <div
            class="mb-6 text-[11px] leading-relaxed tracking-[0.2em] text-brand-charcoal/60 uppercase"
        >
            Aceasta este o zonă securizată a aplicației. Te rugăm să îți
            confirmi parola înainte de a continua.
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="password" value="Parolă" />
                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                    autofocus
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-8 flex justify-end">
                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Confirmă
                </PrimaryButton>
            </div>
        </form>
    </AuthLayout>
</template>
