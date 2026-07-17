<script setup>
import { Link, useForm, usePage } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
    phone: user.phone,
});
</script>

<template>
    <section>
        <header>
            <h2 class="font-serif text-2xl text-gray-900">Informații Profil</h2>

            <p class="mt-2 text-sm font-light text-gray-500">
                Actualizați informațiile de profil și adresa de email a contului
                dumneavoastră.
            </p>
        </header>

        <form
            @submit.prevent="form.patch(route('profile.update'))"
            class="mt-6 space-y-6"
        >
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

            <div>
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

            <!-- this was <div v-if="mustVerifyEmail && user.email_verified_at === null">-->

            <div v-if="user.email_verified_at === null">
                <p class="mt-2 text-sm text-gray-800">
                    Adresa dumneavoastră de email nu este verificată.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="rounded-sm text-sm text-gray-600 underline transition duration-150 hover:text-gray-900 focus:ring-2 focus:ring-gray-500 focus:outline-none"
                    >
                        Faceți clic aici pentru a retrimite emailul de
                        verificare.
                    </Link>
                </p>

                <div
                    v-show="status === 'verification-link-sent'"
                    class="mt-2 text-sm font-medium text-green-600"
                >
                    Un nou link de verificare a fost trimis la adresa
                    dumneavoastră de email.
                </div>
            </div>
            <div>
                <InputLabel for="phone" value="Număr de telefon" />

                <TextInput
                    id="phone"
                    type="tel"
                    class="mt-1 block w-full"
                    v-model="form.phone"
                    required
                    autocomplete="phone"
                />

                <InputError class="mt-2" :message="form.errors.phone" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing"
                    >Salvează Modificările</PrimaryButton
                >

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-xs font-bold tracking-widest text-gray-400 uppercase"
                    >
                        Salvat
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>
