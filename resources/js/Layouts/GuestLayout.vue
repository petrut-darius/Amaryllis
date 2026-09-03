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
            class="safari-blur sticky top-0 z-50 transform-gpu border-b border-brand-charcoal bg-brand-linen/60 px-4 py-2 transition-all duration-500 sm:px-6 md:px-8 md:py-4 sm:m-0"
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
       
            <div
                class="pointer-events-none fixed inset-x-0 bottom-4 z-50 flex justify-center px-4 sm:bottom-6 md:bottom-8"
            >
                <a
                    href="tel:+40745265516"
                    class="group pointer-events-auto relative flex max-w-full items-center justify-between gap-3 overflow-hidden rounded-full border border-brand-ruby/20 bg-white px-4 py-2.5 shadow-xl shadow-brand-ruby/30 transition-all duration-500 hover:scale-[1.02] hover:border-brand-ruby/50 hover:shadow-2xl hover:shadow-brand-ruby/50 active:scale-95 sm:gap-6 sm:px-6 sm:py-3 md:px-8 md:py-3.5"
                    aria-label="Call us: Floraria Amaryllis"
                >
                    <div
                        class="absolute inset-0 w-0 bg-brand-ruby/5 transition-all duration-500 ease-out group-hover:w-full"
                    ></div>

                    <div class="relative z-10 flex items-center gap-1.5 sm:gap-2.5">
                        <span
                            class="text-[11px] font-bold tracking-[0.15em] text-black uppercase sm:text-xs md:text-sm sm:tracking-[0.2em]"
                        >
                            Call us!
                        </span>
                        <span class="text-black/30 font-light text-xs sm:text-sm">·</span>
                        <span
                            class="font-serif text-xs font-medium tracking-normal text-black italic sm:text-sm md:text-base"
                        >
                            Floraria Amaryllis
                        </span>
                    </div>

                    <div
                        class="relative z-10 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-brand-ruby text-white shadow-sm transition-all duration-500 group-hover:scale-110 sm:h-8 sm:w-8 md:h-9 md:w-9"
                    >
                        <i
                            class="fa-solid fa-phone-flip text-[11px] transition-transform duration-500 group-hover:rotate-12 sm:text-xs md:text-sm"
                        ></i>
                    </div>
                </a>
            </div>
        </main>

        <!-- Footer -->
        <footer
            class="bg-brand-charcoal px-4 py-12 text-brand-cream sm:px-6 md:px-8 md:py-16"
        >
            <Footer />
        </footer>
    </div>
</template>
