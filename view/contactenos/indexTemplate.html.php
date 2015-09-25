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
    <?php view::includePartial('homepage/menuPrincipal')?>
</header>
    

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
       var map = new google.maps.Map(document.getElementById("mostrarMapa"),  myOptions);
 
       //Opcionalmente podemos mostrar el marcador en el punto que hemos creado.
       var marker = new google.maps.Marker({
           position:punto,
           map: map,
           title:"Título del mapa"});
}
 

</script>


<body  onload="mostrarGoogleMaps()">

<div id="mostrarMapa" > </div>
</body>



<div class="spacer-big"></div>
<div class="container">
    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-grid widget widget_text panel-last-child">
                <h3 class="widget-title"><?php echo i18n::__('contact') ?></h3
            </div>
            <form method="post" class="wpcf7-form" novalidate="novalidate">
                <div class="row">
                    <div class="col-xs-12  col-sm-4">
                        <span class="wpcf7-form-control-wrap your-name">
                            <input type="text" name="name" value="" size="40"  placeholder="Name"/>
                        </span><br/>
                        <span class="wpcf7-form-control-wrap your-email">
                            <input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email" placeholder="E-mail address"/>
                        </span><br/>
                        <span class="wpcf7-form-control-wrap your-subject">
                            <input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text" placeholder="Subject"/>
                        </span>
                    </div>
                    <div class="col-xs-12  col-sm-8">
                        <span class="wpcf7-form-control-wrap your-message">
                            <textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" placeholder="Message"></textarea>
                        </span><br/>
                        <input type="submit" value="SEND MESSAGE" class="wpcf7-form-control wpcf7-submit btn btn-primary"/>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>
</div>


<div class="panel-grid" id="pg">
  <?php view::includePartial('homepage/relleno')?>
</div>
<footer>
<?php view::includePartial('homepage/footer')?>
  </footer>