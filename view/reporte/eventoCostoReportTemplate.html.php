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
               
                <script>

      $(document).ready(function () {
        var data = [
<?php foreach ($objCateEvento as $data): ?>





  <?php echo '["' . $data->nombre . '",' . $data->conteo . '],'; ?>

<?php endforeach; ?>
        ];
                var plot1 = jQuery.jqplot('chart1', [data],
                        {
                          seriesDefaults: {
                            // Make this a pie chart.
                            renderer: jQuery.jqplot.PieRenderer,
                            rendererOptions: {
                              // Put data labels on the pie slices.
                              // By default, labels show the percentage of the slice.
                              showDataLabels: true
                            }
                          },
                          legend: {show: true, location: 'e'}
                        }
                );
      });

    </script>
                
                <div class="col-md-12">
                    <img id="images" src="<?php echo routing::getInstance()->getUrlImg('logo.png') ?>">
                    
                    <h1 id="titulo"> Reporte Evento Categoria</h1>
                       <?php if (empty($objCateEvento)): ?>  
            
             <div class="alert alert-info" role="alert"> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo i18n::__('errorReport')?></div>


        <?php else : ?>
                     <div id="chart1" ></div>
                    
                     <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                
                                <th><?php echo i18n::__('NumEvent') ?></th>
                                <th><?php echo i18n::__('cost') ?></th>
                                <th><?php echo i18n::__('category') ?></th>
                                
                              </tr>
                               <tbody>

                              <?php   foreach ($objCateEvento as $dato): ?>
                                <tr>
                                  
                                  <td><?php  echo $dato->conteo ?></td>
                                  <td><?php  echo $dato->costo ?></td>
                                  <td><?php  echo $dato->nombre?></td>
                                  
                                  
                                 
                                </tr>

                              
                              <?php endforeach ?>
                            </tbody>
                           <?php endif?>
                          </table>
                      <?php if (empty($objCateEvento)): ?>  
                     
                     <?php else:?>
                     <a class="btn btn-success btn-lg" target="popup" href="<?php echo routing::getInstance()->getUrlWeb('reporte', 'eventoCostoReportPdf'); ?>" role="button"> <?php  echo i18n::__('printReport') ?></a>
                     <?php endif?>
                     <a class="btn btn-default btn-lg"  href="<?php echo routing::getInstance()->getUrlWeb('reporte', 'index'); ?>" role="button"> <?php  echo i18n::__('homePage') ?></a>
      
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        

    </div>
    <!-- /.container -->

