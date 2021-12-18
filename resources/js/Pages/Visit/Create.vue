<template>
	<div class="p-6">
		<jet-validation-errors class="mb-4" />

		<div v-if="status" class="mb-4 font-medium text-sm text-green-600">
			{{ status }}
		</div>

		<form @submit.prevent="submit">
			<div class="flex">
				<div class="flex-1 p-4">
					<jet-label for="name" value="Nome Visitante" />
					<jet-input
						id="name"
						type="text"
						class="mt-1 block w-full"
						v-model="form.name"
						:value="currentVisit?.name"
						@keyup="search"
						required
						autofocus
					/>
				</div>
				<div class="flex-1 p-4">
					<jet-label for="document" value="Documento" />
					<jet-input
						id="document"
						type="text"
						class="mt-1 block w-full"
						v-model="form.document"
						:value="currentVisit?.document"
						@keyup="search"
						required
					/>
				</div>
			</div>
			<div class="flex">
				<div class="flex-1 p-4">
					<jet-label for="vehicle_plate" value="Placa Veiculo" />
					<jet-input
						id="vehicle_plate"
						type="text"
						class="mt-1 block w-full"
						v-model="form.vehicle_plate"
						:value="currentVisit?.vehicle_plate"
						required
					/>
				</div>
				<div class="flex-1 p-4">
					<jet-label for="destination_apartment" value="Apartamento Destino" />
					<jet-input
						id="destination_apartment"
						type="text"
						class="mt-1 block w-full"
						v-model="form.destination_apartment"
						:value="currentVisit?.destination_apartment"
						required
					/>
				</div>
			</div>
			<br />
			<div class="flex justify-end">
				<jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
					Salvar
				</jet-button>
			</div>
		</form>
	</div>
</template>

<script>
import { defineComponent } from 'vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';

export default defineComponent({
	data() {
		return {
			form: this.$inertia.form({
				name: null,
				document: null,
				vehicle_plate: null,
				destination_apartment: null,
			}),
		};
	},

	components: {
		JetButton,
		JetInput,
		JetLabel,
		JetValidationErrors,
	},

	props: {
		status: String,
		currentVisit: Object,
	},

	methods: {
		submit() {
			this.form.post(this.route('visits.store'), {
				onFinish: () => this.form.reset(),
			});
		},
		search() {
			this.$emit('form-searched', {
				name: this.form.name,
				document: this.form.document,
				vehicle_plate: this.form.vehicle_plate,
				destination_apartment: this.form.destination_apartment,
			});
		},
	},
});
</script>
