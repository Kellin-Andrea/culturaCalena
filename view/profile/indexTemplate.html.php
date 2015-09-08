<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\config\configClass as config ?>
<?php
use mvc\config\myConfigClass as myConfig ?>
<?php
use mvc\request\requestClass as request ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\session\sessionClass as session ?>

<?php $id = usuarioTableClass::ID ?>






<div class="no-skin">
  <!-- #section:basics/navbar.layout -->
  <div id="navbar" class="navbar navbar-default">
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
                <?php echo session::getInstance()->getUserName(); ?>
              </span>

              <i class="ace-icon fa fa-caret-down"></i>
            </a>

            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">


              <li>
                <a href="<?php echo mvc\routing\routingClass::getInstance()->getUrlWeb('homepage', 'index') ?>">
                  <i class="ace-icon fa fa-user"></i>
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
  </div>

  <!-- /section:basics/navbar.layout -->
  <div class="container">
    <div class="row">
      <div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        <div class="well profile">
          <div class="col-sm-12">
            <div class="col-xs-12 col-sm-8">
              <?php foreach ($objDatosProfile as $datoPerfil): ?>
                <h2><?php
                  echo $datoPerfil->nombre;
                  echo ' ';
                  echo $datoPerfil->apellido;
                  ?></h2>
                <?php foreach ($objPerfilUser as $perfilUser): ?>
                  <p><strong><?php echo i18n::__('nameUser') ?>: </strong> <?php echo $perfilUser->user_name; ?></p>
                <?php endforeach; ?>
                <p><strong><?php echo i18n::__('email') ?>: </strong><?php echo $datoPerfil->correo ?> </p>

                <p><strong><?php echo i18n::__('locality') ?>: </strong><?php echo localidadTableClass::getNombreById($datoPerfil->localidad_id) ?>  </p>
                <p><strong><?php echo i18n::__('organizations') ?>: </strong> <?php echo organizacionTableClass::getNombreById($datoPerfil->organizacion_id) ?> </p>


              </div>            
              <div class="col-xs-12 col-sm-4 text-center">
                <figure>

                  <img src="<?php echo (($datoPerfil->genero == TRUE) ? routing::getInstance()->getUrlImg('mujer.jpeg') : routing::getInstance()->getUrlImg('hombre.jpeg')) ?>" alt="" class="img-circle img-responsive">
                <?php endforeach ?>
              </figure>
            </div>
          </div>            

          <div class="col-xs-12 divider text-center">
            <div class="col-xs-12 col-sm-4 emphasis">
              <h2><strong> # </strong></h2>                    
              <p><small><?php echo i18n::__('youEvent') ?></small></p>

            </div>
            <div class="col-xs-12 col-sm-4 emphasis">
              <h2><strong>#</strong></h2>                    
              <p><small><?php echo i18n::__('youCategory') ?></small></p>

            </div>
            <div class="col-xs-12 col-sm-4 emphasis">
              <h2><strong>#</strong></h2>                    
              <p><small><?php echo i18n::__('youLogin') ?></small></p>

            </div>
          </div>
        </div>                 
      </div>

 

          </div>            

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <nav id="evento"> <h1><?php echo i18n::__('youCategory') ?></h1></nav>
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php foreach ($objGustosProfile as $key => $dato) : ?>
    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key ?>"></li>
    <?php endforeach ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
      
    <?php foreach ($objGustosProfile as $key => $dato) : ?>
    <div class="item <?php echo $key === 0 ? 'active' : '' ?>">
        <img src="<?php echo routing::getInstance()->getUrlImgUpload($dato->imagen) ?>" style="height: 300px" class="img-responsive">
      <div class="carousel-caption">
          <h2 id="colorLetra"><?php echo $dato->nombre ?></h2>
          <h4 id="colorLetra">Valor Evento: $<?php echo $dato->costo?></h4>
        <p id="colorLetra"><?php echo $dato->descripcion ?></p>
      </div>            
    </div>
 <?php endforeach ?>
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
      
      
      
      
      
      

    <div class="container">
 <nav id="evento"> <h1><?php echo i18n::__('my_events') ?></h1></nav>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>

            <th><?php echo i18n::__('eventName') ?></th>
            <th><?php echo i18n::__('cost') ?></th>
            <th><?php echo i18n::__('start_date') ?></th>
            <th><?php echo i18n::__('finish_date') ?></th>
            <th><?php echo i18n::__('actions') ?></th>

          </tr>
        </thead>
        <tbody >
          <?php foreach ($objEventoProfile as $eventoProfile): ?>
            <tr>

              <td><?php echo $eventoProfile->nombre ?></td>
              <td><?php echo $eventoProfile->costo ?></td>
              <td><?php echo $eventoProfile->fecha_inicial_evento ?></td>
              <td><?php echo $eventoProfile->fecha_final_evento ?></td>
              <td>
                <!--              <a href="#" class="btn btn-warning btn-xs">Ver</a>-->

                <a href="<?php echo routing::getInstance()->getUrlWeb('evento', 'edit', array(eventoTableClass::ID => $eventoProfile->$id)) ?>" class="btn btn-warning btn-xs" data-toggle="popover" title="<?php echo i18n::__('edit') ?>" data-content="edicion de usuario"><i class="glyphicon glyphicon-pencil"></i></a>
        <!--              <a href="#" onclick="confirmarEliminar(<?php //echo $usuario->$id                   ?>)" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash" data-toggle="popover" title="Borrar" data-content="Eliminar usuario"></i></a>-->
        <!--              <a href="#" data-toggle="modal" data-target="#myModalDeleteMasivo" role="dialog" title="Borrar" data-content="Eliminar usuario"  onclick="eliminar(<?php //echo $usuario->$id                   ?>)"class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash" ></i></a>-->
                <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $eventoProfile->$id ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash" ></i></a>
              </td>
            </tr>
          <div class="modal fade" id="myModalDelete<?php echo $eventoProfile->$id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Confirma Eliminar </h4>
                </div>
                <div class="modal-body">
                  ¿Desea Eliminar el registro <?php echo $eventoProfile->nombre ?> ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-danger"onclick="eliminar(<?php echo $eventoProfile->$id ?>, '<?php echo eventoTableClass::getNameField(eventoTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('evento', 'delete') ?> ')">Confirmar Eliminar</button>
                </div>
              </div>
            </div>
          </div>



        <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <div class="text-right">
                   Página <select id="slqPaginador" onchange="Paginador(this, '<?php echo (session::getInstance()->isUserAuthenticated() and session::getInstance()->hasCredential(myConfig::CREDENCIAL_ADMIN)) ? routing::getInstance()->getUrlWeb('evento', 'index') : routing::getInstance()->getUrlWeb('profile', 'index') ?>')">
                  <?php for ($x = 1; $x <= $cntPages; $x++): ?>
                    <option <?php echo (isset($page) and $page == $x) ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
                  <?php endfor ?>
                </select> <?php echo $cntPages ?>
    </div>