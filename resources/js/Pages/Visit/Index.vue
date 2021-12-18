<template>
	<app-layout title="Visitas">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">Novo Visitante</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="sm:flex justify-between items-start">
					<div class="flex-1 bg-white shadow-xl sm:rounded-lg">
						<create-visits @form-searched="search" ref="createVisits" />
					</div>
					<div class="sm:mt-0 mt-4 px-4">
						<h3 class="text-xl">Visitas Semelhantes</h3>
						<small class="text-slate-400"
							>Clique nelas para preencher os campos automaticamente e depois em salvar.</small
						>
						<hr class="my-4" />
						<div class="overoverflow-y-auto px-4">
							<button
								class="
									p-2
									text-left
									cursor-pointer
									hover:bg-indigo-700 hover:text-white
									block
									rounded-lg
								"
								v-for="(visit, index) in visits"
								:key="index"
								@click="this.setCurrentVisit(visit)"
							>
								<p><strong>Nome:</strong> {{ visit.name }}</p>
								<p><strong>Documento:</strong> {{ visit.document }}</p>
								<p v-if="visit.vehicle_plate">
									<strong>Placa Veículo:</strong> {{ visit.vehicle_plate }}
								</p>
								<p v-if="visit.destination_apartment">
									<strong>Apartamento Destino:</strong> {{ visit.destination_apartment }}
								</p>
								<p v-if="visit.name"><strong>Última Entrada:</strong> {{ visit.created_at }}</p>
							</button>
							<div v-if="!visits.length">
								<p class="text-xl text-slate-400">Esta é uma primeira visita!!!</p>
								<small class="text-slate-400">Complete os dados e clique em salvar.</small>
							</div>
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
import CreateVisits from './Create.vue';

export default defineComponent({
	props: {
		visits: Array,
	},

	components: {
		AppLayout,
		CreateVisits,
	},

	methods: {
		search(visit) {
			const cleanVisit = Object.fromEntries(Object.entries(visit).filter(([_, v]) => v != null));

			this.$inertia.get(this.route('visits.index'), cleanVisit, { preserveState: true });
		},
		setCurrentVisit(visit) {
			this.$refs.createVisits.setCurrentVisit(visit);
		},
	},
});
</script>
