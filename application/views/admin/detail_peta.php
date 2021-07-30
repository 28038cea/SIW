<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maps error</title>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
 
    <!-- <link href="<?=base_url()?>assets/leaflet/leaflet.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>

    <style type="text/css">
    .user{
        padding:5px;
        margin-bottom: 5px;
    }
    #mapid { height: 480px; }
    </style>
</head>
<body>
    <!--Test -->
    <div id="test">
        <a href="<?=base_url('home')?>"><h2>LOGO</h2>
        <div class="list-group">
            <a href="#" class="list-group-item">1</a>
            <a href="#" class="list-group-item">2</a>
        </div>
    </div>
    <!--/Test -->

    <!--Normale contenuto di pagina-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Error Maps</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="mapid">
                </div>
            </div>
        </div>
    </div>
    <!--Normale contenuto di pagina-->

    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailTitle">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="detailBody">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <!-- <script src="<?=base_url()?>assets/js/BootSideMenu.js"></script> -->
    <!-- <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script> -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>

    <script type="text/javascript">
    // $('#test').BootSideMenu({side:"left", autoClose:false});

    $('#detailModal').on('hidden.bs.modal', function () {
        location.reload();
    });

    var map = L.map('mapid').setView([-8.337392, 115.182068], 15);
    var base_url="<?=base_url()?>";

    // create custom icon
    iconClicked = L.icon({
        iconUrl: base_url + 'assets/marker-icon-2x-custom.png'
    });


    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    }).addTo(map);

    console.log(<?=  json_encode($lokasi) ?>);
    latlng = [
        <?=  json_encode($lokasi['lat']) ?>,
        <?=  json_encode($lokasi['lng']) ?>
    ];
    options = {
        'title': <?=  json_encode($lokasi['title']) ?>
    };
    body = <?=  json_encode($lokasi['body']) ?>;
    var marker = L.marker(latlng, options).addTo(map)
    .bindPopup(body);
    // $.getJSON(base_url+"assets/geojson/map.geojson", function(data){
    //     geoLayer = L.geoJson(data,{
    //         style : function(feature) {
    //             return{
    //                 fillOpacity: 0.8,
    //                 weigh: 1,
    //                 opacity: 1,
    //                 color:"#58c5d1"
    //             };
    //         },
    //         onEachFeature: function(feature, layer){
    //             var latt = parseFloat(feature.properties.latitude);
    //             // layer.on({
    //             //     click: whenClicked
    //             // });
    //         }
            
    //     }).addTo(map);
    // });

    function whenClicked(e) {
        this.setIcon(iconClicked);

        lat = e.latlng.lat;
        lng = e.latlng.lng;

        query = {
            lat: lat,
            lng: lng
        };

        // $.getJSON(base_url + "home/getDetails", query, function(data) {
        //     $('#detailTitle').html(data.title);
        //     $('#detailBody').html(data.body);
        //     $('#detailModal').modal('show');
        // });
    }
    </script>
</body>
</html>
