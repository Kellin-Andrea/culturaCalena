<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\config\configClass as config ?>
<?php
use mvc\request\requestClass as request ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
    <script type="text/javascript">
      try {
        ace.settings.check('navbar', 'fixed')
      } catch (e) {
      }
    </script>

    <div class="navbar-container" id="navbar-container">
      <!-- #section:basics/sidebar.mobile.toggle -->
      <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
        <span class="sr-only">Toggle sidebar</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>
      </button>


      <!-- /section:basics/sidebar.mobile.toggle -->
      <div class="navbar-header pull-left">
        <!-- #section:basics/navbar.layout.brand -->
        <a href="#" class="navbar-brand">
          <small>
            <i class="glyphicon glyphicon-leaf"></i>
<?php echo i18n::__('cultureCaleña') ?>
          </small>
        </a>

        <!-- /section:basics/navbar.layout.brand -->

        <!-- #section:basics/navbar.toggle -->

        <!-- /section:basics/navbar.toggle -->
      </div>

      <!-- #section:basics/navbar.dropdown -->
      <div class="navbar-buttons navbar-header pull-right" role="navigation">
        <ul class="nav ace-nav">
          <!-- #section:basics/navbar.user_menu -->
          <li class="light-blue">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
              <img class="nav-user-photo" src="<?php echo \mvc\routing\routingClass::getInstance()->getUrlImg('logo.png') ?>" />
              <span class="user-info">
                <small><?php echo i18n::__('welcome') ?></small>
<?php echo i18n::__('administrator') ?>
              </span>

              <i class="ace-icon fa fa-caret-down"></i>
            </a>

            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">


              <li>
                  <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('profile', 'index')?>">
                  <i class="ace-icon fa fa-user"></i>
<?php echo i18n::__('profile') ?>
                </a>
              </li>
              
               <li class="divider"></li>

              <li>
                <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('homepage', 'index') ?>">
                  <i class="ace-icon fa fa-home"></i>
<?php echo i18n::__('homePage') ?>
                </a>
              </li>

              <li class="divider"></li>

              <li>
                <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('shfSecurity', 'logout') ?>">
                  <i class="ace-icon fa fa-power-off"></i>
<?php echo i18n::__('exit') ?>
                </a>
              </li>
              
              
            </ul>
          </li>

          <!-- /section:basics/navbar.user_menu -->
        </ul>
      </div>

      <!-- /section:basics/navbar.dropdown -->
    </div><!-- /.navbar-container -->
