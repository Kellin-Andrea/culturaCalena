<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>

<?php $id = usuarioGustaCategoriaTableClass::ID ?>
<?php $user = usuarioTableClass::USER ?>



<div class="container container-fluid">
    <div class="panel panel-primary">
        
        <div class="panel-body">

<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('usuarioGustaCategoria', ((isset($objusgusca)) ? 'update' : 'create')) ?>">
  
       <?php if (isset($objusgusca)== true) :?>
    <input name="<?php echo usuarioGustaCategoriaTableClass::getNameField(usuarioGustaCategoriaTableClass::ID, true) ?>" value="<?php  echo $objusgusca[0]->$id?>" type="hidden">
    <?php endif ?>
    
     
         <div class="form-group">

             <label for="<?php echo usuarioGustaCategoriaTableClass::getNameField(usuarioGustaCategoriaTableClass::USUARIO_ID, true) ?>"  name="<?php echo usuarioGustaCategoriaTableClass::getNameField(usuarioGustaCategoriaTableClass::USUARIO_ID, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('user') ?></label>
                <div class="col-sm-7">
                    <select class="form-control" id="<?php echo usuarioGustaCategoriaTableClass::getNameField(usuarioGustaCategoriaTableClass::USUARIO_ID, true) ?>"  name="<?php echo usuarioGustaCategoriaTableClass::getNameField(usuarioGustaCategoriaTableClass::USUARIO_ID, true) ?>">
                        <option value=""> -----<?php echo i18n::__('user_select')?> -----    </option>
                        <?php foreach ($objUsuarios as $usuario): ?>
                        <option value="<?php echo $usuario->id ?>"<?php echo (isset($objusgusca)) ? ($usuario->id === $objusgusca[0]->usuario_id) ? 'selected' : '' : '' ?>><?php echo usuarioTableClass::getNombreById($usuario->id) ?></option>

                        <?php endforeach ?>
                    </select>
                </div>
            </div>
      
    
       <div class="form-group">
           
           <label for="<?php echo usuarioGustaCategoriaTableClass::getNameField(usuarioGustaCategoriaTableClass::CATEGORIA_ID, true) ?>"  name="<?php echo usuarioGustaCategoriaTableClass::getNameField(usuarioGustaCategoriaTableClass::CATEGORIA_ID, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('category') ?></label>
             
           <div class="col-lg-7">
                            <select class="form-control" id="<?php echo usuarioGustaCategoriaTableClass::getNameField(usuarioGustaCategoriaTableClass::CATEGORIA_ID, true) ?>"  name="<?php echo usuarioGustaCategoriaTableClass::getNameField(usuarioGustaCategoriaTableClass::CATEGORIA_ID, true) ?>">
                                <option value=""> -----<?php echo i18n::__('category_select')?> -----</option>
                                <?php foreach ($objcategoria as $categoria): ?>
                                    <option value="<?php echo $categoria->id ?>"<?php echo (isset($objusgusca)) ? ($categoria->id === $objusgusca[0]->categoria_id) ? 'selected' : '' : '' ?>><?php echo categoriaTableClass::getNombreById($categoria->id) ?></option>

                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
      
      <div class="form-group">
    <div class="col-sm-offset-5 col-sm-7">
      
        <button type="submit" class="btn btn-primary"><?php echo i18n::__('register')?></button>
    </div>
  </div>
</form>
      
        </div>
    </div>
</div>
  