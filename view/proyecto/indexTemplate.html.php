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
                <img src="<?php echo routing::getInstance()->getUrlImg('../../web/css/homepage/images/logo1.png') ?>"> 
            </a>
        </div>
        <div class="header-widgets  header-widgets-desktop">
            <div class="widget  widget-icon-box" >	
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
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb('acerca', 'index') ?>"><?php echo i18n::__('who we are')?></a></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb('proyecto', 'index') ?>"><?php echo i18n::__('events')?></a></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb('contactenos', 'index') ?>"><?php echo i18n::__('contact')?></a></li>
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
            <div class="widget  widget-icon-box" >	
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
                <a class="social-icons__link" href="https://www.twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
                <a class="social-icons__link" href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube"></i></a>
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

<div class="master-container">
		<div class="container">
			<div class="row">
				<main class="col-xs-12  col-md-9  col-md-push-3" role="main">
					<div class="row">
						<div class="col-md-4 page-box page-box--block">
							<a class="page-box__picture" href="services-content/design-and-build.html">
								<img width="360" height="240" src="images/demo/content/content_1.jpg" alt="Content Image" /> 	
							</a>
							<div class="page-box__content">
								<h5 class="page-box__title  text-uppercase">
									<a href="services-content/design-and-build.html">Design and Build</a>
								</h5>
								We aim to eliminate the task of dividing your project between different architecture and construction company. We are a company 
								that offers design and build services for you from initial sketches to the final construction.	
								<p><a href="services-content/design-and-build.html" class="read-more  read-more--page-box">Read more</a></p>
							</div>
						</div>
						<div class="col-md-4 page-box page-box--block">
							<a class="page-box__picture" href="services-content/tiling-and-painting.html">
								<img width="360" height="240" src="images/demo/content/content_2.jpg" alt="Content Image" />
							</a>
							<div class="page-box__content">
								<h5 class="page-box__title text-uppercase">
									<a href="services-content/tiling-and-painting.html">Tiling and Painting</a>
								</h5>
								We offer quality tiling and painting solutions for interior and exterior of residential and commercial spaces that 
								not only looks good but also lasts longer. We offer quality tiling and painting solutions for interior and exterior.	
								<p><a href="services-content/tiling-and-painting.html" class="read-more read-more--page-box">Read more</a></p>
							</div>
						</div>
						
						<div class="col-md-4 page-box page-box--block">
							<a class="page-box__picture" href="services-content/construction-management.html">
								<img width="360" height="240" src="images/demo/content/content_5.jpg" alt="Content Image" />
							</a>
							<div class="page-box__content">
								<h5 class="page-box__title text-uppercase">
									<a href="services-content/construction-management.html">Construction Management</a>
								</h5>
								We offer commitment at all levels of building project, from preparing for construction to construction management 
								services. For years, we have successfully met our client’s demand for cost effective and responsive services.	
								<p><a href="services-content/construction-management.html" class="read-more read-more--page-box">Read more</a></p>
							</div>
						</div>
					</div>	
					<div class="spacer"></div>
					<div class="row">	
						<div class="col-md-4 page-box page-box--block">
							<a class="page-box__picture" href="services-content/hardwood-flooring.html">
								<img width="360" height="240" src="images/demo/content/content_6.jpg" alt="Content Image" /> 	
							</a>
							<div class="page-box__content">
								<h5 class="page-box__title text-uppercase">
									<a href="services-content/hardwood-flooring.html">Hardwood Flooring</a>
								</h5>
								By hiring our hardwood flooring services, you can transform the style of your entire house or a particular 
								room easily. We repair, purchase, design and install quality flooring at unbeatable prices.
								<p><a href="services-content/hardwood-flooring.html" class="read-more read-more--page-box">Read more</a></p>
							</div>
						</div>
						<div class="col-md-4 page-box page-box--block">
							<a class="page-box__picture" href="services-content/condo-remodeling.html">
								<img width="360" height="240" src="images/demo/content/content_7.jpg" alt="Content Image" />
							</a>
							<div class="page-box__content">
								<h5 class="page-box__title text-uppercase">
									<a href="services-content/condo-remodeling.html">Condo Remodeling</a>
								</h5>
								Our round condo remodelling services includes plumbing, electrical, flooring and everything else. We 
								implement sophisticated design and technology to give you a beautiful and functional condo.	
								<p><a href="services-content/condo-remodeling.html" class="read-more read-more--page-box">Read more</a></p>
							</div>
						</div>
						
						<div class="col-md-4 page-box page-box--block">
							<a class="page-box__picture" href="services-content/kitchen-remodeling.html">
								<img width="360" height="240" src="images/demo/content/content_8.jpg" alt="Content Image" />
							</a>
							<div class="page-box__content">
								<h5 class="page-box__title text-uppercase">
									<a href="services-content/kitchen-remodeling.html">Kitchen Remodeling</a>
								</h5>
								We can execute complex kitchen remodelling projects that suit your personal style and preferences. 
								We can assist you in making minor kitchen updates or performing entire kitchen remodelling.	
								<p><a href="services-content/kitchen-remodeling.html" class="read-more read-more--page-box">Read more</a></p>
							</div>
						</div>
                                        </di>
                                </main>
