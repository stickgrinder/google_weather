<?php
/**
 * Theme file for Google Weather block
 */
?>
<div class="google-weather-block">

    <div class="leftbit">
        <div class="icon">
            <img src="<?php echo $icon_url.$weather->icon; ?>" alt="" />
            <div class="degf"><?php echo $weather->current_temp_f;?>&deg;</div>
            <div class="degc"><?php echo $weather->current_temp_c;?>&deg;</div>
        </div>
        <div class="degrees"><span class="active">&deg;F</span> | <span>&deg;C</span></div>
    </div>


    <div class="content">
        <div class="location">
        <form action="<?php echo str_replace("&", "&amp;", $url); ?>" method="post">
        <input type="text" name="weather_location" value="<?php echo $weather_location; ?>" />
        </form>
        </div>
    <div class="rokweather-wrapper">
          <?php if (isset($weather->error)) :?>
          <div class="row error"><?php echo $weather->error; ?></div>
          <?php else: ?>
          <div class="row"><?php echo $weather->current_condition; ?></div>
          <div class="row"><?php echo $weather->current_humidity; ?></div>
          <div class="row"><?php echo $weather->current_wind; ?></div>
          <div class="forecast">

      <?php
        // $weather->forecast = array_slice($weather->forecast, 0, $params->get('forcast_show', 4));
      ?>

          <?php foreach ($weather->forecast as $day): ?>
              <div class="day">
                  <span><?php echo $day->day_of_week; ?></span><br />
                  <img src="<?php echo $icon_url.$day->icon; ?>" alt="" /><br />
                  <div class="degf">
                      <span class="low"><?php echo $day->low_f; ?></span> |
                      <span class="high"><?php echo $day->high_f; ?></span>
                  </div>
                  <div class="degc">
                      <span class="low"><?php echo $day->low_c; ?></span> |
                      <span class="high"><?php echo $day->high_c; ?></span>
                  </div>
              </div>
              <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>
    </div>

</div>