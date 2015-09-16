<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\session\sessionClass as session ?>
<?php
use mvc\request\requestClass as request ?>

<?php $id = eventoTableClass::ID ?>
<?php $files = eventoTableClass::IMAGEN ?>
<?php $nom = eventoTableClass::NOMBRE ?>
<?php $desc = eventoTableClass::DESCRIPCION ?>
<?php $fecha = eventoTableClass::FECHA_INICIAL_EVENTO ?>
<?php $final = eventoTableClass::FECHA_FINAL_EVENTO ?>
<?php $dire = eventoTableClass::DIRECCION ?>
<?php $costo = eventoTableClass::COSTO ?>

<?php $iD = eventoTableClass::CATEGORIA_ID ?>
<?php $public = eventoTableClass::FECHA_INICIAL_PUBLICACION ?>
<?php $fin = eventoTableClass::FECHA_FINAL_PUBLICACION ?>
<?php $lugar = eventoTableClass::LUGAR_LATITUD ?>
<?php $long = eventoTableClass::LUGAR_LONGITUD ?>
<?php $nombre = categoriaTableClass::NOMBRE ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrhzXX4zUepHIL5SlsTGOR2otR78okagc&sensor=TRUE"></script>

<div class="container container-fluid">
    <div class="panel panel-primary">

        <div class="panel-body">
            <form enctype="multipart/form-data" id="Formulario" class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('evento', ((isset($objevento)) ? 'update' : 'create')) ?>">

                <?php if (isset($objevento) == true) : ?>
                    <input name="<?php echo eventoTableClass::getNameField(eventoTableClass::ID, true) ?>" value="<?php echo $objevento[0]->$id ?>" type="hidden">
                <?php endif ?>

                <div class="form-group <?php echo (session::getInstance()->hasFlash('inputFile')) ? 'has-error has-feedback' : '' ?>">
                    <label for="<?php echo eventoTableClass::getNameField(eventoTableClass::IMAGEN, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::IMAGEN, true) ?>" class="col-sm-2 control-label"> <?php echo i18n::__('image') ?></label>
                    <div class="col-lg-7">
                        <?php mvc\view\viewClass::getMessageError('inputFile') ?>
                        <input type="file" class="form-control" id="<?php echo eventoTableClass::getNameField(eventoTableClass::IMAGEN, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::IMAGEN, true) ?>"
                               value="<?php echo (request::getInstance()->hasPost(eventoTableClass::getNameField(eventoTableClass::IMAGEN, true)) === true) ? request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::IMAGEN, true)) : ((( isset($objevento) == true ) ? $objevento[0]->$files : '' )) ?>">
                    </div>
                </div>

                <div class="form-group <?php echo (session::getInstance()->hasFlash('inputnameEvent')) ? 'has-error has-feedback' : '' ?>">
                    <label for="<?php echo eventoTableClass::getNameField(eventoTableClass::NOMBRE, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::NOMBRE, true) ?>" class="col-sm-2 control-label"> <?php echo i18n::__('eventName') ?></label>
                    <div class="col-lg-7">
                        <?php mvc\view\viewClass::getMessageError('inputnameEvent') ?>
                        <input type="text" class="form-control" id="<?php echo eventoTableClass::getNameField(eventoTableClass::NOMBRE, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::NOMBRE, true) ?>" placeholder="<?php echo i18n::__('eventName') ?>"
                               value="<?php echo (request::getInstance()->hasPost(eventoTableClass::getNameField(eventoTableClass::NOMBRE, true)) === true) ? request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::NOMBRE, true)) : ((( isset($objevento) == true ) ? $objevento[0]->$nom : '' )) ?>">
                    </div>
                </div>

                <div class="form-group <?php echo (session::getInstance()->hasFlash('inputdescription')) ? 'has-error has-feedback' : '' ?>">
                    <label for="<?php echo eventoTableClass::getNameField(eventoTableClass::DESCRIPCION, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::DESCRIPCION, true) ?>" class="col-sm-2 control-label"> <?php echo i18n::__('description') ?></label>
                    <div class="col-lg-7">
                        <?php mvc\view\viewClass::getMessageError('inputdescription') ?>
                        <input type="text" class="form-control" id="<?php echo eventoTableClass::getNameField(eventoTableClass::DESCRIPCION, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::DESCRIPCION, true) ?>" placeholder="<?php echo i18n::__('description') ?>"
                               value="<?php echo (request::getInstance()->hasPost(eventoTableClass::getNameField(eventoTableClass::DESCRIPCION, true)) === true) ? request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::DESCRIPCION, true)) : ((( isset($objevento) == true ) ? $objevento[0]->$desc : '' )) ?>">
                    </div>
                </div>

                <div class="form-group <?php echo (session::getInstance()->hasFlash('inputdate')) ? 'has-error has-feedback' : '' ?>">
                    <label for="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_EVENTO, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_EVENTO, true) ?>" class="col-sm-2 control-label"> <?php echo i18n::__('start_date') ?></label>
                    <div class="col-lg-7">
                        <?php mvc\view\viewClass::getMessageError('inputdate') ?>
                      <input type="datetime-local" class="form-control" id="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_EVENTO, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_EVENTO, true) ?>" placeholder="<?php echo i18n::__('start_date') ?>"
                             value="<?php echo (request::getInstance()->hasPost(eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_EVENTO, true)) === true) ? request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_EVENTO, true)) : ((( isset($objevento) == true ) ? date('Y-m-d', strtotime($objevento[0]->$fecha)) : '' )) ?>">
                    </div>
                </div>

                <div class="form-group <?php echo (session::getInstance()->hasFlash('inputdate1')) ? 'has-error has-feedback' : '' ?>">
                    <label for="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_EVENTO, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_EVENTO, true) ?>" class="col-sm-2 control-label"> <?php echo i18n::__('finish_date') ?></label>
                    <div class="col-lg-7">
                        <?php mvc\view\viewClass::getMessageError('inputdate1') ?>
                      <input type="datetime-local" class="form-control" id="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_EVENTO, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_EVENTO, true) ?>" placeholder="<?php echo i18n::__('finish_date') ?>"
                             value="<?php echo (request::getInstance()->hasPost(eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_EVENTO, true)) === true) ? request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_EVENTO, true)) : ((( isset($objevento) == true ) ? date('Y-m-d', strtotime($objevento[0]->$final)) : '' )) ?>">
                    </div>
                </div>

                <div class="form-group <?php echo (session::getInstance()->hasFlash('inputaddress')) ? 'has-error has-feedback' : '' ?>">
                    <label for="<?php echo eventoTableClass::getNameField(eventoTableClass::DIRECCION, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::DIRECCION, true) ?>" class="col-sm-2 control-label"> <?php echo i18n::__('adress') ?></label>
                    <div class="col-lg-7">
                        <?php mvc\view\viewClass::getMessageError('inputaddress') ?>
                        <input type="text" class="form-control" id="<?php echo eventoTableClass::getNameField(eventoTableClass::DIRECCION, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::DIRECCION, true) ?>" placeholder="<?php echo i18n::__('adress') ?>"
                               value="<?php echo (request::getInstance()->hasPost(eventoTableClass::getNameField(eventoTableClass::DIRECCION, true)) === true) ? request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::DIRECCION, true)) : ((( isset($objevento) == true ) ? $objevento[0]->$dire : '' )) ?>">
                    </div>
                </div>

                <div class="form-group <?php echo (session::getInstance()->hasFlash('inputmoney')) ? 'has-error has-feedback' : '' ?>">
                    <label for="<?php echo eventoTableClass::getNameField(eventoTableClass::COSTO, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::COSTO, true) ?>" class="col-sm-2 control-label"> <?php echo i18n::__('cost') ?></label>
                    <div class="col-lg-7">
                        <?php mvc\view\viewClass::getMessageError('inputmoney') ?>
                        <input type="number" class="form-control" id="<?php echo eventoTableClass::getNameField(eventoTableClass::COSTO, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::COSTO, true) ?>" placeholder="<?php echo i18n::__('cost') ?>"
                               value="<?php echo (request::getInstance()->hasPost(eventoTableClass::getNameField(eventoTableClass::COSTO, true)) === true) ? request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::COSTO, true)) : ((( isset($objevento) == true ) ? $objevento[0]->$costo : '' )) ?>">
                    </div>
                </div>

                <div class="form-group <?php echo (session::getInstance()->hasFlash('inputcategory')) ? 'has-error has-feedback' : '' ?>">

                    <label for="<?php echo eventoTableClass::getNameField(eventoTableClass::CATEGORIA_ID, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::CATEGORIA_ID, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('category') ?></label>
                    <div class="col-lg-7">
                        <?php mvc\view\viewClass::getMessageError('inputcategory') ?>
                        <select class="form-control" id="<?php echo eventoTableClass::getNameField(eventoTableClass::CATEGORIA_ID, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::CATEGORIA_ID, true) ?>">
                            <option value=""> -----<?php echo i18n::__('category_select') ?> -----    </option>
                            <?php foreach ($objcategoria as $categoria): ?>
                            <option value="<?php echo $categoria->id ?>"<?php echo (isset($objevento)) ? ($categoria->id === $objevento[0]->categoria_id) ? 'selected' : '' : '' ?>><?php echo categoriaTableClass::getNombreById($categoria->id) ?></option>

                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group <?php echo (session::getInstance()->hasFlash('inputdatePublic')) ? 'has-error has-feedback' : '' ?>">
                    <label for="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_PUBLICACION, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_PUBLICACION, true) ?>" class="col-sm-2 control-label"> <?php echo i18n::__('publicationStartDate') ?></label>
                    <div class="col-lg-7">
                        <?php mvc\view\viewClass::getMessageError('inputdatePublic') ?>
                      <input type="datetime-local" class="form-control" id="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_PUBLICACION, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_PUBLICACION, true) ?>"
                               value="<?php echo (request::getInstance()->hasPost(eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_PUBLICACION, true)) === true) ? request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_PUBLICACION, true)) : ((( isset($objevento) == true ) ? date('Y-m-d', strtotime($objevento[0]->$public)) : 'publicationStartDate' )) ?>">
                    </div>
                </div>

                <div class="form-group <?php echo (session::getInstance()->hasFlash('inputdatePublic1')) ? 'has-error has-feedback' : '' ?>">
                    <label for="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_PUBLICACION, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_PUBLICACION, true) ?>" class="col-sm-2 control-label"> <?php echo i18n::__('publicationFinishDate') ?></label>
                    <div class="col-lg-7">
                        <?php mvc\view\viewClass::getMessageError('inputdatePublic1') ?>
                      <input type="datetime-local" class="form-control" id="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_PUBLICACION, true) ?>"  name="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_PUBLICACION, true) ?>"
                               value="<?php echo (request::getInstance()->hasPost(eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_PUBLICACION, true)) === true) ? request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_PUBLICACION, true)) : ((( isset($objevento) == true ) ? date('Y-m-d', strtotime($objevento[0]->$fin)) : '' )) ?>">
                    </div>
                </div>

                <div class="form-group" id="googleMapBlock">
                    <label class="col-sm-2 control-label"><i class="fa fa-map-marker fa-fw"></i>Mapa<br><button type="button" id="btnCapturarGoogleMap" class="btn btn-default btn-xs">Capturar posición</button></label>
                    <div class="col-lg-7" style="height: 500px" id="googleMap"></div>
                </div>

                <input required type="hidden" class="form-control" id="googleMapLatitud"  name="googleMapLatitud" 
                       value="<?php echo (request::getInstance()->hasPost(eventoTableClass::getNameField(eventoTableClass::LUGAR_LATITUD, true)) === true) ? request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::LUGAR_LATITUD, true)) : ((( isset($objevento) == true ) ? $objevento[0]->$lugar : '' )) ?>">

                <input required type="hidden" class="form-control" id="googleMapLongitud"  name="googleMapLongitud"
                       value="<?php echo (request::getInstance()->hasPost(eventoTableClass::getNameField(eventoTableClass::LUGAR_LONGITUD, true)) === true) ? request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::LUGAR_LONGITUD, true)) : ((( isset($objevento) == true ) ? $objevento[0]->$long : '' )) ?>">

                <div class="form-group">
                    <div class="text-center">
                        <div class="col-sm-offset-2 col-sm-7">
                            <a href="<?php echo session::getInstance()->hasCredential('admin')? routing::getInstance()->getUrlWeb('evento', 'index'): routing::getInstance()->getUrlWeb('proyecto', 'index') ?>" type="button" class="btn btn-success" class="btn btn-danger btn-xs"> <i class="fa fa-home"></i></a>
                            <button type="submit" class="btn btn-primary"><?php echo i18n::__('register') ?></button>
                        </div>
                    </div>


            </form>
        </div>
    </div>
</div>
</div>

