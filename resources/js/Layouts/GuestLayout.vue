<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Footer from '@/Components/Footer.vue';
import Navigation from '@/Components/Navigation.vue';
</script>

<template>
    <div
        class="min-h-screen overflow-x-hidden bg-brand-linen font-sans text-brand-charcoal antialiased selection:bg-brand-rose selection:text-brand-charcoal"
    >
        <!-- Colorful Background Accents -->
        <div
            class="pointer-events-none fixed inset-0 z-[-1] overflow-hidden opacity-40"
        >
            <div
                class="animate-pulse-glow absolute top-[-15%] left-[-10%] h-[50%] w-[50%] transform-gpu rounded-full bg-brand-ruby/10 blur-[80px] will-change-transform md:blur-[140px]"
            ></div>
            <div
                class="animate-pulse-glow absolute right-[-10%] bottom-[-15%] h-[60%] w-[60%] transform-gpu rounded-full bg-brand-gold/15 blur-[90px] delay-300 will-change-transform md:blur-[180px]"
            ></div>
            <div
                class="animate-pulse-glow absolute top-[25%] right-[5%] h-[35%] w-[35%] transform-gpu rounded-full bg-brand-ruby/5 blur-[70px] delay-500 will-change-transform md:blur-[120px]"
            ></div>
            <div
                class="animate-pulse-glow absolute bottom-[20%] left-[10%] h-[40%] w-[40%] transform-gpu rounded-full bg-brand-gold/10 blur-[80px] delay-700 will-change-transform md:blur-[160px]"
            ></div>
        </div>

        <!-- Header & Navigation Area -->
        <header
            class="safari-blur sticky top-0 z-50 transform-gpu border-b border-brand-charcoal bg-brand-linen/60 px-4 py-2 transition-all duration-500 sm:px-6 md:px-8 md:py-4"
        >
            <div class="mx-auto max-w-7xl">
                <div
                    class="flex flex-row items-center justify-between gap-2 md:flex-col md:gap-3"
                >
                    <!-- Logo -->
                    <Link
                        href="/"
                        class="transition-transform duration-500 hover:scale-105"
                    >
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
        <main
            class="mx-auto max-w-7xl px-4 pt-4 pb-6 sm:px-6 md:px-8 md:pt-6 md:pb-10 lg:pb-10"
        >
            <slot />
        </main>

        <!-- Footer -->
        <footer
            class="bg-brand-charcoal px-4 py-12 text-brand-cream sm:px-6 md:px-8 md:py-16"
        >
            <Footer />
        </footer>
    </div>
</template>
