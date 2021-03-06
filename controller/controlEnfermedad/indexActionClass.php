<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\controlEnfermedadValidatorClass as validator;

/**
 * @author Gonzalo Andres Bejarano, Elcy Milena Guerrero, Andres Eduardo Bahamon 
 * @date: fecha de inicio del desarrollo.
 * @category: modulo de cliente.
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

    /**
     * @author: Gonzalo Andres Bejarano, Elcy Milena Guerrero, Andres Eduardo Bahamon .
     * @date: fecha de inicio del desarrollo.
     * @return   controlEnfermedadTableClass::ID retorna (integer),
      controlEnfermedadTableClass::NOMBRE retorna  (string),
      controlEnfermedadTableClass::APELLIDO retorna  (string),
      controlEnfermedadTableClass::DOCUMENTO retorna  (integer),
      controlEnfermedadTableClass::DIRECCION retorna  (string),
      controlEnfermedadTableClass::TELEFONO retorna  (integer),
      controlEnfermedadTableClass::ID_TIPO_ID retorna (integer),
      controlEnfermedadTableClass::ID_CIUDAD retorna  (integer),
      controlEnfermedadTableClass::UPDATE_AT retorna  (timestamp),
      ciudadTableClass::ID retorna  (integer),
      ciudadTableClass::NOMBRE_CIUDAD retorna  (string),
     * estos datos retornan en la variable $fields
     */
    public function execute() {
        try {

            $where = null;

            if (request::getInstance()->hasPost('filter')) {
                $filter = request::getInstance()->getPost('filter');
                //Validar datos

                if ((isset($filter[controlEnfermedadTableClass::getNameField(controlEnfermedadTableClass::CREATED_AT, true) . '_1']) and empty($filter[controlEnfermedadTableClass::getNameField(controlEnfermedadTableClass::CREATED_AT, true) . '_1']) === false) and ( isset($filter[controlEnfermedadTableClass::getNameField(controlEnfermedadTableClass::CREATED_AT, true) . '_2']) and empty($filter[controlEnfermedadTableClass::getNameField(controlEnfermedadTableClass::CREATED_AT, true) . '_2']) === false)) {
                    if (request::getInstance()->isMethod('POST')) {

                        $fechaInicial = $filter[controlEnfermedadTableClass::getNameField(controlEnfermedadTableClass::CREATED_AT, true) . '_1'];
                        $fechaFin = $filter[controlEnfermedadTableClass::getNameField(controlEnfermedadTableClass::CREATED_AT, true) . '_2'];

                        validator::validateFiltroFecha($fechaInicial, $fechaFin);

                        if ((isset($fechaInicial) and $fechaInicial !== null and $fechaInicial !== "") and ( isset($fechaFin) and $fechaFin !== null and $fechaFin !== "" )) {
                            $where[] = '(' . controlEnfermedadTableClass::getNameField(controlEnfermedadTableClass::CREATED_AT) . ' BETWEEN ' . "'" . date(config::getFormatTimestamp(), strtotime($fechaInicial . ' 00:00:00')) . "'" . ' AND ' . "'" . date(config::getFormatTimestamp(), strtotime($fechaFin . ' 23:59:59')) . "'" . ' ) ';
                        }
                    }
                }


                if (isset($filter[controlEnfermedadTableClass::getNameField(controlEnfermedadTableClass::LOTE_ID, true)]) and empty($filter[controlEnfermedadTableClass::getNameField(controlEnfermedadTableClass::LOTE_ID, true)]) === false) {
                    if (request::getInstance()->isMethod('POST')) {

                        $lote = $filter[controlEnfermedadTableClass::getNameField(controlEnfermedadTableClass::LOTE_ID, true)];

                        if (isset($lote) and $lote !== null and $lote !== '') {
                            $where[controlEnfermedadTableClass::LOTE_ID] = $lote;
                        }//cierre del filtro ciudad
                    }
                }




//       session::getInstance()->setAttribute('clienteIndexFilters', $where);
//       }else if(session::getInstance()->hasAttribute('clienteIndexFilters')){
//        $where = session::getInstance()->getAttribute('clienteIndexFilters');
//     
            }

            $fields = array(
                controlEnfermedadTableClass::ID,
                controlEnfermedadTableClass::LOTE_ID,
                controlEnfermedadTableClass::ENFERMEDAD_ID,
                controlEnfermedadTableClass::PRODUCTO_INSUMO_ID,
                controlEnfermedadTableClass::CANTIDAD,
                controlEnfermedadTableClass::UNIDAD_MEDIDA_ID
            );
            $orderBy = array(
                controlEnfermedadTableClass::LOTE_ID
            );
            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }//cierre del if del paguinado
            $this->cntPages = controlEnfermedadTableClass::getTotalPages(config::getRowGrid(), $where);
            $this->objControlEnfermedad = controlEnfermedadTableClass::getAll($fields, true, $orderBy, 'ASC', config::getRowGrid(), $page, $where);

      $fields = array(
          loteTableClass::ID,
          loteTableClass::UBICACION
      );
      $orderBy = array(
          loteTableClass::UBICACION
      );
      $this->objLote = loteTableClass::getAll($fields, true, $orderBy, 'ASC'); 
      

            $this->defineView('index', 'controlEnfermedad', session::getInstance()->getFormatOutput());
        } //cierre del try
        catch (PDOException $exc) {
            routing::getInstance()->redirect('controlEnfermedad', 'index');

//      echo $exc->getMessage();
//      echo '<br>';
//      echo $exc->getTraceAsString();
        }//cierre del catch
    }

//cierre de la funcion execute
}

//cierre de la clase
