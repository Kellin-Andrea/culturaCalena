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
<?php $credencial = usuarioCredencialTableClass::USUARIO_ID ?>
<?php $usu = usuarioTableClass::USER ?>
<?php $id = usuarioTableClass::ID ?>
<?php //  \mvc\view\viewClass::includePartial('default/menu')       ?>


<div class="no-skin">
  <!-- #section:basics/navbar.layout -->
  <div id="navbar" class="navbar navbar-default">

    <?php view::includePartial('admin/menuAdmin') ?>
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
      <?php view::includePartial('admin/board') ?>
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


              <div class="row">
                <div class="space-6"></div>

                <div class="col-sm-4 infobox-container">
                  <div class="modal fade" id="myModalFilters" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('filter') ?></h4>
                        </div>
                        <div class="modal-body">
                          <form  class="form-horizontal" id="filterForm"  role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('usuario', 'index') ?>">
                            <div class="form-group">
                              <label for="filterUsuario" class="col-sm-2 control-label">Usuario</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control"  id="filterUsuario" name="filter[Usuario]" placeholder="Nombre del usuario">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Fecha Creaciacion</label>
                              <div class="col-sm-10">
                                <input type="date" class="form-control" id="filterDate1" name="filter[fechaCreacion1]">
                                <br/>
                                <input type="date" class="form-control" id="filterDate2" name="filter[fechaCreacion2]">
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" onclick="$('#filterForm').submit()" class="btn btn-primary">Filtrar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  </form>
                </div>

                <div class="container container-fluid">
                  <h1><i class="glyphicon glyphicon-user"></i> <?php echo i18n::__('usermanagement') ?></h1>
                  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('userActived', 'deleteSelect') ?>" method="POST">
                    <div style="margin-bottom: 10px; margin-top: 30px">

                    </div>

                    <?php view::includeHandlerMessage() ?>

                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th><input type="checkbox" id="chkAll"></th>
                          <th><?php echo i18n::__('user') ?></th>
                          <th><?php echo i18n::__('name') ?></th>
                          <th><?php echo i18n::__('organizations') ?></th>
                          <th><?php echo i18n::__('actions') ?></th>
                        </tr>
                      <tbody>

                        <?php foreach ($objUsuarios as $usuario): ?>
                          <tr>
                            <td><input type="checkbox" name="chk[]" value="<?php echo $usuario->id ?>"></td>
                            <td><?php echo $usuario->user_name ?></td>
                            <td><?php echo $usuario->nombre ?></td>
                            <td><?php echo $usuario->organizacion ?></td>
                            <td>
                              <a href="" class="btn btn-info btn-xs" onclick="activar(<?php  echo $usuario->id  ?>, '<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('userActived', 'actived') ?> ')"><i class="fa fa-check-circle-o"></i> <?php echo i18n::__('activateUser')?></a>
                              <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $usuario->id  ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>


                            </td>
                          </tr>
                        <div class="modal fade" id="myModalDelete<?php echo $usuario->id  ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirm') ?> </h4>
                              </div>
                              <div class="modal-body">
                                <?php echo i18n::__('are_sure_delete_this_register') ?> <?php  echo $usuario->$usu ?> 
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><?php  echo i18n::__('cancel') ?></button>
                                <button type="button" class="btn btn-danger" onclick="eliminar(<?php  echo $usuario->id  ?>, '<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('userActived', 'delete') ?> ')"><?php echo i18n::__('confirm') ?></button>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php endforeach ?>
                      </tbody>

                    </table>
                  </form>    

                  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('usuario', 'delete') ?>" method="POST">
                    <input type="hidden" id="idDelete" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>">

                    <a id="boton" href="<?php echo routing::getInstance()->getUrlWeb('homepage', 'index') ?>" type="button" class="btn btn-success" class="btn btn-danger btn-xs"> <i class="fa fa-home"></i></a>
                    <a id="boton" href="javascript:eliminarMasivo()" type="button" class="btn btn-danger" id="btnDeleteMasivo"><i class="fa fa-eraser"></i></a>

                    <div class="text-right">
                      Página <select id="slqPaginador" onchange="Paginador(this, '<?php  echo routing::getInstance()->getUrlWeb('userActived', 'index')   ?>')">
                        <?php  for ($x = 1; $x <= $cntPages; $x++): ?>
                        <option <?php  echo (isset($page) and $page == $x) ? 'selected' : ''   ?> value="<?php  echo $x   ?>"><?php  echo $x   ?></option>
                        <?php  endfor ?>
                      </select> <?php  echo $cntPages   ?>
                    </div>    

                    <!-- Eliminar Masivo-->
                    <div class="modal fade" id="myModalDeleteMasivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('delete_registers') ?></h4>
                          </div>
                          <div class="modal-body">
                            <?php echo i18n::__('are_sure_delete_registers') ?>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                            <button type="button" class="btn btn-danger" onclick="$('#frmDeleteAll').submit()">Confirmar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>

                  <div style="margin-bottom: 10px; margin-top: 30px "></div>

                </div>
              </div>




            </div><!-- /.widget-main -->
          </div><!-- /.widget-body -->
        </div><!-- /.widget-box -->
      </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- PAGE CONTENT ENDS -->
  </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<div class="footer">
  <?php view::includePartial('admin/footerAdmin') ?>
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


<!-------------------------------------------------------------->
<!-- Filtros -->
