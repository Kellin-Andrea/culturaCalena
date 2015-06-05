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
      var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

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