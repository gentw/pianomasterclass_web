export default {
	inserted: function (el, binding) {
		var sortable = new Sortable(el, binding.value || {});
	}
}