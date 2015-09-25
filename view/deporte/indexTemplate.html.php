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
<div class="spacer-big"></div>
<div class="container">
  <div class="row">

    <div class="col-md-6">
      <div class="panel widget widget_text panel-first-child" id="panel-7-3-1-0">	
        <div class="textwidget"></div>
      </div>
      <div class="panel panel-grid widget widget_black-studio-tinymce panel-last-child" id="pane">
        <h3 class="widget-title"><?php echo i18n::__('Sport') ?></h3>
        <div class="textwidget">
          <p id="mascara">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">



            <ol class="carousel-indicators">
              <?php foreach ($objSport as $key => $dato): ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key ?>"></li>
<?php endforeach ?>
            </ol>

            <div class="carousel-inner" role="listbox">

<?php foreach ($objSport as $key => $dato) : ?>
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
            La historia del deporte se remonta a miles de años atrás. Ya en el año 4000 a.C. se piensa que podían ser practicados por la sociedad china, ya que han sido encontrados diversos utensilios que llevan a pensar que realizaban diferentes tipos de deporte. También los hombres primitivos practucaban el deporte, no con herramientas, pero sí en sus tareas diarias; corrían para escapar de los animales superiores, luchaban contra sus enemigos y nadaban para desplazarse de un lugar a otro a través de los ríos.
          </p>
        </div>
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