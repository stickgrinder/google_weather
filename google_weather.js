/** beginning of file **/

if (Drupal.jsEnabled) {
  $(document).ready(function () {
    $('#google_weather_location_i').hide();
    $('#google_weather_location_l').show();

		$('#weather_form').submit(function() {
			$.ajax({
				type: 'POST',
  			url: "google_weather_block_ajax",
				cache: false,
				data: "google_weather_location=" + $('#google_weather_location_i').val(),
  			//context: document.body,
  			success: function(data){
					var google_weather_location_value=$('#google_weather_location_i').val();
    			$('#google_weather_location_i').hide();
    			$('#google_weather_location_l').show();
					$(".google-weather-block").parent().html(data);
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

  });
}
