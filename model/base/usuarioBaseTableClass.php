<?php

use mvc\model\table\tableBaseClass;

/**
 * @description: En esta clase se traen los atributos delas tablas de la base de datos 
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al modelo  es de la tableBase .
 */
class usuarioBaseTableClass extends tableBaseClass {

    protected $id;
    protected $user;
    protected $password;
    protected $actived;
    protected $last_login_at;
    protected $created_at;
    protected $updated_at;
    protected $deleted_at;
    protected static $package;

    const ID = 'id';
    const USER = 'user_name';
    const USER_LENGTH = 80;
    const PASSWORD = 'password';
    const PASSWORD_LENGTH = 32;
    const ACTIVED = 'actived';
    const LAST_LOGIN_AT = 'last_login_at';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    /**
     * Obtiene el atributo de la tabla
     * @return variable
     */
    public function getLastLoginAt() {
        return $this->last_login_at;
    }

//end function

    /**
     * Obtiene el atributo de la tabla
     * @return variable
     */
    public function setLastLoginAt($last_login_at) {
        $this->last_login_at = $last_login_at;
        return $this;
    }

//end function

    /**
     * Obtiene el atributo de la tabla
     * @return variable
     */
    public function getId() {
        return $this->id;
    }

//end function

    /**
     * Obtiene el atributo de la tabla
     * @return variable
     */
    public function getUser() {
        return $this->user;
    }

//end function

    /**
     * Obtiene el atributo de la tabla
     * @return variable
     */
    public function getPassword() {
        return $this->password;
    }

//end function

    /**
     * Obtiene el atributo de la tabla
     * @return variable
     */
    public function getActived() {
        return $this->actived;
    }

//end function

    /**
     * Obtiene el atributo de la tabla
     * @return variable
     */
    public function getCreatedAt() {
        return $this->created_at;
    }

//end function

    /**
     * Obtiene el atributo de la tabla
     * @return variable
     */
    public function getUpdatedAt() {
        return $this->updated_at;
    }

//end function

    /**
     * Obtiene el atributo de la tabla
     * @return variable
     */
    public function getDeletedAt() {
        return $this->deleted_at;
    }

//end function

    /**
     * Obtiene el atributo de la tabla
     * @return variable
     */
    public static function getPackage() {
        return self::$package;
    }

//end function

    /**
     * Obtiene el atributo de la tabla
     * @return variable
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

//end function

    /**
     * Obtiene el atributo de la tabla
     * @return variable
     */
    public function setUser($user) {
        $this->user = $user;
        return $this;
    }

//end function

    /**
     * Obtiene el atributo de la tabla
     * @return variable
     */
    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

//end function

    /**
     * Obtiene el atributo de la tabla
     * @return variable
     */
    public function setActived($actived) {
        $this->actived = $actived;
        return $this;
    }

//end function

    /**
     * Obtiene el atributo de la tabla
     * @return variable
     */
    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
        return $this;
    }

//end function

    /**
     * Obtiene el atributo de la tabla
     * @return variable
     */
    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
        return $this;
    }

//end function

    /**
     * Obtiene el atributo de la tabla
     * @return variable
     */
    public function setDeletedAt($deleted_at) {
        $this->deleted_at = $deleted_at;
        return $this;
    }

    /**
     * Obtiene el atributo de la tabla
     * @return variable
     */
    public static function setPackage($package) {
        self::$package = $package;
        return self;
    }

    /**
     * se instacia los atributosde la tabla
     * @return variables
     */
    public function __construct($id = null, $usuario = null, $password = null, $estado = null, $last_login_at = null, $created_at = null, $updated_at = null, $deleted_at = null) {
        $this->id = $id;
        $this->user = $usuario;
        $this->password = $password;
        $this->actived = $estado;
        $this->last_login_at = $last_login_at;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
        self::$package = array(
            self::ID,
            self::USER,
            self::PASSWORD,
            self::LAST_LOGIN_AT,
            self::CREATED_AT,
            self::UPDATED_AT,
            self::DELETED_AT
        );
    }//end function
/**
   * Obtiene el atributo de la tabla
   * @return variable
   */
    public function __toString() {
        return $this->user;
    }//end function

    /**
   * Obtiene el atributo de la tabla
   * @return variable
   */
    public function __sleep() {
        return self::$package;
    }//end function

    /**
     * Método para obtener el nombre del campo más la tabla ya sea en formato
     * DB (.) o en formato HTML (_)
     *
     * @param string $field Nombre del campo
     * @param string $html [optional] Por defecto traerá el nombre del campo en
     * versión DB
     * @return string
     */
    public static function getNameField($field, $html = false, $table = null) {
        return parent::getNameField($field, self::getNameTable(), $html);
    }//end function

    /**
     * Obtiene el nombre de la tabla
     * @return string
     */
    public static function getNameTable() {
        return 'usuario';
    }//end function

    /**
     * Método para borrar un registro de una tabla X en la base de datos
     *
     * @param array $ids Array con los campos por posiciones
     * asociativas y los valores por valores a tener en cuenta para el borrado.
     * Ejemplo $fieldsAndValues['id'] = 1
     * @param boolean $deletedLogical [optional] Borrado lógico [por defecto] o
     * borrado físico de un registro en una tabla de la base de datos
     * @return PDOException|boolean
     */
    public static function delete($ids, $deletedLogical = true, $table = null) {
        return parent::delete($ids, $deletedLogical, self::getNameTable());
    }//end function

    /**
     * Método para insertar en una tabla usuario
     *
     * @param array $data Array asociativo donde las claves son los nombres de
     * los campos y su valor sería el valor a insertar. Ejemplo:
     * $data['nombre'] = 'Erika'; $data['apellido'] = 'Galindo';
     * @return PDOException|boolean
     */
    public static function insert($data, $table = null) {
        return parent::insert(self::getNameTable(), $data);
    }//end function

    /**
     * Método para leer todos los registros de una tabla
     *
     * @param array $fields Array con los nombres de los campos a solicitar
     * @param boolean $deletedLogical [optional] Indicación de borrado lógico
     * o borrado físico
     * @param array $orderBy [optional] Array con el o los nombres de los campos
     * por los cuales se ordenará la consulta
     * @param string $order [optional] Forma de ordenar la consulta
     * (por defecto NULL), pude ser ASC o DESC
     * @param integer $limit [optional] Cantidad de resultados a mostrar
     * @param integer $offset [optional] Página solicitadad sobre la cantidad
     * de datos a mostrar
     * @return mixed una instancia de una clase estandar, la cual tendrá como
     * variables publica los nombres de las columnas de la consulta o una
     * instancia de \PDOException en caso de fracaso.
     */
    public static function getAll($fields, $deletedLogical = true, $orderBy = null, $order = null, $limit = null, $offset = null, $where = null, $table = null) {
        return parent::getAll(self::getNameTable(), $fields, $deletedLogical, $orderBy, $order, $limit, $offset, $where);
    }//end function

    /**
     * Método para actualizar un registro en una tabla de una base de datos
     *
     * @param array $ids Array asociativo con las posiciones por nombres de los
     * campos y los valores son quienes serían las llaves a buscar.
     * @param array $data Array asociativo con los datos a modificar,
     * las posiciones por nombres de las columnas con los valores por los nuevos
     * datos a escribir
     * @return PDOException|boolean
     */
    public static function update($ids, $data, $table = null) {
        return parent::update($ids, $data, self::getNameTable());
    }//end function

}//end class
