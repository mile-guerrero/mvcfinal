<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of controlPlagaTableClass
 *
 * @author Andres Eduardo Bahamon, Elcy Milena Guerrero, Gonzalo Andres Bejarano
 */
class controlPlagaTableClass extends controlPlagaBaseTableClass {
  
  public static function getTipoInsumo($idProducto){
    try {
      $sql = 'SELECT ' . '  ' . tipoProductoInsumoTableClass::getNameTable() . '.' . tipoProductoInsumoTableClass::ID  .  ' As id'
             . '  FROM ' . controlPlagaTableClass::getNameTable() . ' , ' . productoInsumoTableClass::getNameTable() . ' , ' . tipoProductoInsumoTableClass::getNameTable() . '  '
             . ' WHERE ' .  controlPlagaTableClass::getNameField(controlPlagaTableClass::PRODUCTO_INSUMO_ID) . ' = '. productoInsumoTableClass::getNameField(productoInsumoTableClass::ID) . ' AND ' .  productoInsumoTableClass::getNameField(productoInsumoTableClass::TIPO_PRODUCTO_INSUMO_ID) . ' = '. tipoProductoInsumoTableClass::getNameField(tipoProductoInsumoTableClass::ID) . ' AND '  . controlPlagaTableClass::getNameTable() . '.'. controlPlagaTableClass::PRODUCTO_INSUMO_ID . ' = ' . $idProducto;
    
      $answer = model::getInstance()->prepare($sql);
            $answer->execute();
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
//       print_r($sql);
//     exit();
      return $answer[0]->id;
      
      
    } catch (Exception $exc) {
      throw $exc;
    }
    
  }
  
   public static function getTotalPages($lines, $where) {
    try {
      $sql = 'SELECT count(' . controlPlagaTableClass::ID . ') AS cantidad ' .
              ' FROM ' . controlPlagaTableClass::getNameTable() .
              ' WHERE ' . controlPlagaTableClass::DELETED_AT . ' IS NULL ';
      
      if (is_array($where) === true){
          foreach ($where as $field => $value){
              if (is_array($value)){
                  $sql = $sql . ' AND ' . $field . ' BETWEEN ' . ((is_numeric($value[0])) ? $value[0] : "'$value[0]'") . ' AND ' . ((is_numeric($value[1]) ? $value[1] : "'$value[1]'"));
              }  if(is_numeric($field)) {
                  $sql = $sql . 'AND ' . $value;
              } else {
                  $sql = $sql . ' AND ' . $field . ' = ' . ((is_numeric($value)) ? $value : "'$value'");
              }
          }
      }
      
      $answer = model::getInstance()->prepare($sql);
      $answer->execute();
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return ceil($answer[0]->cantidad / $lines);
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  
  
  public static function getInventario($idControlPlaga){
    try {
      $sql = 'SELECT ' . '  '. 'SUM ('. controlPlagaTableClass::CANTIDAD  . ') ' . ' As total'
             . '  FROM ' . controlPlagaTableClass::getNameTable() . ',' . productoInsumoTableClass::getNameTable() . '  ' 
             . ' WHERE ' .  controlPlagaTableClass::getNameField(controlPlagaTableClass::PRODUCTO_INSUMO_ID) . ' = '. productoInsumoTableClass::getNameField(productoInsumoTableClass::ID)  .'  '
             . ' AND ' . productoInsumoTableClass::getNameTable() . '.'. productoInsumoTableClass::ID . ' = ' . $idControlPlaga. '  '
              ;
    
      $answer = model::getInstance()->prepare($sql);
            $answer->execute();
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
//       print_r($sql);
//     exit();
      return $answer[0]->total;
      
      
    } catch (Exception $exc) {
      throw $exc;
    }
    
  }
}
