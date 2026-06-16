<script setup>
import { Link } from "@inertiajs/vue3";

const currentYear = new Date().getFullYear();
</script>

<template>
    <div class="max-w-7xl mx-auto text-brand-cream/80">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-16">
            <!-- Brand Section -->
            <div class="lg:col-span-5 space-y-6 flex flex-col items-center lg:items-start text-center lg:text-left">
                <Link href="/" class="group inline-block">
                    <span class="font-serif text-3xl md:text-5xl tracking-[0.1em] md:tracking-[0.2em] uppercase text-brand-cream group-hover:text-brand-gold transition-all duration-1000">Amaryllis</span>
                </Link>
                <p class="text-[11px] md:text-[12px] leading-loose max-w-[320px] font-light italic text-brand-cream/40 px-4 lg:px-0">
                    "We capture the untamed beauty of nature through artful floral design, crafting ephemeral moments into lasting memories."
                </p>
                
                <!-- Script Accent -->
                <div class="pt-2">
                    <span class="font-script text-2xl text-brand-gold opacity-60">Established 2000</span>
                </div>
            </div>

            <!-- Navigation Links -->
            <div class="lg:col-span-4 grid grid-cols-2 gap-8 w-full">
                <div class="space-y-6 flex flex-col items-center lg:items-start">
                    <h4 class="uppercase tracking-[0.5em] text-[10px] font-bold text-brand-cream/20">Portfolio</h4>
                    <ul class="text-[10px] md:text-[11px] space-y-4 md:space-y-4 uppercase tracking-[0.3em]">
                        <li><Link :href="route('bouquets')" class="hover:text-brand-rose transition-colors">Bouquets</Link></li>
                        <li><Link :href="route('weddings')" class="hover:text-brand-rose transition-colors">Weddings</Link></li>
                        <li><Link :href="route('events')" class="hover:text-brand-rose transition-colors">Events</Link></li>
                    </ul>
                </div>

                <div class="space-y-6 flex flex-col items-center lg:items-start">
                    <h4 class="uppercase tracking-[0.5em] text-[10px] font-bold text-brand-cream/20">Studio</h4>
                    <ul class="text-[10px] md:text-[11px] space-y-4 md:space-y-4 uppercase tracking-[0.3em]">
                        <li><Link :href="route('about')" class="hover:text-brand-rose transition-colors">Our Story</Link></li>
                        <li><Link :href="route('delivery')" class="hover:text-brand-rose transition-colors">Delivery</Link></li>
                        <li><Link :href="route('contact.create')" class="hover:text-brand-rose transition-colors">Inquiry</Link></li>
                    </ul>
                </div>
            </div>

            <!-- Social/Connect -->
            <div class="lg:col-span-3 space-y-6 flex flex-col items-center lg:items-start w-full">
                <h4 class="uppercase tracking-[0.5em] text-[10px] font-bold text-brand-cream/20">Connect</h4>
                <div class="space-y-6 flex flex-col items-center lg:items-start">
                    <a href="mailto:hello@amaryllis.com" class="text-sm md:text-base font-serif italic hover:text-brand-gold transition-colors underline underline-offset-8 decoration-brand-gold/30">hello@amaryllis.com</a>
                    
                    <a href="tel:+40745265516" class="text-sm md:text-base font-serif italic hover:text-brand-gold transition-colors underline underline-offset-8 decoration-brand-gold/30">Call us</a>

                    <div class="flex space-x-10">
                        <a href="https://instagram.com" target="_blank" rel="noopener" class="hover:text-brand-rose transition-all duration-700 hover:scale-125">
                            <span class="sr-only">Instagram</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="https://pinterest.com" target="_blank" rel="noopener" class="hover:text-brand-lavender transition-all duration-700 hover:scale-125">
                            <span class="sr-only">Pinterest</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.966 1.406-5.966s-.359-.72-.359-1.781c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738.098.119.112.224.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.261 7.929-7.261 4.162 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146 1.124.347 2.317.535 3.554.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.39 18.592.026 11.985.026L12.017 0z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 pt-8 border-t border-brand-cream/10 flex flex-col sm:flex-row justify-between items-center space-y-6 sm:space-y-0 text-[9px] md:text-[10px] uppercase tracking-[0.4em] text-brand-cream/30">
            <p>&copy; {{ currentYear }} Amaryllis Floral Design.</p>
            <div class="flex space-x-8">
                <Link :href="route('terms')" class="hover:text-brand-gold transition-colors">Termeni și Condiții</Link>
            </div>
        </div>
    </div>
</template>
