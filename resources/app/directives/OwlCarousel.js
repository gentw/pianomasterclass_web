export default {
    bind: function (el) {
		 $(el).owlCarousel({
		 	items: 1,
		 	loop: true,
		 	autoplay: true,
		 	autoplayTimeout: 4000
		 });
    }
}