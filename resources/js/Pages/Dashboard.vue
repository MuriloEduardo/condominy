<template>
	<app-layout title="Dashboard">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto px-6 lg:px-8">
				<div
					v-if="$page.props.jetstream.flash.message"
					class="mb-4 font-medium text-sm text-green-600"
				>
					{{ $page.props.jetstream.flash.message }}
				</div>
				<div class="flex justify-between">
					<div class="mb-4 block">
						<div class="bg-white p-4 shadow-xl rounded-lg inline-block">
							<p class="text-4xl">{{ visitsCount }}</p>
							<p class="text-slate-400">Visitas Hoje</p>
						</div>
					</div>
					<a
						class="
							inline-flex
							items-center
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
						:href="route('visits.create')"
						>Nova Visita</a
					>
				</div>
				<br />
				<ListVisits :visits="visits" />
			</div>
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
		visitsCount: Number,
		message: String,
	},
	components: {
		AppLayout,
		ListVisits,
	},
});
</script>
