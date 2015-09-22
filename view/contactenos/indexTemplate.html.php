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
                        <span class="icon-box__subtitle"><?php echo i18n::__('register')?></span> 
                    </div>
                </div>
            <?php else: ?>

<?php endif; ?>


<?php if (session::getInstance()->isUserAuthenticated() === true and session::getInstance()->hasCredential('admin')): ?>
                <div class="widget  widget-icon-box" >	
                    <div class="icon-box" >
                        <a id="buton" href="<?php echo routing::getInstance()->getUrlWeb('admin', 'index') ?>" class="fa fa-tasks"></a>
                        <span class="icon-box__subtitle"><?php echo i18n::__('adminPanel')?></span> 
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
                        <span class="icon-box__subtitle"><?php echo i18n::__('login')?></span>
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
                    <span class="icon-box__subtitle"><?php echo i18n::__('language1')?></span>
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
    

<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>

</header>
<script>

    function mostrarGoogleMaps()
   {
        //Creamos el punto a partir de las coordenadas:
       var punto = new google.maps.LatLng(3.420956, -76.496750);
 
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
                            <input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text" placeholder="Your Name"/>
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


