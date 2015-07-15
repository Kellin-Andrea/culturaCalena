<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $EventoPatrocinador = eventoPatrocinadorTableClass::ID ?>

<?php view::includePartial('eventoPatrocinador/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
      <h1 class="glyphicon glyphicon-star-empty">Editar Evento Patrocinador <?php echo $objEventoPatrocinador[0]->$EventoPatrocinador?></h1>
  </div>
<?php view::includePartial('eventoPatrocinador/formUser', array('objEventoPatrocinador'=> $objEventoPatrocinador,'EventoPatrocinador' => $EventoPatrocinador )) ?>

</div>
