<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import { ref, watch } from "vue";

const isOpen = ref(false);

watch(isOpen, (val) => {
    if (val) {
        document.body.style.overflow = 'hidden';
    } else {
        document.body.style.overflow = '';
    }
});

const primaryLinks = [
    { name: "Gallery", route: "gallery"},
    { name: "Bouquets", route: "bouquets" },
    { name: "Events", route: "events" },
    { name: "About", route: "about" },
    { name: "Contact", route: "contact.create" },
    { name: "Delyvery", route: "delivery"}
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
    <nav class="hidden md:flex flex-col items-center space-y-6 w-full">
        <div class="flex items-center justify-center space-x-10 lg:space-x-16 uppercase tracking-[0.4em] text-[9px] md:text-[10px] font-semibold text-brand-charcoal/40">
            <Link 
                v-for="link in primaryLinks" 
                :key="link.name" 
                :href="route(link.route)"
                class="hover:text-brand-charcoal transition-all duration-700 relative group py-2"
                :class="{ 'text-brand-charcoal !tracking-[0.5em]': isActive(link.route) }"
            >
                {{ link.name }}
                <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-[1.5px] bg-brand-ruby/60 transition-all duration-700 cubic-bezier(0.4, 0, 0.2, 1) group-hover:w-full" :class="{ 'w-full !bg-brand-ruby': isActive(link.route) }"></span>
            </Link>
        </div>

        <!-- Auth Links (Subtle & Elegant) -->
        <div class="flex items-center space-x-8 text-[8px] uppercase tracking-[0.3em] text-brand-charcoal/20">
            <template v-if="$page.props.auth.user">
                <Link :href="route('profile.edit')" class="hover:text-brand-charcoal transition-colors hover:tracking-[0.4em]">Account</Link>
                <Link :href="route('logout')" method="post" as="button" class="hover:text-brand-charcoal transition-colors hover:tracking-[0.4em]">Logout</Link>
            </template>
            <template v-else>
                <Link :href="route('login')" class="hover:text-brand-charcoal transition-colors hover:tracking-[0.4em]">Login</Link>
                <span class="opacity-30">/</span>
                <Link :href="route('register')" class="hover:text-brand-charcoal transition-colors hover:tracking-[0.4em]">Register</Link>
            </template>
        </div>
    </nav>


    <!-- Mobile Navigation Toggle -->
    <button 
        @click="toggleMenu"
        class="md:hidden flex flex-col space-y-1.5 focus:outline-none z-[110] relative p-2 -mr-2"
        aria-label="Toggle navigation menu"
    >
        <span :class="{ 'rotate-45 translate-y-[8px] !bg-brand-charcoal': isOpen }" class="block w-6 h-0.5 bg-brand-charcoal/70 transition-all duration-500"></span>
        <span :class="{ 'opacity-0': isOpen }" class="block w-6 h-0.5 bg-brand-charcoal/70 transition-all duration-500"></span>
        <span :class="{ '-rotate-45 -translate-y-[8px] !bg-brand-charcoal': isOpen }" class="block w-6 h-0.5 bg-brand-charcoal/70 transition-all duration-500"></span>
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
                class="md:hidden fixed inset-0 bg-brand-cream/98 backdrop-blur-3xl z-[200] flex flex-col items-center justify-center p-8 text-center"
            >
                <!-- Close Button Area (Optional, since toggle is z-[110] but Teleport changes things) -->
                <!-- We should move the toggle inside or keep it outside. 
                     Actually, if we Teleport the menu, the toggle (relative/z-110) might be UNDER it.
                     Let's move the toggle logic into the teleported div for mobile if needed, 
                     OR teleport the toggle button too. Better yet, just ensure the menu has a high z-index and handle the toggle visibility. -->
                
                <button 
                    @click="toggleMenu"
                    class="absolute top-8 right-8 flex flex-col space-y-1.5 focus:outline-none z-[210] p-2"
                    aria-label="Close navigation menu"
                >
                    <span class="block w-6 h-0.5 bg-brand-charcoal rotate-45 translate-y-[8px] transition-all duration-500"></span>
                    <span class="block w-6 h-0.5 bg-brand-charcoal opacity-0 transition-all duration-500"></span>
                    <span class="block w-6 h-0.5 bg-brand-charcoal -rotate-45 -translate-y-[8px] transition-all duration-500"></span>
                </button>

                <nav class="flex flex-col items-center space-y-10 mb-12">
                    <Link 
                        v-for="link in primaryLinks"
                        :key="link.name"
                        :href="route(link.route)"
                        @click="isOpen = false"
                        class="text-5xl font-serif text-brand-charcoal/30 hover:text-brand-charcoal transition-all duration-500 tracking-tight"
                        :class="{ 'text-brand-charcoal italic !opacity-100': isActive(link.route) }"
                    >
                        {{ link.name }}
                    </Link>
                </nav>
                
                <div class="space-y-6 pt-12 border-t border-brand-charcoal w-full max-w-[200px]">
                    <template v-if="$page.props.auth.user">
                        <Link :href="route('profile.edit')" @click="isOpen = false" class="block text-[11px] uppercase tracking-[0.5em] text-brand-charcoal/40 hover:text-brand-gold transition-colors">Account</Link>
                        <Link :href="route('logout')" method="post" as="button" @click="isOpen = false" class="block text-[11px] uppercase tracking-[0.5em] text-brand-charcoal/40 hover:text-brand-gold transition-colors">Logout</Link>
                    </template>
                    <template v-else>
                        <Link :href="route('login')" @click="isOpen = false" class="block text-[11px] uppercase tracking-[0.5em] text-brand-charcoal/40 hover:text-brand-gold transition-colors">Login</Link>
                        <Link :href="route('register')" @click="isOpen = false" class="block text-[11px] uppercase tracking-[0.5em] text-brand-charcoal/40 hover:text-brand-gold transition-colors">Register</Link>
                    </template>
                </div>

                <!-- Decorative Footer in Menu -->
                <div class="absolute bottom-16 left-0 w-full text-center">
                    <span class="font-script text-3xl text-brand-gold/60 lowercase">amaryllis floral design</span>
                </div>
            </div>
        </Transition>
    </Teleport>
</template>

<style scoped>
</style>