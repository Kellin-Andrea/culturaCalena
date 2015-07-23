<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $eventoPatrocinador = eventoPatrocinadorTableClass::ID ?>
<?php $evento = eventoTableClass::ID ?>
<?php view::includePartial('eventoPatrocinador/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
      <h1 class="glyphicon glyphicon-star-empty"> <?php echo $objEventoPatrocinador[0]->$eventoPatrocinador ?></h1>
  </div>
<?php view::includePartial('eventoPatrocinador/formUser', array('objEventoPatrocinador' => $objEventoPatrocinador, 'objEvento' => $objEvento, 'objPatrocinador' => $objPatrocinador)) ?>

</div>
