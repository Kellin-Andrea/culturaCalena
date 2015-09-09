<?php $totalUsuarios = count($objUsuario) ?>

<?php $totalBitacora = count($objBitacora) ?>

<?php $totalCategoria = count($objCategoria) ?>
<?php $totalEvento = count($objEvento) ?>
<?php $totalOrganizacion = count($objOrganizacion) ?>
<?php $totalPatrocinador = count($objPatrocinadores) ?>

<?php $totalTipoDocumento = count($objtipoDocumento) ?>

<?php $totalCredenciales = count($objCredenciales) ?>

<?php $totalLocalidades = count($objlocal) ?>

<?php $totalGustosCategoria = count($objUsuarioGustaCategoria)?>

<?php $totalPqrs = count($objpqrs)?>

<?php $totalEventoPatrocinador =count($objeventoPatrocinador) ?>

<?php $totalTipoPqrs = count($objtipoPqrs) ?>

<?php $totalDetallePqrs = count($objdetalle) ?>

<?php $totalEstadoPqrs = count($objestado)?>

<?php use mvc\routing\routingClass as routing ?>
<?php
use mvc\config\configClass as config ?>
<?php
use mvc\request\requestClass as request ?>
<?php
use mvc\i18n\i18nClass as i18n ?>


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
                <?php echo i18n::__('administrator') ?>
              </span>

              <i class="ace-icon fa fa-caret-down"></i>
            </a>

            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">


              <li>
                <a href="profile.html">
                  <i class="ace-icon fa fa-user"></i>
                  <?php echo i18n::__('profile') ?>
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
  <div class="main-container" id="main-container">
    <script type="text/javascript">
      try {
        ace.settings.check('main-container', 'fixed')
      } catch (e) {
      }
    </script>

    <!-- #section:basics/sidebar -->
    <div id="sidebar" class="sidebar                  responsive">
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

    </div>

    <!-- /section:basics/sidebar -->
    <div class="main-content">
      <div class="main-content-inner">
        <!-- #section:basics/content.breadcrumbs -->

        <!-- /section:basics/content.breadcrumbs -->
        <div class="page-content">
          <!-- #section:settings.box -->
          <!-- /.ace-settings-container -->

          <!-- /section:settings.box -->
          <div class="page-header">
            <h1>
              <?php echo i18n::__('mainMenu') ?>
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?php echo i18n::__('managementAdmisnistrator') ?>
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">
            <div class="col-xs-12">
              <!-- PAGE CONTENT BEGINS -->
              <div class="alert alert-block alert-success">
                <button type="button" class="close" data-dismiss="alert">
                  <i class="ace-icon fa fa-times"></i>
                </button>

                <i class="ace-icon fa fa-check green"></i>

                <?php echo i18n::__('welcomeTo') ?>
                <strong class="green">
                  <?php echo i18n::__('cultureCaleña') ?>
                </strong>,
                <?php echo i18n::__('siteWhere') ?> 
              </div>

              <div class="row">
                <div class="space-6"></div>

                <div class="col-sm-12 infobox-container">
                  <!-- #section:pages/dashboard.infobox -->
                  <div class="infobox infobox-green">
                    <div class="infobox-icon">
                      <i class="ace-icon fa fa-group"></i>
                    </div>

                    <div class="infobox-data">
                      <span class="infobox-data-number"><?php echo $totalUsuarios ?></span>
                      <div class="infobox-content"><?php echo i18n::__('registeredUser') ?></div>
                    </div>



                    <!-- /section:pages/dashboard.infobox.stat -->
                  </div>

                  <div class="infobox infobox-blue">
                    <div class="infobox-icon">
                      <i class="ace-icon fa fa-play-circle"></i>
                    </div>

                    <div class="infobox-data">
                      <span class="infobox-data-number"><?php echo $totalEvento ?></span>
                      <div class="infobox-content"><?php echo i18n::__('registeredEvent') ?></div>
                    </div>


                  </div>

                  <div class="infobox infobox-pink">
                    <div class="infobox-icon">
                      <i class="ace-icon fa fa-file-archive-o"></i>
                    </div>

                    <div class="infobox-data">
                      <span class="infobox-data-number"><?php echo $totalBitacora ?></span>
                      <div class="infobox-content"><?php echo i18n::__('registeredBitacora') ?></div>
                    </div>

                  </div>

                  <div class="infobox infobox-red">
                    <div class="infobox-icon">
                      <i class="ace-icon fa fa-star"></i>
                    </div>

                    <div class="infobox-data">
                      <span class="infobox-data-number"><?php echo $totalCategoria ?></span>
                      <div class="infobox-content"><?php echo i18n::__('registeredCategory') ?></div>
                    </div>
                  </div>

                  <div class="infobox infobox-orange2">
                    <!-- #section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-icon">
                      <i class="ace-icon fa fa-user"></i>
                    </div>

                    <!-- /section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-data">
                      <span class="infobox-data-number"><?php echo $totalPatrocinador ?></span>
                      <div class="infobox-content"><?php echo i18n::__('registeredSponsor') ?></div>
                    </div>


                  </div>

                  <div class="infobox infobox-blue2">
                    <!-- #section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-icon">
                      <i class="ace-icon fa fa-star-half-empty"></i>
                    </div>

                    <!-- /section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-data">
                      <span class="infobox-data-number"><?php echo $totalOrganizacion ?></span>
                      <div class="infobox-content"><?php echo i18n::__('registeredOrganization') ?></div>
                    </div>



                  </div>
                  <div class="infobox infobox-green2">
                    <!-- #section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-icon">
                      <i class="ace-icon fa fa-credit-card"></i>
                    </div>

                    <!-- /section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-data">
                      <span class="infobox-data-number"><?php echo $totalTipoDocumento ?></span>
                      <div class="infobox-content"><?php echo i18n::__('registeredTypeDocument') ?></div>
                    </div>



                  </div>

                  <div class="infobox infobox-purple2">
                    <!-- #section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-icon">
                      <i class="ace-icon fa fa-male"></i>
                    </div>

                    <!-- /section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-data">
                      <span class="infobox-data-number"><?php echo $totalCredenciales ?></span>
                      <div class="infobox-content"><?php echo i18n::__('registeredCredential') ?></div>
                    </div>



                  </div>
                  <div class="infobox infobox-blue3">
                    <!-- #section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-icon">
                      <i class="ace-icon fa fa-map-marker"></i>
                    </div>

                    <!-- /section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-data">
                      <span class="infobox-data-number"><?php echo $totalLocalidades ?></span>
                      <div class="infobox-content"><?php echo i18n::__('registeredLocality') ?></div>
                    </div>



                  </div>
                  <div class="infobox infobox-purple">
                    <!-- #section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-icon">
                      <i class="ace-icon fa fa-thumbs-up"></i>
                    </div>

                    <!-- /section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-data">
                      <span class="infobox-data-number"><?php echo $totalGustosCategoria ?></span>
                      <div class="infobox-content"><?php echo i18n::__('registeredUserLike') ?></div>
                    </div>



                  </div>
                  
                   <div class="infobox infobox-pink">
                    <!-- #section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-icon">
                      <i class="ace-icon fa fa-comment-o"></i>
                    </div>

                    <!-- /section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-data">
                      <span class="infobox-data-number"><?php echo $totalPqrs ?></span>
                      <div class="infobox-content"><?php echo i18n::__('registeredFedback') ?></div>
                    </div>



                  </div>
                  
                   <div class="infobox infobox-green">
                    <!-- #section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-icon">
                      <i class="ace-icon fa fa-cog"></i>
                    </div>

                    <!-- /section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-data">
                      <span class="infobox-data-number"><?php echo $totalEventoPatrocinador ?></span>
                      <div class="infobox-content"><?php echo i18n::__('registeredEvents') ?></div>
                    </div>



                  </div>
                  
                   <div class="infobox infobox-red">
                    <!-- #section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-icon">
                      <i class="ace-icon fa fa-tasks"></i>
                    </div>

                    <!-- /section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-data">
                      <span class="infobox-data-number"><?php echo $totalTipoPqrs ?></span>
                      <div class="infobox-content"><?php echo i18n::__('registeredTypeFedback') ?></div>
                    </div>



                  </div>
                  
                   <div class="infobox infobox-brown">
                    <!-- #section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-icon">
                      <i class="ace-icon fa fa-reorder"></i>
                    </div>

                    <!-- /section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-data">
                      <span class="infobox-data-number"><?php echo $totalDetallePqrs ?></span>
                      <div class="infobox-content"><?php echo i18n::__('registeredDetailFedback') ?></div>
                    </div>



                  </div>
                  
                   <div class="infobox infobox-black">
                    <!-- #section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-icon">
                      <i class="ace-icon fa fa-dashboard"></i>
                    </div>

                    <!-- /section:pages/dashboard.infobox.sparkline -->
                    <div class="infobox-data">
                      <span class="infobox-data-number"><?php echo $totalEstadoPqrs ?></span>
                      <div class="infobox-content"><?php echo i18n::__('registeredStatusFedback') ?></div>
                    </div>



                  </div>



                </div><!-- /.widget-main -->
              </div><!-- /.widget-body -->
            </div><!-- /.widget-box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
{ñlkjhgf
        
        <script>  
         var plot1 = $.jqplot('chart1',[],{
      title: 'Sine Data Renderer',
      dataRenderer: sineRenderer
  });
});

      </script>
      
      <div id="chart1" ></div>
        <!-- PAGE CONTENT ENDS -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<div class="footer">
  <div class="footer-inner">
    <!-- #section:basics/footer -->
    <div class="footer-content">
      <span class="bigger-120">
        <span class="blue bolder">&copy; 2015-2016</span>
        Cultura Caleña - Todos Los Derechos Reservados Design By
      </span>

      &nbsp; &nbsp;
      <span class="action-buttons">
        <a href="https://twitter.com/">
          <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
        </a>

        <a href="https://www.facebook.com">
          <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
        </a>

        <a href="https://instagram.com/">
          <i class="ace-icon fa fa-instagram orange bigger-150"></i>
        </a>
      </span>
    </div>

    <!-- /section:basics/footer -->
  </div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
  <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script type="text/javascript">
  window.jQuery || document.write("<script src='../assets/js/jquery.js'>" + "<" + "/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
  if ('ontouchstart' in document.documentElement)
    document.write("<script src='../assets/js/jquery.mobile.custom.js'>" + "<" + "/script>");
</script>
<script src="../assets/js/bootstrap.js"></script>
<!-- page specific plugin scripts -->

<!-- inline scripts related to this page -->
<script type="text/javascript">
  jQuery(function ($) {
    $('.easy-pie-chart.percentage').each(function () {
      var $box = $(this).closest('.infobox');
      var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
      var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
      var size = parseInt($(this).data('size')) || 50;
      $(this).easyPieChart({
        barColor: barColor,
        trackColor: trackColor,
        scaleColor: false,
        lineCap: 'butt',
        lineWidth: parseInt(size / 10),
        animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
        size: size
      });
    })

    $('.sparkline').each(function () {
      var $box = $(this).closest('.infobox');
      var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
      $(this).sparkline('html',
              {
                tagValuesAttribute: 'data-values',
                type: 'bar',
                barColor: barColor,
                chartRangeMin: $(this).data('min') || 0
              });
    });


    //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
    //but sometimes it brings up errors with normal resize event handlers
    $.resize.throttleWindow = false;

    var placeholder = $('#piechart-placeholder').css({'width': '90%', 'min-height': '150px'});
    var data = [
      {label: "social networks", data: 38.7, color: "#68BC31"},
      {label: "search engines", data: 24.5, color: "#2091CF"},
      {label: "ad campaigns", data: 8.2, color: "#AF4E96"},
      {label: "direct traffic", data: 18.6, color: "#DA5430"},
      {label: "other", data: 10, color: "#FEE074"}
    ]
    function drawPieChart(placeholder, data, position) {
      $.plot(placeholder, data, {
        series: {
          pie: {
            show: true,
            tilt: 0.8,
            highlight: {
              opacity: 0.25
            },
            stroke: {
              color: '#fff',
              width: 2
            },
            startAngle: 2
          }
        },
        legend: {
          show: true,
          position: position || "ne",
          labelBoxBorderColor: null,
          margin: [-30, 15]
        }
        ,
        grid: {
          hoverable: true,
          clickable: true
        }
      })
    }
    drawPieChart(placeholder, data);

    /**
     we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
     so that's not needed actually.
     */
    placeholder.data('chart', data);
    placeholder.data('draw', drawPieChart);


    //pie chart tooltip example
    var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
    var previousPoint = null;

    placeholder.on('plothover', function (event, pos, item) {
      if (item) {
        if (previousPoint != item.seriesIndex) {
          previousPoint = item.seriesIndex;
          var tip = item.series['label'] + " : " + item.series['percent'] + '%';
          $tooltip.show().children(0).text(tip);
        }
        $tooltip.css({top: pos.pageY + 10, left: pos.pageX + 10});
      } else {
        $tooltip.hide();
        previousPoint = null;
      }

    });

    /////////////////////////////////////
    $(document).one('ajaxloadstart.page', function (e) {
      $tooltip.remove();
    });




    var d1 = [];
    for (var i = 0; i < Math.PI * 2; i += 0.5) {
      d1.push([i, Math.sin(i)]);
    }

    var d2 = [];
    for (var i = 0; i < Math.PI * 2; i += 0.5) {
      d2.push([i, Math.cos(i)]);
    }

    var d3 = [];
    for (var i = 0; i < Math.PI * 2; i += 0.2) {
      d3.push([i, Math.tan(i)]);
    }


    var sales_charts = $('#sales-charts').css({'width': '100%', 'height': '220px'});
    $.plot("#sales-charts", [
      {label: "Domains", data: d1},
      {label: "Hosting", data: d2},
      {label: "Services", data: d3}
    ], {
      hoverable: true,
      shadowSize: 0,
      series: {
        lines: {show: true},
        points: {show: true}
      },
      xaxis: {
        tickLength: 0
      },
      yaxis: {
        ticks: 10,
        min: -2,
        max: 2,
        tickDecimals: 3
      },
      grid: {
        backgroundColor: {colors: ["#fff", "#fff"]},
        borderWidth: 1,
        borderColor: '#555'
      }
    });


    $('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
    function tooltip_placement(context, source) {
      var $source = $(source);
      var $parent = $source.closest('.tab-content')
      var off1 = $parent.offset();
      var w1 = $parent.width();

      var off2 = $source.offset();
      //var w2 = $source.width();

      if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2))
        return 'right';
      return 'left';
    }


    $('.dialogs,.comments').ace_scroll({
      size: 300
    });


    //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
    //so disable dragging when clicking on label
    var agent = navigator.userAgent.toLowerCase();
    if ("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
      $('#tasks').on('touchstart', function (e) {
        var li = $(e.target).closest('#tasks li');
        if (li.length == 0)
          return;
        var label = li.find('label.inline').get(0);
        if (label == e.target || $.contains(label, e.target))
          e.stopImmediatePropagation();
      });

    $('#tasks').sortable({
      opacity: 0.8,
      revert: true,
      forceHelperSize: true,
      placeholder: 'draggable-placeholder',
      forcePlaceholderSize: true,
      tolerance: 'pointer',
      stop: function (event, ui) {
        //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
        $(ui.item).css('z-index', 'auto');
      }
    }
    );
    $('#tasks').disableSelection();
    $('#tasks input:checkbox').removeAttr('checked').on('click', function () {
      if (this.checked)
        $(this).closest('li').addClass('selected');
      else
        $(this).closest('li').removeClass('selected');
    });


    //show the dropdowns on top or bottom depending on window height and menu position
    $('#task-tab .dropdown-hover').on('mouseenter', function (e) {
      var offset = $(this).offset();

      var $w = $(window)
      if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
        $(this).addClass('dropup');
      else
        $(this).removeClass('dropup');
    });

  })
</script>

</div>
