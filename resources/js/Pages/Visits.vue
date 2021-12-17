<template>
	<form>
		<div class="d-flex">
			<label for="name">Nome</label>
			<input type="text" id="name" name="name" />
		</div>
		<div>
			<label for="document">Documento</label>
			<input type="text" id="document" name="document" />
		</div>
		<div>
			<label for="vehicle_plate">Placa Veiculo</label>
			<input type="text" id="vehicle_plate" name="vehicle_plate" />
		</div>
		<div>
			<label for="destination_apartment">Apartamento Destino</label>
			<input type="text" id="destination_apartment" name="destination_apartment" />
		</div>
		<br />
		<button type="submit">Salvar</button>
	</form>
</template>

<style scoped></style>

<script>
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
	components: {
		Link,
	},

	props: {
		canLogin: Boolean,
		canRegister: Boolean,
		laravelVersion: String,
		phpVersion: String,
	},
});
</script>
