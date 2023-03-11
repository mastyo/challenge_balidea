(function ($, Drupal) {
  var button_body;
  Drupal.behaviors.challengeBalidea = {
	attach: function attach(context, settings) {
	  if (!button_body) {
		button_body = $('<button>' + Drupal.t('Alert Button') + '</button>').click(function () {
		  alert(settings.systemSite.siteName);
		});
		$("body").append(button_body);
	  }
	}
  };
})(jQuery, Drupal);