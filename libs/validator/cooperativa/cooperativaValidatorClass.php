<?php
namespace mvc\validator {
  
  use mvc\validator\validatorClass;
  use mvc\session\sessionClass as session;
  use mvc\request\requestClass as request;
  use mvc\routing\routingClass as routing;
  use mvc\config\myConfigClass as config;
  /**
   * Description of cooperativaValidatorClass
   *
   * @author Gonzalo Andres Bejarano, Elcy Milena Guerrero, Andres Eduardo Bahamon
   */
  class cooperativaValidatorClass extends validatorClass {
    public static function validateInsert() {
      $flag = false;
//      $soloNumeros = "/^[[:digit:]]+$/";
      $soloLetras = "/^[a-z]+$/i";
      $soloTelefono = "/^(\d{3,3}\-\d{3,3}\-\d{4,4})|^(\+\d\-\d{3,3}\-\d{4,4})/";
      $emailcorrecto = '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/';
      
      
      //-------------------------------campo nombre-----------------------------
          //----campo nulo----
      if (self::notBlank(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::NOMBRE, true)))) {
        $flag = true;
        session::getInstance()->setFlash('inputNombre', true);
        session::getInstance()->setError('El nombre de la cooperativa es requerido', 'inputNombre');
      } //----sobre pasar los caracteres----
        else if(strlen(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::NOMBRE, true))) > \cooperativaTableClass::NOMBRE_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputNombre', true);
        session::getInstance()->setError('El nombre digitado es mayor en cantidad de caracteres a lo permitido', 'inputNombre');
      }else if (self::isUnique(\cooperativaTableClass::NOMBRE, true, array(\cooperativaTableClass::NOMBRE => request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::NOMBRE, true))), \cooperativaTableClass::getNameTable())) {
                $flag = true;
                session::getInstance()->setFlash('inputNombre', true);
                session::getInstance()->setError('El nombre digitado ya existe', 'inputNombre');
            }

   //-------------------------------campo descripcion-----------------------------
          //----campo nulo----
      if (self::notBlank(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::DESCRIPCION, true)))) {
        $flag = true;
        session::getInstance()->setFlash('inputDescripcion', true);
        session::getInstance()->setError('La descripcion es requerido', 'inputDescripcion');
      }  //----sobre pasar los caracteres----
        else if(strlen(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::DESCRIPCION, true))) > \cooperativaTableClass::DESCRIPCION_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputDescripcion', true);
        session::getInstance()->setError('La descripcion digitado es mayor en cantidad de caracteres a lo permitido', 'inputDescripcion');
      }   
      
      
    //-------------------------------campo direccion-----------------------------
          //----campo nulo----
      if (self::notBlank(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::DIRECCION, true)))) {
        $flag = true;
        session::getInstance()->setFlash('inputDireccion', true);
        session::getInstance()->setError('La direccion del cooperativa es requerido', 'inputDireccion');
        } //----sobre pasar los caracteres----
        else if(strlen(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::DIRECCION, true))) > \cooperativaTableClass::DIRECCION_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputDireccion', true);
        session::getInstance()->setError('La direccion digitada es mayor en cantidad de caracteres a lo permitido', 'inputDireccion');
      }
      
    //-------------------------------campo telefono-----------------------------
          //----campo nulo----
      if (self::notBlank(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::TELEFONO, true)))) {
        $flag = true;
        session::getInstance()->setFlash('inputTelefono', true);
        session::getInstance()->setError('El telefono del cliente es requerido', 'inputTelefono');
        } //----sobre pasar los caracteres----
        else if(strlen(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::TELEFONO, true))) > \cooperativaTableClass::TELEFONO_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputTelefono', true);
        session::getInstance()->setError('El telefono digitado es mayor en cantidad de caracteres a lo permitido', 'inputTelefono');
      }  //----valida que sea numerico----      
        else if (!is_numeric(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::TELEFONO, true)))) {
        $flag = true;
        session::getInstance()->setFlash('inputTelefono', true);
        session::getInstance()->setError('El telefono no permite letras, solo numeros', 'inputTelefono');
      }
      
        
       //-------------------------------campo ciudad-----------------------------
          //----campo nulo----
      if (self::notBlank(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::ID_CIUDAD, true)))) {
        $flag = true;
        session::getInstance()->setFlash('selectCiudad', true);
        session::getInstance()->setError('La ciudad del cooperativa es requerido', 'selectCiudad');
        } 

      //-------------------------------condiccion de bandera true-----------------------------
      if ($flag === true) {
        //request::getInstance()->setMethod('GET');
        routing::getInstance()->forward('cooperativa', 'insert');
      }
    }
  
  
  public static function validateEdit() {
      $flag = false;
//      $soloNumeros = "/^[[:digit:]]+$/";
      $soloLetras = "/^[a-z]+$/i";
      $soloTelefono = "/^(\d{3,3}\-\d{3,3}\-\d{4,4})|^(\+\d\-\d{3,3}\-\d{4,4})/";
      $emailcorrecto = '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/';
      
      
      //-------------------------------campo nombre-----------------------------
          //----campo nulo----
      if (self::notBlank(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::NOMBRE, true)))) {
        $flag = true;
        session::getInstance()->setFlash('inputNombre', true);
        session::getInstance()->setError('El nombre de la cooperativa es requerido', 'inputNombre');
      }  //----sobre pasar los caracteres----
        else if(strlen(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::NOMBRE, true))) > \cooperativaTableClass::NOMBRE_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputNombre', true);
        session::getInstance()->setError('El nombre digitado es mayor en cantidad de caracteres a lo permitido', 'inputNombre');
      }

   //-------------------------------campo descripcion-----------------------------
          //----campo nulo----
      if (self::notBlank(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::DESCRIPCION, true)))) {
        $flag = true;
        session::getInstance()->setFlash('inputDescripcion', true);
        session::getInstance()->setError('El nombre de la descripcion es requerido', 'inputDescripcion');
      }  //----sobre pasar los caracteres----
        else if(strlen(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::DESCRIPCION, true))) > \cooperativaTableClass::DESCRIPCION_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputDescripcion', true);
        session::getInstance()->setError('La descripcion digitado es mayor en cantidad de caracteres a lo permitido', 'inputDescripcion');
      }   
      
      
    //-------------------------------campo direccion-----------------------------
          //----campo nulo----
      if (self::notBlank(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::DIRECCION, true)))) {
        $flag = true;
        session::getInstance()->setFlash('inputDireccion', true);
        session::getInstance()->setError('La direccion del cliente es requerido', 'inputDireccion');
        } //----sobre pasar los caracteres----
        else if(strlen(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::DIRECCION, true))) > \cooperativaTableClass::DIRECCION_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputDireccion', true);
        session::getInstance()->setError('La direccion digitada es mayor en cantidad de caracteres a lo permitido', 'inputDireccion');
      }
      
    //-------------------------------campo telefono-----------------------------
          //----campo nulo----
      if (self::notBlank(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::TELEFONO, true)))) {
        $flag = true;
        session::getInstance()->setFlash('inputTelefono', true);
        session::getInstance()->setError('El telefono de la cooperativa es requerido', 'inputTelefono');
        } //----sobre pasar los caracteres----
        else if(strlen(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::TELEFONO, true))) > \cooperativaTableClass::TELEFONO_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputTelefono', true);
        session::getInstance()->setError('El telefono digitado es mayor en cantidad de caracteres a lo permitido', 'inputTelefono');
      }  //----valida que sea numerico----      
        else if (!is_numeric(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::TELEFONO, true)))) {
        $flag = true;
        session::getInstance()->setFlash('inputTelefono', true);
        session::getInstance()->setError('El telefono no permite letras, solo numeros', 'inputTelefono');
      }
     
       //-------------------------------campo ciudad-----------------------------
          //----campo nulo----
      if (self::notBlank(request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::ID_CIUDAD, true)))) {
        $flag = true;
        session::getInstance()->setFlash('selectCiudad', true);
        session::getInstance()->setError('La ciudad de la coopeativa es requerido', 'selectCiudad');
        } 

      //-------------------------------condiccion de bandera true-----------------------------
      if ($flag === true) {
        request::getInstance()->setMethod('GET');
        request::getInstance()->addParamGet(array(\cooperativaTableClass::ID => request::getInstance()->getPost(\cooperativaTableClass::getNameField(\cooperativaTableClass::ID, true))));
        routing::getInstance()->forward('cooperativa', 'edit');
      
      }
    }
      public static function validateFiltroFecha($fechaInicial,$fechaFin) {
      
      if (strtotime($fechaFin) < strtotime($fechaInicial)){
        session::getInstance()->setError('La fecha final no puede ser menor a la actual', 'inputFecha');
          session::getInstance()->setFlash('modalFilters', true);
         
         // echo "<script> alert(' La fecha final no puede ser menor a la actual');</script>'";
      }       
    }
    
     public static function validateFiltroNombre($nombre) {
       $soloLetras = "/^[a-z]+$/i";
      $soloTelefono = "/^(\d{3,3}\-\d{3,3}\-\d{4,4})|^(\+\d\-\d{3,3}\-\d{4,4})/";
      $emailcorrecto = '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/';
      
      if (!preg_match($soloLetras, ($nombre))){
        session::getInstance()->setError('El nombre no permite numeros, solo letras', 'inputNombre');
     session::getInstance()->setFlash('modalFilters', true);
        } //----sobre pasar los caracteres----
        else if(strlen($nombre) > \cooperativaTableClass::NOMBRE_LENGTH) {
        session::getInstance()->setError('El nombre digitado es mayor en cantidad de caracteres a lo permitido', 'inputNombre');
      
        session::getInstance()->setFlash('modalFilters', true);
        }  
    }
    
  }  
}