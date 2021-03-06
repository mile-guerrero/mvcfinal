<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\pagoTrabajadorValidatorClass as validator;
use hook\log\logHookClass as log;

/**
 * Description of ejemploClass
 *
 * @author Andres Bahamon
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        
        $fecha_ini = request::getInstance()->getPost(pagoTrabajadorTableClass::getNameField(pagoTrabajadorTableClass::FECHA_INICIAL, true));
        $fecha_fin = request::getInstance()->getPost(pagoTrabajadorTableClass::getNameField(pagoTrabajadorTableClass::FECHA_FINAL, true));
        $idEmpresa = request::getInstance()->getPost(pagoTrabajadorTableClass::getNameField(pagoTrabajadorTableClass::EMPRESA_ID, true));
        $idTrabajador = request::getInstance()->getPost(pagoTrabajadorTableClass::getNameField(pagoTrabajadorTableClass::TRABAJADOR_ID, true));
        $valor = request::getInstance()->getPost(pagoTrabajadorTableClass::getNameField(pagoTrabajadorTableClass::VALOR_SALARIO, true));
        $horas = request::getInstance()->getPost(pagoTrabajadorTableClass::getNameField(pagoTrabajadorTableClass::HORAS_PERDIDAS, true));
        $total = request::getInstance()->getPost(pagoTrabajadorTableClass::getNameField(pagoTrabajadorTableClass::TOTAL_PAGAR, true));

        
         
        validator::validateInsert();
     
         if($fecha_fin < $fecha_ini){
                session::getInstance()->setFlash('selectFechaIni', true);
                session::getInstance()->setError('La fecha final no puede ser menor a la actual', 'selectFechaIni');
                routing::getInstance()->forward('pagoTrabajador', 'insert');
            }elseif($fecha_fin == $fecha_ini){
                session::getInstance()->setFlash('selectFechaIni', true);
                session::getInstance()->setError('La fecha final es igual a la actual', 'selectFechaIni');
                routing::getInstance()->forward('pagoTrabajador', 'insert');
            }
       
       
            
            if($total < 0){
                session::getInstance()->setFlash('selectFechaIni', true);
                session::getInstance()->setError('El total a pagar no puede ser negativo', 'inputTotal');
                routing::getInstance()->forward('pagoTrabajador', 'insert');
            }
            
            if($horas < 0){
                session::getInstance()->setFlash('inputHorasPerdidas', true);
                session::getInstance()->setError('Los valores numericos no pueden ser negativos', 'inputHorasPerdidas');
                routing::getInstance()->forward('pagoTrabajador', 'insert');
            }
            
            
        $data = array(
          pagoTrabajadorTableClass::FECHA_INICIAL => $fecha_ini,
          pagoTrabajadorTableClass::FECHA_FINAL => $fecha_fin,
          pagoTrabajadorTableClass::EMPRESA_ID => $idEmpresa,
          pagoTrabajadorTableClass::TRABAJADOR_ID => $idTrabajador,
          pagoTrabajadorTableClass::VALOR_SALARIO => $valor,
          pagoTrabajadorTableClass::HORAS_PERDIDAS => $horas,
          pagoTrabajadorTableClass::TOTAL_PAGAR => $total,
            '__sequence' => 'pago_trabajador_id_seq'
            
        );
        $id = pagoTrabajadorTableClass::insert($data);
        session::getInstance()->setSuccess('El registro fue Exitoso');
        $observacion ='se ha insertando un nuevo pago a trabajador';
        log::register('Insertar', pagoTrabajadorTableClass::getNameTable(),$observacion,$id);
        routing::getInstance()->redirect('pagoTrabajador', 'index');
      } else {
        routing::getInstance()->redirect('pagoTrabajador', 'index');
      }
    } catch (PDOException $exc) {
      routing::getInstance()->redirect('pagoTrabajador', 'insert');
      session::getInstance()->setFlash('exc', $exc);
    }
  }
}
