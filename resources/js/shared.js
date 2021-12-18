export default {
	removeObjectsNull: function (visit) {
		return Object.fromEntries(Object.entries(visit).filter(([_, v]) => v != null));
	},
};
