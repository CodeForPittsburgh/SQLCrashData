<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bike Pittsburgh Crash Data</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="CodeForPittsburgh">
        <meta name="author" content="Mark Howe">
        <link rel="icon" href="img/myicon.png">
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery-1.11.2.js"></script>
        <script src="js/bootstrap.js"></script>


        <style>
            #mapsection {
                width:100%;
                height:750px;
                float:left;
                padding:10px; 
            }
            #info-box {
                background-color: #eeeeee;
                border: 2px solid black;
                bottom: 125px;
                height: 40px;
                padding: 10px;
                float:left;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h2 class="text-center">Bike Pittsburgh Crash Data 2004-2015</h2>
            </div>
            <div class="row">
                <div class="col-sm-10">
                    <div id ="mapsection">
                    </div>
                </div>
                <div class="col-sm-2">

                    <div id="nav">
                        <div id="info-box">?</div>
                        <br>
                        <div id="legend">
                            <h2>Legend</h2>
                            Bike Crashes <img title="Crashes" src="./img/roundbg_check_black.png" alt="Crashes" >
                            <br>
                            Killed <img title="Killed" src="./img/mm_20_star.png" alt="Killed" >
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function initialize() {
                var map;
                data0 = new google.maps.Data();
                data1 = new google.maps.Data();
                data0.loadGeoJson("./resources/Allegheny_County_Municipal_Boundaries.json");
                data1.loadGeoJson("./resources/Neighborhood.json");

                var infoWindow = new google.maps.InfoWindow;
                var redStar = {
                    path: 'M 125,5 155,90 245,90 175,145 200,230 125,180 50,230 75,145 5,90 95,90 z',
                    fillColor: 'red',
                    fillOpacity: 0.8,
                    scale: .1,
                    strokeColor: 'gold',
                    strokeWeight: .5
                };
                map = new google.maps.Map(document.getElementById("mapsection"), {
                    center: new google.maps.LatLng(40.435467, -79.996404),
                    zoom: 10,
                    mapTypeId: 'roadmap'
                });
                var featureStyle = {
                    fillColor: 'green',
                    strokeWeight: 1,
                    clickable: 'true'

                };

                data0.setStyle(featureStyle);
                data1.setStyle(featureStyle);
                // When the user hovers, tempt them to click by outlining the letters.
                // Call revertStyle() to remove all overrides. This will use the style rules
                // defined in the function passed to setStyle()


                data0.addListener('mouseover', function (event) {
                    data0.revertStyle();
                    data0.overrideStyle(event.feature, {strokeWeight: 4});

                    document.getElementById('info-box').textContent =
                            event.feature.getProperty("LABEL");

                });
                data0.addListener('mouseout', function (event) {
                    data0.revertStyle();
                });


                data0.setMap(map);
                data1.setMap(map);

                var type = "Crash";


                // Change this depending on the name of your PHP file
                downloadUrl("./crashdata.xml", function (data) {
                    var xml = data.responseXML;
                    var markers = xml.documentElement.getElementsByTagName("marker");
                    //alert(markers.length);            
                    for (var i = 0; i < markers.length; i++) {
                        var name = markers[i].getAttribute("NAME");
                        var crashyear = markers[i].getAttribute("CRASH_YEAR");
                        var crashdate = markers[i].getAttribute("CRASH_MONTH");
                        var crashtime = markers[i].getAttribute("TIME_OF_DAY");
                        var address = markers[i].getAttribute("STREET_NAME");
                        var description = markers[i].getAttribute("MAX_SEVERITY_LEVEL");
                        var point = new google.maps.LatLng(
                                parseFloat(markers[i].getAttribute("lat")),
                                parseFloat(markers[i].getAttribute("lng")));
                        var html = "<b>" + address + "</b> <br/>" + type + "<br/>" + "Year:" + crashyear + " Month:" + crashdate + " Time:" + crashtime + "<br/>" + name + "<br/>" + description;

                        var icon = './img/roundbg_check_black.png';
                        if (description === "Killed")
                        {
                            icon = redStar;
                        }
                        var marker = new google.maps.Marker({
                            map: map,
                            position: point,
                            icon: icon
                        });
                        //marker.addListener('click', bindInfoWindow(marker, map, infoWindow, html));
                        bindInfoWindow(marker, map, infoWindow, html);
                    }
                });
                //setMarkers(map);

            }

            function bindInfoWindow(marker, map, infoWindow, html) {

                google.maps.event.addListener(marker, 'click', function () {
                    infoWindow.setContent(html);
                    infoWindow.open(map, marker);
                    //infoWindow.open(marker.get('map'), marker);

                });

            }

            function downloadUrl(url, callback) {
                var request = window.ActiveXObject ?
                        new ActiveXObject('Microsoft.XMLHTTP') :
                        new XMLHttpRequest;

                request.onreadystatechange = function () {
                    if (request.readyState === 4) {
                        request.onreadystatechange = doNothing;
                        callback(request, request.status);
                    }
                };

                request.open('GET', url, true);
                //request.setRequestHeader();
                request.send(null);
            }

            function doNothing() {
            }

            function setMarkers(map) {
                var marker = new google.maps.Marker({
                    map: map
                });
            }
            //google.maps.event.addDomListener(window);
        </script>
        <script 
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb3EA0lfao273s6Jkp8tfTzJfUSkswpOw&callback=initialize">
            google.maps.event.addDomListener(window);
        </script>
    </body>
</html>