</div>
                        </div>
                </div>
    
<div class="panel-grid" id="pg">
    <div class="promobg">
        <div class="container">
            <div class="panel widget row">	
                <div class="col-md-12">
                    <div class="banner" id="Menu">
                        
                        <ul class="sub-menu">
                            
                            <li id="iconos"><a href="<?php echo routing::getInstance()->getUrlWeb('homepage', 'index') ?>" class="link1"><?php echo i18n::__('homePage') ?></a></li>
                            
                            <li><a href="<?php echo routing::getInstance()->getUrlWeb('acerca', 'index') ?>" class="link1"><?php echo i18n::__('who we are') ?></a></li>
                            
                            <li><a href="<?php echo routing::getInstance()->getUrlWeb('proyecto', 'index') ?>" class="link1"><?php echo i18n::__('events') ?></a>
                            
                            <li><a href="<?php echo routing::getInstance()->getUrlWeb('contactenos', 'index') ?>" class="link1"><?php echo i18n::__('contact') ?></a></li>
                        
 <!--                        <li><a href="<?php echo routing::getInstance()->getUrlWeb('pqrs', 'insert') ?>" class="link1"><?php echo i18n::__('feedback') ?></a></li>

                         <li><a href="#" class="link1"><?php echo i18n::__('notice') ?> </a></li>

                         <li><a href="#" class="link1"><?php echo i18n::__('novelty') ?> </a></li>

                         <li><a href="#" class="link1"><?php echo i18n::__('terms of use') ?> </a></li>
                         
                         <li><a href="#" data-toggle="modal" data-target="#privacidad" class="link1"> <?php echo i18n::__('Privacy and policy') ?> </a></li>-->
                         
