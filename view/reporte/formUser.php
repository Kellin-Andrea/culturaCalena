<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>

<?php $id = reporteTableClass::ID ?>
<?php $nom = reporteTableClass::NOMBRE  ?>
<?php $desc = reporteTableClass::DESCRIPCION?>



<div class="container container-fluid">
    <div class="panel panel-primary">
       
        <div class="panel-body">
<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('reporte',((isset($objreporte)) ? 'update' : 'create')) ?>">
  
       <?php if (isset($objreporte)== true) :?>
    <input name="<?php echo reporteTableClass::getNameField(reporteTableClass::ID, true) ?>" value="<?php  echo $objreporte[0]->$id?>" type="hidden">
    <?php endif ?>
    
      <div class="form-group">
          <label for="<?php echo reporteTableClass::getNameField(reporteTableClass::NOMBRE, true)?>"  name="<?php echo reporteTableClass::getNameField(reporteTableClass::NOMBRE, true)?><" class="col-sm-2 control-label"> <?php echo i18n::__('name')?></label>
    <div class="col-sm-7">
        <?php mvc\view\viewClass::getMessageError('inputdescription') ?>
        <input  type="text" class="form-control" id="<?php echo reporteTableClass::getNameField(reporteTableClass::NOMBRE, true)?>"  name="<?php echo reporteTableClass::getNameField(reporteTableClass::NOMBRE, true)?>"
                value="<?php  echo (session::getInstance()->hasFlash(reporteTableClass::getNameField(reporteTableClass::NOMBRE, true)) === true)  ?  request::getInstance()->getPost(reporteTableClass::getNameField(reporteTableClass::NOMBRE, true)) :  ((( isset($objreporte) == true ) ?  $objreporte[0]->$nom  :  '' ))  ?>" placeholder=<?php echo i18n::__('name')?> >
    </div>
  </div>
      
           <?php if (isset($objreporte)== true) :?>
    <input name="<?php echo reporteTableClass::getNameField(reporteTableClass::ID, true) ?>" value="<?php  echo $objreporte[0]->$id?>" type="hidden">
    <?php endif ?>
    
      <div class="form-group">
          <label for="<?php echo reporteTableClass::getNameField(reporteTableClass::DESCRIPCION, true)?>"  name="<?php echo reporteTableClass::getNameField(reporteTableClass::DESCRIPCION, true)?><" class="col-sm-2 control-label"> <?php echo i18n::__('description')?></label>
    <div class="col-sm-7">
        <?php mvc\view\viewClass::getMessageError('inputCost') ?>
        <input  type="text" class="form-control" id="<?php echo reporteTableClass::getNameField(reporteTableClass::DESCRIPCION, true)?>"  name="<?php echo reporteTableClass::getNameField(reporteTableClass::DESCRIPCION, true)?>"
                value="<?php  echo (session::getInstance()->hasFlash(reporteTableClass::getNameField(reporteTableClass::DESCRIPCION, true)) === true)  ?  request::getInstance()->getPost(reporteTableClass::getNameField(reporteTableClass::DESCRIPCION, true)) :  ((( isset($objreporte) == true ) ?  $objreporte[0]->$desc :  '' ))  ?>" placeholder=<?php echo i18n::__('description')?>>
    </div>
  </div>
      
      <div class="form-group">
    <div class="col-sm-offset-5 col-sm-10">
      
        <button type="submit" class="btn btn-primary"><?php echo i18n::__('register')?></button>
    </div>
  </div>
</form>