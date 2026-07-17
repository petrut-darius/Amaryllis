<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthLayout from '@/Layouts/AuthLayout.vue';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <AuthLayout>
        <Head title="Ai uitat parola?" />

        <div
            class="mb-6 text-[11px] leading-relaxed tracking-[0.2em] text-brand-charcoal/60 uppercase"
        >
            Ai uitat parola? Nicio problemă. Transmite-ne adresa ta de email și
            îți vom trimite un link de resetare a parolei care îți va permite să
            îți alegi una nouă.
        </div>

        <div
            v-if="status"
            class="mb-6 text-[10px] font-bold tracking-[0.2em] text-green-600 uppercase"
        >
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-8 flex items-center justify-end">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Trimite linkul de resetare
                </PrimaryButton>
            </div>
        </form>
    </AuthLayout>
</template>
