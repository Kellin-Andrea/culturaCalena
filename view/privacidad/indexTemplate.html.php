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
          <span class="icon-box__subtitle"><?php echo i18n::__('welcome');
        echo '<br>';
        echo session::getInstance()->getUserName(); ?></span>
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
      <div class="panel widget widget_text panel-first-child" id="panel-7-3-0-0">	
        <div class="textwidget"></div>
      </div>
      <div class="panel panel-grid widget widget_black-studio-tinymce panel-last-child" id="panel">
        <h3 class="widget-title"><?php echo i18n::__('Privacy and policy') ?></h3>
        <div class="textwidget">
          <p>Esta Política de Privacidad rige la manera en la que recoge Cultura Caleña, 
            utiliza, mantiene y divulga la información recogida de los usuarios (cada uno, un "Usuario") 
            de la página web http://calicultural.com ("Sitio").</p><br>

          <h4>Información de identificación Personal</h4>
          <p>
            Podemos recopilar información de identificación personal de los usuarios en una variedad de maneras, 
            incluyendo, pero no limitado a, cuando los usuarios visitan nuestro sitio, registrarse en el sitio, 
            llenar un formulario, y en relación con otras actividades , servicios, funciones o recursos que ponemos a disposición en nuestro Sitio.
            Los usuarios pueden pedir, según sea apropiado, nombre, dirección de correo electrónico, 
            dirección postal, número de teléfono. Los usuarios pueden, sin embargo, visitar nuestro sitio de forma anónima. 
            Vamos a recoger información de identificación personal de los usuarios sólo si voluntariamente presentar 
            esa información a nosotros. Los usuarios siempre pueden negarse a suministrar información de identificación personal, 
            excepto que puede evitar que la participación en determinadas actividades relacionadas con el sitio.</p>

          <h4>Información de identificación no personal</h4>
          <p>
          Podemos recopilar información de identificación no personal sobre los usuarios cuando interactúan con nuestro sitio. 
          Información de identificación no personal puede incluir el nombre del navegador, el tipo de equipo e información 
          técnica sobre los usuarios mediante la conexión a nuestro sitio, tales como el sistema operativo y los proveedores 
          de servicios de Internet utilizados y otra información similar.
          </p>
          
          <h4>Cookies del navegador Web</h4>
          <p>
          Nuestro sitio puede utilizar "cookies" para mejorar la experiencia del usuario. El navegador web del usuario coloca cookies en su disco duro para propósitos de registro y, a veces para rastrear información sobre ellos. El usuario puede optar por configurar su navegador para rechazar las cookies, o para que le avise cuando se envíen cookies. Si lo hacen, tenga en cuenta que algunas partes del sitio pueden no funcionar correctamente.
          </p>
          
          <h4>Cómo utilizamos la información recopilada</h4>
          <p>
          Cultura Caleña puede recopilar y utilizar los usuarios información personal para los siguientes fines:
          </p>
          <h6>Para ejecutar y operar nuestro Sitio</h6>
          <p>
          Es posible que tengamos la información de su contenido de la pantalla en el sitio correctamente.
          </p>
          <h6>Para mejorar el servicio al cliente</h6>
          <p>
          La información que usted proporcione nos ayuda a responder a sus solicitudes de servicio al cliente 
          y las necesidades de apoyo de manera más eficiente.
          </p>
          <h6>Para personalizar la experiencia del usuario</h6>
          <p>
          Podemos utilizar la información en conjunto para comprender cómo nuestros usuarios como grupo, 
          utilizan los servicios y recursos ofrecidos en nuestro Sitio.
          </p>
          <h6>Para mejorar nuestro sitio</h6>
          Podemos usar información que usted proporciona para mejorar nuestros productos y servicios.
          <h6>Para enviar correos electrónicos periódicos</h6>
          <p>
          Podemos utilizar la dirección de correo electrónico para enviar la información de usuario y 
          las actualizaciones correspondientes a su orden. También se puede utilizar para responder a 
          sus consultas, preguntas, y / u otras solicitudes.
          </p>
          <h6>¿Cómo protegemos su información?</h6>
          <p>
          Adoptamos las prácticas de recopilación de datos adecuado, almacenamiento y procesamiento y 
          las medidas de seguridad para proteger contra el acceso no autorizado, alteración, divulgación o 
          destrucción de su información personal, nombre de usuario, contraseña, información de transacciones y 
          los datos almacenados en nuestro Sitio.
          </p>
          <h4>Compartir su información personal</h4>
          <p>
          Nosotros no vendemos, comerciamos, ni alquilamos la informacion de los usuarios ni identificacion
          personal a terceros. Podemos compartir información demográfica genérica no vinculada a ninguna 
          información de identificación personal con respecto a los visitantes y usuarios con nuestros socios 
          comerciales, afiliados y anunciantes de confianza para los fines antes mencionados.
          </p>
          <h4>Boletines electrónicos</h4>
          <p>
          Si el Usuario decide optar en nuestra lista de correo, recibirán correos electrónicos que 
          pueden incluir noticias de la compañía, actualizaciones, información del producto o servicio 
          relacionado, etc. Si en algún momento el usuario desea dejar de recibir futuros correos electrónicos, 
          incluimos detallada instrucciones para darse de baja en la parte inferior de cada correo electrónico o 
          Usuario puede ponerse en contacto con nosotros a través de nuestro Sitio.
          </p>
          <h4>Publicidad</h4>
          <p>
          Los anuncios que aparecen en nuestro sitio pueden ser entregados a los Usuarios por los 
          socios de publicidad, que pueden establecer cookies. Estas cookies permiten al servidor 
          de anuncios para reconocer su equipo cada vez que le envían una publicidad en línea para 
          recopilar información de identificación personal sobre usted o no otras personas que utilizan 
          el ordenador. Esta información permite a las redes de anuncios, entre otras cosas, 
          ofrecer anuncios que ellos creen que será de mayor interés para usted. 
          Esta política de privacidad no cubre el uso de cookies por parte de anunciantes.
          </p>
          <h4>Google Adsense</h4>
          <p>
          Algunos de los anuncios pueden ser servidos por Google. Google utiliza la cookie de DART 
          le permite servir anuncios a los usuarios basados ​​en su visita a nuestro sitio y otros sitios en Internet. 
          DART utiliza "información no personal identificable" y NO seguimiento de información personal sobre usted, 
          como su nombre, dirección de correo electrónico, dirección física, etc Usted puede optar por el 
          uso de la cookie de DART a través del anuncio de Google y la red de contenido privacidad política 
          en http://www.google.com/privacy_ads.html
          </p>
          <h4>Cumplimiento de línea ley de protección de la privacidad de los niños</h4>
          <p>
          Proteger la privacidad de los más jóvenes es especialmente importante. Por esa razón, 
          nunca recogemos ni mantenemos información en nuestro sitio de aquellas personas que sabemos 
          son menores de 13 años, y ninguna parte de nuestro sitio está estructurado para atraer a menores de 13.
          </p>
          <h4>Cambios en esta política de privacidad</h4>
          <p>
          Cultura Caleña tiene la facultad de actualizar esta política de privacidad en cualquier momento. 
          Cuando lo hacemos, vamos a publicar una notificación en la página principal de nuestro sitio, 
          revisar la fecha de actualización en la parte inferior de esta página. Animamos a los usuarios 
          a comprobar con frecuencia esta página para cualquier cambio de mantenerse informados acerca de 
          cómo estamos ayudando a proteger la información personal que recopilamos. Usted reconoce y 
          acepta que es su responsabilidad revisar esta política de privacidad periódicamente y 
          tomar conciencia de las modificaciones.
          </p>
          <h4>Su aceptación de estos términos</h4>
          <p>
          Al utilizar este sitio, usted expresa su aceptación de esta política. 
          Si usted no está de acuerdo con esta política, por favor no utilice nuestro Sitio. 
          Su uso continuado del Sitio tras la publicación de cambios a esta política será considerado 
          su aceptación de dichos cambios.
          </p>
          <h4>Cómo ponerse en contacto con nosotros</h4>
          <p>
          Si usted tiene alguna pregunta sobre esta Política de Privacidad, las prácticas de este sitio, 
          o sus relaciones con este sitio, por favor póngase en contacto con nosotros.

          Este documento fue actualizada el 11 de junio 2015</p>
          
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

        <?php if (session::getInstance()->isUserAuthenticated() === false): ?>
            
            <li><a href="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'index') ?>" class="link1"><?php echo i18n::__('login') ?></a></li>
            
            <?php else:?>

            <li><a href="<?php echo routing::getInstance()->getUrlWeb('pqrs', 'insert') ?>" class="link1"><?php echo i18n::__('feedback') ?></a></li>
         
            <?php endif?>


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


