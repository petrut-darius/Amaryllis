<script setup>
import { useForm, usePage, Head } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const page = usePage();

const user = page.props.auth.user

const newsletterForm = useForm({
    name: user?.name ?? "",
    email: user?.email ?? "",
})

const submitNewsletterForm = () => {
    newsletterForm.post(route("newsletter.store"), {
        preserveScroll: true,
        forceFormData: true,
        onSuccess: () => newsletterForm.reset(),
    })
}
</script>

<template>
    <Head title="Newsletter" />

    <GuestLayout>
        <div class="max-w-4xl mx-auto space-y-24 md:space-y-40">
            <!-- Header -->
            <div class="text-center space-y-8 animate-fade-in-up">
                <span class="uppercase tracking-[0.8em] text-[10px] text-brand-ruby font-bold block">Stay Updated</span>
                <h1 class="text-4xl md:text-8xl font-serif text-brand-charcoal">The Newsletter</h1>
                <p class="text-sm md:text-base text-brand-charcoal/60 leading-relaxed font-light max-w-2xl mx-auto italic">
                    Join our floral community. Be the first to receive updates on seasonal collections, exclusive workshops, and botanical inspiration delivered straight to your inbox.
                </p>
                <div class="w-16 h-px bg-brand-ruby mx-auto"></div>
            </div>

            <!-- Form -->
            <form @submit.prevent="submitNewsletterForm" class="space-y-24 animate-fade-in-up delay-300">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-16 bg-white/50 p-8 md:p-16 rounded-sm shadow-sm ring-1 ring-brand-charcoal/5">
                    <div class="space-y-4 group">
                        <InputLabel for="name" value="Name" class="text-[9px] uppercase tracking-[0.5em] text-brand-charcoal/40 group-focus-within:text-brand-ruby transition-all duration-500 font-bold" />
                        <TextInput v-model="newsletterForm.name" id="name" type="text" class="w-full border-0 border-b-2 border-brand-charcoal/20 focus:border-brand-ruby focus:ring-0 bg-transparent px-0 py-4 text-base font-light placeholder:text-brand-charcoal/10 transition-all duration-700 outline-none" placeholder="Your full name" />
                        <InputError :message="newsletterForm.errors.name" />
                    </div>

                    <div class="space-y-4 group">
                        <InputLabel for="email" value="Email" class="text-[9px] uppercase tracking-[0.5em] text-brand-charcoal/40 group-focus-within:text-brand-ruby transition-all duration-500 font-bold" />
                        <TextInput v-model="newsletterForm.email" id="email" type="email" class="w-full border-0 border-b-2 border-brand-charcoal/20 focus:border-brand-ruby focus:ring-0 bg-transparent px-0 py-4 text-base font-light placeholder:text-brand-charcoal/10 transition-all duration-700 outline-none" placeholder="Email address" />
                        <InputError :message="newsletterForm.errors.email" />
                    </div>
                </div>

                <div class="text-center pt-16">
                    <PrimaryButton 
                        type="submit"
                        class="!px-20 !py-6"
                        :disabled="newsletterForm.processing"
                    >
                        Subscribe
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
