/** beginning of file **/

// I attach the jquery code to the drupal beaviors to ensure it keeps 
// working even when new content has been added to the page after a 
// JQuery callback
Drupal.behaviors.google_weather_jquery = function () {
        var google_weather_location_t=$('#google_weather_location_i').val();
        $('#google_weather_location_i').hide();
        $('#google_weather_location_l').show();

        if(gw_getCookie('degree_type')=='F'){set_degree_type('F')}else{set_degree_type('C')}

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
        $('#google_weather_location_i').keypress(function(e) {
                var code = (e.keyCode ? e.keyCode : e.which);
                if(code==27){ // If key = ESC
                        $('#google_weather_location_i').hide();
                        $('#google_weather_location_i').val(google_weather_location_t);
                        $('#google_weather_location_l').show();
                }
        });
        $('#google_weather_location_l').click(function() {
                $('#google_weather_location_i').show();
                $('#google_weather_location_l').hide();
                $('#google_weather_location_i').focus();

        });
        $('#google_weather_C').click(function() {
                set_degree_type('C');
        });
        $('#google_weather_F').click(function() {
                set_degree_type('F');
        });
}
function set_degree_type(type){
        switch(type){
                case 'C':
                        $('#google_weather_C').addClass('degree_types_active');
                        $('#google_weather_F').removeClass('degree_types_active');
                        $('.temp.dgc').show();
                        $('.temp.dgf').hide();
                        break;
                case 'F':
                        $('#google_weather_C').removeClass('degree_types_active');
                        $('#google_weather_F').addClass('degree_types_active');
                        $('.temp.dgc').hide();
                        $('.temp.dgf').show();
                        break;
        }
        gw_setCookie('degree_type',type,30);
}

function gw_setCookie(c_name,value,exdays){
        var exdate=new Date();
        exdate.setDate(exdate.getDate() + exdays);
        var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
        document.cookie=c_name + "=" + c_value;
}

function gw_getCookie(c_name){
        var i,x,y,ARRcookies=document.cookie.split(";");
        for (i=0;i<ARRcookies.length;i++){
        x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
        y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
        x=x.replace(/^\s+|\s+$/g,"");
        if (x==c_name){
        return unescape(y);
    }
  }
}
