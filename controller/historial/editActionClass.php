
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
class editActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
   
      if (request::getInstance()->hasGet(historialTableClass::ID)) {
        $fields = array(
            historialTableClass::ID,
            historialTableClass::PRODUCTO_INSUMO_ID,
            historialTableClass::PLAGA_ID, 
            historialTableClass::LOTE_ID, 
            historialTableClass::ENFERMEDAD_ID
        );
        $where = array(
            historialTableClass::ID => request::getInstance()->getGet(historialTableClass::ID)
        );
        $this->objHistorial = historialTableClass::getAll($fields,false, null, null, null, null, $where);
       
       $id = array(
            historialTableClass::ID => request::getInstance()->getRequest(historialTableClass::ID)
        );

        $idProducto = $this->objHistorial[0]->producto_insumo_id;
        $this->idTipoProducto = historialTableClass::getTipoInsumo($idProducto);

        $fields = array(
            productoInsumoTableClass::ID,
            productoInsumoTableClass::DESCRIPCION
        );
        $orderBy = array(
            productoInsumoTableClass::DESCRIPCION
        );
        $whereProducto = array(
            productoInsumoTableClass::TIPO_PRODUCTO_INSUMO_ID => $this->idTipoProducto
        );
        $this->objProducto = productoInsumoTableClass::getAll($fields, true, $orderBy, 'ASC', null, null, $whereProducto);

 $fields = array(
            tipoProductoInsumoTableClass::ID,
            tipoProductoInsumoTableClass::DESCRIPCION
        );
        $orderBy = array(
            tipoProductoInsumoTableClass::DESCRIPCION
        );
        $this->objTipo = tipoProductoInsumoTableClass::getAll($fields, true, $orderBy, 'ASC');
 
        
        $fields = array(     
      plagaTableClass::ID, 
      plagaTableClass::NOMBRE,
      plagaTableClass::DESCRIPCION,
      plagaTableClass::TRATAMIENTO
      );
      $orderBy = array(
      plagaTableClass::NOMBRE    
      ); 
      $this->objHistorialPlaga = plagaTableClass::getAll($fields, false, $orderBy, 'ASC');
      
      $fields = array(     
      loteTableClass::ID, 
      loteTableClass::UBICACION,
      loteTableClass::FECHA_RIEGO
      );
      $orderBy = array(
      loteTableClass::UBICACION    
      ); 
      $this->objHistorialLote = loteTableClass::getAll($fields, true, $orderBy, 'ASC');
        
        
      $fields = array(     
      enfermedadTableClass::ID, 
      enfermedadTableClass::NOMBRE
      );
      $orderBy = array(
      enfermedadTableClass::NOMBRE    
      ); 
      $this->objHistoriEnfermedad = enfermedadTableClass::getAll($fields, true, $orderBy, 'ASC');

        $this->defineView('edit', 'historial', session::getInstance()->getFormatOutput());
     
        
      }else{
        routing::getInstance()->redirect('historial', 'index');
      }

    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }
  }

}
