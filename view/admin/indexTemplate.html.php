<?php $totalUsuarios = count($objUsuario) ?>

<?php $totalBitacora = count($objBitacora) ?>

<?php $totalCategoria = count($objCategoria) ?>
<?php $totalEvento = count($objEvento) ?>
<?php $totalOrganizacion = count($objOrganizacion) ?>
<?php $totalPatrocinador = count($objPatrocinadores) ?>

<?php $totalTipoDocumento = count($objtipoDocumento) ?>

<?php $totalCredenciales = count($objCredenciales) ?>

<?php $totalLocalidades = count($objlocal) ?>

<?php $totalGustosCategoria = count($objUsuarioGustaCategoria) ?>

<?php $totalPqrs = count($objpqrs) ?>

<?php $totalEventoPatrocinador = count($objeventoPatrocinador) ?>

<?php $totalTipoPqrs = count($objtipoPqrs) ?>

<?php $totalDetallePqrs = count($objdetalle) ?>

<?php $totalEstadoPqrs = count($objestado) ?>

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

<div class="no-skin">
  <!-- #section:basics/navbar.layout -->
  <div id="navbar" class="navbar navbar-default">
    
    <?php view::includePartial('admin/menuAdmin')  ?>
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
<?php view::includePartial('admin/board')?>
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
            </div><!-- /.wi'<dget-box -->
          </div><!-- /.col -->
        </div><!-- /.row -->

        <script>
          $(document).ready(function () {
            $.jqplot.config.enablePlugins = true;
            var s1 = ['<?php echo $totalEstadoPqrs?>', '<?php echo $totalDetallePqrs?>', '<?php echo $totalTipoPqrs ?>','<?php echo $totalEvento ?>', '<?php echo $totalPqrs ?>', 
            '<?php echo $totalLocalidades ?>', '<?php echo $totalCredenciales ?>', '<?php echo $totalTipoDocumento?>', '<?php echo $totalOrganizacion ?>', '<?php echo $totalPatrocinador?>', '<?php echo $totalCategoria ?>', 
          '<?php echo $totalGustosCategoria?>', '<?php echo $totalUsuarios?>'];
            var ticks = ['<?php echo i18n::__('feedbackState') ?>', '<?php echo i18n::__('feedbackSpecs') ?>',
              '<?php echo i18n::__('feedbackType') ?>', '<?php echo i18n::__('events') ?>', '<?php echo i18n::__('feedback') ?>',
              '<?php echo i18n::__('locality') ?>',
               '<?php echo i18n::__('credential') ?>', '<?php echo i18n::__('document_type') ?>',
              '<?php echo i18n::__('organizations') ?>', '<?php echo i18n::__('partner') ?>', '<?php echo i18n::__('category') ?>',
              '<?php  echo i18n::__('events_like_me') ?>', '<?php echo i18n::__('user') ?>'];

            plot1 = $.jqplot('chart1', [s1], {
              // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
              animate: !$.jqplot.use_excanvas,
              seriesDefaults: {
                renderer: $.jqplot.BarRenderer,
                pointLabels: {show: true}
              },
              axes: {
                xaxis: {
                  renderer: $.jqplot.CategoryAxisRenderer,
                  ticks: ticks
                }
              },
              highlighter: {show: false}
            });

            $('#chart1').bind('jqplotDataClick',
                    function (ev, seriesIndex, pointIndex, data) {
                      $('#info1').html('series: ' + seriesIndex + ', point: ' + pointIndex + ', data: ' + data);
                    }
            );
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
 <?php view::includePartial('admin/footerAdmin')?>
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

