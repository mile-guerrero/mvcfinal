
<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\ordenServicioValidatorUpdateClass as validator;
use hook\log\logHookClass as log;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        $id = request::getInstance()->getPost(ordenServicioTableClass::getNameField(ordenServicioTableClass::ID, true));
        $fecha = request::getInstance()->getPost(ordenServicioTableClass::getNameField(ordenServicioTableClass::FECHA_MANTENIMIENTO, true));
        $trabajador = request::getInstance()->getPost(ordenServicioTableClass::getNameField(ordenServicioTableClass::TRABAJADOR_ID, true));
        $cantidad = request::getInstance()->getPost(ordenServicioTableClass::getNameField(ordenServicioTableClass::CANTIDAD, true));
        $valor = request::getInstance()->getPost(ordenServicioTableClass::getNameField(ordenServicioTableClass::VALOR, true));
        $producto = request::getInstance()->getPost(ordenServicioTableClass::getNameField(ordenServicioTableClass::PRODUCTO_INSUMO_ID, true));
        $maquina = request::getInstance()->getPost(ordenServicioTableClass::getNameField(ordenServicioTableClass::MAQUINA_ID, true));
        
        validator::validateUpdate();
        
        $ids = array(
            ordenServicioTableClass::ID => $id
        );
        $data = array(
            ordenServicioTableClass::FECHA_MANTENIMIENTO => $fecha,
            ordenServicioTableClass::TRABAJADOR_ID => $trabajador,
            ordenServicioTableClass::CANTIDAD => $cantidad,
            ordenServicioTableClass::VALOR => $valor,
            ordenServicioTableClass::PRODUCTO_INSUMO_ID => $producto,            
            ordenServicioTableClass::MAQUINA_ID => $maquina
        );
        ordenServicioTableClass::update($ids, $data);
        session::getInstance()->setSuccess('La actualizacion fue correcta');
        $observacion ='se ha modificado la orden servicio';
        log::register('Modificar', ordenServicioTableClass::getNameTable(),$observacion,$id);
        routing::getInstance()->redirect('ordenServicio', 'index');
      }
    } catch (PDOException $exc) {
      routing::getInstance()->redirect('ordenServicio', 'edit');
      session::getInstance()->setFlash('exc', $exc);
    }
  }

}
