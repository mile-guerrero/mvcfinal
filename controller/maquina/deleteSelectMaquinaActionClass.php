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
class deleteSelectMaquinaActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        $idsToDelete = request::getInstance()->getPost('chk');
        foreach ($idsToDelete as $id){
          $ids = array(
            maquinaTableClass::ID => $id
        );
        
        maquinaTableClass::delete($ids, true);
      }
       session::getInstance()->setSuccess('Las Casillas Seleccionadas Fueron Eliminadas Exitosamente');
       $observacion ='se ha eliminado una seleccion en  maquina ';
        log::register('EliminarSeleccion', maquinaTableClass::getNameTable(),$observacion,$id);
      
        routing::getInstance()->redirect('maquina', 'indexMaquina');
      } else {
        routing::getInstance()->redirect('maquina', 'indexMaquina');
      }
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
      switch ($exc->getCode()){
        case 23503:
          session::getInstance()->setError('Las Casillas Seleccionadas no se pueden borrar por que esta siendo utilizado');
          routing::getInstance()->redirect('cliente', 'indexCliente');
          break;
          case 00000:
          break;
      }
    }
  }

}

