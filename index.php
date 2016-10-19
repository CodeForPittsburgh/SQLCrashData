<!DOCTYPE html>
<html lang="en">
    <head>
        <title>AC Bike Crash Data</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="CodeForPittsburgh">
        <meta name="author" content="Mark Howe">
        <link rel="icon" href="img/myicon.png">
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyCb3EA0lfao273s6Jkp8tfTzJfUSkswpOw&libraries=visualization"></script>
        <script src="js/crashmap.js"></script>
        <script src ="js/BikeRentalLocation.js"></script>


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
                <h2 class="text-center">AC Bicycle Crash Data 2004-2015</h2>
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
                            Rental Locations <img title="Rentals" src="./img/bicycle.ico" alt="Bike">
                            <br>
                            <b>Biking trails colors show you the type of bicycling paths.</b>
                            <br>
                            Dark green: Trails that don't have auto traffic.
                            <br>
                            Green: Dedicated lanes are roads that are shared with cars and have a separate bike lane.
                            <br>
                            Dotted green line: Bicycle friendly roads are roads that don't have a bike lane but are recommended for cyclists.
                            <br>
                            Brown: Unpaved trails are off-road dirt paths.
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>