<div class="modal fade" id="privacidad" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Privacidad & Politica</h4>
      </div>
      <div class="modal-body">
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
        Podemos recopilar información de identificación no personal sobre los usuarios cuando interactúan con nuestro sitio. 
        Información de identificación no personal puede incluir el nombre del navegador, el tipo de equipo e información 
        técnica sobre los usuarios mediante la conexión a nuestro sitio, tales como el sistema operativo y los proveedores 
        de servicios de Internet utilizados y otra información similar.

        <h4>Cookies del navegador Web</h4>
        Nuestro sitio puede utilizar "cookies" para mejorar la experiencia del usuario. El navegador web del usuario coloca cookies en su disco duro para propósitos de registro y, a veces para rastrear información sobre ellos. El usuario puede optar por configurar su navegador para rechazar las cookies, o para que le avise cuando se envíen cookies. Si lo hacen, tenga en cuenta que algunas partes del sitio pueden no funcionar correctamente.

        <h4>Cómo utilizamos la información recopilada</h4>
        Cultura Caleña puede recopilar y utilizar los usuarios información personal para los siguientes fines:

        <h6>Para ejecutar y operar nuestro Sitio</h6>
        Es posible que tengamos la información de su contenido de la pantalla en el sitio correctamente.
        <h6>Para mejorar el servicio al cliente</h6>
        La información que usted proporcione nos ayuda a responder a sus solicitudes de servicio al cliente 
        y las necesidades de apoyo de manera más eficiente.
        <h6>Para personalizar la experiencia del usuario</h6>
        Podemos utilizar la información en conjunto para comprender cómo nuestros usuarios como grupo, 
        utilizan los servicios y recursos ofrecidos en nuestro Sitio.
        <h6>Para mejorar nuestro sitio</h6>
        Podemos usar información que usted proporciona para mejorar nuestros productos y servicios.
        <h6>Para enviar correos electrónicos periódicos</h6>
        Podemos utilizar la dirección de correo electrónico para enviar la información de usuario y 
        las actualizaciones correspondientes a su orden. También se puede utilizar para responder a 
        sus consultas, preguntas, y / u otras solicitudes.
        <h6>¿Cómo protegemos su información?</h6>
        Adoptamos las prácticas de recopilación de datos adecuado, almacenamiento y procesamiento y 
        las medidas de seguridad para proteger contra el acceso no autorizado, alteración, divulgación o 
        destrucción de su información personal, nombre de usuario, contraseña, información de transacciones y 
        los datos almacenados en nuestro Sitio.

        <h4>Compartir su información personal</h4>
        Nosotros no vendemos, comerciamos, ni alquilamos la informacion de los usuarios ni identificacion
        personal a terceros. Podemos compartir información demográfica genérica no vinculada a ninguna 
        información de identificación personal con respecto a los visitantes y usuarios con nuestros socios 
        comerciales, afiliados y anunciantes de confianza para los fines antes mencionados.

        <h4>Boletines electrónicos</h4>
        Si el Usuario decide optar en nuestra lista de correo, recibirán correos electrónicos que 
        pueden incluir noticias de la compañía, actualizaciones, información del producto o servicio 
        relacionado, etc. Si en algún momento el usuario desea dejar de recibir futuros correos electrónicos, 
        incluimos detallada instrucciones para darse de baja en la parte inferior de cada correo electrónico o 
        Usuario puede ponerse en contacto con nosotros a través de nuestro Sitio.

        <h4>Publicidad</h4>
        Los anuncios que aparecen en nuestro sitio pueden ser entregados a los Usuarios por los 
        socios de publicidad, que pueden establecer cookies. Estas cookies permiten al servidor 
        de anuncios para reconocer su equipo cada vez que le envían una publicidad en línea para 
        recopilar información de identificación personal sobre usted o no otras personas que utilizan 
        el ordenador. Esta información permite a las redes de anuncios, entre otras cosas, 
        ofrecer anuncios que ellos creen que será de mayor interés para usted. 
        Esta política de privacidad no cubre el uso de cookies por parte de anunciantes.

        <h4>Google Adsense</h4>
        Algunos de los anuncios pueden ser servidos por Google. Google utiliza la cookie de DART 
        le permite servir anuncios a los usuarios basados ​​en su visita a nuestro sitio y otros sitios en Internet. 
        DART utiliza "información no personal identificable" y NO seguimiento de información personal sobre usted, 
        como su nombre, dirección de correo electrónico, dirección física, etc Usted puede optar por el 
        uso de la cookie de DART a través del anuncio de Google y la red de contenido privacidad política 
        en http://www.google.com/privacy_ads.html

        <h4>Cumplimiento de línea ley de protección de la privacidad de los niños</h4>
        Proteger la privacidad de los más jóvenes es especialmente importante. Por esa razón, 
        nunca recogemos ni mantenemos información en nuestro sitio de aquellas personas que sabemos 
        son menores de 13 años, y ninguna parte de nuestro sitio está estructurado para atraer a menores de 13.

        <h4>Cambios en esta política de privacidad</h4>
        Cultura Caleña tiene la facultad de actualizar esta política de privacidad en cualquier momento. 
        Cuando lo hacemos, vamos a publicar una notificación en la página principal de nuestro sitio, 
        revisar la fecha de actualización en la parte inferior de esta página. Animamos a los usuarios 
        a comprobar con frecuencia esta página para cualquier cambio de mantenerse informados acerca de 
        cómo estamos ayudando a proteger la información personal que recopilamos. Usted reconoce y 
        acepta que es su responsabilidad revisar esta política de privacidad periódicamente y 
        tomar conciencia de las modificaciones.

        <h4>Su aceptación de estos términos</h4>
        Al utilizar este sitio, usted expresa su aceptación de esta política. 
        Si usted no está de acuerdo con esta política, por favor no utilice nuestro Sitio. 
        Su uso continuado del Sitio tras la publicación de cambios a esta política será considerado 
        su aceptación de dichos cambios.

        <h4>Cómo ponerse en contacto con nosotros</h4>
        Si usted tiene alguna pregunta sobre esta Política de Privacidad, las prácticas de este sitio, 
        o sus relaciones con este sitio, por favor póngase en contacto con nosotros.

        Este documento fue actualizada el 11 de junio 2015</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo i18n::__('close') ?></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

                        </ul>
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


