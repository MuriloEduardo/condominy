<template>
	<app-layout title="Cadastros de Visitas">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">Cadastros de Novas Visitas</h2>
		</template>

		<div class="max-w-7xl mx-auto sm:py-12 sm:px-6 lg:px-8">
			<div class="sm:flex justify-between items-start">
				<div class="flex-1 bg-white shadow-xl sm:rounded-lg">
					<create-form @form-searched="search" ref="createFormVisits" />
				</div>
				<div class="overflow-y-scroll h-screen sm:mt-0 mt-4 px-4">
					<div class="sticky top-0 bg-white p-4 mb-4 rounded-lg">
						<h3 class="text-xl">{{ visits.length }} Outras Visitas</h3>
					</div>
					<div class="px-4">
						<button
							class="
								p-2
								w-full
								text-left
								cursor-pointer
								hover:bg-indigo-700 hover:text-white
								block
								rounded-lg
							"
							:class="{ 'text-white bg-indigo-700': visit.id === currentVisit.id }"
							v-for="(visit, index) in visits"
							:key="index"
							@click="this.setCurrentVisit(visit)"
						>
							<p><strong>Nome:</strong> {{ visit.name }}</p>
							<p><strong>Documento:</strong> {{ visit.document }}</p>
							<p v-if="visit.vehicle_plate">
								<strong>Placa Veículo:</strong> {{ visit.vehicle_plate }}
							</p>
							<p><strong>Apartamento Destino:</strong> {{ visit.destination_apartment }}</p>
							<p><strong>Última Entrada:</strong> {{ visit.created_at_for_humans }}</p>
						</button>
						<div v-if="!visits.length">
							<p class="text-xl text-slate-400">Esta é uma primeira visita!!!</p>
							<small class="text-slate-400">Complete os dados e clique em salvar.</small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</app-layout>
</template>

<script>
import { defineComponent } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import CreateForm from './CreateForm.vue';
import shared from '../../shared';

export default defineComponent({
	props: {
		visits: Array,
	},
	data() {
		return {
			currentVisit: {},
		};
	},
	components: {
		AppLayout,
		CreateForm,
	},
	methods: {
		search(visit) {
			const cleanVisit = shared.removeObjectsNull(visit);
			this.$inertia.get(this.route('visits.create'), cleanVisit, { preserveState: true });
		},
		setCurrentVisit(visit) {
			this.currentVisit = visit;
			this.$refs.createFormVisits.setCurrentVisit(visit);
		},
	},
});
</script>
