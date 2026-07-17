<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthLayout from '@/Layouts/AuthLayout.vue';

const form = useForm({
    name: '',
    email: '',
    phone: '',
    password: '',
    password_confirmation: '',
    terms_accepted_at: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <AuthLayout>
        <Head title="Înregistrare">
            <meta name="robots" content="noindex, nofollow" />
        </Head>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Nume" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="phone" value="Telefon" />

                <TextInput
                    id="phone"
                    type="tel"
                    class="mt-1 block w-full"
                    v-model="form.phone"
                    required
                    autocomplete="tel"
                />

                <InputError class="mt-2" :message="form.errors.phone" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Parolă" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel
                    for="password_confirmation"
                    value="Confirmă parola"
                />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.password_confirmation"
                />
            </div>

            <div class="mt-4 block">
                <label class="group flex cursor-pointer items-center">
                    <Checkbox
                        name="terms_accepted_at"
                        v-model:checked="form.terms_accepted_at"
                    />
                    <span
                        class="ms-3 text-[9px] tracking-[0.4em] text-brand-charcoal/40 uppercase transition-colors duration-300 group-hover:text-brand-ruby"
                    >
                        Sunt de acord cu
                        <Link
                            :href="route('terms')"
                            class="underline underline-offset-4"
                            >termenii și condițiile</Link
                        >
                    </span>
                </label>

                <InputError
                    class="mt-2"
                    :message="form.errors.terms_accepted_at"
                />
            </div>

            <div class="mt-8 flex items-center justify-between">
                <Link
                    :href="route('login')"
                    class="text-[10px] tracking-[0.2em] text-brand-charcoal/40 uppercase underline underline-offset-4 transition-colors duration-300 hover:text-brand-ruby"
                >
                    Ai deja cont?
                </Link>

                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Înregistrare
                </PrimaryButton>
            </div>
        </form>
    </AuthLayout>
</template>
