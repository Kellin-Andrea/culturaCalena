<?php

namespace mvc\validator {

  use mvc\validator\validatorClass;
  use mvc\session\sessionClass as session;
  use mvc\request\requestClass as request;
  use mvc\routing\routingClass as routing;
  use mvc\config\myConfigClass as config;

  /**
   * Description of shfSecurityCreateUserValidationClass
   *
   * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
   */
  class editDatoUsuarioValidatorClass extends validatorClass {

    public static function validateEdit($pass1, $pass2, $name, $lastName, $mail, $locality, $dateF, $genre, $typeDocument, $organization, $id, $categoria) {
      $flag = false;

      if ($categoria === null) {
        $flag = true;
        session::getInstance()->setError('Debe de seleccionar mínimo una categoría', 'chkCategoria');
      } else if (is_array($categoria)) {
        foreach ($categoria as $idCategoria) {
          if (self::collection($idCategoria, session::getInstance()->getAttribute('collectionCategorias')) === false) {
            $flag = true;
            session::getInstance()->setError('Por favor seleccione una categoría válida', 'chkCategoria');
            break;
          }
        }
        session::getInstance()->deleteAttribute('collectionCategorias');
      }

      if (self::notBlank($pass1) === false and self::notBlank($pass2) === false) {
        if (($pass1) !== ($pass2)) {
          $flag = true;
          session::getInstance()->setFlash('inputPass', true);
          session::getInstance()->setError('Las contraseñas no coinciden', 'inputPass');
        }
      }

      if (self::notBlank($name)) {
        $flag = true;
        session::getInstance()->setFlash('inputname', true);
        session::getInstance()->setError('El nombre del usuario es obligatorio', 'inputname');
      } else if (is_numeric($name)) {
        $flag = true;
        session::getInstance()->setFlash('inputname', true);
        session::getInstance()->setError('El nombre del usuario no puede ser númerico', 'inputname');
      } else if (strlen($name) > \datoUsuarioTableClass::NOMBRE_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputname', true);
        session::getInstance()->setError('El nombre del usuario excede los caracteres permitidos', 'inputname');
      }

      if (self::notBlank($lastName)) {
        $flag = true;
        session::getInstance()->setFlash('inputLastName', true);
        session::getInstance()->setError('El apellido del usuario es obligatorio', 'inputLastName');
      } else if (is_numeric($lastName)) {
        $flag = true;
        session::getInstance()->setFlash('inputLastName', true);
        session::getInstance()->setError('El apellido no puede ser númerico', 'inputLastName');
      } else if (strlen($lastName) > \datoUsuarioTableClass::APELLIDO_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputLastName', true);
        session::getInstance()->setError('El apellido excede los caracteres permitidos', 'inputLastName');
      }

      if (self::notBlank($mail)) {
        $flag = true;
        session::getInstance()->setFlash('inputEmail', true);
        session::getInstance()->setError('El correo es obligatorio para el contacto por parte de la plataforma', 'inputEmail');
      } else if (strlen($mail) > \datoUsuarioTableClass::CORREO_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputEmail', true);
        session::getInstance()->setError('El correo no puede exceder el máximo de caracteres permitidos', 'inputEmail');
      } else if (!preg_match("/([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}/", trim($mail))) {
        $flag = true;
        session::getInstance()->setFlash('inputEmail', true);
        session::getInstance()->setError('Por favor digite un corre válido', 'inputEmail');
      }

      if (self::notBlank($locality)) {
        $flag = true;
        session::getInstance()->setFlash('inputLocalidad', true);
        session::getInstance()->setError('Debes selecionar una localidad', 'inputLocalidad');
      }

      if (self::notBlank($dateF)) {
        $flag = true;
        session::getInstance()->setFlash('inputdatef', true);
        session::getInstance()->setError('la fecha de nacimiento es obligatorio', 'inputdatef');
      } else if (strtotime($dateF) >= strtotime(date(config::getFormatTimestamp()))) {
        $flag = true;
        session::getInstance()->setFlash('inputdatef', true);
        session::getInstance()->setError('La fecha nacimiento  no puede ser mayor o igual a la fecha ', 'inputdatef');
      }

      if (self::notBlank($genre)) {
        $flag = true;
        session::getInstance()->setFlash('inputGenero', true);
        session::getInstance()->setError('Debes selecionar un genero', 'inputGenero');
//            } else if (!self::collection(trim(request::getInstance()->getPost('inputGenero')), array('t', 'f'))) {
//                $flag = true;
//                session::getInstance()->setFlash('inputGenero', true);
//                session::getInstance()->setError('La respuesta dada no es correcta', 'inputGenero');
      }


      if (self::notBlank($typeDocument)) {
        $flag = true;
        session::getInstance()->setFlash('inputTipoDocumento', true);
        session::getInstance()->setError('Debes selecionar una identificacion', 'inputTipoDocumento');
      }

      if (self::notBlank($organization)) {
        $flag = true;
        session::getInstance()->setFlash('inputOrganizacion', true);
        session::getInstance()->setError('Debes selecionar una organizacion', 'inputOrganizacion');
      }

      if ($flag === true) {
        request::getInstance()->setMethod('GET');
        request::getInstance()->addParamGet(array(\datoUsuarioTableClass::ID => $id));
        routing::getInstance()->forward('datoUsuario', 'edit');
      }
    }

  }

}
