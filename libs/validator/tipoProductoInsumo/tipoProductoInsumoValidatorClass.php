<?php
namespace mvc\validator {
  
  use mvc\validator\validatorClass;
  use mvc\session\sessionClass as session;
  use mvc\request\requestClass as request;
  use mvc\routing\routingClass as routing;
  use mvc\config\myConfigClass as config;
  /**
   * Description of tipoProductoInsumoValidatorClass
   *
   * @author Gonzalo Andres Bejarano, Elcy Milena Guerrero, Andres Eduardo Bahamon
   */
  class tipoProductoInsumoValidatorClass extends validatorClass {
    public static function validateInsert() {
      $flag = false;
      
//      $soloNumeros = "/^[[:digit:]]+$/";
      $soloLetras = "/^[a-z]+$/i";
      $soloTelefono = "/^(\d{3,3}\-\d{3,3}\-\d{4,4})|^(\+\d\-\d{3,3}\-\d{4,4})/";
      $emailcorrecto = '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/';
      
      //-------------------------------campo descripcion-----------------------------
          //----campo nulo----
      if (self::notBlank(request::getInstance()->getPost(\tipoProductoInsumoTableClass::getNameField(\tipoProductoInsumoTableClass::DESCRIPCION, true)))) {
        $flag = true;
        session::getInstance()->setFlash('inputDescripcion', true);
        session::getInstance()->setError('La descripcion del tipo insumo es requerido', 'inputDescripcion');
      } //----sobre pasar los caracteres----
      else if (self::isUnique(\tipoProductoInsumoTableClass::DESCRIPCION, true, array(\tipoProductoInsumoTableClass::DESCRIPCION => request::getInstance()->getPost(\tipoProductoInsumoTableClass::getNameField(\tipoProductoInsumoTableClass::DESCRIPCION, true))), \tipoProductoInsumoTableClass::getNameTable())) {
                $flag = true;
                session::getInstance()->setFlash('inputDescripcion', true);
                session::getInstance()->setError('La descripcion digitada ya existe', 'inputDescripcion');
      }  
      else if(strlen(request::getInstance()->getPost(\tipoProductoInsumoTableClass::getNameField(\tipoProductoInsumoTableClass::DESCRIPCION, true))) > \tipoProductoInsumoTableClass::DESCRIPCION_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputDescripcion', true);
        session::getInstance()->setError('La descripcion digitada es mayor en cantidad de caracteres a lo permitido', 'inputDescripcion');
      }       
      //-------------------------------condiccion de bandera true-----------------------------
      if ($flag === true) {
        //request::getInstance()->setMethod('GET');
        routing::getInstance()->forward('productoInsumo', 'insertTipoProductoInsumo');
      }
    }
  
  
  public static function validateEdit() {
       $flag = false;
      
//      $soloNumeros = "/^[[:digit:]]+$/";
      $soloLetras = "/^[a-z]+$/i";
      $soloTelefono = "/^(\d{3,3}\-\d{3,3}\-\d{4,4})|^(\+\d\-\d{3,3}\-\d{4,4})/";
      $emailcorrecto = '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/';
      
      //-------------------------------campo descripcion-----------------------------
          //----campo nulo----
      if (self::notBlank(request::getInstance()->getPost(\tipoProductoInsumoTableClass::getNameField(\tipoProductoInsumoTableClass::DESCRIPCION, true)))) {
        $flag = true;
        session::getInstance()->setFlash('inputDescripcion', true);
        session::getInstance()->setError('La descripcion del tipo insumo es requerido', 'inputDescripcion');
      } //----sobre pasar los caracteres----
        else if(strlen(request::getInstance()->getPost(\tipoProductoInsumoTableClass::getNameField(\tipoProductoInsumoTableClass::DESCRIPCION, true))) > \tipoProductoInsumoTableClass::DESCRIPCION_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputDescripcion', true);
        session::getInstance()->setError('La descripcion digitada es mayor en cantidad de caracteres a lo permitido', 'inputDescripcion');
      } 
      //-------------------------------condiccion de bandera true-----------------------------
      if ($flag === true) {
        request::getInstance()->setMethod('GET');
        request::getInstance()->addParamGet(array(\tipoProductoInsumoTableClass::ID => request::getInstance()->getPost(\tipoProductoInsumoTableClass::getNameField(\tipoProductoInsumoTableClass::ID, true))));
        routing::getInstance()->forward('productoInsumo', 'editTipoProductoInsumo');
      
      }
    }
     public static function validateFiltro($descripcion) {
      if(strlen($descripcion) > \tipoProductoInsumoTableClass::DESCRIPCION_LENGTH) {
        session::getInstance()->setError('La descripcion digitada es mayor en cantidad de caracteres a lo permitido', 'inputDescripcion');
      session::getInstance()->setFlash('modalFilters', true);
      } 
    }
     public static function validateFiltroFecha($fechaInicial,$fechaFin) {
      
      if (strtotime($fechaFin) < strtotime($fechaInicial)){
        session::getInstance()->setError('La fecha final no puede ser menor a la actual', 'inputFecha');
          session::getInstance()->setFlash('modalFilters', true);
         
         // echo "<script> alert(' La fecha final no puede ser menor a la actual');</script>'";
      }       
    }
  }
}