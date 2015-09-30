<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author:
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo datoUsuario .
 */
class editActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet(datoUsuarioTableClass::ID)) {


        $fields1 = array(
            datoUsuarioTableClass::ID,
            datoUsuarioTableClass::NOMBRE,
            datoUsuarioTableClass::APELLIDO,
            datoUsuarioTableClass::CORREO,
            datoUsuarioTableClass::GENERO,
            datoUsuarioTableClass::FECHA_NACIMIENTO,
            datoUsuarioTableClass::TIPO_DOCUMENTO_ID,
            datoUsuarioTableClass::LOCALIDAD_ID,
            datoUsuarioTableClass::ORGANIZACION_ID
        );

        $where1 = array(
            datoUsuarioTableClass::ID => request::getInstance()->getGet(datoUsuarioTableClass::ID)
        );

        $fields2 = array(
            tipoDocumentoTableClass::ID,
            tipoDocumentoTableClass::NOMBRE
        );

        $ordeBy2 = array(
            tipoDocumentoTableClass::NOMBRE
        );

        $fields3 = array(
            localidadTableClass::ID,
            localidadTableClass::NOMBRE
        );

        $ordeBy3 = array(
            localidadTableClass::NOMBRE
        );

        $fields4 = array(
            organizacionTableClass::ID,
            organizacionTableClass::NOMBRE
        );

        $ordeBy4 = array(
            organizacionTableClass::NOMBRE
        );


        $this->objdatos = datoUsuarioTableClass::getAll($fields1, true, null, null, null, null, $where1);
        $this->objtipoDocumento = tipoDocumentoTableClass::getAll($fields2, true, $ordeBy2, 'ASC');
        $this->objlocal = localidadTableClass::getAll($fields3, true, $ordeBy3, 'ASC');
        $this->objorganizacion = organizacionTableClass::getAll($fields4, true, $ordeBy4, 'ASC');

        $usuario_id = datoUsuarioTableClass::getIdUsuarioByIdDatoUsuario(request::getInstance()->getGet(datoUsuarioTableClass::ID));
        
        $this->objUsuarioGustaCategoria = usuarioGustaCategoriaTableClass::getAll(array(
          usuarioGustaCategoriaTableClass::CATEGORIA_ID
        ), false, null, null, null, null, array(
          usuarioGustaCategoriaTableClass::USUARIO_ID => $usuario_id
        ));
        $arrayTemporal = array();
        foreach ($this->objUsuarioGustaCategoria as $gusta) {
          $arrayTemporal[] = $gusta->categoria_id;
        }
        $this->objUsuarioGustaCategoria = $arrayTemporal;

        $this->objCategorias = categoriaTableClass::getAll(array(
          categoriaTableClass::ID,
          categoriaTableClass::NOMBRE
        ));

        foreach ($this->objCategorias as $categoria) {
          $categorias[] = $categoria->id;
        }
        session::getInstance()->setAttribute('collectionCategorias', $categorias);
        session::getInstance()->setSuccess('Los datos fueron modificados exitosamente');
        session::getInstance()->setFlash('edit', true);
        
        $this->defineView('edit', 'datoUsuario', session::getInstance()->getFormatOutput());
        
        
        } else {
        routing::getInstance()->redirect('datoUsuario', 'index');
      }
//      if (request::getInstance()->isMethod('POST')) {
//
//        $user= request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true));
//        $pass1 = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true));
//
//        if (strlen($usuario) > usuarioTableClass::USUARIO_LENGTH) {
//          throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => usuarioTableClass::USUARIO_LENGTH)), 00001);
//        }
//
//        $data = array(
//            usuarioTableClass::USUARIO => $user,
//            usuarioTableClass::PASSWORD => md5($pass1)
//        );
//        usuarioTableClass::insert($data);
//        routing::getInstance()->redirect('default', 'index');
//      } else {
//        routing::getInstance()->redirect('default', 'index');
//      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
