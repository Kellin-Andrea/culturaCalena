<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\editDatoUsuarioValidatorClass as validator;

/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author:
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo datoUsuario .
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ID, true));
        $name = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true));
        $lastName = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true));
        $mail = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true));
        $dateF = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::FECHA_NACIMIENTO, true));
        $genre = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::GENERO, true));
        $locality = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::LOCALIDAD_ID, true));
        $typeDocument = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::TIPO_DOCUMENTO_ID, true));
        $organization = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ORGANIZACION_ID, true));
        //$user = trim(request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true)));
        $pass1 = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_1');
        $pass2 = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_2');
        $categoria = (request::getInstance()->hasPost('categoria')) ? request::getInstance()->getPost('categoria') : null;

        validator::validateEdit($pass1, $pass2, $name, $lastName, $mail, $locality, $dateF, $genre, $typeDocument, $organization, $id, $categoria);

        $usuario_id = datoUsuarioTableClass::getIdUsuarioByIdDatoUsuario($id);

        if (empty($pass1) === false) {
          $ids = array(
              usuarioTableClass::ID => $usuario_id
          );
          $data = array(
              usuarioTableClass::PASSWORD => md5($pass1)
          );

          usuarioTableClass::update($ids, $data);
        }


        $ids = array(
            datoUsuarioTableClass::ID => $id
        );

        $data = array(
            datoUsuarioTableClass::NOMBRE => $name,
            datoUsuarioTableClass::APELLIDO => $lastName,
            datoUsuarioTableClass::CORREO => $mail,
            datoUsuarioTableClass::FECHA_NACIMIENTO => $dateF,
            datoUsuarioTableClass::GENERO => $genre,
            datoUsuarioTableClass::LOCALIDAD_ID => $locality,
            datoUsuarioTableClass::TIPO_DOCUMENTO_ID => $typeDocument,
            datoUsuarioTableClass::ORGANIZACION_ID => $organization
        );

        datoUsuarioTableClass::update($ids, $data);

        usuarioGustaCategoriaTableClass::delete(array(
          usuarioGustaCategoriaTableClass::USUARIO_ID => $usuario_id
        ), false);
        
        foreach ($categoria as $categoria_id) {
          $data = array(
              usuarioGustaCategoriaTableClass::USUARIO_ID => $usuario_id,
              usuarioGustaCategoriaTableClass::CATEGORIA_ID => $categoria_id
          );
          usuarioGustaCategoriaTableClass::insert($data);
        }
      }

    session::getInstance()->hasCredential('admin')?routing::getInstance()->redirect('datoUsuario', 'index'):routing::getInstance()->redirect('profile', 'index');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
