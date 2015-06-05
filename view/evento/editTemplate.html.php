<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $evento = eventoTableClass::ID?>
<?php $lugar = eventoTableClass::LUGAR_LATITUD ?>
<?php $long = eventoTableClass::LUGAR_LONGITUD ?>
<?php view::includePartial('evento/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
      <h1 class="glyphicon glyphicon-star"><?php echo i18n::__('editEvent')?> <?php echo $objevento[0]->$evento ?></h1>
  </div>
<?php view::includePartial('evento/formUser', array('objevento' => $objevento, 'evento' => $evento)) ?>
</div>
<script>
  function initialize() {

  var mapOptions = {
    zoom: 16,
    panControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  var mapDiv = document.getElementById('googleMap');
  var map = new google.maps.Map(mapDiv, mapOptions);

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
      var pos = new google.maps.LatLng(<?php echo $objevento[0]->$lugar ?>, <?php echo $objevento[0]->$long ?>);

      var marker = new google.maps.Marker({
        map: map,
        position: pos,
        draggable: true,
        animation: google.maps.Animation.DROP,
      });

      /*google.maps.event.addDomListener(marker, 'dblclick', function () {
        console.log('Longitud: ' + marker.getPosition().A);
        console.log('Latitud: ' + marker.getPosition().F);
        document.getElementById('btnPosition').addEventListener("click", function () {
          alert('Longitud: ' + marker.getPosition().A + '\n' + 'Latitud: ' + marker.getPosition().F);
        });
      });*/

      document.getElementById('btnCapturarGoogleMap').addEventListener("click", function () {
        document.getElementById('googleMapLatitud').value = marker.getPosition().A;
        document.getElementById('googleMapLongitud').value = marker.getPosition().F;
        $('#googleMapBlock .fa-map-marker').addClass('fa-check');
        $('#googleMapBlock .fa-map-marker').removeClass('fa-map-marker');
      });

      map.setCenter(pos);
    });
  }
}

$(document).ready(function(){
  google.maps.event.addDomListener(window, 'load', initialize);
});
</script>