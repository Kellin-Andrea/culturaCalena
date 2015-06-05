<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $recaudoEconomico = recaudoEconomicoTableClass::EVENTO_ID?>
<?php view::includePartial('recaudoEconomico/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h1 class="glyphicon glyphicon-usd"> <?php echo i18n::__('editEconomicManagement')?> <?php echo $objrecaudoEconomico[0]->$recaudoEconomico ?></h1>
       </div>
<?php view::includePartial('recaudoEconomico/formUser', array('objrecaudoEconomico' => $objrecaudoEconomico, 'recaudoEconomico' => $recaudoEconomico)) ?>
</div>

