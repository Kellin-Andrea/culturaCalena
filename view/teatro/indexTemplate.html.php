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
      <div class="panel widget widget_text panel-first-child" id="panel-7-3-1-0">	
        <div class="textwidget"></div>
      </div>
      <div class="panel panel-grid widget widget_black-studio-tinymce panel-last-child" id="pane">
        <h3 class="widget-title"><?php echo i18n::__('Theater') ?></h3>
        <div class="textwidget">
          <p id="mascara">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">



            <ol class="carousel-indicators">
              <?php foreach ($objTeatro as $key => $dato): ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key ?>"></li>
              <?php endforeach ?>
            </ol>

            <div class="carousel-inner" role="listbox">

              <?php foreach ($objTeatro as $key => $dato) : ?>
                <div class="item <?php echo $key === 0 ? 'active' : '' ?>">
                  <img src="<?php echo routing::getInstance()->getUrlImgUpload($dato->imagen) ?>" style="height: 300px"  class="img-responsive">
                  <div class="carousel-caption">
                    <h2 id="colorLetra"><?php echo $dato->nombre ?></h2>
                    <h4 id="colorLetra">Valor Evento: $<?php echo $dato->costo ?></h4>
                    <p id="colorLetra"><?php echo $dato->descripcion ?></p>
                  </div>            
                </div>
              <?php endforeach ?>
              <?php // endif  ?>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          </p>
          <p>
            Su origen se remonta a mediados del siglo XVI. El teatro colombiano sólo se desarrollaría hasta el siglo XIX.
            Se destaca en varios documentos que el teatro llegó a Colombia en los tiempo de la colonia española entre 1560 y 1820, sin embargo sólo hasta el siglo XIX se puede hablar de teatro colombiano, el cual se desarrolló en Bogotá en el edificio ‘Coliseo’ hacia 1830.
            Fueron obras neoclásicas y costumbristas las que los dramaturgos españoles empezaron a estrenar a esos primeros públicos del ‘Coliseo’, en donde como primeros actores surgieron personajes como Luis Vargas Tejada. Se destaca como curiosidad, que en los inicios los hombres interpretaban los papeles femeninos, y eso sólo cambió hasta que en 1935 se creó la "Compañía mixta".
            Pero fue solo hasta el siglo XX que el teatro se extendió por Colombia llegando a Cali, Medellín, Cartagena y Popayán. En este momento surgieron nuevos actores nacionales, uno de ellos Luis Enrique Osorio, quien es considerado el fundador del teatro colombiano. Ya para 1950, surgieron compañías teatrales como el TEC, el Teatro Popular de Bogotá, La Mamma de Bobotá, "La Candelaria", entre otras.
            Fue justamente de estas compañías de donde salieron grandes maestros del teatro  como Enrique Buenaventura, Carlos José Reyes o Antonio Montaña.
            Ahora el teatro colombiano goza de identidad mundial y sus obras recorren el mundo entero.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="panel-grid" id="pg">
  <?php view::includePartial('homepage/relleno') ?>
</div>
<footer>
  <?php view::includePartial('homepage/footer') ?>
</footer>


