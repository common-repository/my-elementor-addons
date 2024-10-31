; (function ($) {
	$(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction('frontend/element_ready/widget', function ($scope) {
			$scope.find("#myImageCompare").imagesCompare();
		});
	});
})(jQuery);
