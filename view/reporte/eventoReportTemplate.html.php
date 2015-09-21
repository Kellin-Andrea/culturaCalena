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

<?php

use mvc\session\sessionClass as session ?>





<!-- Navigation -->
<div>

</div>
<div class="container">

  <div class="row">
    <div class="box">



      <div class="col-md-12">
        <img id="images" src="<?php echo routing::getInstance()->getUrlImg('logo.png') ?>">

        <h1 id="titulo"> Reporte Evento Categoria</h1>
<?php if (empty($objCateEvento)): ?>  

          <div class="alert alert-info" role="alert"> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php echo i18n::__('errorReport') ?></div>


<?php else : ?>

          <table class="table table-bordered table-hover">
            <thead>
              <tr>

                <th><?php echo i18n::__('name') ?></th>
                <th><?php echo i18n::__('description') ?></th>
                <th><?php echo i18n::__('start_date') ?></th>
                <th><?php echo i18n::__('finish_date') ?></th>
                <th><?php echo i18n::__('publicationStartDate') ?></th>
                <th><?php echo i18n::__('publicationFinishDate') ?></th>
                <th><?php echo i18n::__('category') ?></th>
              </tr>
            <tbody>

  <?php foreach ($objEventoCate as $dato): ?>
                <tr>

                  <td><?php echo $dato->evento ?></td>
                  <td><?php echo $dato->descripcion ?></td>
                  <td><?php echo $dato->fecha_inicial_evento ?></td>
                  <td><?php echo $dato->fecha_final_evento ?></td>
                  <td><?php echo $dato->fecha_inicial_publicacion ?></td>
                  <td><?php echo $dato->fecha_final_publicacion ?></td>
                  <td><?php echo $dato->nombre ?></td>



                </tr>

              <?php endforeach ?>
<?php endif ?>
          </tbody>

        </table>
        <?php if (empty($objCateEvento)): ?>  
        
         <?php else:?>
        <a class="btn btn-success btn-lg" target="popup" href="<?php echo routing::getInstance()->getUrlWeb('reporte', 'eventoReportPdf'); ?>" role="button"> <?php echo i18n::__('printReport') ?></a>
        <?php endif?>
        <a class="btn btn-default btn-lg"  href="<?php echo routing::getInstance()->getUrlWeb('reporte', 'index'); ?>" role="button"> <?php echo i18n::__('homePage') ?></a>

      </div>
      <div class="clearfix"></div>
    </div>
  </div>



</div>
<!-- /.container -->

