<?php
/**
 * Theme file for Google Weather block
 */
?>
<div class="google-weather-block">

    <div class="location">
      <form action="<?php print str_replace("&", "&amp;", $url_ajax); ?>" method="post">
        <input type="text" name="weather_location" value="<?php print $weather_location; ?>" />
      </form>
      <h2><?php print $weather_location; ?></h2>
    </div> <!-- location information and form -->

    <?php if (isset($weather->error)) :?>

    <div class="error">
      <?php print $weather->error; ?>
    </div>

    <?php else: // there is no error and info are available ?>
    <div class="today">
        <div class="icon">
            <img src="<?php print $icon_url.$weather->icon; ?>" alt="" />
            <div class="tempf"><?php print $weather->current_temp_f;?>&deg;</div>
            <div class="tempc"><?php print $weather->current_temp_c;?>&deg;</div>
        </div>
        <div class="degree_types">
          <a href="#" title="<?php echo t("View temperatures in Celsius"); ?>" <?php if ($degree_type == 'C'): ?>class="active"<?php endif; ?>>&deg;C</a> |
          <a href="#" title="<?php echo t("View temperatures in Farenheit"); ?>" <?php if ($degree_type == 'F'): ?>class="active"<?php endif; ?>>&deg;F</a>
        </div>
        <div class="info">
          <div class="row"><?php print $weather->current_condition; ?></div>
          <div class="row"><?php print $weather->current_humidity; ?></div>
          <div class="row"><?php print $weather->current_wind; ?></div>
        </div>
    </div>

    <div class="forecasts">
      <?php foreach ($weather->forecast as $day): ?>
      <div class="day">
          <h3><?php print $day->day_of_week; ?></h3>
          <img src="<?php print $icon_url.$day->icon; ?>" alt="" />
          <div class="tempf">
              <span class="low"><?php print $day->low_f; ?></span> |
              <span class="high"><?php print $day->high_f; ?></span>
          </div>
          <div class="tempc">
              <span class="low"><?php print $day->low_c; ?></span> |
              <span class="high"><?php print $day->high_c; ?></span>
          </div>
      </div>
      <?php endforeach; ?>
    </div> <!-- .forecasts -->
    <?php endif; // if there has been an error ?>

</div>
