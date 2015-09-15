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


<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<div class="boxed-container">
  <div class="top">
    <div class="container">

    </div>
  </div>
</div>

<header class="header">
  <div class="container">
    <div class="logo">
      <a href="<?php echo routing::getInstance()->getUrlWeb('homepage', 'index') ?>">
        <img src="<?php echo routing::getInstance()->getUrlImg('logo.png') ?>"> 
      </a>
    </div>
    <div class="header-widgets  header-widgets-desktop">
      <?php if (session::getInstance()->isUserAuthenticated() === false): ?>
        <div class="widget  widget-icon-box" >	
          <div class="icon-box" >
            <a id="buton" href="<?php echo routing::getInstance()->getUrlWeb('datoUsuario', 'insert') ?>" class="fa fa-user-plus"></a>
            <span class="icon-box__subtitle"><?php echo i18n::__('register') ?></span> 
          </div>
        </div>
      <?php else: ?>

      <?php endif; ?>
      <?php if (session::getInstance()->isUserAuthenticated() === true and session::getInstance()->hasCredential('admin')): ?>
        <div class="widget  widget-icon-box" >	
          <div class="icon-box" >
            <a id="buton" href="<?php echo routing::getInstance()->getUrlWeb('admin', 'index') ?>" class="fa fa-tasks"></a>
            <span class="icon-box__subtitle"><?php echo i18n::__('adminPanel') ?></span> 
          </div>
        </div>
      <?php else: ?>

      <?php endif; ?>
      <?php
      session::getInstance()->isUserAuthenticated();
      session::getInstance()->hasCredential('admin');
      session::getInstance()->getUserId();
      session::getInstance()->getUserName();
      ?>



      <?php if (session::getInstance()->isUserAuthenticated() === false): ?>
        <div class="widget widget-icon-box">	
          <div class="icon-box">
            <a id="buton" class="fa fa-user" href="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'index') ?>"></a>
            <span class="icon-box__subtitle"><?php echo i18n::__('login') ?></span>
          </div>
        </div>
      <?php else: ?>


        <div class="icon-box">
          <!-- Button trigger modal -->
          <div type="icon-box" class="fa fa-arrow-down white " data-toggle="modal" data-target="#myModalPerfil"></div>
          <span class="icon-box__subtitle"><?php
            echo i18n::__('welcome');
            echo '<br>';
            echo session::getInstance()->getUserName();
            ?></span>
          <!-- Modal -->
          <div class="modal fade" id="myModalPerfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('welcome to culturaCaleña') ?></h4>
                </div>
                <div class="modal-body">
                  <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('profile', 'index') ?>"><i class="fa fa-user"></i> <?php echo i18n::__('profile') ?></a>
                  <br><a href="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <?php echo i18n::__('logout') ?></a>
                </div>

              </div>
            </div>
          </div>

        </div>

