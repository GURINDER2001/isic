<?php
if(!empty($record)) 
{ 
    extract($record); 
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Campus <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Colleges/Universities Management</a></li>
            <li class="active">Edit Campus</li>
        </ol>
    </section>
    <section class="content">
        <?=getNotificationHtml(); ?>
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title"><?=getCollegeName($college_id); ?></h3>
          </div>
          <div class="box-body">
            <form method="post" enctype="multipart/form-data">
                <?php echo form_input(array('type'=>'hidden','id' => 'city', 'name' => 'city','class'=>'form-control input-md', 'value'=>!empty($city)?$city:'')); ?>
                <?php echo form_input(array('type'=>'hidden','id' => 'city_short', 'name' => 'city_short','class'=>'form-control input-md', 'value'=>!empty($city_short)?$city_short:'')); ?>
                <?php echo form_input(array('type'=>'hidden','id' => 'district', 'name' => 'district','class'=>'form-control input-md', 'value'=>!empty($district)?$district:'')); ?>
                <?php echo form_input(array('type'=>'hidden','id' => 'district_short', 'name' => 'district_short','class'=>'form-control input-md', 'value'=>!empty($district_short)?$district_short:'')); ?>
                <?php echo form_input(array('type'=>'hidden','id' => 'state', 'name' => 'state','class'=>'form-control input-md', 'value'=>!empty($state)?$state:'')); ?>
                <?php echo form_input(array('type'=>'hidden','id' => 'state_short', 'name' => 'state_short','class'=>'form-control input-md', 'value'=>!empty($state_short)?$state_short:'')); ?>
                <?php echo form_input(array('type'=>'hidden','id' => 'country', 'name' => 'country','class'=>'form-control input-md', 'value'=>!empty($country)?$country:'')); ?>
                <?php echo form_input(array('type'=>'hidden','id' => 'country_short', 'name' => 'country_short','class'=>'form-control input-md', 'value'=>!empty($country_short)?$country_short:'')); ?>
                <?php echo form_input(array('type'=>'hidden', 'id' => 'latitude', 'name' => 'latitude','class'=>'form-control input-md', 'value'=>!empty($latitude)?$latitude:'-33.8688')); ?>
                <?php echo form_input(array('type'=>'hidden','id' => 'longitude', 'name' => 'longitude','class'=>'form-control input-md', 'value'=>!empty($longitude)?$longitude:'151.2195')); ?>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Search for </label>
                        <div class="pac-card">
                            <div id="type-selector" class="pac-controls">
                                <input type="radio" name="locality" id="locality" class="flat-red" value="City" <?=(!empty($locality) && $locality=='City')?'checked="checked"':''; ?>> City &nbsp;

                                <input type="radio" name="locality" id="locality" value="University" class="flat-red" <?=(!empty($locality) && $locality=='University')?'checked="checked"':''; ?>> Universities &nbsp;

                                <input type="radio" name="locality" id="locality" class="flat-red" value="Sub-locality" <?=(!empty($locality) && $locality=='Sub-locality')?'checked="checked"':''; ?>> Sub-locality &nbsp;
                          </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <?php echo form_input(array('id' => 'location', 'name' => 'location','class'=>'form-control input-md','placeholder'=>'Location...','value'=>!empty($location)?$location:'')); ?>
                        </div>                  
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-location-arrow"></i>
                            </div>
                            <?php echo form_input(array('id' => 'postal_code', 'name' => 'postal_code','class'=>'form-control input-md', 'placeholder'=>'Postal Code...','value'=>!empty($postal_code)?$postal_code:'')); ?>
                        </div>                         
                    </div>
                    <div class="form-group">
                        <?php echo form_textarea(array('id' => 'address', 'name' => 'address','class'=>'form-control input-md','rows'=>3, 'placeholder'=>'Address...','value'=>!empty($address)?$address:'')); ?>
                    </div>
                    <div class="form-group">
                        <div id="map" style="width:100%; height: 400px;"></div>
                    </div>                                                       
                </div>
                
                <div class="col-md-6">
                    <div class="form-group mt30">
                        <label>TimeZone</label>
                        <?php echo form_dropdown('timezone', timezoneOptions(), !empty($timezone)?$timezone:'','class="form-control select2" style="width:100%;"'); ?>
                    </div>
                    <div class="form-group">
                        <label>Social Links</label>
                        <p>Please use secure links (https)</p>
                        <div class="field_wrapper" id="social_wrapper">
                            <?php
                            $social_links = !empty($social_links)?unserialize($social_links):array();
                            if(!empty($social_links))
                            {
                                foreach ($social_links as $sSource => $sLink)
                                {
                                    //pre($sLink);
                                   ?>
                                    <div class="row socialBox">
                                        <div class="form-group">
                                            <div class="col-sm-5">
                                                <?php echo form_dropdown('social_media[]', getSocialMediaLists(), !empty($sSource)?$sSource:'','class="form-control select2" style="width:100%;"'); ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" id="social_link" name="social_link[]" class="form-control" value="<?=!empty($sLink)?$sLink:''; ?>">
                                            </div>
                                            <div class="col-sm-1"><a href="" id="remove_item" class="remove_button"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                   <?php
                                }
                            }
                            ?>
                        </div>
                        <a href="javascript:void(0);" id="add_social" class="add_social"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Link</a>
                    </div>                            
                </div>

                <div class="col-md-12">
                   <div class="clearfix"></div>
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
            </form>
          </div>
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhVu1lyw4HAM2I6bx5Zo9JZ3ZLKoXQ0I&libraries=places&callback=initMap"
        async defer></script>
<script>
    function initMap() {
            var mapbox = document.getElementById('map');            
            var lat = parseFloat($('#latitude').val());
            var lng = parseFloat($('#longitude').val());
            //{lat: -33.8688, lng: 151.2195}
            console.log(lat+'**'+lng);

            var map = new google.maps.Map(mapbox, {
              center: {lat: lat, lng: lng},
              zoom: 11
            });

            //var card = document.getElementById('campusBox'+locId);
            var input = document.getElementById('location');
            //var types = document.getElementById('campus_locality_'+locId);
            //var strictBounds = document.getElementById('strict-bounds-selector');
            //map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
            var autocomplete = new google.maps.places.Autocomplete(input);
            // Bind the map's bounds (viewport) property to the autocomplete object,
            // so that the autocomplete requests use the current map bounds for the
            // bounds option in the request.
            autocomplete.bindTo('bounds', map);
            // Set the data fields to return when the user selects a place.
            autocomplete.setFields(['address_components', 'geometry', 'icon', 'name']);
            var infowindow = new google.maps.InfoWindow();
            var infowindowContent = document.getElementById('infowindow-content');
            infowindow.setContent(infowindowContent);
            var marker = new google.maps.Marker({
              map: map,
              anchorPoint: new google.maps.Point(0, -29)
            });
            autocomplete.addListener('place_changed', function() {
              infowindow.close();
              marker.setVisible(false);
              var place = autocomplete.getPlace();
              if (!place.geometry)
              {
                    // User entered the name of a Place that was not suggested and
                    // pressed the Enter key, or the Place Details request failed.
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
              }
              // If the place has a geometry, then present it on a map.
              if (place.geometry.viewport)
              {
                map.fitBounds(place.geometry.viewport);
              }
              else
              {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
              }
              marker.setPosition(place.geometry.location);
              marker.setVisible(true);

              var address = '';
              if (place.address_components) {
                address = [
                  (place.address_components[0] && place.address_components[0].short_name || ''),
                  (place.address_components[1] && place.address_components[1].short_name || ''),
                  (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
              }

              var components = place.address_components;
              var street = null;
              for (var i = 0, component; component = components[i]; i++) {
                  console.log(component);
                  if (component.types[0] == 'locality')
                  {
                      $('#city').val(component['long_name']);
                      $('#city_short').val(component['short_name']);
                  }
                  if (component.types[0] == 'administrative_area_level_2')
                  {
                      $('#district').val(component['long_name']);
                      $('#district_short').val(component['short_name']);
                  }
                  if (component.types[0] == 'administrative_area_level_1')
                  {
                      $('#state').val(component['long_name']);
                      $('#state_short').val(component['short_name']);
                  }
                  if (component.types[0] == 'country')
                  {
                      $('#country').val(component['long_name']);
                      $('#country_short').val(component['short_name']);
                  }
              }

              var latitude = place.geometry.location.lat();
              var longitude = place.geometry.location.lng(); 

              $('#latitude').val(latitude);
              $('#longitude').val(longitude);

              infowindowContent.children['place-icon'].src = place.icon;
              infowindowContent.children['place-name'].textContent = place.name;
              infowindowContent.children['place-address'].textContent = address;
              infowindow.open(map, marker);
            });
            // Sets a listener on a radio button to change the filter type on Places
            // Autocomplete.
            /*function setupClickListener(id, types) {
              var radioButton = document.getElementById(id);
              radioButton.addEventListener('click', function() {
                autocomplete.setTypes(types);
              });
            }
            setupClickListener('locality-all'+locId, []);
            setupClickListener('locality-address'+locId, ['address']);
            setupClickListener('locality-establishment'+locId, ['establishment']);
            setupClickListener('locality-geocode'+locId, ['geocode']);
            document.getElementById('use-strict-bounds').addEventListener('click', function() {
                  console.log('Checkbox clicked! New state=' + this.checked);
                  autocomplete.setOptions({strictBounds: this.checked});
            });*/
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var maxField = 10; //Input fields increment limitation

        var x = 1; //Initial field counter is 1
        var y = 1; //Initial field counter is 1

        var add_social = $('.add_social'); //Add button selector
        var social_wrapper = $('#social_wrapper'); //Input field wrapper

        //Once add button is clicked
        $(add_social).click(function()
        {           
            //Check maximum number of input fields
            if (y < maxField)
            {
                var fieldHTMLSteps2 = '<div class="row socialBox"><div class="form-group"><div class="col-sm-5"><select id="social_media" name = "social_media[]" class="form-control select2"><option value="facebook"> Facebook</option><option value="twitter"> Twitter</option><option value="google"> Google</option><option value="linkedin"> Linkedin</option><option value="youtube"> Youtube</option><option value="instagram"> Instagram</option><option value="pinterest"> Pinterest</option><option value="snapchat-ghost"> Snapchat</option><option value="skype"> Skype</option><option value="android"> Android</option><option value="dribbble"> Dribbble</option><option value="vimeo"> Vimeo</option><option value="tumblr"> Tumblr</option><option value="vine"> Vine</option><option value="foursquare"> Foursquare</option><option value="stumbleupon"> Stumbleupon</option><option value="flickr"> Flickr</option><option value="yahoo"> Yahoo</option><option value="reddit"> Reddit</option><option value="rss"> Rss</option></select></div><div class="col-sm-6"><input type="text" id="social_link" name="social_link[]" class="form-control"></div><div class="col-sm-1"><a href="" id="remove_item" class="remove_button"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a></div><div class="clearfix"></div></div></div>'; //New input field html 

                y++; //Increment field counter
                $(social_wrapper).append(fieldHTMLSteps2); //Add field html
            }
            else
            {
                alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
            }
        });

        //Once remove button is clicked
        $(social_wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            //alert( $(this).closest(".col-md-12").html());
            $(this).closest(".row").remove(); //Remove field html
            y--; //Decrement field counter
        });
    });
</script>