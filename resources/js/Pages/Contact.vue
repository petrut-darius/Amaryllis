<script setup>
import { useForm, usePage, Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const page = usePage();

const user = page.props.auth.user;

const contactForm = useForm({
    name: user?.name ?? '',
    email: user?.email ?? '',
    phone: user?.phone ?? '',
    subject: '',
    eventDate: '',
    vision: '',
    message: '',
});

const submitContactForm = () => {
    contactForm.post(route('contact.store'), {
        preserveScroll: true,
        forceFormData: true,
        onSuccess: () => contactForm.reset(),
    });
};

const structuredData = computed(() => {
    return JSON.stringify({
        '@context': 'https://schema.org',
        '@type': 'ContactPage',
        mainEntity: {
            '@id': 'https://floraria-amaryllis.ro/#organization',
        },
        description:
            'Contactează Amaryllis Florărie Târgu Mureș pentru comenzi personalizate și inquiry-uri de evenimente.',
        publisher: {
            '@id': 'https://floraria-amaryllis.ro/#organization',
        },
    });
});
</script>
<template>
    <Head>
        <title>Contact | Amaryllis Florărie Târgu Mureș</title>
        <meta
            name="description"
            content="Contactează-ne pentru comenzi personalizate, evenimente sau întrebări. Suntem aici să aducem frumosul în viața ta prin design floral de excepție în Târgu Mureș."
        />
        <link rel="canonical" :href="route('contact.create')" />

        <meta
            property="og:title"
            content="Contact | Amaryllis Florărie Târgu Mureș"
        />
        <meta
            property="og:description"
            content="Contactează-ne pentru comenzi personalizate sau întrebări la Amaryllis."
        />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('contact.create')" />
        <meta property="og:image" content="/amaryllis_logo.png" />

        <component :is="'script'" type="application/ld+json">
            {{ structuredData }}
        </component>
    </Head>

    <GuestLayout>
        <div class="mx-auto max-w-4xl space-y-8 px-4 md:space-y-12 md:px-0">
            <!-- Header -->
            <div class="animate-fade-in-up space-y-4 text-center">
                <span
                    class="block text-xs font-extrabold tracking-[0.25em] text-brand-ruby uppercase md:text-sm"
                    >Contactează-ne</span
                >
                <h1 class="font-serif text-3xl text-brand-charcoal md:text-8xl">
                    Solicitare
                </h1>
                <p
                    class="mx-auto max-w-2xl text-sm leading-relaxed font-semibold text-brand-charcoal/85 italic md:text-lg"
                >
                    „Ne-am dori foarte mult să ne povestești despre viziunea ta.
                    Fie că planifici o nuntă, un eveniment privat sau pur și
                    simplu vrei să ne saluți, te rugăm să completezi formularul
                    de mai jos și te vom contacta în cel mai scurt timp.”
                </p>
                <div class="mx-auto h-[2px] w-16 bg-brand-gold/60"></div>
            </div>

            <!-- Quick Contact Actions -->
            <div
                class="animate-fade-in-up grid grid-cols-2 gap-4 delay-150 md:grid-cols-4 md:gap-6"
            >
                <a
                    href="https://wa.me/40745265516"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="group relative inline-flex items-center justify-center overflow-hidden rounded-sm bg-brand-ruby px-4 py-4 text-xs font-bold tracking-[0.2em] text-white uppercase transition-all duration-500 hover:shadow-xl hover:shadow-brand-ruby/10 active:scale-95 md:py-6 md:text-sm"
                >
                    <div
                        class="absolute inset-0 w-0 bg-brand-gold transition-all duration-500 ease-out group-hover:w-full"
                    ></div>
                    <span
                        class="relative z-10 flex items-center gap-3 transition-colors duration-500 group-hover:text-brand-charcoal"
                    >
                        <i class="fa-brands fa-whatsapp text-base"></i>
                        WhatsApp
                    </span>
                    <div
                        class="absolute inset-0 border border-brand-gold/30 transition-colors duration-500 group-hover:border-brand-gold/60"
                    ></div>
                </a>

                <a
                    href="mailto:floraria.amaryllis.ms@gmail.com"
                    class="group relative inline-flex items-center justify-center overflow-hidden rounded-sm bg-brand-ruby px-4 py-4 text-xs font-bold tracking-[0.2em] text-white uppercase transition-all duration-500 hover:shadow-xl hover:shadow-brand-ruby/10 active:scale-95 md:py-6 md:text-sm"
                >
                    <div
                        class="absolute inset-0 w-0 bg-brand-gold transition-all duration-500 ease-out group-hover:w-full"
                    ></div>
                    <span
                        class="relative z-10 flex items-center gap-3 transition-colors duration-500 group-hover:text-brand-charcoal"
                    >
                        <i class="fa-solid fa-envelope text-base"></i>
                        Email
                    </span>
                    <div
                        class="absolute inset-0 border border-brand-gold/30 transition-colors duration-500 group-hover:border-brand-gold/60"
                    ></div>
                </a>

                <Link
                    :href="route('delivery')"
                    class="group relative inline-flex items-center justify-center overflow-hidden rounded-sm border-2 border-brand-ruby/20 px-4 py-4 text-xs font-bold tracking-[0.2em] text-brand-ruby uppercase transition-all duration-500 hover:bg-brand-ruby hover:text-white active:scale-95 md:py-6 md:text-sm"
                >
                    <span class="relative z-10 flex items-center gap-3">
                        <i class="fa-solid fa-truck-fast text-base"></i>
                        Livrare
                    </span>
                    <div
                        class="absolute inset-0 border border-brand-ruby/10 transition-colors duration-500 group-hover:border-brand-ruby/30"
                    ></div>
                </Link>

                <a
                    href="tel:+40745265516"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="group relative inline-flex items-center justify-center overflow-hidden rounded-sm bg-brand-ruby px-4 py-4 text-xs font-bold tracking-[0.2em] text-white uppercase transition-all duration-500 hover:shadow-xl hover:shadow-brand-ruby/10 active:scale-95 md:py-6 md:text-sm"
                >
                    <div
                        class="absolute inset-0 w-0 bg-brand-gold transition-all duration-500 ease-out group-hover:w-full"
                    ></div>
                    <span
                        class="relative z-10 flex items-center gap-3 transition-colors duration-500 group-hover:text-brand-charcoal"
                    >
                        <i class="fa-solid fa-phone text-base"></i>
                        Sună
                    </span>
                    <div
                        class="absolute inset-0 border border-brand-gold/30 transition-colors duration-500 group-hover:border-brand-gold/60"
                    ></div>
                </a>
            </div>

            <!-- Form -->
            <form
                @submit.prevent="submitContactForm"
                class="animate-fade-in-up space-y-8 delay-300"
            >
                <div
                    class="grid grid-cols-1 gap-x-8 gap-y-6 rounded-sm bg-white/50 p-4 shadow-sm ring-1 ring-brand-charcoal/5 md:grid-cols-2 md:gap-x-12 md:p-8"
                >
                    <div class="group space-y-3">
                        <InputLabel
                            for="name"
                            value="Nume"
                            class="text-xs font-extrabold tracking-[0.2em] text-brand-charcoal uppercase transition-all duration-500 group-focus-within:text-brand-ruby md:text-sm"
                        />
                        <TextInput
                            v-model="contactForm.name"
                            id="name"
                            type="text"
                            class="w-full bg-transparent px-0 py-3 text-base font-semibold text-brand-charcoal transition-all duration-700 outline-none placeholder:text-brand-gol focus:border-brand-ruby focus:ring-0 md:text-lg"
                            placeholder="Numele tău complet"
                        />
                        <InputError :message="contactForm.errors.name" />
                    </div>

                    <div class="group space-y-3">
                        <InputLabel
                            for="email"
                            value="Email"
                            class="text-xs font-extrabold tracking-[0.2em] text-brand-charcoal uppercase transition-all duration-500 group-focus-within:text-brand-ruby md:text-sm"
                        />
                        <TextInput
                            v-model="contactForm.email"
                            id="email"
                            type="email"
                            class="w-full bg-transparent px-0 py-3 text-base font-semibold text-brand-charcoal transition-all duration-700 outline-none placeholder:text-brand-charcoal/30 focus:border-brand-ruby focus:ring-0 md:text-lg"
                            placeholder="Adresa de email"
                        />
                        <InputError :message="contactForm.errors.email" />
                    </div>

                    <div class="group space-y-3">
                        <InputLabel
                            for="phone"
                            value="Telefon"
                            class="text-xs font-extrabold tracking-[0.2em] text-brand-charcoal uppercase transition-all duration-500 group-focus-within:text-brand-ruby md:text-sm"
                        />
                        <TextInput
                            v-model="contactForm.phone"
                            id="phone"
                            type="tel"
                            class="w-full bg-transparent px-0 py-3 text-base font-semibold text-brand-charcoal transition-all duration-700 outline-none placeholder:text-brand-charcoal/30 focus:border-brand-ruby focus:ring-0 md:text-lg"
                            placeholder="Numărul de telefon"
                        />
                        <InputError :message="contactForm.errors.phone" />
                    </div>

                    <div class="group space-y-3">
                        <InputLabel
                            for="eventDate"
                            value="Data"
                            class="text-xs font-extrabold tracking-[0.2em] text-brand-charcoal uppercase transition-all duration-500 group-focus-within:text-brand-ruby md:text-sm"
                        />
                        <TextInput
                            v-model="contactForm.eventDate"
                            id="eventDate"
                            type="text"
                            class="w-full bg-transparent px-0 py-3 text-base font-semibold text-brand-charcoal transition-all duration-700 outline-none placeholder:text-brand-charcoal/30 focus:border-brand-ruby focus:ring-0 md:text-lg"
                            placeholder="ex. Iunie 2026"
                        />
                        <InputError :message="contactForm.errors.eventDate" />
                    </div>

                    <div class="group space-y-3 md:col-span-2">
                        <InputLabel
                            for="subject"
                            value="Subiect"
                            class="text-xs font-extrabold tracking-[0.2em] text-brand-charcoal uppercase transition-all duration-500 group-focus-within:text-brand-ruby md:text-sm"
                        />
                        <TextInput
                            v-model="contactForm.subject"
                            id="subject"
                            type="text"
                            class="w-full bg-transparent px-0 py-3 text-base font-semibold text-brand-charcoal transition-all duration-700 outline-none placeholder:text-brand-charcoal/30 focus:border-brand-ruby focus:ring-0 md:text-lg"
                            placeholder="Despre ce dorești să ne întrebi?"
                        />
                        <InputError :message="contactForm.errors.subject" />
                    </div>

                    <div class="group space-y-3 md:col-span-2">
                        <InputLabel
                            for="vision"
                            value="Viziune"
                            class="text-xs font-extrabold tracking-[0.2em] text-brand-charcoal uppercase transition-all duration-500 group-focus-within:text-brand-ruby md:text-sm"
                        />
                        <textarea
                            v-model="contactForm.vision"
                            id="vision"
                            rows="3"
                            class="w-full resize-none border-0 border-b-2 border-brand-charcoal/20 bg-transparent px-0 py-3 text-base font-semibold text-brand-charcoal transition-all duration-700 outline-none placeholder:text-brand-charcoal/30 focus:border-brand-ruby focus:ring-0 md:text-lg"
                            placeholder="Povestește-ne despre viziunea ta asupra evenimentului și paleta de culori..."
                        ></textarea>
                        <InputError :message="contactForm.errors.vision" />
                    </div>

                    <div class="group space-y-3 md:col-span-2">
                        <InputLabel
                            for="message"
                            value="Mesaj"
                            class="text-xs font-extrabold tracking-[0.2em] text-brand-charcoal uppercase transition-all duration-500 group-focus-within:text-brand-ruby md:text-sm"
                        />
                        <textarea
                            v-model="contactForm.message"
                            id="message"
                            rows="4"
                            class="w-full resize-none border-0 border-b-2 border-brand-charcoal/20 bg-transparent px-0 py-3 text-base font-semibold text-brand-charcoal transition-all duration-700 outline-none placeholder:text-brand-charcoal/30 focus:border-brand-ruby focus:ring-0 md:text-lg"
                            placeholder="Cum te putem ajuta mai bine?"
                        ></textarea>
                        <InputError :message="contactForm.errors.message" />
                    </div>
                </div>

                <div class="pt-6 text-center">
                    <PrimaryButton
                        type="submit"
                        class="w-full md:w-auto"
                        :disabled="contactForm.processing"
                    >
                        Trimite Solicitarea
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>

<style scoped>
@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-up {
    animation: fade-in-up 1.2s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
}

.delay-300 {
    animation-delay: 0.3s;
}
</style>
