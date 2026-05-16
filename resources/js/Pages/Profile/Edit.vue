<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profil" />

    <AuthenticatedLayout>
        <template #header>
            Setări Profil
        </template>

        <div class="space-y-12">
            <div class="bg-white p-6 border border-gray-100 rounded-sm sm:p-10">
                <UpdateProfileInformationForm
                    :must-verify-email="mustVerifyEmail"
                    :status="status"
                    class="max-w-xl"
                />
            </div>

            <div class="bg-white p-6 border border-gray-100 rounded-sm sm:p-10">
                <UpdatePasswordForm class="max-w-xl" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
