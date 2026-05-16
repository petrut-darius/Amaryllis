<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

defineProps({
    baptisms: Object,
});
</script>

<template>
    <Head title="Baptisms" />

    <GuestLayout>
        <div class="space-y-16 md:space-y-16">
            <!-- Header -->
            <div class="max-w-3xl mx-auto text-center space-y-8">
                <span class="uppercase tracking-[0.5em] text-[10px] text-brand-ruby font-bold block">Portfolio</span>
                <h1 class="text-4xl md:text-7xl font-serif text-brand-charcoal">The Baptisms</h1>
                <p class="text-sm md:text-base text-brand-charcoal/50 leading-relaxed font-light">
                    Elegance and delicacy for life's first special moments. We create soft, gentle floral arrangements that celebrate new beginnings with grace and beauty.
                </p>
                <div class="w-12 h-px bg-brand-blush mx-auto"></div>
            </div>

            <!-- Baptisms List -->
            <div class="space-y-24 md:space-y-48">
                <section v-for="(baptism, idx) in baptisms.data" :key="baptism.id" class="space-y-24">
                    <!-- Baptism Info -->
                    <div class="max-w-2xl mx-auto text-center space-y-10">
                        <div class="space-y-4">
                            <h2 class="text-3xl md:text-5xl font-serif text-brand-charcoal">{{ baptism.name }}</h2>
                            <div class="flex justify-center gap-4">
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-ruby/60"></span>
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-ruby/30"></span>
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-blush/30"></span>
                            </div>
                        </div>
                        <p class="text-brand-charcoal/50 leading-relaxed text-sm md:text-base font-light px-6">
                            {{ baptism.description }}
                        </p>
                    </div>

                    <!-- Baptism Photos Grid -->
                    <div class="grid grid-cols-1 gap-8 md:gap-16 max-w-5xl mx-auto w-full">
                        <div v-for="(image, index) in baptism.images" :key="index" 
                            class="max-h-[600px] flex justify-center overflow-hidden group relative"
                        >
                            <img 
                                :src="image.path" 
                                :alt="baptism.name" 
                                class="w-full h-full object-contain grayscale-[0.1] group-hover:grayscale-0 transition-all duration-[2s]" 
                            />
                        </div>
                    </div>
                </section>
            </div>

            <!-- Final CTA -->
            <section class="py-20 border-y border-brand-charcoal text-center space-y-10">
                <h2 class="text-3xl md:text-5xl font-serif text-brand-charcoal">Planning a baptism?</h2>
                <div class="pt-4">
                    <Link :href="route('contact.create')">
                        <PrimaryButton>Start an Inquiry</PrimaryButton>
                    </Link>
                </div>
            </section>

            <!-- Empty State -->
            <div v-if="!baptisms.data || baptisms.data.length === 0" class="text-center py-40 bg-white/50 border border-brand-charcoal rounded-sm">
                <p class="text-brand-charcoal/30 font-serif italic text-xl">Our baptism portfolio is currently being curated.</p>
            </div>
        </div>
    </GuestLayout>
</template>
