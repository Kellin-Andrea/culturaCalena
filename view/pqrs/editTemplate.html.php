<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $tipoPqrs= tipoPqrsTableClass::ID ?>
<?php $estadoPqrs= estadoPqrsTableClass::ID ?>
<?php $pqrs = pqrsTableClass::ID ?>
<?php view::includePartial('pqrs/menuPrincipal')?>
<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
      
      <h1 class="glyphicon glyphicon-list-alt"><?php echo i18n::__('editfeedback')?> <?php echo $objpqrs[0]->$pqrs?></h1>  
 
        
              
  </div>
<?php view::includePartial('pqrs/formUser', array('objpqrs' => $objpqrs,'objDetalle'=>$objDetalle,'objestado'=>$objestado, 'objtipoPqrs'=>$objtipoPqrs)) ?>

</div>
    

