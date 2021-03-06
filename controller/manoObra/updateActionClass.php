
<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\manoObraValidatorUpdateClass as validator;
use hook\log\logHookClass as log;
/**
 * Description of ejemploClass
 *
 * @author Gonzalo Andres Bejarano, Elcy Milena Guerrero, Andres Eduardo Bahamon
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        $id = request::getInstance()->getPost(manoObraTableClass::getNameField(manoObraTableClass::ID, true));
        $cantidad = request::getInstance()->getPost(manoObraTableClass::getNameField(manoObraTableClass::CANTIDAD_HORA, true));
        $valor = request::getInstance()->getPost(manoObraTableClass::getNameField(manoObraTableClass::VALOR_HORA, true));
        $total = request::getInstance()->getPost(manoObraTableClass::getNameField(manoObraTableClass::TOTAL, true));
        $cooperativa = request::getInstance()->getPost(manoObraTableClass::getNameField(manoObraTableClass::COOPERATIVA_ID, true));
        $lote = request::getInstance()->getPost(manoObraTableClass::getNameField(manoObraTableClass::LOTE_ID, true));
        $maquina = request::getInstance()->getPost(manoObraTableClass::getNameField(manoObraTableClass::MAQUINA_ID, true));
        
        validator::validateUpdate();
        
        if($total <= 0){
                session::getInstance()->setFlash('inputTotal', true);
                session::getInstance()->setError('Los valores numericos no pueden ser negativos', 'inputTotal');
                request::getInstance()->setMethod('GET');
                request::getInstance()->addParamGet(array(\manoObraTableClass::ID => request::getInstance()->getPost(\manoObraTableClass::getNameField(\manoObraTableClass::ID, true))));
                routing::getInstance()->forward('manoObra', 'edit');
            }
        
            if($cantidad <= 0){
                session::getInstance()->setFlash('inputCantidad', true);
                session::getInstance()->setError('Los valores numericos no pueden ser negativos', 'inputCantidad');
                request::getInstance()->setMethod('GET');
                request::getInstance()->addParamGet(array(\manoObraTableClass::ID => request::getInstance()->getPost(\manoObraTableClass::getNameField(\manoObraTableClass::ID, true))));
                routing::getInstance()->forward('manoObra', 'edit');
            }
            
            if($valor <= 0){
                session::getInstance()->setFlash('inputValor', true);
                session::getInstance()->setError('Los valores numericos no pueden ser negativos', 'inputValor');
                request::getInstance()->setMethod('GET');
                request::getInstance()->addParamGet(array(\manoObraTableClass::ID => request::getInstance()->getPost(\manoObraTableClass::getNameField(\manoObraTableClass::ID, true))));
                routing::getInstance()->forward('manoObra', 'edit');
            }
            
            
        $ids = array(
            manoObraTableClass::ID => $id
        );
        $data = array(
            manoObraTableClass::CANTIDAD_HORA => $cantidad,
            manoObraTableClass::VALOR_HORA => $valor,
            manoObraTableClass::TOTAL => $total,
            manoObraTableClass::COOPERATIVA_ID => $cooperativa,
            manoObraTableClass::LOTE_ID => $lote,            
            manoObraTableClass::MAQUINA_ID => $maquina
        );
        manoObraTableClass::update($ids, $data);
        session::getInstance()->setSuccess('La actualizacion fue correcta');
        $observacion ='se ha modificado la mano de obra';
        log::register('Modificar', manoObraTableClass::getNameTable(),$observacion,$id);
        routing::getInstance()->redirect('manoObra', 'index');
      }
    } catch (PDOException $exc) {
      routing::getInstance()->redirect('manoObra', 'edit');
      session::getInstance()->setFlash('exc', $exc);
    }
  }

}
