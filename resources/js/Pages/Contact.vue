<script setup>
import { useForm, usePage, Head, Link } from '@inertiajs/vue3';
import { computed, onMounted, onUnmounted } from 'vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const page = usePage();

const user = page.props.auth.user

const contactForm = useForm({
    name: user?.name ?? "",
    email: user?.email ?? "",
    phone: user?.phone ?? "",
    subject: "",
    eventDate: "",
    vision: "",
    message: "",
})

const submitContactForm = () => {
    contactForm.post(route("contact.store"), {
        preserveScroll: true,
        forceFormData: true,
        onSuccess: () => contactForm.reset(),
    })
}

const structuredData = computed(() => {
    return JSON.stringify({
        "@context": "https://schema.org",
        "@type": "ContactPage",
        "mainEntity": {
            "@id": "https://amaryllis-flori.ro/#organization"
        },
        "description": "Contactează Amaryllis Florărie Târgu Mureș pentru comenzi personalizate și inquiry-uri de evenimente.",
        "publisher": {
            "@id": "https://amaryllis-flori.ro/#organization"
        }
    });
});

onMounted(() => {
    const script = document.createElement("script");
    script.type = "application/ld+json";
    script.id = "structured-data";
    script.textContent = structuredData.value;
    document.head.appendChild(script);
});

