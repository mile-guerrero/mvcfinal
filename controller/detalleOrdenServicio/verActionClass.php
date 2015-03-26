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
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class verActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      $fields = array(
          detalleOrdenServicioTableClass::ID,
          detalleOrdenServicioTableClass::ORDEN_SERVICIO_ID,
          detalleOrdenServicioTableClass::PRODUCTO_INSUMO_ID,
          detalleOrdenServicioTableClass::CANTIDAD,
          detalleOrdenServicioTableClass::VALOR,
          detalleOrdenServicioTableClass::MAQUINA_ID,
          detalleOrdenServicioTableClass::CREATED_AT,
          detalleOrdenServicioTableClass::UPDATED_AT
      );
      
       $where = array(
            detalleOrdenServicioTableClass::ID => request::getInstance()->getRequest(detalleOrdenServicioTableClass::ID)
        );
      $this->objDOS = detalleOrdenServicioTableClass::getAll($fields, null, null, null, null, $where);
//     $orderBy = array(
//         usuarioTableClass::ID
//      );
//      $this->objUsuarios = usuarioTableClass::getAll($fields, true, $orderBy);

      $this->defineView('ver', 'detalleOrdenServicio', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }
}

}
