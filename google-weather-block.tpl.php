<?php
/**
 * Theme file for Google Weather block
 */
?>
<div class="google-weather-block">

    <div class="location">
      <!--<form id="weather_form" action="<?php print str_replace("&", "&amp;", $url_ajax); ?>" method="post">-->
      <form id="weather_form" method="post">
        <input id="google_weather_location_i" type="text" name="google_weather_location" value="<?php print $weather_location; ?>" />
      </form>
      <h2 id="google_weather_location_l"><?php print $weather_location; ?></h2>
    </div> <!-- location information and form -->
    <div class="degree_types">
      <a href="#" title="<?php echo t("View temperatures in Celsius"); ?>" <?php if ($degree_type == 'C'): ?>class="active"<?php endif; ?>>&deg;C</a> |
      <a href="#" title="<?php echo t("View temperatures in Farenheit"); ?>" <?php if ($degree_type == 'F'): ?>class="active"<?php endif; ?>>&deg;F</a>
    </div>

    <?php if (isset($weather->error)) :?>

    <div class="error">
      <?php print $weather->error; ?>
    </div>

    <?php else: // there is no error and info are available ?>
    <div class="today">
        <div class="icon">
            <img src="<?php print $icon_url.$weather->icon; ?>" alt="" />
            <span class="temp dgf"><?php print $weather->current_temp_f;?>&deg;</span>
            <span class="temp dgc"><?php print $weather->current_temp_c;?>&deg;</span>
        </div>
        <div class="info">
          <div class="row curr_condition"><?php print $weather->current_condition; ?></div>
          <div class="row"><?php print $weather->current_humidity; ?></div>
          <div class="row"><?php print $weather->current_wind; ?></div>
        </div>
    </div>

    <div class="forecasts">
      <?php foreach ($weather->forecast as $day): ?>
      <div class="day">
          <h3><?php print $day->day_of_week; ?></h3>
          <img src="<?php print $icon_url.$day->icon; ?>" alt="" />
          <div class="temp dgf">
              <span class="low"><?php print $day->low_f; ?></span> |
              <span class="high"><?php print $day->high_f; ?></span>
          </div>
          <div class="temp dgc">
              <span class="low"><?php print $day->low_c; ?></span> |
              <span class="high"><?php print $day->high_c; ?></span>
          </div>
      </div>
      <?php endforeach; ?>
    </div> <!-- .forecasts -->
    <?php endif; // if there has been an error ?>

</div>
