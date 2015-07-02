
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

        <div id="navbar" class="navbar navbar-container">
            
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
                                        <a class="social-icons__link" href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                        <a class="social-icons__link" href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                                    </div>	
                                </div>
                            </div>
                        </header>
        </div>

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
                                
                                    <div class="panel widget widget_text panel-first-child" id="panel-7-3-0-0">	
                                        <div class="textwidget"></div>
                                    </div>
                                        <div class="textwidget">
                                            
                                        </div>
                                   
                                </div>
                                <div class="col-md-6">
                                    <div class="panel widget widget_text panel-first-child" id="panel-7-3-1-0">	
                                        <div class="textwidget"></div>
                                    </div>
                                    <div class="panel panel-grid widget widget_black-studio-tinymce panel-last-child" id="pane">
                                        <h3 class="widget-title"><?php echo i18n::__('who we are') ?></h3>
                                        <div class="textwidget">
                                            <p>
                                                <img src="<?php echo routing::getInstance()->getUrlImg('cali.jpg') ?>"> 
                                            </p>
                                            <p>
                                                MISIÓN

                                             Satisfacer  la necesidad de nuestro cliente al Impulsar, promover y estimular proyectos socioculturales, reconociendo la diversidad la valoración y protección del patrimonio cultural de la comunidad 
                                            </p>
                                            
                                            <p>
                                                VISIÓN

                                             Este portal web sea reconocido como el mejor y más completo medio virtual de difusión del patrimonio de eventos socioculturales  de la comunidad, en donde las diferentes entidades y usuarios puedan participar activamente de él.</p>
                                             
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


