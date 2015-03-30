
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
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
       $idDetalle = request::getInstance()->getPost(detallePagoTrabajadorTableClass::getNameField(detallePagoTrabajadorTableClass::ID, true));
       $salario = request::getInstance()->getPost(detallePagoTrabajadorTableClass::getNameField(detallePagoTrabajadorTableClass::VALOR_SALARIO, true));
       $cantidad_horas = request::getInstance()->getPost(detallePagoTrabajadorTableClass::getNameField(detallePagoTrabajadorTableClass::CANTIDAD_HORAS_EXTRAS, true));
       $valor_horas = request::getInstance()->getPost(detallePagoTrabajadorTableClass::getNameField(detallePagoTrabajadorTableClass::VALOR_HORAS_EXTRAS, true));
       $horas_perdidas = request::getInstance()->getPost(detallePagoTrabajadorTableClass::getNameField(detallePagoTrabajadorTableClass::HORAS_PERDIDAS, true));
       $total = request::getInstance()->getPost(detallePagoTrabajadorTableClass::getNameField(detallePagoTrabajadorTableClass::TOTAL_PAGAR, true));
       $pago = request::getInstance()->getPost(detallePagoTrabajadorTableClass::getNameField(detallePagoTrabajadorTableClass::PAGO_TRABAJADOR_ID, true));
       $idTrabajador = request::getInstance()->getPost(detallePagoTrabajadorTableClass::getNameField(detallePagoTrabajadorTableClass::TRABAJADOR_ID, true));

        $ids = array(
            detallePagoTrabajadorTableClass::ID => $idDetalle
        );
        $data = array(
            
          detallePagoTrabajadorTableClass::VALOR_SALARIO => $salario,
          detallePagoTrabajadorTableClass::CANTIDAD_HORAS_EXTRAS => $cantidad_horas,
          detallePagoTrabajadorTableClass::VALOR_HORAS_EXTRAS => $valor_horas,
          detallePagoTrabajadorTableClass::HORAS_PERDIDAS => $horas_perdidas,
          detallePagoTrabajadorTableClass::TOTAL_PAGAR => $total,
          detallePagoTrabajadorTableClass::PAGO_TRABAJADOR_ID => $pago,
          detallePagoTrabajadorTableClass::TRABAJADOR_ID => $idTrabajador
            
        );
        detallePagoTrabajadorTableClass::update($ids, $data);
         
        routing::getInstance()->redirect('detallePagoTrabajador', 'index');
      }
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }
  }

}
