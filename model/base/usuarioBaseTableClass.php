<?php

use mvc\model\table\tableBaseClass;

/**
 * Description of usuarioClass
 *
 * @author Gonzalo Andres Bejarano, Elcy Milena Guerrero, Andres Eduardo Bahamon
 */
class usuarioBaseTableClass extends tableBaseClass {
  
  private $id;
  private $nombreImagen;
  private $extencionImagen;
  private $hashImagen;
  private $usuario;
  private $password;
  private $actived;
  protected $last_login_at;
  private $createdAt;
  private $updatedAt;
  private $deletedAt;
  protected static $package;
  
  const ID = 'id';
  const NOMBRE_IMAGEN = 'nombreimagen';
  const NOMBRE_IMAGEN_LENGTH = 400;
  const EXTENCION_IMAGEN = 'extencionimagen';
  const EXTENCION_IMAGEN_LENGTH = 5;
  const HASH_IMAGEN = 'hashimagen';
  const HASH_IMAGEN_LENGTH = 37;
  const USUARIO = 'usuario';
  const USUARIO_LENGTH = 80;
  const PASSWORD = 'password';
  const PASSWORD_LENGTH = 32;
  const ACTIVED = 'actived';
  const LAST_LOGIN_AT = 'last_login_at';
  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
  const DELETED_AT = 'deleted_at';

  public function get_nombreImagen() {
    return $this->nombreImagen;
  }

  public function get_extencionImagen() {
    return $this->extencionImagen;
  }

  public function get_hashImagen() {
    return $this->hashImagen;
  }

  public function get_last_login_at() {
    return $this->last_login_at;
  }

  public function set_nombreImagen($nombreImagen) {
    $this->nombreImagen = $nombreImagen;
  }

  public function set_extencionImagen($extencionImagen) {
    $this->extencionImagen = $extencionImagen;
  }

  public function set_hashImagen($hashImagen) {
    $this->hashImagen = $hashImagen;
  }

  public function set_last_login_at($last_login_at) {
    $this->last_login_at = $last_login_at;
  }

    
  public function getLastLoginAt() {
    return $this->last_login_at;
  }

  public function setLastLoginAt($last_login_at) {
    $this->last_login_at = $last_login_at;
    return $this;
  }
  public function getId() {
    return $this->id;
  }

  public function getUsuario() {
    return $this->usuario;
  }

  public function getPassword() {
    return $this->password;
  }

  public function getActived() {
    return $this->actived;
  }

  public function getCreatedAt() {
    return $this->createdAt;
  }

  public function getUpdatedAt() {
    return $this->updatedAt;
  }

  public function getDeletedAt() {
    return $this->deletedAt;
  }
  public static function getPackage() {
    return self::$package;
  }

  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  public function setUsuario($usuario) {
    $this->usuario = $usuario;
    return $this;
  }

  public function setPassword($password) {
    $this->password = $password;
    return $this;
  }

  public function setActived($actived) {
    $this->actived = $actived;
    return $this;
  }

  public function setCreatedAt($created_at) {
    $this->created_at = $created_at;
    return $this;
  }

  public function setUpdatedAt($updated_at) {
    $this->updated_at = $updated_at;
    return $this;
  }

  public function setDeletedAt($deleted_at) {
    $this->deleted_at = $deleted_at;
    return $this;
  }

  public static function setPackage($package) {
    self::$package = $package;
    return self;
  }
  
   public function __construct($id = null, $usuario = null, $password = null, $actived = null, $last_login_at = null, $created_at = null, $updated_at = null, $deleted_at = null) {
    $this->id = $id;
    $this->usuario = $usuario;
    $this->password = $password;
    $this->actived = $actived;
    $this->last_login_at = $last_login_at;
    $this->created_at = $created_at;
    $this->updated_at = $updated_at;
    $this->deleted_at = $deleted_at;
    self::$package = array(
        self::ID,
        self::USUARIO,
        self::PASSWORD,
        self::LAST_LOGIN_AT,
        self::CREATED_AT,
        self::UPDATED_AT,
        self::DELETED_AT
    );
  }

    public function __toString() {
    return $this->usuario;
  }

  public function __sleep() {
    return self::$package;
  }

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
  }

  /**
   * Obtiene el nombre de la tabla
   * @return string
   */
  public static function getNameTable() {
    return 'usuario';
  }

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
  }

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
  }

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
  }

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
  }

}