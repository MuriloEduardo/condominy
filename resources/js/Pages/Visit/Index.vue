<template>
	<app-layout title="Lista de Visitas">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">Lista de Visitas</h2>
		</template>

		<div class="max-w-7xl mx-auto sm:py-12 sm:px-6 lg:px-8 overflow-x-auto">
			<ListVisits :visits="visits" />
		</div>
	</app-layout>
</template>
<script>
import { defineComponent } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import ListVisits from '@/Components/Visit/ListVisits.vue';

export default defineComponent({
	props: {
		visits: Array,
	},
	components: {
		AppLayout,
		ListVisits,
	},
});
</script>
