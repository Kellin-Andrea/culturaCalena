<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $tipoDocumento = tipoDocumentoTableClass::NOMBRE?>
<?php view::includePartial('tipoDocumento/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
    
      <h1 class="glyphicon glyphicon-credit-card"> <?php echo i18n::__('editDocumentType')?> <?php echo $objtipoDocumento[0]->$tipoDocumento ?></h1>
  </div>
    

<?php view::includePartial('tipoDocumento/formUser', array('objtipoDocumento' => $objtipoDocumento, 'tipoDocumento' => $tipoDocumento)) ?>

</div>

