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

<?php $usu = sliderImageTableClass::NOMBRE ?>


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


                <div class="container container-fluid">
                  <h1><i class="glyphicon glyphicon-image"></i> <?php echo i18n::__('sliderManagement') ?></h1>
                  <form id="frmDeleteAll" action="<?php // echo routing::getInstance()->getUrlWeb('slider', 'deleteSelect')  ?>" method="POST">
                    <div style="margin-bottom: 10px; margin-top: 30px">

                    </div>

                    <?php view::includeHandlerMessage() ?>

                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th><?php echo i18n::__('position') ?></th>
                          <th><?php echo i18n::__('image') ?></th>
                          <th><?php echo i18n::__('nameSli') ?></th>
                          <th><?php echo i18n::__('actions') ?></th>
                        </tr>
                      </thead>
                      <tbody id="shortable">

                        <?php foreach ($objSlider as $slider): ?>
                          <tr id="<?php echo $slider->id ?>">
                            <td class="myThumbPos">
                              <input type="number" name="pos[<?php echo $slider->id ?>]" value="<?php echo $slider->posicion ?>"
                            </td>
                            <td class="myThumb">
                              <a href="<?php echo routing::getInstance()->getUrlImgSlider($slider->imagen) ?>" data-lightbox="roadtrip" data-title="<?php echo $slider->nombre ?>">
                                <img src="<?php echo routing::getInstance()->getUrlImgSlider($slider->imagen) ?>" class="expando thumbnail myThumb">
                              </a>
                            </td>
                            <td><?php echo $slider->nombre ?></td>
                            <td>
                              <a href="<?php  echo routing::getInstance()->getUrlWeb('slider', 'edit', array(sliderImageTableClass::ID => $slider->id))  ?>" class="btn btn-success btn-xs"><i class=" glyphicon glyphicon-pencil"></i></a>
                              <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $slider->id ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>


                            </td>
                          </tr>
                        <div class="modal fade" id="myModalDelete<?php echo $slider->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirm') ?> </h4>
                              </div>
                              <div class="modal-body">
                                <?php echo i18n::__('are_sure_delete_this_register') ?> <?php echo $slider->$usu ?> 
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                                <button type="button" class="btn btn-danger"onclick="eliminar(<?php echo $slider->id ?>, '<?php echo sliderImageTableClass::getNameField(sliderImageTableClass::ID, false) ?>', '<?php echo routing::getInstance()->getUrlWeb('slider', 'delete') ?> ')"><?php echo i18n::__('confirm') ?></button>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php endforeach ?>
                      </tbody>

                    </table>
                    
                    <button type="submit" onclick="console.log($('#sortable').sortable('toArray'))"><?php echo i18n::__('registerPosition')?></button>
                    
                  </form>    

                  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('slider', 'delete') ?>" method="POST">
                    <input type="hidden" id="idDelete" name="<?php echo sliderImageTableClass::getNameField(sliderImageTableClass::ID, FALSE) ?>">

                    <a id="boton" href="<?php echo routing::getInstance()->getUrlWeb('homepage', 'index') ?>" type="button" class="btn btn-success" class="btn btn-danger btn-xs"> <i class="fa fa-home"></i></a>
                    <a id="boton" href="<?php echo routing::getInstance()->getUrlWeb('slider', 'insert') ?>" type="button" class="btn btn-info"><i class="glyphicon glyphicon-certificate"></i></a>





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
//  window.jQuery || document.write("<script src='../assets/js/jquery.js'>" + "<" + "/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
//  if ('ontouchstart' in document.documentElement)
//    document.write("<script src='../assets/js/jquery.mobile.custom.js'>" + "<" + "/script>");
</script>
<!--<script src="../assets/js/bootstrap.js"></script>-->
<!-- page specific plugin scripts -->

<!-- inline scripts related to this page -->
<script type="text/javascript">

  $(document).ready(function () {
    $("#sortable").sortable();
    $("#sortable").disableSelection();
  });

</script>

<script type='text/javascript'>


if (document.images){
(function(){
var cos, a = /Apple/.test(navigator.vendor), times = a? 20 : 40, speed = a? 40 : 20;
var expConIm = function(im){
im = im || window.event;
if (!expConIm.r.test (im.className))
im = im.target || im.srcElement || null;
if (!im || !expConIm.r.test (im.className))
return;
var e = expConIm,
widthHeight = function(dim){
return dim[0] * cos + dim[1] + 'px';
},
resize = function(){
cos = (1 - Math.cos((e.ims[i].jump / times) * Math.PI)) / 2;
im.style.width = widthHeight (e.ims[i].w);
im.style.height = widthHeight (e.ims[i].h);
if (e.ims[i].d && times > e.ims[i].jump){
++e.ims[i].jump;
e.ims[i].timer = setTimeout(resize, speed);
} else if (!e.ims[i].d && e.ims[i].jump > 0){
--e.ims[i].jump;
e.ims[i].timer = setTimeout(resize, speed);
}
}, d = document.images, i = d.length - 1;
for (i; i > -1; --i)
if(d[i] == im) break;
i = i + im.src;
if (!e.ims[i]){
im.title = '';
e.ims[i] = {im : new Image(), jump : 0};
e.ims[i].im.onload = function(){
e.ims[i].w = [e.ims[i].im.width - im.width, im.width];
e.ims[i].h = [e.ims[i].im.height - im.height, im.height];
e (im);
};
e.ims[i].im.src = im.src;
return;
}
if (e.ims[i].timer) clearTimeout(e.ims[i].timer);
e.ims[i].d = !e.ims[i].d;
resize ();
};

expConIm.ims = {};

expConIm.r = new RegExp('\\bexpando\\b');

if (document.addEventListener){
document.addEventListener('mouseover', expConIm, false);
document.addEventListener('mouseout', expConIm, false);
}
else if (document.attachEvent){
document.attachEvent('onmouseover', expConIm);
document.attachEvent('onmouseout', expConIm);
}
})();
}
//]]>
</script>

</div>


<!-------------------------------------------------------------->
<!-- Filtros -->
