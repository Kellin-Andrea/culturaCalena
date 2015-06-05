<?php use mvc\i18n\i18nClass as i18n?>
 <div id="formUser">
    <div class="no-skin">
        <!-- #section:basics/navbar.layout -->
        <div id="navbar" class="navbar navbar-container">


            <div class="navbar-container" id="navbar-container">
                <!-- #section:basics/sidebar.mobile.toggle -->


                <!-- /section:basics/sidebar.mobile.toggle -->
                <div class="navbar-header pull-left">
                    <!-- #section:basics/navbar.layout.brand -->
                    <a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('eventoPatrocinador', 'index')?>" class="navbar-brand">
                        <small>
                            <i class="glyphicon glyphicon-leaf"></i>
                            <?php echo i18n::__('cultureCaleña') ?>
                        </small>
                    </a>

                    <!-- /section:basics/navbar.layout.brand -->

                    <!-- #section:basics/navbar.toggle -->

                    <!-- /section:basics/navbar.toggle -->
                </div>


                <!-- /section:basics/navbar.dropdown -->
            </div><!-- /.navbar-container -->
        </div>
    </div>


        
 
