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
    ace.settings.check('sidebar', 'fixed')
  } catch (e) {
  }
</script>

<div class="sidebar-shortcuts" id="sidebar-shortcuts">
  <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">

    <ul class="nav ace-nav">
      <li class=" light-blue">
        <a data-toggle="dropdown" class="dropdown-toggle" >
          <i class="ace-icon fa fa-globe  bigger-150"  data-toggle="modal" data-target="#myModal"></i>
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

                  <form id="frmTraductor" action="<?php echo routing::getInstance()->getUrlWeb('admin', 'traductor') ?>" method="POST">

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

        </a>
      </li>

    </ul>
  </div>

  <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">


    <span class="btn btn-info"></span>

  </div>
</div><!-- /.sidebar-shortcuts -->

<ul class="nav nav-list">
  <li class="active">
    <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('admin', 'index') ?>">
      <i class="menu-icon fa fa-home"></i>
      <span class="menu-text"><?php echo i18n::__('mainMenu') ?> </span>
    </a>

    <b class="arrow"></b>
  </li>


  <li class="">
    <a href="#" class="dropdown-toggle">
      <i class="menu-icon fa fa-list"></i>
      <span class="menu-text"> <?php echo i18n::__('tables') ?> </span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">
      <li class="">
        <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('usuario', 'index') ?>">
          <i class="menu-icon fa fa-caret-right"></i>
<?php echo i18n::__('user') ?>
        </a>

        <b class="arrow"></b>
      </li>

      <li class="">
        <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('bitacora', 'index') ?>">
          <i class="menu-icon fa fa-caret-right"></i>
<?php echo i18n::__('logBook') ?>
        </a>

        <b class="arrow"></b>
      </li>
      <li class="">
        <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('categoria', 'index') ?>">
          <i class="menu-icon fa fa-caret-right"></i>
<?php echo i18n::__('category') ?>
        </a>

        <b class="arrow"></b>
      </li>
      <li class="">
        <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('evento', 'index') ?>">
          <i class="menu-icon fa fa-caret-right"></i>
<?php echo i18n::__('events') ?>
        </a>

        <b class="arrow"></b>
      </li>
  </li>
  <li class="">
    <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('datoUsuario', 'index') ?>">
      <i class="menu-icon fa fa-caret-right"></i>
<?php echo i18n::__('userData') ?>
    </a>

    <b class="arrow"></b>
  </li>
  <li class="">
    <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('tipoDocumento', 'index') ?>">
      <i class="menu-icon fa fa-caret-right"></i>
<?php echo i18n::__('document_type') ?>
    </a>

    <b class="arrow"></b>
  </li>
  <li class="">
    <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('credencial', 'index') ?>">
      <i class="menu-icon fa fa-caret-right"></i>
<?php echo i18n::__('credential') ?>
    </a>

    <b class="arrow"></b>
  </li>
  <li class="">
    <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('localidad', 'index') ?>">
      <i class="menu-icon fa fa-caret-right"></i>
<?php echo i18n::__('locality') ?>
    </a>

    <b class="arrow"></b>
  </li>
  <li class="">
    <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('pqrs', 'index') ?>">
      <i class="menu-icon fa fa-caret-right"></i>
<?php echo i18n::__('feedback') ?>
    </a>

    <b class="arrow"></b>
  </li>
  <li class="">
    <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('detallePqrs', 'index') ?>">
      <i class="menu-icon fa fa-caret-right"></i>
<?php echo i18n::__('feedbackSpecs') ?>
    </a>

    <b class="arrow"></b>
  </li>
  <li class="">
    <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('estadoPqrs', 'index') ?>">
      <i class="menu-icon fa fa-caret-right"></i>
<?php echo i18n::__('feedbackState') ?>
    </a>

    <b class="arrow"></b>
  </li>
  <li class="">
    <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('tipoPqrs', 'index') ?>">
      <i class="menu-icon fa fa-caret-right"></i>
<?php echo i18n::__('feedbackType') ?>
    </a>

    <b class="arrow"></b>
  </li>
  <li class="">
    <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('organizacion', 'index') ?>">
      <i class="menu-icon fa fa-caret-right"></i>
<?php echo i18n::__('organizations') ?>
    </a>

    <b class="arrow"></b>
  </li>
  <li class="">
    <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('eventoPatrocinador', 'index') ?>">
      <i class="menu-icon fa fa-caret-right"></i>
<?php echo i18n::__('EventPartner') ?>
    </a>

    <b class="arrow"></b>
  </li>
</li>
<li class="">
  <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('patrocinador', 'index') ?>">
    <i class="menu-icon fa fa-caret-right"></i>
<?php echo i18n::__('partner') ?>
  </a>

  <b class="arrow"></b>
</li>

<li class="">
  <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('usuarioCredencial', 'index') ?>">
    <i class="menu-icon fa fa-caret-right"></i>
<?php echo i18n::__('userCredential') ?>
  </a>

  <b class="arrow"></b>
</li>
<li class="">
  <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('usuarioGustaCategoria', 'index') ?>">
    <i class="menu-icon fa fa-caret-right"></i>
<?php echo i18n::__('events_like_me') ?>
  </a>

  <b class="arrow"></b>
</li>
</ul>
</li>

<li class="">
  <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('userActived', 'index') ?>">
    <i class="menu-icon fa fa-users"></i>
    <span class="menu-text"><?php echo i18n::__('enableUsers') ?>  </span>
  </a>

  <b class="arrow"></b>
</li>

<li class="">
  <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('slider', 'index') ?>">
    <i class="menu-icon fa fa-image"></i>
    <span class="menu-text"><?php echo i18n::__('sliderManagement') ?>  </span>
  </a>

  <b class="arrow"></b>
</li>      
<li class="">
  <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('eventActived', 'index') ?>">
    <i class="menu-icon fa fa-star-half-empty"></i>
    <span class="menu-text"><?php echo i18n::__('enableEvent') ?>  </span>
  </a>

  <b class="arrow"></b>
</li>   

<li class="">
  <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('reporte', 'index') ?>">
    <i class="menu-icon fa fa-file-archive-o"></i>
    <span class="menu-text"><?php echo i18n::__('reports') ?>  </span>
  </a>

  <b class="arrow"></b>
</li>

</ul><!-- /.nav-list -->

<!-- #section:basics/sidebar.layout.minimize -->
<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
  <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>

<!-- /section:basics/sidebar.layout.minimize -->
