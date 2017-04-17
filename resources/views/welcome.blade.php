<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Stasiun Geofisika Angkasapura - Jayapura</title>
        <link rel="stylesheet" href="{{ asset('materialize/css/') }}/materialize.min.css">
        <link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/dist/css/weather-icons.min.css">
    </head>
    <body>
        <header>
            <nav>
                <div class="nav-wrapper teal">
                    <a href="#" class="brand-logo " style="font-family: sofia; padding-left: 25px;  ">Stageof Angkasapura</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Berita</a></li>
                        <li><a href="#">SeismoTalk</a></li>
                        <li><a href="#">Data</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="row">
            <div class="col s12">
                <h5 class="center-align grey-text text-darken-3"> <i class="wi wi-earthquake teal-text "></i> Gempabumi terkini di Papua</h5>
                <div class="divider"></div>
                <div class="section">
                    <div id="map" style="width:100%;height:500px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s3">
                <div class="center promo promo-example ">
                    <img src="{{ asset('images') }}/earthquake-home.png"  width="200" height="200" alt="">
                    <p class="promo-caption">Gempabumi</p>
                    <p class="light center">
                        Ketahui informasi gempabumi yang terjadi di Papua dan sekitarnya lebih detail disini.
                    </p>
                </div>
            </div>
            <div class="col s3">
                <div class="center promo promo-example scrollspy">
                    <img src="{{ asset('images') }}/magnet.png"  width="200" height="200" alt="">
                    <p class="promo-caption">Magnetbumi</p>
                    <p class="light center">
                        Pengamatan magnetbumi menggunakan sensor LEMI-018 selama 24 jam non stop.
                    </p>
                </div>
            </div>
            <div class="col s3">
                <div class="center promo promo-example scrollspy">
                    <img src="{{ asset('images') }}/flash.png"  width="200" height="200" alt="">
                    <p class="promo-caption">Listrik Udara</p>
                    <p class="light center">
                        Anda membutuhkan data listrik udara untuk klaim asuransi ?, hubungi kami !.
                    </p>
                </div>
            </div>
            <div class="col s3">
                <div class="center promo promo-example scrollspy">
                    <img src="{{ asset('images') }}/raindrop.png"  width="200" height="200" alt="">
                    <p class="promo-caption">Kualitas Udara</p>
                    <p class="light center">
                        Kami mendukung BMKG menyediakan data kualitas udara yang akurat !.
                    </p>
                </div>
            </div>
        </div>
        <footer class="teal">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <div class="row">
                            <div class="col l3 s6">
                                <ul>
                                    <li><a href="" class="white-text">News</a></li>
                                    <li><a href="" class="white-text">SeismoTalk</a></li>
                                </ul>
                            </div>
                            <div class="col l3 s6">
                                <ul>
                                    <li><a href="" class="white-text">Gempabumi</a></li>
                                    <li><a href="" class="white-text">Magnetbumi</a></li>
                                    <li><a href="" class="white-text">Listrik Udara</a></li>
                                    <li><a href="" class="white-text">Kualitas Udara</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="www.bmkg.go.id">BMKG</a></li>
                            <li><a class="grey-text text-lighten-3" href="www.inatews.bmkg.go.is">InaTEWS</a></li>
                            <li><a class="grey-text text-lighten-3" href="balai5.bmkg.go.id">BBMKG V</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright teal darken-1">
                <div class="container">
                    © 2017 Copyright Stasiun Geofisika Angkasapura - Jayapura
                    <div class="grey-text text-lighten-4 right" href="#!">
                        <div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
    <script src="{{ asset('vendor/adminlte') }}/plugins/jQuery/jQuery-2.2.3.min.js"></script>
    <script>
    document.getElementById("demo").innerHTML = Date();
    </script>
    <script>
    $(document).ready(function(){
    $('.scrollspy').scrollSpy();
    });
    </script>
    <script src="{{ asset('materialize/js') }}/materialize.min.js"></script>
    <script>
    var map;
    function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
    center: { lat: -5.0, lng: 134},
    zoom: 6,
    styles: mapStyle
    });
    map.data.setStyle(styleFeature);
    // Get the earthquake data (JSONP format)
    // This feed is a copy from the USGS feed, you can find the originals here:
    //   http://earthquake.usgs.gov/earthquakes/feed/v1.0/geojson.php
    var script = document.createElement('script');
    script.setAttribute('src',
    'https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_week.geojson');
    document.getElementsByTagName('head')[0].appendChild(script);
    }
    // Defines the callback function referenced in the jsonp file.
    function eqfeed_callback(data) {
    map.data.addGeoJson(data);
    }
    function styleFeature(feature) {
    var low = [151, 83, 34];   // color of mag 1.0
    var high = [5, 69, 54];  // color of mag 6.0 and above
    var minMag = 1.0;
    var maxMag = 6.0;
    // fraction represents where the value sits between the min and max
    var fraction = (Math.min(feature.getProperty('mag'), maxMag) - minMag) /
    (maxMag - minMag);
    var color = interpolateHsl(low, high, fraction);
    return {
    icon: {
    path: google.maps.SymbolPath.CIRCLE,
    strokeWeight: 0.5,
    strokeColor: '#fff',
    fillColor: color,
    fillOpacity: 2 / feature.getProperty('mag'),
    // while an exponent would technically be correct, quadratic looks nicer
    scale: Math.pow(feature.getProperty('mag'), 2)
    },
    zIndex: Math.floor(feature.getProperty('mag'))
    };
    }
    function interpolateHsl(lowHsl, highHsl, fraction) {
    var color = [];
    for (var i = 0; i < 3; i++) {
    // Calculate color based on the fraction.
    color[i] = (highHsl[i] - lowHsl[i]) * fraction + lowHsl[i];
    }
    return 'hsl(' + color[0] + ',' + color[1] + '%,' + color[2] + '%)';
    }
    var mapStyle = [{
    'featureType': 'all',
    'elementType': 'all',
    'stylers': [{'visibility': 'off'}]
    }, {
    'featureType': 'landscape',
    'elementType': 'geometry',
    'stylers': [{'visibility': 'on'}, {'color': '#fcfcfc'}]
    }, {
    'featureType': 'water',
    'elementType': 'labels',
    'stylers': [{'visibility': 'off'}]
    }, {
    'featureType': 'water',
    'elementType': 'geometry',
    'stylers': [{'visibility': 'on'}, {'hue': '#5f94ff'}, {'lightness': 60}]
    }];
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxboE6Q1qKhSDL8HO4wHyH50-CiDUygcA&callback=initMap"></script>
</html>