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
            <div class="widget  widget-icon-box">	
                <div class="icon-box" >
                    <a class="fa fa-user-plus" href="<?php echo routing::getInstance()->getUrlWeb('datoUsuario', 'insert') ?>"></a>
                </div>
            </div>
            <div class="widget  widget-icon-box">	
                <div class="icon-box">
                    <a class="fa fa-user" href="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'index') ?>"></a>


                </div>
            </div>
            <div class="widget  widget-icon-box">	


                <div class="icon-box">
                    <!-- Button trigger modal -->
                    <div type="icon-box" class="fa fa-globe" data-toggle="modal" data-target="#myModal"></div>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('language')?></h4>
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
                    <li class="current-menu-item"><a href="<?php echo routing::getInstance()->getUrlWeb('homepage', 'index') ?>"><?php echo i18n::__('homePage')?></a></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb('acerca', 'index') ?>"><?php echo i18n::__('about')?></a></li>
                    <li class="menu-item-has-children">
                        <a href="services.html">OUR SERVICES</a>
                        <ul class="sub-menu">
                            <li><a href="services-content/construction-management.html">Construction Management</a></li>
                            <li><a href="services-content/design-and-build.html">Design and Build</a></li>
                            <li><a href="services-content/kitchen-remodeling.html">Kitchen Remodeling</a></li>
                            <li><a href="services-content/tiling-and-painting.html">Tiling and Painting</a></li>
                            <li><a href="services-content/condo-remodeling.html">Condo Remodeling</a></li>
                            <li><a href="services-content/hardwood-flooring.html">Hardwood Flooring</a></li>
                            <li><a href="services.html">All Services</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">ABOUT US</a></li>
                    <li><a href="blog.html">BLOG</a></li>
                    <li><a href="shop.html">SHOP</a></li>
                    <li><a href="contact-us.html">CONTACT</a></li>
                </ul>	
            </div>
        </div>
    </div>
    <div class="container">
        <div class="header-widgets  hidden-md  hidden-lg">
            <div class="widget  widget-icon-box">	
                <div class="icon-box">
                    <a class="fa fa-user-plus" href="<?php echo routing::getInstance()->getUrlWeb('datoUsuario', 'insert') ?>"></a>
                    <div class="icon-box__text">
                        <h4 class="icon-box__title"></h4>
                        <span class="icon-box__subtitle"></span>
                    </div>
                </div>
            </div>
            <div class="widget  widget-icon-box">	
                <div class="icon-box">
                    <a class="fa fa-user" href="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'index') ?>"></a>

                </div>
            </div>
           <div class="widget  widget-icon-box">	


                <div class="icon-box">
                    <!-- Button trigger modal -->
                    <div type="icon-box" class="fa fa-globe" data-toggle="modal" data-target="#myModal"></div>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('language')?></h4>
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
                <a class="social-icons__link" href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                <a class="social-icons__link" href="#" target="_blank"><i class="fa fa-youtube"></i></a>
            </div>	
        </div>
    </div>
</header>


<div class="jumbotron  jumbotron--with-captions">
    <div class="carousel  slide  js-jumbotron-slider" id="headerCarousel" data-interval="5000">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="<?php echo routing::getInstance()->getUrlImg('img0.jpg') ?>">
                <div class="container">

                </div>
            </div>
            <div class="item">
                <img src="<?php echo routing::getInstance()->getUrlImg('img1.png') ?>">
                <div class="container">

                </div>
            </div>
            <div class="item ">
                <img src="<?php echo routing::getInstance()->getUrlImg('img2.jpg') ?>">
                <div class="container">

                </div>
            </div>
            <div class="item">
                <img src="<?php echo routing::getInstance()->getUrlImg('img3.png') ?>">
                <div class="container">

                </div>
            </div>
            <div class="item">
                <img src="<?php echo routing::getInstance()->getUrlImg('img4.jpg') ?>">
                <div class="container">

                </div>
            </div>

            <div class="item">
                <img src="<?php echo routing::getInstance()->getUrlImg('img5.jpg') ?>">
                <div class="container">

                </div>
            </div>
            <div class="item">
                <img src="<?php echo routing::getInstance()->getUrlImg('img6.jpg') ?>">
                <div class="container">

                </div>
            </div>
            <div class="item">
                <img src="<?php echo routing::getInstance()->getUrlImg('img7.jpg') ?>">
                <div class="container">

                </div>
            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#headerCarousel" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right carousel-control" href="#headerCarousel" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>





<div class="spacer-big"></div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel widget widget_text panel-first-child" id="panel-7-3-0-0">	
                <div class="textwidget"></div>
            </div>
            <div class="panel panel-grid widget widget_black-studio-tinymce panel-last-child" id="panel">
                <h3 class="widget-title"><?php echo i18n::__('know more here')?></h3>
                <div class="textwidget">
                    <h5>
                        <span style="color: #006666"><br/><span class="icon-container"><span class="fa fa-check"></span></span></span> 
                        <span style="color: #0000CC"><?php echo i18n::__('Dance')?></span>
                    </h5>
                    <p>
                        We have a proven record of accomplishment and are a reputable company in the United States. We ensure that all projects 
                        are done with utmost professionalism using quality materials while offering clients the support and accessibility.
                    </p>
                    <h5>
                        <span style="color: #006666"><br/><span class="icon-container"><span class="fa fa-check"></span></span></span> 
                        <span style="color: #0000CC"><?php echo i18n::__('Sport')?></span>
                    </h5>
                    <p>
                        For us, honesty is the only policy and we strive to complete all projects with integrity, not just with our clients, 
                        but also our suppliers and contractors. With thousands of successful projects under our belt, we are one of the most 
                        trusted construction companies in US
                    </p>
                    <h5>
                        <span style="color: #006666"><br/><span class="icon-container"><span class="fa fa-check"></span></span></span> 
                        <span style="color: #0000CC"><?php echo i18n::__('Music')?></span>
                    </h5>
                    <p>
                        We commit ourselves to complete all projects within the timeline set with our clients. We use the best of technology and 
                        tools to ensure that all jobs are done quickly but also giving attention to details and ensuring everything is done correctly.
                    </p>

                    <h5>
                        <span style="color: #006666"><br/><span class="icon-container"><span class="fa fa-check"></span></span></span> 
                        <span style="color: #0000CC"><?php echo i18n::__('Theater')?></span>
                    </h5>
                    <p>
                        We commit ourselves to complete all projects within the timeline set with our clients. We use the best of technology and 
                        tools to ensure that all jobs are done quickly but also giving attention to details and ensuring everything is done correctly.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel widget widget_text panel-first-child" id="panel-7-3-1-0">	
                <div class="textwidget"></div>
            </div>
            <div class="panel panel-grid widget widget_black-studio-tinymce panel-last-child" id="pane">
                <h3 class="widget-title"><?php echo i18n::__('about')?></h3>
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
                    <h5><strong><a href="about-us">READ MORE</a></strong></h5>
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
                    <div class="motivational-text">
                        Siempre tus eventos mas cerca de ti conocelos aqui en tu portal cultura caleña.
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
</div><!-- end of .boxed-container -->

