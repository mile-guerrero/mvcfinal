
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
class editActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
   
      if (request::getInstance()->hasRequest(detalleFacturaVentaTableClass::ID)) {
        
        $fields = array(
            
          detalleFacturaVentaTableClass::ID,
          detalleFacturaVentaTableClass::DESCRIPCION,
          detalleFacturaVentaTableClass::CANTIDAD,
          detalleFacturaVentaTableClass::VALOR_UNIDAD,
          detalleFacturaVentaTableClass::VALOR_TOTAL,
          detalleFacturaVentaTableClass::CLIENTE_ID,
          detalleFacturaVentaTableClass::FACTURA_ID,
          detalleFacturaVentaTableClass::CREATED_AT,
          detalleFacturaVentaTableClass::UPDATED_AT
        );
        $where = array(
            detalleFacturaVentaTableClass::ID => request::getInstance()->getRequest(detalleFacturaVentaTableClass::ID)
        );
        $this->objDetalleFactura = detalleFacturaVentaTableClass::getAll($fields, false, null, null, null, null, $where);
        
         $fields = array(
           facturaVentaTableClass::ID,
           facturaVentaTableClass::FECHA
        );
        $orderBy = array(
            facturaVentaTableClass::FECHA
        );
        $this->objFactura = facturaVentaTableClass::getAll($fields, false, $orderBy, 'ASC');
        
        $fields = array(
          clienteTableClass::ID,
          clienteTableClass::NOMBRE
      );
      $orderBy = array(
          clienteTableClass::NOMBRE
      );
      $this->objCliente = clienteTableClass::getAll($fields, true, $orderBy, 'ASC');
        $this->defineView('edit', 'detalleFacturaVenta', session::getInstance()->getFormatOutput());
     
      }else{
        routing::getInstance()->redirect('detalleFacturaVenta', 'index');
      }

    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }
  }

}
