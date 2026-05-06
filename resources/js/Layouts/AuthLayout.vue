<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
</script>

<template>
    <GuestLayout>
        <div class="flex flex-col items-center pt-12 sm:pt-0">
            <div class="w-full sm:max-w-md md:mt-6 px-6 py-10 bg-white border border-brand-ruby/20 shadow-sm overflow-hidden rounded-sm relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-brand-ruby/10"></div>
                <slot />
            </div>
        </div>
    </GuestLayout>
</template>
