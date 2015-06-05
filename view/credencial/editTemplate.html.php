<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $credencial = credencialTableClass::NOMBRE?>
<?php view::includePartial('credencial/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
      <h1 class="glyphicon glyphicon-credit-card"> <?php echo i18n::__('modify_credential') ?> <?php echo $objcredenciales[0]->$credencial ?></h1>

  </div>
    
<?php view::includePartial('credencial/formUser', array('objcredenciales' => $objcredenciales, 'credenciales' => $credencial)) ?>
</div>

