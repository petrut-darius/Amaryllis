<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<template>
    <Head title="Artful Floral Design | Amaryllis" />

    <GuestLayout>
        <div class="space-y-32 md:space-y-64 mt-8 md:-mt-12">
            <!-- Hero Section: Editorial & Grand -->
            <section class="relative min-h-[85vh] flex items-center justify-center overflow-hidden -mx-4 sm:-mx-8">
                <div class="absolute inset-0 z-0">
                    <img 
                        src="https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&q=80&w=1600" 
                        alt="Editorial Floral Design"
                        class="w-full h-full object-cover animate-subtle-zoom"
                    />
                    <div class="absolute inset-0 bg-gradient-to-b from-brand-charcoal/20 via-transparent to-brand-cream/60"></div>
                </div>
                
                <div class="relative z-10 text-center space-y-12 max-w-5xl px-4 sm:px-6 text-white">
                    <div class="space-y-6">
                        <span class="text-[10px] md:text-[12px] uppercase tracking-[0.8em] text-brand-charcoal/60 font-medium block animate-fade-in">Bespoke Floral Studio</span>
                        <h1 class="text-5xl sm:text-7xl md:text-9xl font-serif text-brand-charcoal leading-[0.9] font-bold animate-reveal text-white">
                            Artistry <br/> <span class="italic font-normal text-brand-ruby/60 font-script text-4xl sm:text-6xl md:text-8xl lowercase tracking-normal">in every stem</span>
                        </h1>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-8 pt-8 animate-fade-in-up delay-500">
                        <Link :href="route('contact.create')">
                            <PrimaryButton>Start an Inquiry</PrimaryButton>
                        </Link>
                        <Link 
                            :href="route('bouquets')" 
                            class="text-[10px] uppercase tracking-[0.4em] text-white transition-all border-b border-brand-charcoal/10 pb-2 hover:border-brand-gold hover:tracking-[0.5em]"
                        >
                            View the Collection
                        </Link>
                    </div>
                </div>
            </section>

            <!-- Philosophy Section: Asymmetrical Editorial -->
            <section class="px-4 sm:px-6 max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
                    <div class="lg:col-span-7 relative group">
                        <div class="aspect-[4/5] overflow-hidden bg-brand-sage/20 shadow-2xl animate-reveal delay-300">
                            <img src="https://images.unsplash.com/photo-1490750967868-88aa4486c946?auto=format&fit=crop&q=80&w=1200" alt="Philosophy" class="w-full h-full object-cover grayscale-[0.3]" />
                        </div>
                        <!-- Overlapping Text -->
                        <div class="absolute -bottom-12 -right-4 lg:-right-16 bg-brand-cream p-8 lg:p-16 shadow-xl max-w-md animate-fade-in-up delay-700">
                            <h2 class="text-3xl md:text-5xl font-serif text-brand-charcoal leading-tight">
                                A language spoken in <span class="italic font-normal text-brand-gold font-script text-4xl lowercase tracking-normal">petals</span>.
                            </h2>
                        </div>
                    </div>
                    <div class="lg:col-span-5 space-y-12 pt-12 lg:pt-0 lg:pl-12">
                        <p class="text-sm md:text-base text-brand-charcoal/60 leading-relaxed font-light italic">
                            "We believe flowers are more than decoration—they are a medium for emotion, a way to capture the fleeting beauty of a moment and hold it close to our hearts forever."
                        </p>
                        <div class="pt-4">
                            <Link :href="route('about')" class="inline-block group">
                                <span class="text-[10px] uppercase tracking-[0.4em] text-brand-charcoal/40 group-hover:text-brand-charcoal transition-all group-hover:tracking-[0.5em]">Our Full Story</span>
                                <div class="h-px bg-brand-gold w-0 group-hover:w-full transition-all duration-700 mt-2"></div>
                            </Link>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Featured Categories: Magazine Style -->
            <section class="px-4 sm:px-6 max-w-7xl mx-auto space-y-32 md:space-y-64">
                <!-- Weddings (Large, Left) -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-end">
                    <div class="lg:col-span-8 space-y-8 group">
                        <Link :href="route('weddings')" class="block relative aspect-video overflow-hidden rounded-sm shadow-2xl animate-reveal">
                            <img src="https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&q=80&w=1600" alt="Weddings" class="w-full h-full object-cover transition-transform duration-[2s]" />
                            <div class="absolute inset-0 bg-brand-charcoal/10 group-hover:bg-transparent transition-colors duration-1000"></div>
                        </Link>
                        <div class="flex justify-between items-baseline">
                            <h3 class="text-4xl md:text-6xl font-serif italic text-brand-charcoal">Eternal Weddings</h3>
                            <Link :href="route('weddings')" class="text-[10px] uppercase tracking-[0.4em] text-brand-ruby border-b border-brand-ruby/30 pb-1 hover:tracking-[0.6em] transition-all">Explore</Link>
                        </div>
                    </div>
                    <div class="lg:col-span-4 lg:pb-24">
                        <p class="text-xs md:text-sm text-brand-charcoal/50 leading-loose max-w-xs">
                            Wedding designs that are carefully considered and always tailored to your unique vision. Bespoke floral arrangements for the day you'll never forget.
                        </p>
                    </div>
                </div>

                <!-- Events & Bouquets (Side-by-Side Asymmetrical) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-24 lg:gap-40">
                    <div class="space-y-12 group pt-24">
                        <Link :href="route('events')" class="block relative aspect-[4/5] overflow-hidden shadow-2xl animate-reveal delay-300">
                            <img src="https://images.unsplash.com/photo-1517722014278-c256a91a6fba?auto=format&fit=crop&q=80&w=1200" alt="Events" class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-brand-charcoal/10 group-hover:bg-transparent transition-colors duration-1000"></div>
                        </Link>
                        <div class="space-y-6">
                            <h3 class="text-3xl font-serif text-brand-charcoal">Lively Events</h3>
                            <p class="text-xs text-brand-charcoal/40 uppercase tracking-[0.3em]">Corporate | Private | Gala</p>
                        </div>
                    </div>

                    <div class="space-y-12 group">
                        <Link :href="route('bouquets')" class="block relative aspect-[4/5] overflow-hidden shadow-2xl animate-reveal delay-500">
                            <img src="https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&q=80&w=1600" alt="Bouquets" class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-brand-charcoal/10 group-hover:bg-transparent transition-colors duration-1000"></div>
                        </Link>
                        <div class="space-y-6">
                            <h3 class="text-3xl font-serif text-brand-charcoal">Daily Bouquets</h3>
                            <Link :href="route('bouquets')">
                                <PrimaryButton>Shop the Collection</PrimaryButton>
                            </Link>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Testimonial: Atmospheric -->
            <section class="py-48 md:py-80 text-center relative overflow-hidden bg-brand-charcoal text-brand-cream -mx-4 sm:-mx-8">
                <div class="absolute inset-0 opacity-10">
                    <img src="https://images.unsplash.com/photo-1526047932273-341f2a7631f9?auto=format&fit=crop&q=80&w=2400" alt="Texture" class="w-full h-full object-cover animate-subtle-zoom" />
                </div>
                <div class="max-w-4xl mx-auto px-6 space-y-16 relative z-10">
                    <span class="text-[10px] uppercase tracking-[1em] text-brand-gold/60">Client Experience</span>
                    <p class="text-4xl sm:text-5xl md:text-7xl font-serif italic leading-tight">
                        "The arrangements were more beautiful than I could have <span class="text-brand-gold font-script text-5xl md:text-8xl lowercase tracking-normal">ever imagined</span>."
                    </p>
                    <div class="flex items-center justify-center space-x-6">
                        <div class="w-12 h-px bg-brand-gold/30"></div>
                        <span class="text-[10px] uppercase tracking-[0.6em] text-brand-cream/40">Eleanor & James</span>
                        <div class="w-12 h-px bg-brand-gold/30"></div>
                    </div>
                </div>
            </section>

            <!-- Final CTA: Bold Editorial -->
            <section class="py-64 text-center space-y-24">
                <div class="space-y-12">
                    <h2 class="text-6xl md:text-[10rem] font-serif text-brand-charcoal leading-none tracking-tighter">Ready to <span class="italic font-normal text-brand-ruby font-script text-7xl md:text-[12rem] tracking-normal">Bloom?</span></h2>
                    <p class="text-brand-charcoal/40 uppercase tracking-[0.8em] text-[12px]">Let's collaborate on your next moment.</p>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center gap-16">
                    <Link :href="route('contact.create')">
                        <PrimaryButton>Start Your Inquiry</PrimaryButton>
                    </Link>
                    <Link :href="route('gallery')" class="text-[12px] uppercase tracking-[0.5em] hover:text-brand-gold transition-all border-b border-brand-charcoal/10 pb-2 hover:tracking-[0.7em]">
                        View Portfolio
                    </Link>
                </div>
            </section>
        </div>
    </GuestLayout>
</template>
