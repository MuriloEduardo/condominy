<template>
	<div class="bg-white shadow-xl sm:rounded-lg">
		<table class="w-full">
			<thead>
				<tr class="text-left whitespace-nowrap">
					<th class="p-2">Nome</th>
					<th class="p-2">Documento</th>
					<th class="p-2">Placa Veículo</th>
					<th class="p-2">Apartamento Destino</th>
					<th class="p-2">Última Entrada</th>
				</tr>
			</thead>
			<tbody>
				<tr
					v-for="(visit, index) in visits"
					:key="index"
					:set="(visitingTimeRunning = visitingTime(visit))"
					:class="{
						'bg-red-500': visitingTimeRunning > 15,
						'bg-yellow-500': visitingTimeRunning > 10 && visitingTimeRunning < 15,
					}"
				>
					<td class="py-4 px-2">{{ visit.name }}</td>
					<td class="py-4 px-2">{{ visit.document }}</td>
					<td class="py-4 px-2">
						{{ visit.vehicle_plate }}
					</td>
					<td class="py-4 px-2">
						{{ visit.destination_apartment }}
					</td>
					<td class="py-4 px-2">{{ visit.created_at_for_humans }}</td>
					<td class="py-4 px-2 text-right">
						<button
							class="
								px-4
								py-2
								bg-gray-800
								border border-transparent
								rounded-md
								font-semibold
								text-xs text-white
								uppercase
								tracking-widest
								hover:bg-gray-700
								active:bg-gray-900
								focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300
								disabled:opacity-25
								transition
							"
							@click.once="submitCloseVisit(visit)"
						>
							Saiu
						</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>
<script>
import { defineComponent } from 'vue';
import shared from '../../shared';
import moment from 'moment';

export default defineComponent({
	data() {
		return {
			interval: null,
			time: null,
		};
	},
	props: {
		visits: Array,
	},
	methods: {
		search(visit) {
			const cleanVisit = shared.removeObjectsNull(visit);
			this.$inertia.get(this.route('visits.index'), cleanVisit, { preserveState: true });
		},
		submitCloseVisit(visit) {
			return this.$inertia.delete(this.route('visits.destroy', visit));
		},
	},
	computed: {
		visitingTime() {
			return (visit) =>
				moment.duration(moment(this.time).diff(new Date(visit.created_at))).asMinutes();
		},
	},
	beforeDestroy() {
		clearInterval(this.interval);
	},
	created() {
		this.interval = setInterval(() => {
			this.time = new Date();
		}, 1000);
	},
});
</script>
