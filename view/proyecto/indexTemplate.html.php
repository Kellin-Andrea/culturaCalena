<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\view\viewClass as view ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\config\configClass as config ?>
<?php use mvc\request\requestClass as request ?>
<?php use mvc\session\sessionClass as session ?>
<?php $id = eventoTableClass::ID ?>

<header>
    <?php view::includePartial('homepage/menuPrincipal')?>
</header>

<div class="container container-fluid">
  
  <form id="formuProyect" class="form-signin" role="form" action="<?php  echo routing::getInstance()->getUrlWeb('proyecto', 'categoria') ?>" method="POST">
    <div class="form-group">
         
              <label> <?php echo i18n::__('category') ?></label>
              <select required class="form-control" id="<?php echo eventoTableClass::getNameField(eventoTableClass::CATEGORIA_ID, true) ?>" name="<?php  echo eventoTableClass::getNameField(eventoTableClass::CATEGORIA_ID, true) ?>" >
               <option value=""><?php echo i18n::__('category_select') ?></option>
                <?php foreach ($objCategoria2  as $dato): ?> -->
                  <option value="<?php  echo $dato->id ?>"><?php  echo $dato->nombre ?></option>
                <?php  endforeach ?>
              </select>
              
                <span class="glyphicon glyphicon-remove form-control-feedback" ></span> 
                       
            </div>
    <button class="btn btn-xs btn-default btn-group-mini" type="submit">Filtrar</button>
  </form>
  
  <?php foreach ($arrayEvento as $img): ?>
  <div class="hovergallery">
    <div class="row">
      <?php foreach ($img as $imagen): ?>
        <div class="col-lg-4">
          <a href="#" data-toggle="modal" data-target="#myModalEvento<?php echo $imagen['key'] ?>">
            <img src="<?php echo $imagen['imagen'] ?>" class="thumbnail img-responsive">
          </a>
          <div id="titleEventoProyecto">
        <?php echo $imagen['name']?>
      </div>
        </div>
      
      <?php endforeach ?>
    </div>
  </div>
  <?php endforeach ?>

  <?php foreach ($objProyecto as $key => $dato): ?>
  
 
    <div class="modal" id="myModalEvento<?php echo $key ?>" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal">×</button>
            <h3 class="modal-title"><?php echo i18n::__('events') ?></h3>
          </div>
          <div class="modal-body" >

            <p><?php echo i18n::__('name') ?> : <?php echo $dato->evento ?></p>
            <p> <?php echo i18n::__('description') ?> : <?php echo $dato->descripcion ?></p>
            <p><?php echo i18n::__('adress') ?> : <?php echo $dato->direccion ?></p>
            <p><?php echo i18n::__('date')?> : <?php echo $dato->fecha_inicial_evento?></p>
            <p><?php echo i18n::__('cost') ?> :       <?php echo $dato->costo ?></p>
            
            
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
  <?php endforeach ?>
</div>  


<div class="text-right">
  <?php echo i18n::__('page') ?> <select id="sqlPaginador" onchange="Paginador(this, '<?php echo routing::getInstance()->getUrlWeb('proyecto', 'index') ?>')">
  <?php for ($x = 1; $x <= $cntPages; $x++): ?>
      <option <?php echo (isset($page) and $page == $x) ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
    <?php endfor ?>
  </select> 
  <?php echo i18n::__('of') ?> <?php echo $cntPages ?>
</div>

<div class="panel-grid" id="pg">
  <?php view::includePartial('homepage/relleno')?>
</div>
<footer>
<?php view::includePartial('homepage/footer')?>
  </footer>