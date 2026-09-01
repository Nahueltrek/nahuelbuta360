<script setup>
import { ref, computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import MapView from '@/Components/MapView.vue';

const props = defineProps({
  destination: Object,
  categories: Array,
  businesses: Array,
  attractions: Array,
  routes: Array,
});

const activeCategory = ref(null);

function toggleCategory(slug) {
  activeCategory.value = activeCategory.value === slug ? null : slug;
}

const filteredBusinesses = computed(() => {
  if (!activeCategory.value) return props.businesses;
  return props.businesses.filter((b) => b.category_slug === activeCategory.value);
});

const difficultyLabel = {
  facil: 'Fácil',
  media: 'Media',
  dificil: 'Difícil',
};
</script>

<template>
  <div class="min-h-screen bg-glacier text-ink font-body antialiased">
    <!-- Header -->
    <header class="px-6 md:px-10 py-5 flex items-baseline justify-between max-w-6xl mx-auto">
      <span class="font-display text-lg tracking-tight">Ruta 360</span>
      <div class="flex items-baseline gap-5">
        <Link href="/blog" class="font-mono text-[11px] uppercase tracking-[0.15em] text-ink/60 hover:text-river-dark transition-colors">
          Blog
        </Link>
        <span class="font-mono text-[11px] uppercase tracking-[0.15em] text-ink/50">Piloto — {{ destination.name }}</span>
      </div>
    </header>

    <!-- Hero -->
    <section class="px-6 md:px-10 pt-8 pb-10 md:pt-16 md:pb-14 max-w-6xl mx-auto">
      <p class="font-mono text-xs tracking-[0.2em] uppercase text-river-dark mb-5">
        Ruta 360 Chile · Región Metropolitana
      </p>
      <h1 class="font-display font-medium text-[2.5rem] leading-[1.05] md:text-6xl md:leading-[1.02] max-w-2xl text-balance">
        {{ destination.name }}, a 45 minutos de Santiago
      </h1>
      <p class="mt-6 text-base md:text-lg text-ink/70 max-w-lg">
        {{ destination.description }}
      </p>

      <!-- Franja tipo letrero de sendero -->
      <div class="mt-10 md:mt-12 border-y border-ink/15 py-5 flex flex-wrap gap-x-10 gap-y-4 font-mono">
        <div>
          <div class="text-2xl md:text-3xl font-medium text-river-dark leading-none">45</div>
          <div class="text-[11px] uppercase tracking-wide text-ink/55 mt-1.5">min desde Santiago</div>
        </div>
        <div>
          <div class="text-2xl md:text-3xl font-medium text-river-dark leading-none">93</div>
          <div class="text-[11px] uppercase tracking-wide text-ink/55 mt-1.5">km hasta El Morado</div>
        </div>
        <div>
          <div class="text-2xl md:text-3xl font-medium text-river-dark leading-none">1.100–3.500</div>
          <div class="text-[11px] uppercase tracking-wide text-ink/55 mt-1.5">msnm del recorrido</div>
        </div>
      </div>
    </section>

    <!-- Mapa: negocios (turquesa) y atractivos (óxido) con sus coordenadas reales -->
    <section class="px-6 md:px-10 max-w-6xl mx-auto pb-4">
      <MapView :businesses="businesses" :attractions="attractions" />
    </section>

    <!-- Negocios: filtrables por categoría -->
    <section class="px-6 md:px-10 max-w-6xl mx-auto py-8 md:py-10">
      <div class="flex items-baseline justify-between mb-5">
        <h2 class="font-display text-xl md:text-2xl">Dónde ir</h2>
        <span class="font-mono text-[11px] text-ink/45">{{ filteredBusinesses.length }} de {{ businesses.length }}</span>
      </div>

      <div class="flex gap-2 overflow-x-auto pb-1 -mx-6 px-6 md:mx-0 md:px-0 md:flex-wrap">
        <button
          v-for="cat in categories"
          :key="cat.slug"
          @click="toggleCategory(cat.slug)"
          class="shrink-0 font-mono text-xs uppercase tracking-wide px-3.5 py-2 rounded-full border transition-colors"
          :class="activeCategory === cat.slug
            ? 'bg-river text-paper border-river'
            : 'bg-paper text-ink/70 border-ink/15 hover:border-ink/30'"
        >
          {{ cat.name }}
        </button>
      </div>

      <div v-if="filteredBusinesses.length" class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 mt-6">
        <Link
          v-for="b in filteredBusinesses"
          :key="b.id"
          :href="`/emprendimientos/${b.slug}`"
          class="bg-paper rounded-xl p-5 border border-ink/10 block hover:border-river/40 transition-colors"
        >
          <span class="font-mono text-[10px] uppercase tracking-wide text-scrub">{{ b.category ?? 'Sin categoría' }}</span>
          <h3 class="font-display text-lg mt-1.5 leading-snug">{{ b.name }}</h3>
          <p v-if="b.description" class="text-sm text-ink/65 mt-2 leading-relaxed line-clamp-3">{{ b.description }}</p>
          <p v-if="b.address" class="font-mono text-[11px] text-ink/45 mt-3">{{ b.address }}</p>
        </Link>
      </div>
      <p v-else class="font-mono text-sm text-ink/50 mt-6">
        Todavía no hay negocios cargados en esta categoría.
      </p>
    </section>

    <!-- Atractivos: no comparten taxonomía con negocios, sección aparte -->
    <section v-if="attractions.length" class="px-6 md:px-10 max-w-6xl mx-auto py-8 md:py-10 border-t border-ink/10">
      <h2 class="font-display text-xl md:text-2xl mb-5">Atractivos naturales</h2>
      <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <Link
          v-for="a in attractions"
          :key="a.id"
          :href="`/atractivos/${a.slug}`"
          class="rounded-xl p-5 border border-rock/25 bg-rock/[0.04] block hover:border-rock/50 transition-colors"
        >
          <span class="font-mono text-[10px] uppercase tracking-wide text-rock">{{ a.category ?? 'Atractivo' }}</span>
          <h3 class="font-display text-lg mt-1.5 leading-snug">{{ a.name }}</h3>
          <p v-if="a.description" class="text-sm text-ink/65 mt-2 leading-relaxed line-clamp-3">{{ a.description }}</p>
        </Link>
      </div>
    </section>

    <!-- Rutas de trekking -->
    <section v-if="routes.length" class="px-6 md:px-10 max-w-6xl mx-auto py-8 md:py-10 border-t border-ink/10">
      <h2 class="font-display text-xl md:text-2xl mb-5">Rutas de trekking</h2>
      <div class="grid gap-4 sm:grid-cols-2">
        <Link
          v-for="r in routes"
          :key="r.id"
          :href="`/rutas/${r.slug}`"
          class="rounded-xl p-5 border border-ink/10 bg-paper block hover:border-river/40 transition-colors"
        >
          <h3 class="font-display text-lg leading-snug">{{ r.name }}</h3>
          <p v-if="r.description" class="text-sm text-ink/65 mt-2 leading-relaxed">{{ r.description }}</p>
          <div class="flex gap-5 mt-4 font-mono text-xs text-ink/55">
            <span v-if="r.distance_km">{{ r.distance_km }} km</span>
            <span v-if="r.duration_minutes">{{ Math.round(r.duration_minutes / 60) }} h aprox.</span>
            <span v-if="r.difficulty">{{ difficultyLabel[r.difficulty] ?? r.difficulty }}</span>
          </div>
        </Link>
      </div>
    </section>

    <footer class="px-6 md:px-10 max-w-6xl mx-auto py-10 mt-4 border-t border-ink/10 font-mono text-[11px] text-ink/40">
      Ruta {{ destination.name }} 360 — piloto de Ruta 360 Chile.
    </footer>
  </div>
</template>
