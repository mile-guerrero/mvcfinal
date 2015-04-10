<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Gonzalo Andres Bejarano, Elcy Milena Guerrero, Andres Eduardo Bahamon
 */
class deleteSelectClienteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        $idsToDelete = request::getInstance()->getPost('chk');
        foreach ($idsToDelete as $id){
          $ids = array(
            clienteTableClass::ID => $id
        );
        
        clienteTableClass::delete($ids, true);
      }
      session::getInstance()->setSuccess('Las Casillas Seleccionadas Fueron Eliminadas Exitosamente');
        routing::getInstance()->redirect('cliente', 'indexCliente');
      } else {
        routing::getInstance()->redirect('cliente', 'indexCliente');
      }
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
//      switch ($exc->getCode()){
//        case 23503:
//          session::getInstance()->setError(i18n::__(00011, null, 'errors', array(':correo'), 00011));
//          routing::getInstance()->redirect('cliente', 'indexCliente');
//          break;
//          case 00000:
//          break;
//      }
    }
  }

}

