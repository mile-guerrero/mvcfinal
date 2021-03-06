<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as log;

/**
 * Description of ejemploClass
 *
 * @author Gonzalo Andres Bejarano, Elcy Milena Guerrero, Andres Eduardo Bahamon
 */
class deleteSelectActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        $idsToDelete = request::getInstance()->getPost('chk');
        foreach ($idsToDelete as $id){
          $ids = array(
            empresaTableClass::ID => $id
        );
        
        empresaTableClass::delete($ids, true);
      }
      session::getInstance()->setSuccess('Las Casillas Seleccionadas Fueron Eliminadas Exitosamente');
      $observacion ='se ha eliminado una seleccion en  empresa ';
        log::register('EliminarSeleccion', empresaTableClass::getNameTable(),$observacion,$id);
        routing::getInstance()->redirect('empresa', 'index');
      } else {
        routing::getInstance()->redirect('empresa', 'index');
      }
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
//      switch ($exc->getCode()){
//        case 23503:
//          session::getInstance()->setError(i18n::__(00011, null, 'errors', array(':correo'), 00011));
//          routing::getInstance()->redirect('cooperativa', 'index');
//          break;
//          case 00000:
//          break;
//      }
    }
  }

}

