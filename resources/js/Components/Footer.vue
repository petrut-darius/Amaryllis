<script setup>
import { Link } from '@inertiajs/vue3';

const currentYear = new Date().getFullYear();
</script>

<template>
    <div class="mx-auto max-w-7xl text-brand-cream/80">
        <div
            class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:grid-cols-12 lg:gap-16"
        >
            <!-- Brand Section -->
            <div
                class="flex flex-col items-center space-y-6 text-center lg:col-span-5 lg:items-start lg:text-left"
            >
                <Link href="/" class="group inline-block">
                    <span
                        class="font-serif text-3xl tracking-[0.1em] text-brand-cream uppercase transition-all duration-1000 group-hover:text-brand-gold md:text-5xl md:tracking-[0.2em]"
                        >Amaryllis</span
                    >
                </Link>
                <p
                    class="max-w-[320px] px-4 text-[11px] leading-loose font-light text-brand-cream/40 italic md:text-[12px] lg:px-0"
                >
                    „Surprindem frumusețea sălbatică a naturii prin design
                    floral artistic, transformând momentele efemere în amintiri
                    de durată.”
                </p>

                <!-- Script Accent -->
                <div class="pt-2">
                    <span
                        class="font-script text-2xl text-brand-gold opacity-60"
                        >Înființat în 2000</span
                    >
                </div>
            </div>

            <!-- Navigation Links -->
            <div class="grid w-full grid-cols-2 gap-8 lg:col-span-4">
                <div
                    class="flex flex-col items-start space-y-6 ml-4"
                >
                    <h4
                        class="text-[10px] font-bold tracking-[0.5em] text-brand-cream/20 uppercase"
                    >
                        Portofoliu
                    </h4>
                    <ul
                        class="space-y-4 text-[10px] tracking-[0.3em] uppercase md:space-y-4 md:text-[11px]"
                    >
                        <li>
                            <Link
                                :href="route('bouquets')"
                                class="transition-colors hover:text-brand-rose"
                                >Buchete</Link
                            >
                        </li>
                        <li>
                            <Link
                                :href="route('weddings')"
                                class="transition-colors hover:text-brand-rose"
                                >Nunți</Link
                            >
                        </li>
                        <li>
                            <Link
                                :href="route('events')"
                                class="transition-colors hover:text-brand-rose"
                                >Evenimente</Link
                            >
                        </li>
                    </ul>
                </div>

                <div
                    class="flex flex-col items-start space-y-6"
                >
                    <h4
                        class="text-[10px] font-bold tracking-[0.5em] text-brand-cream/20 uppercase"
                    >
                        Studio
                    </h4>
                    <ul
                        class="space-y-4 text-[10px] tracking-[0.3em] uppercase md:space-y-4 md:text-[11px]"
                    >
                        <li>
                            <Link
                                :href="route('about')"
                                class="transition-colors hover:text-brand-rose"
                                >Povestea Noastră</Link
                            >
                        </li>
                        <li>
                            <Link
                                :href="route('delivery')"
                                class="transition-colors hover:text-brand-rose"
                                >Livrare</Link
                            >
                        </li>
                        <li>
                            <Link
                                :href="route('contact.create')"
                                class="transition-colors hover:text-brand-rose"
                                >Solicitări</Link
                            >
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Social/Connect -->
            <div
                class="flex w-full flex-col items-center space-y-6 lg:col-span-3 lg:items-start"
            >
                <h4
                    class="text-[10px] font-bold tracking-[0.5em] text-brand-cream/20 uppercase"
                >
                    Contact
                </h4>
                <div
                    class="flex flex-col items-center space-y-6 lg:items-start"
                >
                    <a
                        href="mailto:floraria.amaryllis.ms@gmail.com"
                        class="font-serif text-sm italic underline decoration-brand-gold/30 underline-offset-8 transition-colors hover:text-brand-gold md:text-base"
                        >floraria.amaryllis.ms@gmail.com</a
                    >

                    <a
                        href="tel:+40745265516"
                        class="font-serif text-sm italic underline decoration-brand-gold/30 underline-offset-8 transition-colors hover:text-brand-gold md:text-base"
                        >Sunați-ne</a
                    >

                    <div class="flex space-x-10">
                        <a
                            href="https://www.instagram.com/amaryllis.flower_/"
                            target="_blank"
                            rel="noopener"
                            class="transition-all duration-700 hover:scale-125 hover:text-brand-rose"
                        >
                            <span class="sr-only">Instagram</span>
                            <svg
                                class="h-5 w-5"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"
                                />
                            </svg>
                        </a>
                        <a
                            href="https://www.tiktok.com/@amaryllis.flower_"
                            target="_blank"
                            rel="noopener"
                            class="transition-all duration-700 hover:scale-125 hover:text-brand-lavender"
                        >
                            <span class="sr-only">TikTok</span>
                            <svg
                                class="h-5 w-5"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"
                                />
                            </svg>
                        </a>
                        <a
                            href="https://www.facebook.com/profile.php?id=61572577923108#"
                            target="_blank"
                            rel="noopener"
                            class="transition-all duration-700 hover:scale-125 hover:text-brand-lavender"
                        >
                            <span class="sr-only">Facebook</span>
                            <svg
                                class="h-5 w-5"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z"
                                />
                            </svg>
                        </a>
                        <a
                            href="https://wa.me/40745265516"
                            target="_blank"
                            rel="noopener"
                            class="transition-all duration-700 hover:scale-125 hover:text-brand-lavender"
                        >
                            <span class="sr-only">Whatsapp</span>
                            <svg
                                class="h-5 w-5"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"
                                />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="mt-8 flex flex-col items-center justify-between space-y-6 border-t border-brand-cream/10 pt-8 text-[9px] tracking-[0.4em] text-brand-cream/30 uppercase sm:flex-row sm:space-y-0 md:text-[10px]"
        >
            <p>&copy; {{ currentYear }} Amaryllis Floral Design.</p>
            <div class="flex space-x-8">
                <Link
                    :href="route('terms')"
                    class="transition-colors hover:text-brand-gold"
                    >Termeni și Condiții</Link
                >
            </div>
        </div>
    </div>
</template>
