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
 * @author 
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      
       $where = null;
      if (request::getInstance()->hasPost('filter')) {
        $filter = request::getInstance()->getPost('filter');
        //Validar datos

        if (isset($filter['empresa']) and $filter['empresa'] !== null and $filter['empresa'] !== '') {
          $where[facturaCompraTableClass::FECHA] = $filter['empresa'];
        }
        if (isset($filter['fechaIni']) and $filter['fechaIni'] !== null and $filter['fechaIni'] !== '' and (isset($filter['fechaFin']) and $filter['fechaFin'] !== null and $filter['fechaFin'] !== '')) {
          $where[facturaCompraTableClass::CREATED_AT] = array(
          date(config::getFormatTimestamp(), strtotime($filter['fechaIni'] . ' 00:00:00')),
          date(config::getFormatTimestamp(), strtotime($filter['fechaFin'] . ' 23:59:59'))
          );
        }
//      session::getInstance()->setAttribute('facturaVentaIndexFilters', $where);
//       }else if(session::getInstance()->hasAttribute('facturaVentaIndexFilters')){
//        $where = session::getInstance()->getAttribute('facturaVentaIndexFilters');
     }
      
      $fields = array(
          facturaCompraTableClass::ID,
          facturaCompraTableClass::FECHA,          
          facturaCompraTableClass::PROVEEDOR_ID,
          facturaCompraTableClass::CREATED_AT,
     
      );
      $orderBy = array(
          facturaCompraTableClass::ID
      );
      $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGrid();
      }//cierre del if del paguinado
      $this->cntPages = facturaCompraTableClass::getTotalPages(config::getRowGrid(), $where);
      
      $this->objFactura = facturaCompraTableClass::getAll($fields, false, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
//       $fields = array(
//            empresaTableClass::ID,
//            empresaTableClass::NOMBRE
//        );
//        $orderBy = array(
//            empresaTableClass::NOMBRE
//        );
//        $this->objEmpresa = empresaTableClass::getAll($fields, false, $orderBy, 'ASC');
      
       $fields = array(
              proveedorTableClass::ID,
              proveedorTableClass::NOMBREP
      );
      $orderBy = array(
          proveedorTableClass::NOMBREP
      );
      $this->objProveedor = proveedorTableClass::getAll($fields, true, $orderBy, 'ASC');
      $this->defineView('index', 'facturaCompra', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }
}

}

