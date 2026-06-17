<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Footer from '@/Components/Footer.vue';
import Navigation from '@/Components/Navigation.vue';
</script>

<template>
    <div class="min-h-screen bg-brand-linen text-brand-charcoal selection:bg-brand-rose selection:text-brand-charcoal font-sans antialiased overflow-x-hidden">
        <!-- Colorful Background Accents -->
        <div class="fixed inset-0 z-[-1] overflow-hidden opacity-30 pointer-events-none">
            <div class="absolute top-[-15%] left-[-10%] w-[50%] h-[50%] bg-brand-mint rounded-full blur-[80px] md:blur-[140px] animate-pulse-glow will-change-transform transform-gpu"></div>
            <div class="absolute bottom-[-15%] right-[-10%] w-[60%] h-[60%] bg-brand-rose rounded-full blur-[90px] md:blur-[180px] animate-pulse-glow delay-300 will-change-transform transform-gpu"></div>
            <div class="absolute top-[25%] right-[5%] w-[35%] h-[35%] bg-brand-lavender rounded-full blur-[70px] md:blur-[120px] animate-pulse-glow delay-500 will-change-transform transform-gpu"></div>
            <div class="absolute bottom-[20%] left-[10%] w-[40%] h-[40%] bg-brand-ruby/10 rounded-full blur-[80px] md:blur-[160px] animate-pulse-glow delay-700 will-change-transform transform-gpu"></div>
        </div>

        <!-- Header & Navigation Area -->
        <header class="sticky top-0 z-50 py-3 md:py-6 px-4 sm:px-6 md:px-8 bg-brand-linen/60 safari-blur border-b border-brand-charcoal transition-all duration-500 transform-gpu">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-row md:flex-col items-center justify-between gap-3 md:gap-6">
                    <!-- Logo -->
                    <Link href="/" class="hover:scale-105 transition-transform duration-500">
                        <ApplicationLogo size="normal" class="md:hidden" />
                        <ApplicationLogo size="large" class="hidden md:flex" />
                    </Link>

                    <!-- Navigation -->
                    <div class="flex items-center">
                        <Navigation />
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 pb-12 md:pb-16 lg:pb-16 pt-6 md:pt-8">
            <slot />
        </main>

        <!-- Footer -->
        <footer class="bg-brand-charcoal text-brand-cream py-12 md:py-16 px-4 sm:px-6 md:px-8">
            <Footer />
        </footer>
    </div>
</template>
