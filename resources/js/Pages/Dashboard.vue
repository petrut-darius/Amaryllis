<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
</script>

<template>
    <Head title="Panou de Control" />

    <AuthenticatedLayout>
        <template #header>
            Panou de control
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl">
                <div
                    class="overflow-hidden bg-white border border-gray-100 rounded-sm sm:px-6 lg:px-8"
                >
                    <div class="p-6 text-gray-900 font-light">
                        Bine ai revenit! Te-ai autentificat cu succes în contul tău Amaryllis.
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
