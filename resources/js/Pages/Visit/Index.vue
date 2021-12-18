<template>
	<app-layout title="Lista de Visitas">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">Lista de Visitas</h2>
		</template>

		<div class="max-w-7xl mx-auto sm:py-12 sm:px-6 lg:px-8 overflow-x-auto">
			<table class="m-4 w-full">
				<thead>
					<tr class="text-left">
						<th>Nome</th>
						<th>Documento</th>
						<th>Placa Veículo</th>
						<th>Apartamento Destino</th>
						<th>Última Entrada</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(visit, index) in visits" :key="index">
						<td>{{ visit.name }}</td>
						<td>{{ visit.document }}</td>
						<td>
							{{ visit.vehicle_plate }}
						</td>
						<td>
							{{ visit.destination_apartment }}
						</td>
						<td>{{ visit.created_at_for_humans }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</app-layout>
</template>
<script>
import { defineComponent } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import shared from '../../shared';

export default defineComponent({
	props: {
		visits: Array,
	},
	components: {
		AppLayout,
	},
	methods: {
		search(visit) {
			const cleanVisit = shared.removeObjectsNull(visit);
			this.$inertia.get(this.route('visits.index'), cleanVisit, { preserveState: true });
		},
	},
});
</script>
