<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';

const isOpen = ref(false);
const scrollPosition = ref(0);
const isDropdownOpen = ref(false);
const isMobileDropdownOpen = ref(true);
let dropdownTimeout: ReturnType<typeof setTimeout> | null = null;

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
    { name: 'Acasa', route: 'home' },
    {
        name: 'Portofoliu',
        route: 'gallery',
        hasDropdown: true,
        children: [
            { name: 'Buchete', route: 'flowers' },
            { name: 'Evenimente', route: 'events' },
        ],
    },
    { name: 'Servici', route: 'delivery' },
    { name: 'Despre Noi', route: 'about' },
    { name: 'Contact', route: 'contact.create' },
];

const isActive = (routeName: string) => {
    // @ts-ignore
    return route().current(routeName + '*');
};

const isPortfolioActive = computed(() => {
    // @ts-ignore
    return (
        // @ts-ignore
        route().current('gallery*') ||
        // @ts-ignore
        route().current('bouquets*') ||
        // @ts-ignore
        route().current('events*')
    );
});

const handleMouseEnter = () => {
    if (dropdownTimeout) clearTimeout(dropdownTimeout);
    isDropdownOpen.value = true;
};

const handleMouseLeave = () => {
    dropdownTimeout = setTimeout(() => {
        isDropdownOpen.value = false;
    }, 150);
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
            <template v-for="link in primaryLinks" :key="link.name">
                <!-- Dropdown Item (Portofoliu) -->
                <div
                    v-if="link.hasDropdown"
                    class="relative"
                    @mouseenter="handleMouseEnter"
                    @mouseleave="handleMouseLeave"
                >
                    <div class="flex items-center">
                        <Link
                            :href="route(link.route)"
                            class="group relative flex items-center gap-1.5 py-2 transition-all duration-500"
                            :class="{
                                'font-black !tracking-[0.25em] text-brand-ruby':
                                    isPortfolioActive,
                            }"
                        >
                            {{ link.name }}
                            <svg
                                class="h-3 w-3 transition-transform duration-300"
                                :class="{ 'rotate-180': isDropdownOpen }"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                />
                            </svg>
                            <span
                                class="cubic-bezier(0.4, 0, 0.2, 1) absolute bottom-0 left-1/2 h-[2px] w-0 -translate-x-1/2 bg-brand-ruby transition-all duration-500 group-hover:w-full"
                                :class="{
                                    'w-full !bg-brand-ruby': isPortfolioActive,
                                }"
                            ></span>
                        </Link>
                    </div>

                    <!-- Dropdown Menu -->
                    <Transition
                        enter-active-class="transition duration-200 ease-out"
                        enter-from-class="opacity-0 translate-y-1 scale-95"
                        enter-to-class="opacity-100 translate-y-0 scale-100"
                        leave-active-class="transition duration-150 ease-in"
                        leave-from-class="opacity-100 translate-y-0 scale-100"
                        leave-to-class="opacity-0 translate-y-1 scale-95"
                    >
                        <div
                            v-show="isDropdownOpen"
                            class="absolute top-full left-1/2 z-50 mt-1 w-44 -translate-x-1/2 rounded-lg border border-brand-charcoal/10 bg-brand-cream/95 p-2 shadow-xl backdrop-blur-md"
                        >
                            <div class="flex flex-col space-y-1">
                                <Link
                                    v-for="child in link.children"
                                    :key="child.name"
                                    :href="route(child.route)"
                                    class="rounded-md px-4 py-2.5 text-center text-[11px] font-bold tracking-[0.15em] text-brand-charcoal uppercase transition-all duration-300 hover:bg-brand-ruby/10 hover:text-brand-ruby"
                                    :class="{
                                        'bg-brand-ruby/10 font-black text-brand-ruby':
                                            isActive(child.route),
                                    }"
                                >
                                    {{ child.name }}
                                </Link>
                            </div>
                        </div>
                    </Transition>
                </div>

                <!-- Regular Item -->
                <Link
                    v-else
                    :href="route(link.route)"
                    class="group relative py-2 transition-all duration-500"
                    :class="{
                        'font-black !tracking-[0.25em] text-brand-ruby':
                            isActive(link.route),
                    }"
                >
                    {{ link.name }}
                    <span
                        class="cubic-bezier(0.4, 0, 0.2, 1) absolute bottom-0 left-1/2 h-[2px] w-0 -translate-x-1/2 bg-brand-ruby transition-all duration-500 group-hover:w-full"
                        :class="{
                            'w-full !bg-brand-ruby': isActive(link.route),
                        }"
                    ></span>
                </Link>
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
                class="safari-blur-3xl fixed inset-0 z-[200] flex flex-col items-center justify-center overflow-y-auto bg-brand-cream/98 p-6 md:hidden"
            >
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

                <div class="my-auto flex flex-col items-center space-y-8 py-8">
                    <img 
                        src="/amaryllis_logo.png" 
                        alt="Amaryllis Floral Design" 
                        class="w-32 md:w-auto"
                    />

                    <nav class="flex flex-col items-start space-y-6 text-left">
                        <template v-for="link in primaryLinks" :key="link.name">
                            <!-- Mobile Item with Dropdown -->
                            <div
                                v-if="link.hasDropdown"
                                class="flex flex-col items-start space-y-3"
                            >
                                <div class="flex items-center space-x-2">
                                    <Link
                                        :href="route(link.route)"
                                        @click="isOpen = false"
                                        class="font-serif text-3xl tracking-normal transition-all duration-500 hover:text-brand-ruby"
                                        :class="{
                                            'font-bold text-brand-ruby italic !opacity-100':
                                                isPortfolioActive,
                                        }"
                                    >
                                        {{ link.name }}
                                    </Link>
                                    <button
                                        @click.stop="
                                            isMobileDropdownOpen =
                                                !isMobileDropdownOpen
                                        "
                                        class="cursor-pointer p-1 text-brand-charcoal/70 transition-colors hover:text-brand-ruby"
                                        aria-label="Toggle Portofoliu Submenu"
                                    >
                                        <svg
                                            class="h-5 w-5 transition-transform duration-300"
                                            :class="{
                                                'rotate-180': isMobileDropdownOpen,
                                            }"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 9l-7 7-7-7"
                                            />
                                        </svg>
                                    </button>
                                </div>

                                <Transition
                                    enter-active-class="transition duration-300 ease-out"
                                    enter-from-class="opacity-0 -translate-y-2 scale-95"
                                    enter-to-class="opacity-100 translate-y-0 scale-100"
                                    leave-active-class="transition duration-200 ease-in"
                                    leave-from-class="opacity-100 translate-y-0 scale-100"
                                    leave-to-class="opacity-0 -translate-y-2 scale-95"
                                >
                                    <div
                                        v-if="isMobileDropdownOpen"
                                        class="flex flex-col items-start space-y-3 pt-1 pl-4"
                                    >
                                        <Link
                                            v-for="child in link.children"
                                            :key="child.name"
                                            :href="route(child.route)"
                                            @click="isOpen = false"
                                            class="font-sans text-base font-semibold tracking-[0.2em] text-brand-charcoal/80 uppercase transition-all duration-300 hover:text-brand-ruby"
                                            :class="{
                                                'font-bold text-brand-ruby':
                                                    isActive(child.route),
                                            }"
                                        >
                                            {{ child.name }}
                                        </Link>
                                    </div>
                                </Transition>
                            </div>

                            <!-- Regular Mobile Item -->
                            <Link
                                v-else
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
                        </template>
                    </nav>
                </div>
            </div>
        </Transition>
    </Teleport>
</template>


