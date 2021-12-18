<template>
	<app-layout title="Visitas">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">Novo Visitante</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="flex justify-between items-start">
					<div class="flex-1 bg-white shadow-xl sm:rounded-lg">
						<create-visits @form-searched="search" :current-visit="currentVisit" />
					</div>
					<div class="overoverflow-y-auto px-4">
						<a
							href="javascript:void(0)"
							class="p-2 cursor-pointer hover:bg-indigo-700 hover:text-white block sm:rounded-lg"
							v-for="(visit, index) in visits"
							:key="index"
							@click="currentVisit = visit"
						>
							<p><strong>Nome:</strong> {{ visit.name }}</p>
							<p><strong>Documento:</strong> {{ visit.document }}</p>
							<p><strong>Placa Veículo:</strong> {{ visit.vehicle_plate }}</p>
							<p><strong>Apartamento Destino:</strong> {{ visit.destination_apartment }}</p>
							<p><strong>Última Entrada:</strong> {{ visit.created_at }}</p>
						</a>
					</div>
				</div>
			</div>
		</div>
	</app-layout>
</template>

<script>
import { defineComponent } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import CreateVisits from './Create.vue';

export default defineComponent({
	props: {
		visits: Array,
	},

	data() {
		return {
			currentVisit: null,
		};
	},

	components: {
		AppLayout,
		CreateVisits,
	},

	methods: {
		search(visit) {
			this.$inertia.get(this.route('visits.index'), visit, { preserveState: true });
		},
	},
});
</script>
