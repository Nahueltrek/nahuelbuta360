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

function selectCategoryAndScroll(slug) {
  toggleCategory(slug);
  document.getElementById('negocios')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
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

const categoryIcon = {
  alojamiento: '🏡',
  gastronomia: '🍽️',
  trekking: '🥾',
  camping: '⛺',
  'turismo-aventura': '🧗',
  transporte: '🚌',
  cultura: '🏛️',
  comercio: '🛍️',
};
</script>

<template>
  <div class="min-h-screen bg-glacier text-ink font-body antialiased overflow-x-hidden">
    <!-- Hero full-bleed -->
    <section class="relative min-h-[560px] h-[85vh] max-h-[720px] overflow-hidden bg-gradient-to-b from-ink via-river-dark to-river text-paper">
      <!-- Patrón decorativo de araucarias, sin depender de fotos que no tenemos -->
      <svg class="absolute inset-0 h-full w-full opacity-[0.12]" preserveAspectRatio="xMidYMid slice" viewBox="0 0 400 400">
        <g fill="currentColor">
          <path d="M40 220 L50 180 L60 220 L55 220 L55 260 L45 260 L45 220 Z" />
          <path d="M120 260 L134 200 L148 260 L140 260 L140 320 L128 320 L128 260 Z" />
          <path d="M220 200 L234 130 L248 200 L240 200 L240 300 L228 300 L228 200 Z" />
          <path d="M320 240 L332 190 L344 240 L338 240 L338 300 L326 300 L326 240 Z" />
        </g>
      </svg>
      <div class="absolute inset-0 bg-gradient-to-t from-ink/70 via-transparent to-transparent"></div>

      <header class="relative z-10 px-6 md:px-10 py-5 flex items-baseline justify-between max-w-6xl mx-auto">
        <span class="font-display text-lg tracking-tight animate-fade-in">Ruta 360</span>
        <div class="flex items-baseline gap-5">
          <Link href="/blog" class="font-mono text-[11px] uppercase tracking-[0.15em] text-paper/70 hover:text-paper transition-colors animate-fade-in">
            Blog
          </Link>
          <span class="font-mono text-[11px] uppercase tracking-[0.15em] text-paper/50 animate-fade-in">Piloto — {{ destination.name }}</span>
        </div>
      </header>

      <div class="relative z-10 px-6 md:px-10 max-w-6xl mx-auto flex h-[calc(100%-76px)] flex-col justify-center">
        <p class="font-mono text-xs tracking-[0.2em] uppercase text-paper/70 mb-5 animate-fade-in-up" style="animation-delay: .05s">
          Ruta 360 Chile · Región de La Araucanía
        </p>
        <h1 class="font-display font-medium text-[2.5rem] leading-[1.05] md:text-6xl md:leading-[1.02] max-w-2xl text-balance animate-fade-in-up" style="animation-delay: .15s">
          {{ destination.name }}, en la puerta del Parque Nahuelbuta
        </h1>
        <p class="mt-6 text-base md:text-lg text-paper/80 max-w-lg animate-fade-in-up" style="animation-delay: .25s">
          {{ destination.description }}
        </p>

        <!-- Franja tipo letrero de sendero -->
        <div class="mt-10 border-y border-paper/20 py-5 flex flex-wrap gap-x-10 gap-y-4 font-mono animate-fade-in-up" style="animation-delay: .35s">
          <div>
            <div class="text-2xl md:text-3xl font-medium text-paper leading-none">131</div>
            <div class="text-[11px] uppercase tracking-wide text-paper/60 mt-1.5">km desde Temuco</div>
          </div>
          <div>
            <div class="text-2xl md:text-3xl font-medium text-paper leading-none">34–42</div>
            <div class="text-[11px] uppercase tracking-wide text-paper/60 mt-1.5">km al Parque Nahuelbuta</div>
          </div>
          <div>
            <div class="text-2xl md:text-3xl font-medium text-paper leading-none">1.560</div>
            <div class="text-[11px] uppercase tracking-wide text-paper/60 mt-1.5">msnm cumbre más alta</div>
          </div>
        </div>

        <a
          href="#mapa"
          class="mt-8 inline-flex w-fit items-center gap-2 rounded-full bg-paper text-ink px-6 py-3.5 text-sm font-medium
                 shadow-xl shadow-ink/20 transition-transform duration-300 hover:scale-105 animate-fade-in-up"
          style="animation-delay: .45s"
        >
          Ver el mapa <span aria-hidden="true">↓</span>
        </a>
      </div>

      <!-- Silueta de montaña, transición hacia el fondo de la página -->
      <svg class="absolute bottom-0 left-0 w-full h-14 z-10 text-glacier" viewBox="0 0 400 60" preserveAspectRatio="none">
        <path d="M0,60 L0,35 L45,12 L80,32 L130,4 L175,30 L220,10 L265,34 L310,15 L360,32 L400,20 L400,60 Z" fill="currentColor" />
      </svg>
    </section>

    <!-- Explorá por categoría -->
    <section v-if="categories.length" class="px-6 md:px-10 max-w-6xl mx-auto pt-8 pb-4">
      <h2 class="font-display text-xl md:text-2xl mb-5">Explorá por categoría</h2>
      <div class="grid grid-cols-4 md:grid-cols-8 gap-3">
        <button
          v-for="(cat, i) in categories"
          :key="cat.slug"
          @click="selectCategoryAndScroll(cat.slug)"
          class="group flex flex-col items-center gap-2 rounded-2xl bg-paper border border-ink/10 py-4 transition-all
                 duration-300 hover:border-river/40 hover:-translate-y-1 active:scale-95 animate-fade-in-up"
          :style="{ animationDelay: (0.05 * i) + 's' }"
        >
          <span class="text-2xl transition-transform duration-300 group-hover:scale-125">{{ categoryIcon[cat.slug] ?? '📍' }}</span>
          <span class="text-[10px] font-mono uppercase tracking-wide text-ink/70 text-center leading-tight px-1">{{ cat.name }}</span>
        </button>
      </div>
    </section>

    <!-- Mapa: negocios (turquesa) y atractivos (óxido) con sus coordenadas reales -->
    <section id="mapa" class="px-6 md:px-10 max-w-6xl mx-auto py-6 scroll-mt-4">
      <MapView :businesses="businesses" :attractions="attractions" />
    </section>

    <!-- Negocios: filtrables por categoría -->
    <section id="negocios" class="px-6 md:px-10 max-w-6xl mx-auto py-8 md:py-10 scroll-mt-4">
      <div class="flex items-baseline justify-between mb-5">
        <h2 class="font-display text-xl md:text-2xl">Dónde ir</h2>
        <span class="font-mono text-[11px] text-ink/45">{{ filteredBusinesses.length }} de {{ businesses.length }}</span>
      </div>

      <div class="flex gap-2 overflow-x-auto no-scrollbar pb-1 -mx-6 px-6 md:mx-0 md:px-0 md:flex-wrap">
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
          v-for="(b, i) in filteredBusinesses"
          :key="b.id"
          :href="`/emprendimientos/${b.slug}`"
          class="group bg-paper rounded-xl p-5 border border-ink/10 block transition-all duration-300 hover:border-river/40 hover:-translate-y-1 animate-fade-in-up"
          :style="{ animationDelay: (0.03 * i) + 's' }"
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
          v-for="(a, i) in attractions"
          :key="a.id"
          :href="`/atractivos/${a.slug}`"
          class="rounded-xl p-5 border border-rock/25 bg-rock/[0.04] block transition-all duration-300 hover:border-rock/50 hover:-translate-y-1 animate-fade-in-up"
          :style="{ animationDelay: (0.03 * i) + 's' }"
        >
          <span class="font-mono text-[10px] uppercase tracking-wide text-rock">{{ a.category ?? 'Atractivo' }}</span>
          <h3 class="font-display text-lg mt-1.5 leading-snug">{{ a.name }}</h3>
          <p v-if="a.description" class="text-sm text-ink/65 mt-2 leading-relaxed line-clamp-3">{{ a.description }}</p>
        </Link>
      </div>
    </section>

    <!-- Rutas de trekking: carrusel horizontal -->
    <section v-if="routes.length" class="py-8 md:py-10 border-t border-ink/10">
      <h2 class="font-display text-xl md:text-2xl mb-5 px-6 md:px-10 max-w-6xl mx-auto">Rutas de trekking</h2>
      <div class="flex gap-4 overflow-x-auto no-scrollbar px-6 md:px-10 pb-2">
        <Link
          v-for="(r, i) in routes"
          :key="r.id"
          :href="`/rutas/${r.slug}`"
          class="group shrink-0 w-72 rounded-xl p-5 border border-ink/10 bg-paper block transition-all duration-300 hover:border-river/40 hover:-translate-y-1 animate-fade-in-up"
          :style="{ animationDelay: (0.05 * i) + 's' }"
        >
          <h3 class="font-display text-lg leading-snug">{{ r.name }}</h3>
          <p v-if="r.description" class="text-sm text-ink/65 mt-2 leading-relaxed line-clamp-3">{{ r.description }}</p>
          <div class="flex gap-5 mt-4 font-mono text-xs text-ink/55">
            <span v-if="r.distance_km">{{ r.distance_km }} km</span>
            <span v-if="r.duration_minutes">{{ Math.round(r.duration_minutes / 60) }} h aprox.</span>
            <span v-if="r.difficulty">{{ difficultyLabel[r.difficulty] ?? r.difficulty }}</span>
          </div>
        </Link>
      </div>
    </section>

    <!-- CTA emprendedores -->
    <section class="px-6 md:px-10 max-w-6xl mx-auto py-10 border-t border-ink/10">
      <div class="relative rounded-3xl overflow-hidden bg-gradient-to-br from-river-dark via-ink to-ink p-8 md:p-10 text-center">
        <div class="absolute -left-8 -top-8 h-32 w-32 rounded-full bg-river/20 blur-2xl"></div>
        <div class="absolute -right-10 -bottom-10 h-40 w-40 rounded-full bg-rock/10 blur-2xl"></div>
        <p class="relative z-10 font-display text-lg md:text-xl text-paper">¿Tenés un negocio en Nahuelbuta?</p>
        <p class="relative z-10 text-sm text-paper/70 mt-2 max-w-md mx-auto">
          Sumate al catastro y gestioná tu ficha desde el panel de emprendedores.
        </p>
        <Link
          href="/login"
          class="relative z-10 inline-block mt-6 text-sm font-medium rounded-full bg-paper text-ink px-6 py-3
                 transition-transform duration-300 hover:scale-105 shadow-lg"
        >
          Quiero sumarme
        </Link>
      </div>
    </section>

    <footer class="px-6 md:px-10 max-w-6xl mx-auto py-10 mt-4 border-t border-ink/10 font-mono text-[11px] text-ink/40">
      Ruta {{ destination.name }} — piloto de Ruta 360 Chile.
    </footer>
  </div>
</template>

<style scoped>
.no-scrollbar::-webkit-scrollbar { display: none; }
.no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

@keyframes fade-in {
  from { opacity: 0; }
  to { opacity: 1; }
}
@keyframes fade-in-up {
  from { opacity: 0; transform: translateY(16px); }
  to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
  animation: fade-in 0.6s ease-out both;
}
.animate-fade-in-up {
  animation: fade-in-up 0.6s ease-out both;
}
</style>
