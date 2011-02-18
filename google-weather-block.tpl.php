<?php
/**
 * Theme file for Google Weather block
 */
?>
<div class="google-weather-block">

    <?php $weather = new stdClass(); ?>

    <div class="leftbit">
        <div class="icon">
            <img src="<?php echo $weather->icon; ?>" alt="" />
            <div class="degf"><?php echo $weather->current_temp_f;?>&deg;</div>
            <div class="degc"><?php echo $weather->current_temp_c;?>&deg;</div>
        </div>
        <div class="degrees"><span class="active">&deg;F</span> | <span>&deg;C</span></div>
    </div>


    <div class="content">
        <div class="location">
        <form action="<?php //echo str_replace("&", "&amp;", $url); ?>" method="post">
        <input type="text" name="weather_location" value="<?php // echo $weather_location; ?>" />
        </form>
        </div>
    </div>
    <div class="rokweather-wrapper">
          <?php if (isset($weather->error)) :?>
          <div class="row error"><?php echo $weather->error; ?></div>
          <?php else: ?>
          <div class="row"><?php //echo $weather->current_condition; ?></div>
          <div class="row"><?php //echo $weather->current_humidity; ?></div>
          <div class="row"><?php //echo $weather->current_wind; ?></div>
          <div class="forecast"></div>
          <?php endif; ?>
    </div>
</div>