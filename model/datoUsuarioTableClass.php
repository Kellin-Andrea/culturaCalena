<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
  /**
 * @description: En esta clase se manejara las consultas que tengar quever con la tabla  
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al modelo  es la Table .
 */
class datoUsuarioTableClass extends datoUsuarioBaseTableClass {

    /**
     * @author: 
     * Shirley Marcela Rivero <marce250494@hotmail.com>
     * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
     * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
     * @return datatype description: Array $usuario, $password, $apellido, $correo, $genero, $fechaNacimiento, $localidad, $tipoDocumento, $organizacion.
     */
    public static function verifyDate($usuario, $password, $apellido, $correo, $genero, $fechaNacimiento, $localidad, $tipoDocumento, $organizacion) {
        try {
            $sql = 'SELECT  ' . usuarioTableClass::getNameField(usuarioTableClass::USER) . ' as usuario,
                       ' . usuarioTableClass::getNameField(usuarioTableClass::PASSWORD) . ' as password,
                       ' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO) . ' as apellido,
                       ' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO) . ' as correo,
                       ' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::GENERO) . ' as genero,
                       ' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::FECHA_NACIMIENTO) . ' as fecha,
                       ' . localidadTableClass::getAll(localidadTableClass::NOMBRE) . ' as nombre,
                       ' . tipoDocumentoTableClass::getNameField(tipoDocumentoTableClass::NOMBRE) . ' as tipo, 
                       ' . organizacionTableClass::getAll(organizacionTableClass::NOMBRE) . ' as orga    
                     FROM  ' . usuarioTableClass::getNameTable() . 'LEFT JOIN ' . datoUsuarioTableClass::getNameTable() . 'ON' . usuarioTableClass::getNameField(usuarioTableClass::ID) . '=' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::USUARIO_ID) . ''
                    . 'LEFT JOIN' . localidadTableClass::getNameTable() . 'ON' . localidadTableClass::getNameField(localidadTableClass::ID) . '=' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::LOCALIDAD_ID) . 'LEFT JOIN' .
                    tipoDocumentoTableClass::getNameTable() . 'ON' . tipoDocumentoTableClass::getNameField(tipoDocumentoTableClass::ID) . '=' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::TIPO_DOCUMENTO_ID) . 'LEFT JOIN' .
                    organizacionTableClass::getNameTable() . 'ON' . organizacionTableClass::getNameField(organizacionTableClass::ID) . '=' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ORGANIZACION_ID) . '
                     WHERE  ' . credencialTableClass::DELETED_AT . '  IS  NULL '
                    . 'AND ' . credencialTableClass::ID . ' =  :id';
        }//end try 
        catch (Exception $ex) {
            
        }//end catch
    }//end function

}//end class
