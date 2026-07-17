<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
</script>

<template>
    <GuestLayout>
        <div class="flex flex-col items-center pt-12 sm:pt-0">
            <div
                class="relative w-full overflow-hidden rounded-sm border border-brand-ruby/20 bg-white px-6 py-10 shadow-sm sm:max-w-md md:mt-6"
            >
                <div
                    class="absolute top-0 left-0 h-1 w-full bg-brand-ruby/10"
                ></div>
                <slot />
            </div>
        </div>
    </GuestLayout>
</template>
