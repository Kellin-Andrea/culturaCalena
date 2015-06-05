<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>

<?php view::includePartial('recaudoEconomico/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h1 class="glyphicon glyphicon-usd"> <?php echo i18n::__('newEconomic')?></h1>
       </div>
<?php view::includePartial('recaudoEconomico/formUser', array ('objevento'=> $objevento, 'objUsuarios'=> $objUsuarios, 'objtarifa'=> $objtarifa)) ?>

</div>

