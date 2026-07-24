<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const isOpen = ref(false);
const scrollPosition = ref(0);

watch(isOpen, (val) => {
    if (val) {
        scrollPosition.value = window.scrollY;
        document.body.style.overflow = 'hidden';
        document.body.style.position = 'fixed';
        document.body.style.top = `-${scrollPosition.value}px`;
        document.body.style.width = '100%';
    } else {
        document.body.style.overflow = '';
        document.body.style.position = '';
        document.body.style.top = '';
        document.body.style.width = '';
        window.scrollTo(0, scrollPosition.value);
    }
});

const primaryLinks = [
    { name: 'Galerie', route: 'gallery' },
    { name: 'Flori', route: 'flowers' },
    { name: 'Evenimente', route: 'events' },
    { name: 'Livrare', route: 'delivery' },
    { name: 'Despre Noi', route: 'about' },
    { name: 'Contact', route: 'contact.create' },
];

const isActive = (routeName) => {
    return route().current(routeName + '*');
};

const toggleMenu = () => {
    isOpen.value = !isOpen.value;
};
</script>

<template>
    <!-- Desktop Navigation -->
    <nav class="hidden w-full flex-col items-center space-y-3 md:flex">
        <div
            class="flex items-center justify-center space-x-8 text-[12px] font-bold tracking-[0.2em] text-brand-ruby uppercase md:text-[13px] lg:space-x-12"
        >
            <Link
                v-for="link in primaryLinks"
                :key="link.name"
                :href="route(link.route)"
                class="group relative py-2 transition-all duration-500"
                :class="{
                    'font-black !tracking-[0.25em] text-brand-ruby': isActive(
                        link.route,
                    ),
                }"
            >
                {{ link.name }}
                <span
                    class="cubic-bezier(0.4, 0, 0.2, 1) absolute bottom-0 left-1/2 h-[2px] w-0 -translate-x-1/2 bg-brand-ruby transition-all duration-500 group-hover:w-full"
                    :class="{ 'w-full !bg-brand-ruby': isActive(link.route) }"
                ></span>
            </Link>
        </div>

        <!-- Auth Links (Subtle & Elegant) -->
        <div
            class="flex items-center space-x-8 text-[11px] font-semibold tracking-[0.15em] uppercase"
        >
            <template v-if="$page.props.auth.user">
                <Link
                    :href="route('profile.edit')"
                    class="transition-colors hover:tracking-[0.2em]"
                    >Cont</Link
                >
                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="cursor-pointer border-none bg-transparent p-0 transition-colors hover:tracking-[0.2em]"
                    >Deconectare</Link
                >
            </template>
            <template v-else>
                <Link
                    :href="route('login')"
                    class="transition-colors hover:tracking-[0.2em]"
                    >Autentificare</Link
                >
                <span class="opacity-30">/</span>
                <Link
                    :href="route('register')"
                    class="transition-colors hover:tracking-[0.2em]"
                    >Înregistrare</Link
                >
            </template>
        </div>
    </nav>

    <!-- Mobile Navigation Toggle -->
    <button
        @click="toggleMenu"
        class="relative z-[110] -mr-2 flex flex-col space-y-1.5 p-2 focus:outline-none md:hidden cursor-pointer"
        aria-label="Toggle navigation menu"
    >
        <span
            :class="{
                'translate-y-[8px] rotate-45 !bg-brand-charcoal': isOpen,
            }"
            class="block h-0.5 w-6 bg-brand-charcoal/70 transition-all duration-500"
        ></span>
        <span
            :class="{ 'opacity-0': isOpen }"
            class="block h-0.5 w-6 bg-brand-charcoal/70 transition-all duration-500"
        ></span>
        <span
            :class="{
                '-translate-y-[8px] -rotate-45 !bg-brand-charcoal': isOpen,
            }"
            class="block h-0.5 w-6 bg-brand-charcoal/70 transition-all duration-500"
        ></span>
    </button>

    <!-- Mobile Navigation Menu -->
    <Teleport to="body">
        <Transition
            enter-active-class="transition duration-700 ease-out"
            enter-from-class="opacity-0 scale-95"
            enter-to-class="opacity-100 scale-100"
            leave-active-class="transition duration-500 ease-in"
            leave-from-class="opacity-100 scale-100"
            leave-to-class="opacity-0 scale-95"
        >
            <div
                v-if="isOpen"
                class="safari-blur-3xl fixed inset-0 z-[200] flex flex-col items-center justify-center overflow-y-auto bg-brand-cream/98 text-center md:hidden"
            >
                <!-- Close Button Area (Optional, since toggle is z-[110] but Teleport changes things) -->
                <!-- We should move the toggle inside or keep it outside. 
                     Actually, if we Teleport the menu, the toggle (relative/z-110) might be UNDER it.
                     Let's move the toggle logic into the teleported div for mobile if needed, 
                     OR teleport the toggle button too. Better yet, just ensure the menu has a high z-index and handle the toggle visibility. -->

                <button
                    @click="toggleMenu"
                    class="absolute top-6 right-4 z-[210] flex flex-col space-y-1.5 focus:outline-none cursor-pointer"
                    aria-label="Close navigation menu"
                >
                    <span
                        class="block h-0.5 w-6 translate-y-[8px] rotate-45 bg-brand-charcoal transition-all duration-500"
                    ></span>
                    <span
                        class="block h-0.5 w-6 bg-brand-charcoal opacity-0 transition-all duration-500"
                    ></span>
                    <span
                        class="block h-0.5 w-6 -translate-y-[8px] -rotate-45 bg-brand-charcoal transition-all duration-500"
                    ></span>
                </button>

                <nav class="mb-8 flex flex-col items-center space-y-6">
                    <img 
                        src="/amaryllis_logo.png" 
                        alt="Amaryllis Floral Design" 
                        class="mx-auto w-32 md:w-auto" 
                    />

                    <Link
                        v-for="link in primaryLinks"
                        :key="link.name"
                        :href="route(link.route)"
                        @click="isOpen = false"
                        class="font-serif text-3xl tracking-normal transition-all duration-500 hover:text-brand-ruby"
                        :class="{
                            'font-bold text-brand-ruby italic !opacity-100':
                                isActive(link.route),
                        }"
                    >
                        {{ link.name }}
                    </Link>
                </nav>

                <div
                    class="w-full max-w-[200px] space-y-4 border-t border-brand-charcoal/20 pt-6"
                >
                    <template v-if="$page.props.auth.user">
                        <Link
                            :href="route('profile.edit')"
                            @click="isOpen = false"
                            class="block w-full text-center text-xs font-semibold tracking-[0.2em] uppercase transition-colors hover:text-brand-ruby"
                            >Cont</Link
                        >
                        <Link
                            :href="route('logout')"
                            method="post"
                            as="button"
                            @click="isOpen = false"
                            class="block w-full border-none bg-transparent p-0 text-center text-xs font-semibold tracking-[0.2em] uppercase transition-colors hover:text-brand-ruby"
                            >Deconectare</Link
                        >
                    </template>
                    <template v-else>
                        <Link
                            :href="route('login')"
                            @click="isOpen = false"
                            class="block w-full text-center text-xs font-semibold tracking-[0.2em] uppercase transition-colors hover:text-brand-ruby"
                            >Autentificare</Link
                        >
                        <Link
                            :href="route('register')"
                            @click="isOpen = false"
                            class="block w-full text-center text-xs font-semibold tracking-[0.2em] uppercase transition-colors hover:text-brand-ruby"
                            >Înregistrare</Link
                        >
                    </template>
                </div>

            </div>
        </Transition>
    </Teleport>
</template>

<style scoped></style>
