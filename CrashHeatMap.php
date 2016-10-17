<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="CodeForPittsburgh">
        <meta name="author" content="Mark Howe">
        <title>Bike Crash Heat Map</title>
        <link rel="icon" href="img/myicon.png">
        <link rel="stylesheet" href="css/bootstrap.css">

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
                height: 60px;
                padding: 10px;

            }
        </style>


        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb3EA0lfao273s6Jkp8tfTzJfUSkswpOw&libraries=visualization"></script>
        <script src="js/jquery-1.11.2.js"></script>
        <script src="js/bootstrap.js"></script>
        <script>

            // Adding 500 Data Points
            var map, pointarray, heatmap, google, lat, lng;
            //new google.maps.LatLng(40.377822,-80.065892),
            //40.4551803,-80.0560695 // Sheraden
            //40.4358376,-80.0128648 // Point State Park

            lat = 40.4358376;
            lng = -80.0128648;
            var pittsburghData = [];
            var myLatLng = [];
            var snl = 0;
            var mylen = 0;

            var mapOptions = {
                zoom: 10,
                center: new google.maps.LatLng(lat, lng),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

//            map = new google.maps.Map(document.getElementById('map-canvas'),
//                    mapOptions);
            var pointArray = new google.maps.MVCArray(pittsburghData);

            function initialize()
            {
                map = new google.maps.Map(document.getElementById('mapsection'),
                        mapOptions);


                downloadUrl("./crashdata.xml", function (data) {
                    var xml = data.responseXML;
                    var markers = xml.documentElement.getElementsByTagName("marker");
                    //alert(markers.length);
                    for (var i = 0; i < markers.length; i++) {
                        q1 = parseFloat(markers[i].getAttribute("lat"));
                        q2 = parseFloat(markers[i].getAttribute("lng"));
                        //alert(" i "+ i +" value "+ myLatLng[i]); 
                        var latLng = new google.maps.LatLng(q1, q2);
                        var weightedLoc = {
                            location: latLng
                        };
                        pointArray.push(weightedLoc);
                    }

                });

                //alert("myLatLng 4 " + myLatLng + "^^^ " + myLatLng.length);

//                if (snl === '0')
//                {
//                    data0 = new google.maps.Data();
//                    data0.loadGeoJson(ShapeName[0]);
//                    processGeoJson(0);
//                }
//                if (snl === '1')
//                {
//                    data1 = new google.maps.Data();
//                    data1.loadGeoJson(ShapeName[1]);
//                    processGeoJson(1);
//                }
//
//                if (snl === '2')
//                {
//                    data2 = new google.maps.Data();
//                    data2.loadGeoJson(ShapeName[2]);
//                    processGeoJson(2);
//                }
                //var pointArray = new google.maps.MVCArray(pittsburghData);
                //alert("PA 2 " + pointArray.getLength());
                //pointArray.clear();
                //alert("PA 3 " + pointArray.getLength());
                //pointArray.push(new google.maps.LatLng(40.4613266, -80.0786717));
                //alert("PA 4 " + pointArray.getLength());
                //alert("myLatLng length " +myLatLng.length);
                //alert("array " + myLatLng[0]);
                //var mylen = myLatLng.length - 1;
                // alert("myLatLng length " + mylen);

                // var l = 40.459345375905905;
                // var g = -80.077671252148548;
                // var msg = new google.maps.LatLng(l, g);
                // pointArray.push(msg);
//
//                for (i = 0; i < mylen; i++)
//                {
//                    var q = myLatLng[i];
//                    var qprime = q.split(',');
//                    var q1 = qprime[0];
//                    var q2 = qprime[1];
//                    //var q3 = qprime[2];
//                    //alert("The qs " + q1 + " " + q2);
//                    var latLng = new google.maps.LatLng(q1, q2);
//                    // var magnitude = q3 / 10;
//                    var weightedLoc = {
//                        location: latLng //,
//                                //weight: magnitude
//                    };
//                    pointArray.push(weightedLoc);
//                }
                //alert("New PA  " + pointArray.getLength());
                data0 = new google.maps.Data();
                data1 = new google.maps.Data();
                data0.loadGeoJson("./resources/Allegheny_County_Municipal_Boundaries.json");
                data1.loadGeoJson("./resources/Neighborhood.json");
                var featureStyle = {
                    fillColor: 'green',
                    strokeWeight: 1,
                    clickable: 'true'

                };

                data0.setStyle(featureStyle);
                data1.setStyle(featureStyle);
                data0.setMap(map);
                data1.setMap(map);
                data0.addListener('mouseover', function (event) {
                    data0.revertStyle();
                    data0.overrideStyle(event.feature, {strokeWeight: 4});

                    document.getElementById('info-box').textContent =
                            event.feature.getProperty("LABEL");

                });
                data0.addListener('mouseout', function (event) {
                    data0.revertStyle();
                });
                data1.addListener('mouseover', function (event) {
                    data1.revertStyle();
                    data1.overrideStyle(event.feature, {strokeWeight: 4});

                    document.getElementById('info-box').textContent =
                            event.feature.getProperty("HOOD");

                });
                data1.addListener('mouseout', function (event) {
                    data1.revertStyle();
                });



                //data0.setMap(map);
                //data1.setMap(map);
                heatmap = new google.maps.visualization.HeatmapLayer({
                    data: pointArray
                });
                var originalgradient = [
                    'rgba(0, 255, 255, 0)',
                    'rgba(0, 255, 255, 1)',
                    'rgba(0, 191, 255, 1)'
                ];
                heatmap.set('opacity', 0.8); // default 0.7 range 0 to 1
                //heatmap.set('gradient', originalgradient);
                heatmap.set('radius', 20); // default 20 range 10 to 50
                //data0.setMap(map);
                //data1.setMap(map);
                heatmap.setMap(map);

                //alert("myLatLng outside " + myLatLng + "^v^ " + myLatLng.length);
            }


            function toggleHeatmap() {
                heatmap.setMap(heatmap.getMap() ? null : map);
            }


            function changeGradient() {
                var gradient = [
                    'rgba(0, 255, 255, 0)',
                    'rgba(0, 255, 255, 1)',
                    'rgba(0, 191, 255, 1)',
                    'rgba(0, 127, 255, 1)',
                    'rgba(0, 63, 255, 1)',
                    'rgba(0, 0, 255, 1)',
                    'rgba(0, 0, 223, 1)',
                    'rgba(0, 0, 191, 1)',
                    'rgba(0, 0, 159, 1)',
                    'rgba(0, 0, 127, 1)',
                    'rgba(63, 0, 91, 1)',
                    'rgba(127, 0, 63, 1)',
                    'rgba(191, 0, 31, 1)',
                    'rgba(255, 0, 0, 1)'
                ];
                heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
            }

            function changeRadius() {
                heatmap.set('radius', heatmap.get('radius') ? null : 45);
            }

            function changeOpacity() {
                heatmap.set('opacity', heatmap.get('opacity') ? null : 0.9);
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
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>

    <body>
        <div class="container">
            <div class="jumbotron">
                <h2 class="text-center"> Bicycle Crash Data Heat Map 2004-2015</h2>
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
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

