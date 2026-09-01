<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
  stats: Object,
});
</script>

<template>
  <AdminLayout>
    <h1 class="font-display text-2xl mb-6">Dashboard</h1>

    <div class="grid grid-cols-3 gap-4">
      <div class="bg-paper rounded-xl p-6 border border-ink/10">
        <div class="font-mono text-3xl text-river-dark">{{ stats.businesses_active }}</div>
        <div class="font-mono text-[11px] uppercase tracking-wide text-ink/50 mt-2">Negocios activos</div>
      </div>
      <div class="bg-paper rounded-xl p-6 border border-ink/10">
        <div class="font-mono text-3xl" :class="stats.reviews_pending > 0 ? 'text-rock' : 'text-river-dark'">{{ stats.reviews_pending }}</div>
        <div class="font-mono text-[11px] uppercase tracking-wide text-ink/50 mt-2">Reseñas pendientes</div>
      </div>
      <div class="bg-paper rounded-xl p-6 border border-ink/10">
        <div class="font-mono text-3xl" :class="stats.claims_pending > 0 ? 'text-rock' : 'text-river-dark'">{{ stats.claims_pending }}</div>
        <div class="font-mono text-[11px] uppercase tracking-wide text-ink/50 mt-2">Reclamos pendientes</div>
      </div>
    </div>
  </AdminLayout>
</template>
