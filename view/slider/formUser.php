<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\session\sessionClass as session ?>
<?php
use mvc\request\requestClass as request ?>
<?php
use mvc\view\viewClass as view ?>

<?php $id = sliderImageTableClass::ID ?>
<?php $name = sliderImageTableClass::NOMBRE ?>
<?php $files= sliderImageTableClass::IMAGEN ?>

<div class="container container-fluid">
  <div class="panel panel-primary">

    <div class="panel-body">
      <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('slider', ((isset($objSlider)) ? 'update' : 'create')) ?>">

        <?php if (isset($objSlider) == true) : ?>
          <input name="<?php echo sliderImageTableClass::getNameField(sliderImageTableClass::ID, true) ?>" value="<?php echo $objSlider[0]->$id ?>" type="hidden">
        <?php endif ?>

<?php if(isset($objSlider)==false):?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash('inputFile')) ? 'has-error has-feedback' : '' ?>">
          <label for="<?php echo sliderImageTableClass::getNameField(sliderImageTableClass::IMAGEN, true) ?>"  name="<?php echo sliderImageTableClass::getNameField(sliderImageTableClass::IMAGEN, true) ?>" class="col-sm-2 control-label"> <?php echo i18n::__('image') ?></label>
          <div class="col-lg-7">

            <input type="file" class="form-control" id="<?php echo sliderImageTableClass::getNameField(sliderImageTableClass::IMAGEN, true) ?>"  name="<?php echo sliderImageTableClass::getNameField(sliderImageTableClass::IMAGEN, true) ?>"
                   value="<?php echo (request::getInstance()->hasPost(sliderImageTableClass::getNameField(sliderImageTableClass::IMAGEN, true)) === true) ? request::getInstance()->getPost(sliderImageTableClass::getNameField(sliderImageTableClass::IMAGEN, true)) : ((( isset($objSlider) == true ) ? $objSlider[0]->$files : '' )) ?>">
          </div>
        </div>
          <?php endif?>
          
          <br>
          
        <div class="form-group <?php echo (session::getInstance()->hasFlash('inputname')) ? 'has-error has-feedback' : '' ?>">
          <label for="<?php echo sliderImageTableClass::getNameField(sliderImageTableClass::NOMBRE, true) ?>"  name="<?php echo sliderImageTableClass::getNameField(sliderImageTableClass::NOMBRE, true) ?>" class="col-sm-2 control-label"> <?php echo i18n::__('nameSli') ?></label>
          <div class="col-lg-7">

            <input type="text" class="form-control" id="<?php echo sliderImageTableClass::getNameField(sliderImageTableClass::NOMBRE, true) ?>"  name="<?php echo sliderImageTableClass::getNameField(sliderImageTableClass::NOMBRE, true) ?>" placeholder="<?php echo i18n::__('nameSli') ?>"
                   value="<?php echo (request::getInstance()->hasPost(sliderImageTableClass::getNameField(sliderImageTableClass::NOMBRE, true)) === true) ? request::getInstance()->getPost(sliderImageTableClass::getNameField(sliderImageTableClass::NOMBRE, true)) : ((( isset($objSlider) == true ) ? $objSlider[0]->$name : '' )) ?>">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-5 col-lg-10">
            <a href="<?php echo routing::getInstance()->getUrlWeb('slider', 'index') ?>" type="button" class="btn btn-success" class="btn btn-danger btn-xs"> <i class="fa fa-home"></i></a>
            <button type="submit" class="btn-lg btn-primary"><?php echo i18n::__('register') ?></button>


          </div>


        </div>


    </div>
  </div>
</div> 
</div>