onUnmounted(() => {
    const existing = document.head.querySelector('script#structured-data');
    if (existing) existing.remove();
});
</script>
<template>
    <Head>
        <title>Contact | Amaryllis Florărie Târgu Mureș</title>
        <meta name="description" content="Contactează-ne pentru comenzi personalizate, evenimente sau întrebări. Suntem aici să aducem frumosul în viața ta prin design floral de excepție în Târgu Mureș.">
        <link rel="canonical" :href="route('contact.create')" />

        <meta property="og:title" content="Contact | Amaryllis Florărie Târgu Mureș" />
        <meta property="og:description" content="Contactează-ne pentru comenzi personalizate sau întrebări la Amaryllis." />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('contact.create')" />
        <meta property="og:image" content="/amaryllis_logo.png" />
    </Head>

    <GuestLayout>
        <div class="max-w-4xl mx-auto space-y-16 md:space-y-24">
            <!-- Header -->
            <div class="text-center space-y-8 animate-fade-in-up">
                <span class="uppercase tracking-[0.8em] text-[10px] text-brand-ruby font-bold block">Get in Touch</span>
                <h1 class="text-4xl md:text-8xl font-serif text-brand-charcoal">The Inquiry</h1>
                <p class="text-sm md:text-base text-brand-charcoal/60 leading-relaxed font-light max-w-2xl mx-auto italic">
                    We'd love to hear about your vision. Whether you're planning a wedding, a private event, or just want to say hello, please fill out the form below and we'll be in touch soon.
                </p>
                <div class="w-16 h-px bg-brand-ruby mx-auto"></div>
            </div>

            <!-- Quick Contact Actions -->
            <div class="flex flex-wrap justify-center gap-4 md:gap-6 animate-fade-in-up delay-150">
                <a 
                    href="https://wa.me/40743331147?text=Salut%20%ai%20%15%20%lei?" 
                    target="_blank"
                    rel="noopener noreferrer"
                    class="group relative inline-flex items-center justify-center overflow-hidden rounded-sm bg-brand-charcoal px-8 md:px-12 py-4 md:py-6 text-[9px] md:text-[11px] font-medium uppercase tracking-[0.4em] text-white transition-all duration-700 hover:shadow-2xl hover:shadow-brand-ruby/20 active:scale-95 w-full sm:w-auto"
                >
                    <div class="absolute inset-0 w-0 bg-brand-ruby transition-all duration-500 ease-out group-hover:w-full"></div>
                    <span class="relative z-10 flex items-center gap-3">
                        <i class="fa-brands fa-whatsapp text-lg"></i>
                        WhatsApp
                    </span>
                    <div class="absolute inset-0 border border-brand-ruby/20 group-hover:border-brand-ruby/40 transition-colors duration-500"></div>
                </a>

                <a 
                    href="mailto:eminoviciidarius@gmail.com"
                    class="group relative inline-flex items-center justify-center overflow-hidden rounded-sm bg-brand-charcoal px-8 md:px-12 py-4 md:py-6 text-[9px] md:text-[11px] font-medium uppercase tracking-[0.4em] text-white transition-all duration-700 hover:shadow-2xl hover:shadow-brand-ruby/20 active:scale-95 w-full sm:w-auto"
                >
                    <div class="absolute inset-0 w-0 bg-brand-ruby transition-all duration-500 ease-out group-hover:w-full"></div>
                    <span class="relative z-10 flex items-center gap-3">
                        <i class="fa-solid fa-envelope text-lg"></i>
                        Email Us
                    </span>
                    <div class="absolute inset-0 border border-brand-ruby/20 group-hover:border-brand-ruby/40 transition-colors duration-500"></div>
                </a>

                <Link 
                    :href="route('delivery')"
                    class="group relative inline-flex items-center justify-center overflow-hidden rounded-sm border border-brand-charcoal/20 px-8 md:px-12 py-4 md:py-6 text-[9px] md:text-[11px] font-medium uppercase tracking-[0.4em] text-brand-charcoal transition-all duration-700 hover:bg-brand-charcoal hover:text-white active:scale-95 w-full sm:w-auto"
                >
                    <span class="relative z-10 flex items-center gap-3">
                        <i class="fa-solid fa-truck-fast text-lg"></i>
                        Delivery Info
                    </span>
                    <div class="absolute inset-0 border border-brand-charcoal/10 group-hover:border-brand-charcoal/30 transition-colors duration-500"></div>
                </Link>
            </div>

            <!-- Form -->
            <form @submit.prevent="submitContactForm" class="space-y-16 animate-fade-in-up delay-300">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-12 bg-white/50 p-8 md:p-12 rounded-sm shadow-sm ring-1 ring-brand-charcoal/5">
                    <div class="space-y-4 group">
                        <InputLabel for="name" value="Name" class="text-[9px] uppercase tracking-[0.5em] text-black group-focus-within:text-brand-ruby transition-all duration-500 font-bold" />
                        <TextInput v-model="contactForm.name" id="name" type="text" class="w-full border-0 border-b-2 border-brand-charcoal/20 focus:border-brand-ruby focus:ring-0 bg-transparent px-0 py-4 text-base font-light text-black placeholder:text-brand-charcoal/10 transition-all duration-700 outline-none" placeholder="Your full name" />
                        <InputError :message="contactForm.errors.name" />
                    </div>

                    <div class="space-y-4 group">
                        <InputLabel for="email" value="Email" class="text-[9px] uppercase tracking-[0.5em] text-black group-focus-within:text-brand-ruby transition-all duration-500 font-bold" />
                        <TextInput v-model="contactForm.email" id="email" type="email" class="w-full border-0 border-b-2 border-brand-charcoal/20 focus:border-brand-ruby focus:ring-0 bg-transparent px-0 py-4 text-base font-light text-black placeholder:text-brand-charcoal/10 transition-all duration-700 outline-none" placeholder="Email address" />
                        <InputError :message="contactForm.errors.email" />
                    </div>

                    <div class="space-y-4 group">
                        <InputLabel for="phone" value="Phone" class="text-[9px] uppercase tracking-[0.5em] text-black group-focus-within:text-brand-ruby transition-all duration-500 font-bold" />
                        <TextInput v-model="contactForm.phone" id="phone" type="tel" class="w-full border-0 border-b-2 border-brand-charcoal/20 focus:border-brand-ruby focus:ring-0 bg-transparent px-0 py-4 text-base font-light text-black placeholder:text-brand-charcoal/10 transition-all duration-700 outline-none" placeholder="Phone number" />
                        <InputError :message="contactForm.errors.phone" />
                    </div>

                    <div class="space-y-4 group">
                        <InputLabel for="eventDate" value="Date" class="text-[9px] uppercase tracking-[0.5em] text-black group-focus-within:text-brand-ruby transition-all duration-500 font-bold" />
                        <TextInput v-model="contactForm.eventDate" id="eventDate" type="text" class="w-full border-0 border-b-2 border-brand-charcoal/20 focus:border-brand-ruby focus:ring-0 bg-transparent px-0 py-4 text-base font-light text-black placeholder:text-brand-charcoal/10 transition-all duration-700 outline-none" placeholder="e.g. June 2026" />
                        <InputError :message="contactForm.errors.eventDate" />
                    </div>

                    <div class="md:col-span-2 space-y-4 group">
                        <InputLabel for="subject" value="Regarding" class="text-[9px] uppercase tracking-[0.5em] text-black group-focus-within:text-brand-ruby transition-all duration-500 font-bold" />
                        <TextInput v-model="contactForm.subject" id="subject" type="text" class="w-full border-0 border-b-2 border-brand-charcoal/20 focus:border-brand-ruby focus:ring-0 bg-transparent px-0 py-4 text-base font-light text-black placeholder:text-brand-charcoal/10 transition-all duration-700 outline-none" placeholder="What are you enquiring about?" />
                        <InputError :message="contactForm.errors.subject" />
                    </div>

                    <div class="md:col-span-2 space-y-4 group">
                        <InputLabel for="vision" value="Vision" class="text-[9px] uppercase tracking-[0.5em] text-black group-focus-within:text-brand-ruby transition-all duration-500 font-bold" />
                        <textarea v-model="contactForm.vision" id="vision" rows="3" class="w-full border-0 border-b-2 border-brand-charcoal/20 focus:border-brand-ruby focus:ring-0 bg-transparent px-0 py-6 text-base font-light text-black placeholder:text-brand-charcoal/10 resize-none transition-all duration-700 outline-none" placeholder="Tell us about your event vision and color palette..."></textarea>
                        <InputError :message="contactForm.errors.vision" />
                    </div>

                    <div class="md:col-span-2 space-y-4 group">
                        <InputLabel for="message" value="Message" class="text-[9px] uppercase tracking-[0.5em] text-black group-focus-within:text-brand-ruby transition-all duration-500 font-bold" />
                        <textarea v-model="contactForm.message" id="message" rows="5" class="w-full border-0 border-b-2 border-brand-charcoal/20 focus:border-brand-ruby focus:ring-0 bg-transparent px-0 py-6 text-base font-light text-black placeholder:text-brand-charcoal/10 resize-none transition-all duration-700 outline-none" placeholder="How can we best help you?"></textarea>
                        <InputError :message="contactForm.errors.message" />
                    </div>
                </div>

                <div class="text-center pt-12">
                    <PrimaryButton 
                        type="submit"
                        class="!px-20 !py-6"
                        :disabled="contactForm.processing"
                    >
                        Send Inquiry
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

.delay-300 { animation-delay: 0.3s; }
</style>
