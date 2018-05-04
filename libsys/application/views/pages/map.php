<section>
    <h2 class="section-title">
        <?php echo $this->lang->line('map__section_main_title'); ?>
    </h2>
    <div class="section-content">
        <?php echo $this->lang->line('map__section_main_text'); ?>
    </div>
    
    <div id="library-map"></div>
</section>

<script>
    function getLocation()
    {
        if (navigator.geolocation)
        {
            navigator.geolocation.getCurrentPosition(getLibraries);
        }
    }

    function getLibraries(position)
    {
        $.ajax({
            type: 'GET',
            url:  'https://libsys.lo/assets/json/libdata.json',
            success: function(data) {
                if (typeof data.libraries !== 'undefined')
                {
                    initMap(position, data.libraries);
                }
            }
        });
    }

    function initMap(position, libraries)
    {
        var userMarkerStr   = '<span id="library-user-location"><?php echo $this->lang->line('map__user_location'); ?></span>';
        var userPosition    = {lat: position.coords.latitude, lng: position.coords.longitude};
        var googleMap       = new google.maps.Map(document.getElementById('library-map'), {
            center: userPosition,
            zoom:   15
        });
        var infoWindow      = new google.maps.InfoWindow();
        var userMarker      = new google.maps.Marker({
            position:   userPosition,
            map:        googleMap,
            icon:       '<?php echo asset_url()."img/marker_blue.png"; ?>'
        });
        
        userMarker.addListener('click', function() {
            infoWindow.open(googleMap, userMarker);
            infoWindow.setContent(userMarkerStr);
        });
        $.each(libraries, function() {
            var libStr      = '<div class="library-info"><a class="library-url" href="'+ this.url +'" target="_blank">Filia nr '+ this.number +'</a><div class="library-address">'+ this.address +'</div></div>';
            var marker      = new google.maps.Marker({
                position:   this.location,
                map:        googleMap,
                icon:       '<?php echo asset_url()."img/marker_orange.png"; ?>'
            });

            marker.addListener('click', function() {
                infoWindow.setContent(libStr);
                infoWindow.open(googleMap, marker);
            });
        });
    }

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBx_0UD6Q850R0YPh3ayzuAJ4Z2hyX8yg4&callback=getLocation"
    async defer></script>