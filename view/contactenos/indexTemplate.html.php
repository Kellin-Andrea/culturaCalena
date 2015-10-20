<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\config\configClass as config ?>
<?php
use mvc\request\requestClass as request ?>
<?php
use mvc\session\sessionClass as session ?>

<header>
  <?php view::includePartial('homepage/menuPrincipal') ?>
</header>


<div class="spacer-big"></div>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="panel widget widget_text panel-first-child" id="panel-7-3-0-0">	
        <div class="textwidget"></div>
      </div>
      <div class="panel panel-grid widget widget_black-studio-tinymce panel-last-child" id="panel">
        <h3 class="widget-title"><?php echo i18n::__('contact') ?></h3>
        <div class="textwidget">
          <?php foreach ($objContacto as $dato): ?>
          <i class="glyphicon glyphicon-user"></i> <?php echo i18n::__('name') ?>: <?php echo $dato->nombre?> <?php echo $dato->apellido?> <br>
          <i class="glyphicon glyphicon-envelope"></i> <?php echo i18n::__('email') ?>: <?php echo $dato->correo?>         
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>


<script>

  function mostrarGoogleMaps()
  {
    //Creamos el punto a partir de las coordenadas:
    var punto = new google.maps.LatLng(3.427286617066255, -76.50347367070009);

    //Configuramos las opciones indicando Zoom, punto(el que hemos creado) y tipo de mapa
    var myOptions = {
      zoom: 15, center: punto, mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    //Creamos el mapa e indicamos en qué caja queremos que se muestre
    var map = new google.maps.Map(document.getElementById("mostrarMapa"), myOptions);

    //Opcionalmente podemos mostrar el marcador en el punto que hemos creado.
    var marker = new google.maps.Marker({
      position: punto,
      map: map,
      title: "Título del mapa"});
  }


</script>


<body  onload="mostrarGoogleMaps()">

  <div id="mostrarMapa" > </div>
</body>






<div class="panel-grid" id="pg">
  <?php view::includePartial('homepage/relleno') ?>
</div>
<footer>
  <?php view::includePartial('homepage/footer') ?>
</footer>