<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of clienteTableClass
 *
 * @author Gonzalo Andres Bejarano, Elcy Milena Guerrero, Andres Eduardo Bahamon
 */

class clienteTableClass extends clienteBaseTableClass {
  public static function getTotalPages($lines){
    try {
      $sql = 'SELECT count(' . clienteTableClass::ID . ') AS cantidad ' .
              ' FROM ' .clienteTableClass::getNameTable() .
              ' WHERE '. clienteTableClass::DELETED_AT . ' IS NULL ';
      $answer = model::getInstance()->prepare($sql);
      $answer->execute();
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return ceil($answer[0]->cantidad/$lines);
    }  catch (PDOException $exc){
       throw  $exc;
  }}

  public static function getCliente($id){
    try {
  
      
      $sql = 'SELECT ' . clienteTableClass::getNameField(clienteTableClass::ID) . ' AS id_cliente,
                  ' . clienteTableClass::getNameField(clienteTableClass::NOMBRE) . ' AS nombre,
                  ' . clienteTableClass::getNameField(clienteTableClass::APELLIDO) . ' AS apellido,
                  ' . clienteTableClass::getNameField(clienteTableClass::DIRECCION) . ' AS direccion,
                  ' . clienteTableClass::getNameField(clienteTableClass::TELEFONO) . ' AS telefono,
                  ' . clienteTableClass::getNameField(clienteTableClass::ID_TIPO_ID) . ' AS id_tipo_id,
                  ' . clienteTableClass::getNameField(clienteTableClass::ID_CIUDAD) . ' AS id_ciudad,
                  ' . tipoIdBaseTableClass::getNameField(tipoIdTableClass::DESCRIPCION) . ' AS descripcion
              FROM ' . clienteTableClass::getNameTable() . ',' . tipoIdTableClass::getNameTable() . '
              WHERE ' . clienteTableClass::getNameTable().'.'.getNameField(clienteTableClass::ID_TIPO_ID).'='.tipoIdTableClass::getNameTable().'.'.getNameField(tipoIdTableClass::ID) .'    
              AND id = :id';
      $params = array(
          ':id' => $id,
          ':actived' => ((config::getDbDriver() === 'mysql') ? 1 : 't')
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer : false;
      
      
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  
   
  
}