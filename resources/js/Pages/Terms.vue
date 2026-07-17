<script setup>
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
</script>

<template>
    <Head>
        <title>Termeni și Condiții | Amaryllis Târgu Mureș</title>
        <meta
            name="description"
            content="Termenii și condițiile de utilizare a serviciilor Amaryllis Flori Târgu Mureș."
        />
    </Head>

    <GuestLayout>
        <div
            class="animate-fade-in mx-auto max-w-4xl space-y-16 px-4 py-20 md:px-0"
        >
            <header class="space-y-6 text-center">
                <span
                    class="block text-[10px] font-bold tracking-[0.8em] text-brand-ruby uppercase"
                    >Legal</span
                >
                <h1 class="font-serif text-4xl text-brand-charcoal md:text-6xl">
                    Termeni și Condiții
                </h1>
                <div class="mx-auto h-px w-16 bg-brand-ruby"></div>
            </header>

            <div
                class="prose prose-brand max-w-none space-y-12 leading-relaxed font-light text-brand-charcoal/80"
            >
                <section class="space-y-4">
                    <h2
                        class="border-b border-brand-charcoal/10 pb-2 font-serif text-xl text-brand-charcoal"
                    >
                        1. Introducere
                    </h2>
                    <p>
                        Bun venit pe site-ul Amaryllis (floraria-amaryllis.ro).
                        Prin accesarea și utilizarea acestui site, sunteți de
                        acord să respectați următorii termeni și condiții. Vă
                        rugăm să îi citiți cu atenție înainte de a utiliza
                        serviciile noastre.
                    </p>
                </section>

                <section class="space-y-4">
                    <h2
                        class="border-b border-brand-charcoal/10 pb-2 font-serif text-xl text-brand-charcoal"
                    >
                        2. Produse și Servicii
                    </h2>
                    <p>
                        Amaryllis oferă aranjamente florale, buchete și servicii
                        de design floral personalizat. Deoarece lucrăm cu
                        materiale vii (flori), aspectul final al produselor
                        poate varia ușor în funcție de sezonalitate și
                        disponibilitatea stocului. Ne rezervăm dreptul de a
                        înlocui anumite flori cu alternative de valoare egală
                        sau mai mare, menținând stilul și cromatica aleasă.
                    </p>
                </section>

                <section class="space-y-4">
                    <h2
                        class="border-b border-brand-charcoal/10 pb-2 font-serif text-xl text-brand-charcoal"
                    >
                        3. Comenzi și Plată
                    </h2>
                    <p>
                        Comenzile pot fi plasate direct prin site sau
                        contactându-ne telefonic/prin rețelele sociale. Plata se
                        poate efectua online (dacă este disponibil), prin
                        transfer bancar sau numerar în locația noastră.
                        Comenzile pentru evenimente speciale (nunți, botezuri)
                        necesită o confirmare prealabilă și, de regulă, plata
                        unui avans.
                    </p>
                </section>

                <section class="space-y-4">
                    <h2
                        class="border-b border-brand-charcoal/10 pb-2 font-serif text-xl text-brand-charcoal"
                    >
                        4. Livrare
                    </h2>
                    <p>
                        Livrăm în Târgu Mureș și zonele limitrofe. Detaliile
                        despre costul livrării și intervalele orare sunt
                        stabilite la momentul confirmării comenzii. Nu ne asumăm
                        răspunderea pentru întârzieri cauzate de factori externi
                        (trafic intens, condiții meteo extreme), dar depunem
                        toate eforturile pentru livrarea promptă.
                    </p>
                </section>

                <section class="space-y-4">
                    <h2
                        class="border-b border-brand-charcoal/10 pb-2 font-serif text-xl text-brand-charcoal"
                    >
                        5. Protecția Datelor (GDPR)
                    </h2>
                    <p>
                        Respectăm confidențialitatea datelor dumneavoastră. Prin
                        abonarea la newsletter sau plasarea unei comenzi,
                        colectăm date precum nume, email și număr de telefon
                        exclusiv pentru procesarea solicitării dumneavoastră și
                        comunicarea noutăților (dacă ați optat pentru
                        newsletter). Datele nu sunt transmise către terți în
                        scopuri de marketing.
                    </p>
                </section>

                <section class="space-y-4">
                    <h2
                        class="border-b border-brand-charcoal/10 pb-2 font-serif text-xl text-brand-charcoal"
                    >
                        6. Dreptul de Retur
                    </h2>
                    <p>
                        Conform legislației în vigoare, produsele perisabile
                        (florile tăiate și aranjamentele florale) nu pot fi
                        returnate. În cazul în care sunteți nemulțumit de
                        calitatea produsului primit, vă rugăm să ne contactați
                        în termen de maximum 2 ore de la recepție pentru a găsi
                        o soluție.
                    </p>
                </section>

                <section class="space-y-4">
                    <h2
                        class="border-b border-brand-charcoal/10 pb-2 font-serif text-xl text-brand-charcoal"
                    >
                        7. Modificări
                    </h2>
                    <p>
                        Amaryllis își rezervă dreptul de a actualiza acești
                        termeni și condiții fără o notificare prealabilă.
                        Continuarea utilizării site-ului reprezintă acceptul
                        dumneavoastră față de aceste modificări.
                    </p>
                </section>

                <div class="pt-8 text-center">
                    <Link
                        :href="route('home')"
                        class="text-[10px] font-bold tracking-widest text-brand-ruby uppercase hover:underline"
                    >
                        Înapoi la pagina principală
                    </Link>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<style scoped>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.animate-fade-in {
    animation: fade-in 1s ease-out forwards;
}
</style>
