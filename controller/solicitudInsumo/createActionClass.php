<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\solicitudInsumoValidatorClass as validator;
use hook\log\logHookClass as log;
/**
 * Description of ejemploClass
 *
 * @author Gonzalo Andres Bejarano, Elcy Milena Guerrero, Andres Eduardo Bahamon
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $fecha = request::getInstance()->getPost(solicitudInsumoTableClass::getNameField(solicitudInsumoTableClass::FECHA_HORA, true));
        $trabajador = request::getInstance()->getPost(solicitudInsumoTableClass::getNameField(solicitudInsumoTableClass::TRABAJADOR_ID, true));
        $cantidad = request::getInstance()->getPost(solicitudInsumoTableClass::getNameField(solicitudInsumoTableClass::CANTIDAD, true));
        $idProducto = request::getInstance()->getPost(solicitudInsumoTableClass::getNameField(solicitudInsumoTableClass::PRODUCTO_INSUMO_ID, true));
        $idLote = request::getInstance()->getPost(solicitudInsumoTableClass::getNameField(solicitudInsumoTableClass::LOTE_ID, true));
        $idUnidadMedida = request::getInstance()->getPost(solicitudInsumoTableClass::getNameField(solicitudInsumoTableClass::UNIDAD_MEDIDA_ID, true));
//        if (strlen($nombre) > credencialTableClass::NOMBRE_LENGTH) {
//          throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => credencialTableClass::NOMBRE_LENGTH)), 00001);
//        }
                validator::validateInsert();
                
                if($cantidad <= 0){
                session::getInstance()->setFlash('inputCantidad', true);
                session::getInstance()->setError('Los valores numericos no pueden ser negativos', 'inputCantidad');
                routing::getInstance()->forward('solicitudInsumo', 'insert');
            }

        $data = array(
            solicitudInsumoTableClass::FECHA_HORA => $fecha,
            solicitudInsumoTableClass::TRABAJADOR_ID => $trabajador,
            solicitudInsumoTableClass::CANTIDAD => $cantidad,
            solicitudInsumoTableClass::PRODUCTO_INSUMO_ID => $idProducto,
            solicitudInsumoTableClass::LOTE_ID => $idLote,
            solicitudInsumoTableClass::UNIDAD_MEDIDA_ID => $idUnidadMedida,
            '__sequence' => 'solicitud_insumo_id_seq'
        );
        $id = solicitudInsumoTableClass::insert($data);
        session::getInstance()->setSuccess('El registro fue exitoso');
        $observacion ='se ha insertando una nueva solicitud insumo';
        log::register('Insertar', solicitudInsumoTableClass::getNameTable(),$observacion,$id);
        routing::getInstance()->redirect('solicitudInsumo', 'index');
      } else {
        routing::getInstance()->redirect('solicitudInsumo', 'index');
      }
    } catch (PDOException $exc) {
      routing::getInstance()->redirect('solicitudInsumo', 'insert');
      session::getInstance()->setFlash('exc', $exc);
    }
  }

}
