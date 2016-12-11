<script async defer
src="https://maps.googleapis.com/maps/api/js?key={{ env("GOOGLE_API_KEY")}}&callback=initialize"></script>
<script>
      var map;
      var geocoder;
     /* var mapOptions = { center: new google.maps.LatLng(0.0, 0.0), zoom: 2,
        mapTypeId: google.maps.MapTypeId.ROADMAP };*/
        <?php 
        (isset($company)) ? $contact = $company : null;
        (isset($job)) ? $contact = $job : null;
        (isset($training)) ? $contact = $training : null;        
        ?>
        function initialize() {
        var latitude=27.741884632507087,
            longitude = 85.30;
            {{--If the contact is edited then show lat and longitude--}}
          @if(isset($contact->contacts) && $contact->contacts->latitude && $contact->contacts->longitude)
            latitude = {{ $contact->contacts->latitude }};
            longitude = {{ $contact->contacts->longitude }};
            
            
          @endif
         

        var myOptions = {
                center: new google.maps.LatLng(latitude,longitude ),
                zoom: 12,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            geocoder = new google.maps.Geocoder();
            var map = new google.maps.Map(document.getElementById("map"),
            myOptions);
            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });
            @if(isset($contact->contacts) && $contact->contacts->latitude && $contact->contacts->longitude)
             var marker = new google.maps.Marker({
                position: {lat:latitude,lng:longitude},
                map: map,
                title: "{{ ucfirst($contact->name) }}"
              });
            @endif
            var marker;
            function placeMarker(location) {
                if(marker){ //on vérifie si le marqueur existe
                    marker.setPosition(location); //on change sa position
                }else{
                    marker = new google.maps.Marker({ //on créé le marqueur
                        position: location, 
                        map: map
                    });
                }
                document.getElementById('latitude').value=location.lat();
                document.getElementById('longitude').value=location.lng();
                getDistrictZone(location);
            }
          

        function getDistrictZone(latLng) {
        geocoder.geocode( {'latLng': latLng},
          function(results, status) {
            if(status == google.maps.GeocoderStatus.OK) {
              if(results[0]) {
                document.getElementById("address").value = results[0].formatted_address;
                
                 
                    {{-- For others --}}
                    $.each(results[0], function(k1,v1) {
                      

                      if (k1 == "address_components") {
                        
                        for (var i = 0; i < v1.length; i++) {
                          

                          for (k2 in v1[i]) {
                          

                            if (k2 == "types") {
                                var types = v1[i][k2];
                                if (types[0] == "country") {
                                    document.getElementById("country").value = v1[i].long_name;
                                    console.log(types[0]);
                                } 
                                
                            }
                          }
                        }
                      }
                    });
                   
              }
              else {
                document.getElementById("zone").value = "No results";
              }
            }
            else {
              document.getElementById("zone").value = status;
            }
          });
        }
      }//Initialize
      
      google.maps.event.addDomListener(window, 'load', initialize);
</script>