/** beginning of file **/

// I attach the jquery code to the drupal beaviors to ensure it keeps 
// working even when new content has been added to the page after a 
// JQuery callback
Drupal.behaviors.google_weather_jquery = function () {
	$('#google_weather_location_i').hide();
	$('#google_weather_location_l').show();

	$('#weather_form').submit(function() {
		var google_weather_location_value=$('#google_weather_location_i').val();
		$.ajax({
			type: 'POST',
			url: "google_weather_block_ajax",
			cache: false,
			data: "google_weather_location=" + $('#google_weather_location_i').val(),
			success: function(data){
				$('#google_weather_location_i').hide();
				$('#google_weather_location_l').show();
				$(".google-weather-block").parent().html(data);
				Drupal.attachBehaviors($(".google-weather-block").parent());
				$('#google_weather_location_l').html(google_weather_location_value);
				$('#google_weather_location_i').val(google_weather_location_value);
				$('#google_weather_location_i').hide();
				$('#google_weather_location_l').show();
			}
		});
		return false;
	});
	$('#google_weather_location_l').click(function() {

		$('#google_weather_location_i').show();
		$('#google_weather_location_l').hide();
		$('#google_weather_location_i').focus();

	});
}
~                                                                                                                                                            
~                                                                                                                                                            
"google_weather.js" [in sola lettura][DOS] 38L, 1378C                                                                                      1,1           Tut