<?php endif ?>

      <div class="widget  widget-icon-box">	
        <div class="icon-box">
          <!-- Button trigger modal -->
          <div type="icon-box" class="fa fa-globe" data-toggle="modal" data-target="#myModal"></div>
          <span class="icon-box__subtitle"><?php echo i18n::__('language1') ?></span>
          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('language') ?></h4>
                </div>
                <div class="modal-body">

                  <form id="frmTraductor" action="<?php echo routing::getInstance()->getUrlWeb('homepage', 'traductor') ?>" method="POST">

                    <select name="language" onchange="$('#frmTraductor').submit()" class="col-sm-5">
                      <option <?php echo (config::getDefaultCulture() == 'es') ? 'selected' : '' ?> value="es" >Español</option>
                      <option <?php echo (config::getDefaultCulture() == 'en') ? 'selected' : '' ?>  value="en">English</option>
                    </select>
                    <input type="hidden" name="PATH_INFO" value="<?php echo request::getInstance()->getServer('PATH_INFO') ?>">
                  </form>

                </div>

              </div>
            </div>
          </div>

        </div>
      </div>


      <div class="widget  widget-social-icons">	
        <a class="social-icons__link" href="https://www.facebook.com/" target="_blank"><i class="fa  fa-facebook"></i></a>
        <a class="social-icons__link" href="https://www.twitter.com/" target="_blank"><i class="fa  fa-twitter"></i></a>
        <a class="social-icons__link" href="https://www.youtube.com/" target="_blank"><i class="fa  fa-youtube"></i></a>
      </div>	
    </div>
    <!-- Toggle Button for Mobile Navigation -->
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#buildpress-navbar-collapse">
      <span class="navbar-toggle__text">MENU</span>
      <span class="navbar-toggle__icon-bar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </span>
    </button>
  </div>
  <div class="sticky-offset js-sticky-offset"></div>
  <div class="container">
    <div class="navigation" id="menucito">
      <div class="collapse  navbar-collapse" id="buildpress-navbar-collapse">
        <ul id="menu-main-menu" class="navigation--main">
          <li class="current-menu-item"><a href="<?php echo routing::getInstance()->getUrlWeb('homepage', 'index') ?>"><?php echo i18n::__('homePage') ?></a></li>
          <li><a href="<?php echo routing::getInstance()->getUrlWeb('acerca', 'index') ?>"><?php echo i18n::__('who we are') ?></a></li>
          <li><a href="<?php echo routing::getInstance()->getUrlWeb('proyecto', 'index') ?>"><?php echo i18n::__('events') ?></a></li>
          <li><a href="<?php echo routing::getInstance()->getUrlWeb('contactenos', 'index') ?>"><?php echo i18n::__('contact') ?></a></li>
        </ul>	
      </div>
    </div>
  </div>
  <div class="container">
    <div class="header-widgets  hidden-md  hidden-lg">
      <div class="widget  widget-icon-box">	
        <div class="icon-box">
          <a id="buton" class="fa fa-user-plus" href="<?php echo routing::getInstance()->getUrlWeb('datoUsuario', 'insert') ?>"></a>
          <span class="icon-box__subtitle">Registrarse</span>
          <div class="icon-box__text">
            <h4 class="icon-box__title"></h4>
            <span class="icon-box__subtitle"></span>
          </div>
        </div>
      </div>
      <div class="widget  widget-icon-box" >	
        <div class="icon-box">
          <a id="buton" class="fa fa-user" href="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'index') ?>"></a>
          <span class="icon-box__subtitle">Iniciar Sesion</span>
        </div>
      </div>
      <div class="widget  widget-icon-box">	


        <div class="icon-box">
          <!-- Button trigger modal -->
          <div type="icon-box" class="fa fa-globe" data-toggle="modal" data-target="#myModal"></div>
          <span class="icon-box__subtitle">Idioma</span>
          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('language') ?></h4>
                </div>
                <div class="modal-body">

                  <form id="frmTraductor" action="<?php echo routing::getInstance()->getUrlWeb('homepage', 'traductor') ?>" method="POST">

                    <select name="language" onchange="$('#frmTraductor').submit()" class="col-sm-5">
                      <option <?php echo (config::getDefaultCulture() == 'es') ? 'selected' : '' ?> value="es" >Español</option>
                      <option <?php echo (config::getDefaultCulture() == 'en') ? 'selected' : '' ?>  value="en">English</option>
                    </select>
                    <input type="hidden" name="PATH_INFO" value="<?php echo request::getInstance()->getServer('PATH_INFO') ?>">
                  </form>

                </div>

              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="widget  widget-social-icons">	
        <a class="social-icons__link" href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
        <a class="social-icons__link" href="https://www.twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
        <a class="social-icons__link" href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube"></i></a>
      </div>	
    </div>
  </div>
</header>


<div class="spacer-big"></div>
<div class="container">
  <div class="row">

    <div class="col-md-6">
      <div class="panel widget widget_text panel-first-child" id="panel-7-3-1-0">	
        <div class="textwidget"></div>
      </div>
      <div class="panel panel-grid widget widget_black-studio-tinymce panel-last-child" id="pane">
        <h3 class="widget-title"><?php echo i18n::__('who we are') ?></h3>
        <div class="textwidget">
          <p>
            <img id="acerca" src="<?php echo routing::getInstance()->getUrlImg('cali.jpg') ?>"> 
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
  <div class="promobg">
    <div class="container">
      <div class="panel widget row">	
        <div class="col-md-12">
          <div class="banner" id="Menu">


            <li><a href="<?php echo routing::getInstance()->getUrlWeb('homepage', 'index') ?>" class="link1"><?php echo i18n::__('homePage') ?></a></li>

            <li><a href="<?php echo routing::getInstance()->getUrlWeb('acerca', 'index') ?>" class="link1"><?php echo i18n::__('who we are') ?></a></li>

            <li><a href="<?php echo routing::getInstance()->getUrlWeb('proyecto', 'index') ?>" class="link1"><?php echo i18n::__('events') ?></a></li>

          </div>            

          <div class="banner" id="SecMenu">

            <li><a href="<?php echo routing::getInstance()->getUrlWeb('contactenos', 'index') ?>" class="link1"><?php echo i18n::__('contact') ?></a></li>

            <li><a href="<?php echo routing::getInstance()->getUrlWeb('pqrs', 'insert') ?>" class="link1"><?php echo i18n::__('feedback') ?></a></li>

            <li><a href="<?php echo routing::getInstance()->getUrlWeb('privacidad', 'index') ?>" class="link1"><?php echo i18n::__('Privacy and policy') ?></a></li>



          </div>  

          <div class="banner" id="terMenu">
            <li><a href="#" class="link1"><?php echo i18n::__('terms of use') ?> </a></li>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<footer>

  <div class="footer-bottom">
    <div class="container">

      <div class="footer-bottom__right">
        &copy; 2015 - 2016 <strong>Cultura Caleña</strong>. All rights reserved. Cultura Caleña	
      </div>
    </div>
  </div>
</footer>


