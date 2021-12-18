<template>
	<app-layout title="Dashboard">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto px-6 lg:px-8">
				<div class="bg-white p-4 shadow-xl rounded-lg inline-block">
					<p class="text-4xl">{{ visits }}</p>
					<p class="text-slate-400">Número de Visitas Hoje</p>
				</div>
			</div>
		</div>
	</app-layout>
</template>

<script>
import { defineComponent } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';

export default defineComponent({
	props: {
		visits: Number,
	},
	components: {
		AppLayout,
	},
});
</script>
