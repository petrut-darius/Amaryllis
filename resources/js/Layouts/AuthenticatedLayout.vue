<script setup>
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Footer from '@/Components/Footer.vue';
import Navigation from '@/Components/Navigation.vue';
</script>

<template>
    <div class="min-h-screen bg-brand-cream text-brand-charcoal">
        <header class="border-b border-brand-ruby/10">
            <div class="mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col items-center py-6">
                    <!-- Logo -->
                    <div class="mb-6">
                        <Link href="/">
                            <ApplicationLogo size="normal" class="md:hidden" />
                            <ApplicationLogo
                                size="large"
                                class="hidden md:flex"
                            />
                        </Link>
                    </div>

                    <!-- Navigation -->
                    <Navigation />
                </div>
            </div>
        </header>

        <!-- Page Heading -->
        <div
            class="border-b border-gray-100 bg-gray-50 py-4"
            v-if="$slots.header"
        >
            <div class="mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-8">
                <div
                    class="text-[11px] font-medium tracking-[0.3em] text-gray-500 uppercase"
                >
                    <slot name="header" />
                </div>
            </div>
        </div>

        <main class="mx-auto max-w-screen-2xl px-4 py-12 sm:px-6 lg:px-8">
            <slot />
        </main>

        <Footer />
    </div>
</template>
