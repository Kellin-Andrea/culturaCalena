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


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">



            <ol class="carousel-indicators">
              <?php foreach ($objSlider as $key => $dato): ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key ?>"></li>
              <?php endforeach ?>
            </ol>

            <div class="carousel-inner" role="listbox">

              <?php foreach ($objSlider as $key => $dato) : ?>
                <div class="item <?php echo $key === 0 ? 'active' : '' ?>">
                  <img src="<?php echo routing::getInstance()->getUrlImgSlider($dato->imagen) ?>"   class="img-responsive">
                  <div class="carousel-caption">
                 
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

<div class="spacer-big"></div>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="panel widget widget_text panel-first-child" id="panel-7-3-0-0">	
        <div class="textwidget"></div>
      </div>
      <div class="panel panel-grid widget widget_black-studio-tinymce panel-last-child" id="panel">
        <h3 class="widget-title"><?php echo i18n::__('know more here') ?></h3>
        <div class="textwidget">
          <p>
            <img src="<?php echo routing::getInstance()->getUrlImg('cultura.png') ?>"> 
          </p>
          <h5>
            <span style="color: #006666"><br/><span class="icon-container"><span class="fa fa-check"></span></span></span> 
            <span style="color: #0000CC"><a href="<?php echo routing::getInstance()->getUrlWeb('danza', 'index') ?>" class="link1"><?php echo i18n::__('dance') ?> </a></span>
          </h5>
          <p>
            El Baile es la acción o manera de bailar. Se trata de la ejecución de movimientos al ritmo de la música que permite expresar sentimientos y emociones. Se estima que la danza fue una de las primeras manifestaciones artísticas de la historia de la humanidad.



          </p>
          <h5>
            <span style="color: #006666"><br/><span class="icon-container"><span class="fa fa-check"></span></span></span> 
            <span style="color: #0000CC"><a href="<?php echo routing::getInstance()->getUrlWeb('deporte', 'index') ?>" class="link1"><?php echo i18n::__('Sport') ?> </a></span>
          </h5>
          <p>
            Se denomina deporte a la actividad física pautada conforme a reglas y que se practica con finalidad recreativa, profesional o como medio de mejoramiento de la salud.
            El deporte descrito bajo estas circunstancias tiene un amplio historial dentro de la historia humana.


          </p>
          <h5>
            <span style="color: #006666"><br/><span class="icon-container"><span class="fa fa-check"></span></span></span> 
            <span style="color: #0000CC"><a href="<?php echo routing::getInstance()->getUrlWeb('musica', 'index') ?>" class="link1"><?php echo i18n::__('Music') ?> </a></span>
          </h5>
          <p>
            Es más fácil sentirla y reproducirla que explicarla o definirla. Todos entendemos qué es la música, pero ¿cuántos pueden poner en palabras cuáles son sus características esenciales o aquello que le da sentido?
            Puede decirse que la música es el arte que consiste en dotar a los sonidos y los silencios de una cierta organización. 



          </p>

          <h5>
            <span style="color: #006666"><br/><span class="icon-container"><span class="fa fa-check"></span></span></span> 
            <span style="color: #0000CC"><a href="<?php echo routing::getInstance()->getUrlWeb('teatro', 'index') ?>" class="link1"><?php echo i18n::__('Theater') ?> </a></span>
          </h5>
          <p>
            El teatro forma parte del grupo de las artes escénicas. Su desarrollo está vinculado con actores que representan una historia ante una audiencia. Este arte, por lo tanto, combina diversos elementos, como la gestualidad, el discurso, la música, los sonidos y la escenografía.


          </p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel widget widget_text panel-first-child" id="panel-7-3-1-0">	
        <div class="textwidget"></div>
      </div>
      <div class="panel panel-grid widget widget_black-studio-tinymce panel-last-child" id="pane">
        <h3 class="widget-title"><?php echo i18n::__('about') ?></h3>
        <div class="textwidget">
          <p>
            <img src="<?php echo routing::getInstance()->getUrlImg('cali.jpg') ?>"> 
          </p>
          <p>
            La capital del valle del cauca aparte de ser uno de los más importantes centros industriales y comerciales del país, es conocida como la ciudad más rumbera del mundo, Si escucha salsa, si las mujeres son hermosas, si el clima lo mantiene con ganas de pasarla bien y la rumba lo contagia…“usted esta en Cali para que vea”. Así le da la bienvenida una de las canciones e himnos de esta importante ciudad, centro de la principal región azucarera y uno de los más importantes centros industriales y comerciales del país.
            Es llamada la “sucursal del cielo” por el olor a rumba y alegría que se impregna cuando se pisa la capital del Valle. “Cali es Cali…lo demás es loma” es otro lema de los caleños para empapar a la gente que visita esta bella ciudad de salsa, fiesta y civismo, y más aún cuando se está en plena Feria de Cali. 
            La bella Cali está localizada al suroccidente colombiano a nueve horas, por tierra, de Bogotá y a tres horas del Océano Pacífico por esta misma vía. Por encontrarse cerca de la Cordillera Occidental tiene suaves brisas y una temperatura que oscila entre los 23 y 28 grados centígrados, es por esto que el clima de Cali es uno de los factores, sin ser el único, para ser visitada constantemente. 
            La sucursal del cielo cuenta con aproximadamente 2.500.000 habitantes. Cali limita por el Norte con Yumbo, por el Occidente Dagua y Buenaventura, por el Sur Jamundí, por el Oriente con Palmira, Candelaria y el Departamento del Cauca. Está bañada por los ríos Aguacatal, Cali, Jamundí, Cañaveralejo, Lili, Meléndez, Pance y Cauca. Cuenta con los siguientes pisos térmicos: cálido, medio, frío y páramo. </p>

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