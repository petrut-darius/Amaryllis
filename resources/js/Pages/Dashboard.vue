<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            Dashboard
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl">
                <div
                    class="overflow-hidden bg-white border border-gray-100 rounded-sm sm:px-6 lg:px-8"
                >
                    <div class="p-6 text-gray-900 font-light">
                        Welcome back! You are now logged into your Amaryllis account.
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
