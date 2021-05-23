<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
$loginid=$_SESSION['ses_loginid'];
include("connection.php");

?>
<!DOCTYPE html>





<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Hospital Location</title>
    <style>
        /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
        
        
        #map {
            height: 80vh;
            width: 90vw;
            margin: 10px;
            padding: 0px;
            background: steelblue;
        }
        
        .button {
            background-color: #4e6ed9;
            border: none;
            color: white;
            border-radius: 3px;
            padding: 10px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        
        .text-color {
            color: #ffffff;
        }
    </style>
</head>

<body style="margin:0px; padding:0px;">

  
  
  
  
  
   <div class="row">
        <div style="margin-left:30px;">
            <form class="form-inline" action="">
            
            <div class="form-group" style="margin-right: 10px;">
                    <label>Divisions</label>
					<select class="form-control" id="cboDistrict" name="cboDistrict" style="margin-left: 5px;">
						<option value="">--Select Divisions--</option>
                        <?php 
                         $con=mysqli_connect("localhost","root","","aleppyco_hospitals");
                         $res=mysqli_query($con,"select id,name from munci order by name");
                         foreach($res as $listitem){
                             echo "<option value=''>".$listitem['name']."</option>";
                         }
                        
                        ?>
                       
                      
    				</select> 
                </div>

	
				<div class="form-group" style="margin-right: 10px;">
                    <label>Panchayath</label>
					<select class="form-control" id="cboDistrict" name="cboDistrict" style="margin-left: 5px;">
						<option value="">--Select Panchayath--</option>
                       
                        
    				</select> 
                </div>
                <!--div class="form-group" style="margin-right: 10px;">
                    <label for="usr" class="text-color">Hospital List</label>
				<select class="form-control" id="latlang" name="latlang" style="margin-left: 5px;">
					<option value="">--Select Hospital--</option>
                   
				</select>
                    
                </div-->

                <!--div class="form-group" style="margin-right: 10px;">
                    <label for="usr" class="text-color">Radius</label>
                    <input type="text" class="form-control" id="rad" name="rad" style="margin-left: 5px;width:60px;" maxlength="3">
                </div-->

                <button type="button" id="fetch" class="btn btn-info">FETCH</button>

                <!--div class="form-group" style="margin-right: 10px;margin-left: 5px;">
                    <label for="usr" class="text-color">Near By Radius</label>
                    <input type="text" class="form-control" id="nearrad" style="margin-left: 5px;width:60px;" maxlength="3">
                </div-->
            </form>


        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->



    <div id="map" style="border: 6px solid rgb(52, 51, 52);border-radius: 13px;"></div>







    <!-- <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABbNypzVAuQJBnTkGiUg_Qfke10sEM_Ac">
        </script> -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABbNypzVAuQJBnTkGiUg_Qfke10sEM_Ac">
    
    </script> 

    <!-- <script src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyABbNypzVAuQJBnTkGiUg_Qfke10sEM_Ac&center=9.411434151736156,76.4359188425049&zoom=14&format=png&maptype=roadmap&style=feature:poi.attraction%7Celement:labels.icon%7Cvisibility:off&style=feature:poi.attraction%7Celement:labels.text%7Cvisibility:off&style=feature:poi.business%7Cvisibility:off&style=feature:poi.business%7Celement:labels.icon%7Cvisibility:off&style=feature:poi.business%7Celement:labels.text%7Cvisibility:off&style=feature:poi.park%7Celement:labels.icon%7Cvisibility:off&style=feature:poi.park%7Celement:labels.text%7Cvisibility:off&style=feature:poi.place_of_worship%7Celement:labels.icon%7Cvisibility:off&style=feature:poi.place_of_worship%7Celement:labels.text%7Cvisibility:off&style=feature:poi.school%7Celement:labels.icon%7Cvisibility:off&style=feature:poi.school%7Celement:labels.text%7Cvisibility:off&style=feature:poi.sports_complex%7Celement:labels.icon%7Cvisibility:off&style=feature:poi.sports_complex%7Celement:labels.text%7Cvisibility:off&style=feature:road%7Celement:labels.icon%7Cvisibility:off&style=feature:road.arterial%7Celement:labels%7Cvisibility:off&style=feature:road.highway%7Celement:labels%7Cvisibility:off&style=feature:road.local%7Cvisibility:off&style=feature:transit%7Cvisibility:off
    "></script> -->

<script>
			$('#cboDistrict').change(function(){

     var districtid = $(this).val();

     // Empty Police Station dropdown
     $('#latlang').find('option').not(':first').remove();

     // AJAX request
     $.ajax({
       url: "https://drive.google.com/u/0/uc?id=1xE0osv60fU6XOyCY3dQftAv2ooa-wJA-&export=download",
       type: 'post',
       data: {districtid: districtid},
       dataType: 'json',
       success: function(response){

         var len = response.length;
         for( var i = 0; i<len; i++){
           var hospitalid = response[i]['hospitalid'];
           var hospitaladdress = response[i]['hospitaladdress'];

           $("#latlang").append("<option value='"+hospitalid+"'>"+hospitaladdress+"</option>");

         }
       }
     });

  });
</script>

    <script>
        $("#fetch").click(function() {

            var latlang = $("#latlang").val();
            var radius = $("#rad").val();
            var latval = latlang.split(',');
            // Accessing individual values
            //alert(latval[0]);
            // alert(latval[1]);
            var lat = latval[0];
            var lng = latval[1];

            clearMarkers();
            google.maps.event.addDomListener(window, 'load', initialize(lat, lng, radius));


        });

        var mapCanvas = document.getElementById('map');
        var latchange = '';
        var lngchange = '';
        var mapOptions = {
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.DRIVING,
            style: [{
                "featureType": "poi.attraction",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "poi.attraction",
                "elementType": "labels.text",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "poi.business",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "poi.business",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "poi.business",
                "elementType": "labels.text",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "poi.park",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "poi.park",
                "elementType": "labels.text",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "poi.place_of_worship",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "poi.place_of_worship",
                "elementType": "labels.text",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "poi.school",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "poi.school",
                "elementType": "labels.text",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "poi.sports_complex",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "poi.sports_complex",
                "elementType": "labels.text",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "road",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "road.arterial",
                "elementType": "labels",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "labels",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "road.local",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "transit",
                "stylers": [{
                    "visibility": "off"
                }]
            }],
            //travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
        var map = new google.maps.Map(mapCanvas, mapOptions);

        var markers = [];
        //You can calculate directions (using a variety of methods of transportation) by using the DirectionsService object.  
        var directionsService = new google.maps.DirectionsService();
        //Define a variable with all map points.  
        var _mapPoints = new Array();
        //Define a DirectionsRenderer variable.  

        var _directionsRenderer = new google.maps.DirectionsRenderer();

        var rendererOptions = {
            draggable: true
        };
        var directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);

        function calcRoute(start, end) {
            var request = {
                origin: start,
                destination: end,
                travelMode: google.maps.TravelMode.DRIVING,
                provideRouteAlternatives: false
            };
            directionsService.route(request, function(result, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(result);
                }
            });
        }


        function nearBY(lat, lng, ) {
            directionsDisplay.setMap(null);
            // directionsDisplay.setDirections({
            //     routes: []
            // });
            clearMarkers();
            // alert("" + lat + lng)
            var rad = $("#nearrad").val();
            latchange = lat;
            lngchange = lng;

            google.maps.event.addDomListener(window, 'load', initialize(lat, lng, rad));


        }


        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setMapOnAll(null);

        }


        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }



        function initialize(lat, lng, rad) {

            var centerLat = '';
            var centerLng = '';
            //var imageOrigin = "https://img.icons8.com/color/48/000000/hospital-3.png";
            /*ajax*/
			var image = "hospital-3.png";
			var imageOrigin = "hospital-2.png";
            $.ajax({
                url: "serviceHospitals.php?lat=" + lat + "&lng=" + lng + "&radius=" + rad,
                success: function(dataJSON) {

                    var data = JSON.parse(dataJSON)

                    //console.log(data[0].lng);
                    //Loop through each location.
                    // Sample use of first data

                    centerLat = data[0].lat;
                    centerLng = data[0].lng;
					var count=0;
                    $.each(data, function() {
                        //Plot the location as a marker
						var theposition = new google.maps.LatLng(this.lat, this.lng);
						if(count==0){
							var marker = new google.maps.Marker({
                            position: theposition,
                            map: map,
                            icon: imageOrigin,
                            animation: google.maps.Animation.DROP
                        });
						}else{
							var marker = new google.maps.Marker({
                            position: theposition,
                            map: map,
                            icon: image,
                            animation: google.maps.Animation.DROP
                        });
						}
                        
                        
                        markers.push(marker);
						
						count=count+1;

                        //                      console.log(this.lat);

                        var contentString = '<div id="content">' +
                            '<div id="siteNotice">' +
                            '</div>' +
                            '<h4 id="firstHeading" class="firstHeading" style="color:#d94e18">' + this.name + '</h4>' +
                            '<div id="bodyContent">' +
                            '<p style="color:navy;font-weight:bold"> Distance: ' + Math.round(this.distance) + 'KM</p>' +
                            '<p><strong style="color:maroon"> Total Rooms : ' + this.rooms + '</strong> | <strong style="color:blue"> Rooms In Use : ' + this.usedrooms + '</strong> </p>' +
                            '<p><strong style="color:maroon"> Total Wards : ' + this.wards + '</strong> | <strong style="color:blue"> Wards In Use : ' + this.usedrooms + '</strong> </p>' +
                            '<p><strong style="color:maroon"> Total Vents : ' + this.ventilators + '</strong> | <strong style="color:blue"> Vents In Use : ' + this.usedvents + '</strong></p>' +
                            '<p><strong style="color:maroon"> Total Ambulance : ' + this.ambulance + '</strong> | <strong style="color:blue"> Ambulance In Use : ' + this.usedambs + '</strong></p>' +
                            '<p><strong style="color:maroon"> Phone : ' + this.contactperson + '</strong></p>' +
                            '<button class="button"  onclick="nearBY(' + this.lat + ',' + this.lng + ')">Near By</button>';
                        '</div>' +
                        '</div>';

                        //  latchange = this.lat;
                        //  lngchange = this.lng;

                        var infowindow = new google.maps.InfoWindow({
                            content: contentString
                        });


                        // directionsDisplay.setDirections({
                        //     routes: []
                        // });

                        marker.addListener('click', function(event) {
                            infowindow.open(map, marker);

                            calcRoute(new google.maps.LatLng(latchange, lngchange), event.latLng)
                            directionsDisplay.setMap(map);

                        });


                    });


                    //map.setCenter(centerLat,centerLng);
                    map.setCenter(new google.maps.LatLng(centerLat, centerLng));

                    //setMapOnAll(map)
                    directionsDisplay.setPanel(document.getElementById("map"));
                    console.log(map);

                }
            });

            /*ajax*/

        }

        // google.maps.event.addDomListener(window, 'load', initialize(9.500014, 76.336267, 50));

        //google.maps.event.addDomListener(window, 'load');

        //Add an event to route direction. This will fire when the direction is changed.  
        google.maps.event.addListener(_directionsRenderer, 'directions_changed', function() {

            // console.log(_directionsRenderer.directions);
            ///   computeTotalDistanceforRoute(_directionsRenderer.directions);
        });
    </script>

</body>

</html>