<script setup>
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-2xl font-serif text-gray-900">
                Ștergere Cont
            </h2>

            <p class="mt-2 text-sm text-gray-500 font-light leading-relaxed">
                Odată ce contul dumneavoastră este șters, toate resursele și datele sale vor
                fi șterse definitiv. Înainte de a vă șterge contul, vă rugăm să
                descărcați orice date sau informații pe care doriți să le păstrați.
            </p>
        </header>

        <DangerButton @click="confirmUserDeletion">Ștergere Cont</DangerButton>

        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-8">
                <h2 class="text-2xl font-serif text-gray-900">
                    Sunteți sigur că doriți să vă ștergeți contul?
                </h2>

                <p class="mt-4 text-sm text-gray-500 font-light">
                    Odată ce contul dumneavoastră este șters, toate resursele și datele sale
                    vor fi șterse definitiv. Vă rugăm să introduceți parola pentru a
                    confirma că doriți ștergerea definitivă a contului.
                </p>

                <div class="mt-8">
                    <InputLabel
                        for="password"
                        value="Parolă"
                        class="sr-only"
                    />

                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="Parolă"
                        @keyup.enter="deleteUser"
                    />

                    <InputError :message="form.errors.password" class="mt-2" />
                </div>

                <div class="mt-8 flex justify-end">
                    <SecondaryButton @click="closeModal">
                        Anulează
                    </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        Ștergere Cont
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
