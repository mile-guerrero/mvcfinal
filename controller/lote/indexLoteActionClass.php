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
class indexLoteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      
      $where = null;
      if(request::getInstance()->hasPost('filter')){
      $filter = request::getInstance()->getPost('filter');
      //validar
      if(isset($filter['ubicacion']) and $filter['ubicacion'] !== null and $filter['ubicacion'] !== ""){
         $where[] = loteTableClass::getNameField(loteTableClass::UBICACION) . ' LIKE ' . '\'' . $filter['ubicacion'] . '%\'  '
              . 'OR ' . loteTableClass::getNameField(loteTableClass::UBICACION) . ' LIKE ' . '\'%' . $filter['ubicacion'] . '%\' '
              . 'OR ' . loteTableClass::getNameField(loteTableClass::UBICACION) . ' LIKE ' . '\'%' . $filter['ubicacion'].'\' ';       
              }
              
      if((isset($filter['tamanoIni']) and $filter['tamanoIni'] !== null and $filter['tamanoIni'] !== "") and (isset($filter['tamanoFin']) and $filter['tamanoFin'] !== null and $filter['tamanoFin'] !== "" )){
        $where[loteTableClass::TAMANO] = array(
           $filter['tamanoIni'],
           $filter['tamanoFin']
            );
      }       
              
      if((isset($filter['fechaIni']) and $filter['fechaIni'] !== null and $filter['fechaIni'] !== "") and (isset($filter['fechaFin']) and $filter['fechaFin'] !== null and $filter['fechaFin'] !== "" )){
        $where[loteTableClass::CREATED_AT] = array(
           date(config::getFormatTimestamp(), strtotime($filter['fechaIni'].' 00:00:00')),
           date(config::getFormatTimestamp(), strtotime($filter['fechaFin'].' 23:59:59'))
            );
        } 
        
        if((isset($filter['fechaSI']) and $filter['fechaSI'] !== null and $filter['fechaSI'] !== "") and (isset($filter['fechaSF']) and $filter['fechaSF'] !== null and $filter['fechaSF'] !== "" )){
        $where[loteTableClass::FECHA_INICIO_SIEMBRA] = array(
           date(config::getFormatTimestamp(), strtotime($filter['fechaSI'].' 00:00:00')),
           date(config::getFormatTimestamp(), strtotime($filter['fechaSF'].' 23:59:59'))
            );
        } 
      
      
//      if(isset($filter['ciudad']) and $filter['ciudad'] !== null and $filter['ciudad'] !== ""){
//        $where[loteTableClass::ID_CIUDAD] = $filter['ciudad'];
//      }
//       
//           
      }
      
      $fields = array(
          loteTableClass::ID,
            loteTableClass::UBICACION,
            /*loteTableClass::TAMANO,
            loteTableClass::UNIDAD_DISTANCIA_ID,
            loteTableClass::DESCRIPCION,
            loteTableClass::FECHA_INICIO_SIEMBRA,
            loteTableClass::NUMERO_PLANTULAS,
            loteTableClass::PRESUPUESTO,
            loteTableClass::PRODUCTO_INSUMO_ID,
            loteTableClass::ID_CIUDAD, 
          loteTableClass::CREATED_AT,
          loteTableClass::UPDATED_AT*/
      );
      $orderBy = array(
         loteTableClass::ID
      );
      $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGrid();
      }
      $this->cntPages = loteTableClass::getTotalPages(config::getRowGrid());
      
      $this->objLote = loteTableClass::getAll($fields, true, $orderBy, 'ASC',config::getRowGrid(), $page,$where);
      
      $fields = array(     
      unidadDistanciaTableClass::ID, 
      unidadDistanciaTableClass::DESCRIPCION
      );
      $orderBy = array(
      unidadDistanciaTableClass::DESCRIPCION    
      ); 
      $this->objLUD = unidadDistanciaTableClass::getAll($fields, false, $orderBy, 'ASC');
     
        
        
      $fields = array(     
      ciudadTableClass::ID, 
      ciudadTableClass::NOMBRE_CIUDAD
      );
      $orderBy = array(
      ciudadTableClass::NOMBRE_CIUDAD    
      ); 
      $this->objLC = ciudadTableClass::getAll($fields, false, $orderBy, 'ASC');
      
      
      $fields = array(     
      productoInsumoTableClass::ID, 
      productoInsumoTableClass::DESCRIPCION
      );
      $orderBy = array(
      productoInsumoTableClass::DESCRIPCION    
      ); 
      $this->objLPI = productoInsumoTableClass::getAll($fields, true, $orderBy, 'ASC');
     
      $this->defineView('indexLote', 'lote', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }
}

}
