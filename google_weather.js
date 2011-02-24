/** beginning of file **/

if (Drupal.jsEnabled) {
  $(document).ready(function () {
    google_weather_init();
  });
  Drupal.behaviors.google_weather.attach_events = google_weather_attachevents;
}

function google_weather_attachevents() {
  google_weather_init();
}

function google_weather_init(){
    $('#google_weather_location_i').hide();
    $('#google_weather_location_l').show();

    $('#weather_form').submit(function() {
      var google_weather_location_value=$('#google_weather_location_i').val();
      $.ajax({
        type: 'POST',
        url: "google_weather_block_ajax",
        cache: false,
        data: "google_weather_location=" + $('#google_weather_location_i').val(),
        //context: document.body,
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
