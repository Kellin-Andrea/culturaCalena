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
        <h3 class="widget-title"><?php echo i18n::__('music') ?></h3>
        <div class="textwidget">
          <p id="mascara">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">



            <ol class="carousel-indicators">
              <?php foreach ($objMusic as $key => $dato): ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key ?>"></li>
<?php endforeach ?>
            </ol>

            <div class="carousel-inner" role="listbox">

<?php foreach ($objMusic as $key => $dato) : ?>
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
            Dado que toda cultura conocida ha tenido alguna forma de manifestación musical, la historia de la música abarca a todas las sociedades y épocas, y no se limita, como ha venido siendo habitual a Occidente, donde se ha utilizado la expresión "historia de la música" para referirse a la historia de la música europea y su evolución en el mundo occidental.

            La música de una cultura está estrechamente relacionada con otros aspectos de la cultura, como la organización económica, el desarrollo técnico, la actitud de los compositores y su relación con los oyentes, las ideas estéticas más generalizadas de cada comunidad y la visión acerca de la función del arte en la sociedad, así como las variantes biográficas de cada autor.
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


