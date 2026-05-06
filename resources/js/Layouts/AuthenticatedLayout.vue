<script setup>
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Footer from '@/Components/Footer.vue';
import Navigation from '@/Components/Navigation.vue';
</script>

<template>
    <div class="min-h-screen bg-brand-cream text-brand-charcoal">
        <header class="border-b border-brand-ruby/10">
            <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col items-center py-6">
                    <!-- Logo -->
                    <div class="mb-6">
                        <Link href="/">
                            <ApplicationLogo size="large" />
                        </Link>
                    </div>

                    <!-- Navigation -->
                    <Navigation />
                </div>
            </div>
        </header>

        <!-- Page Heading -->
        <div class="bg-gray-50 border-b border-gray-100 py-4" v-if="$slots.header">
            <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-[11px] uppercase tracking-[0.3em] font-medium text-gray-500">
                    <slot name="header" />
                </div>
            </div>
        </div>

        <main class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <slot />
        </main>

        <Footer />
    </div>
</template>
