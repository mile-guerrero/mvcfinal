<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as log;

/**
* @author Gonzalo Andres Bejarano, Elcy Milena Guerrero, Andres Eduardo Bahamon 
* @date: fecha de inicio del desarrollo.
* @category: modulo de cliente.
*/
class deleteActionClass extends controllerClass implements controllerActionInterface {

  /**
* @author: Gonzalo Andres Bejarano, Elcy Milena Guerrero, Andres Eduardo Bahamon .
* @date: fecha de inicio del desarrollo.
* @return   controlEnfermedadTableClass::ID retorna $id (string),            
 * estos datos retornan en la variable $ids
*/
  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')and request::getInstance()->isAjaxRequest()) {

        $id = request::getInstance()->getPost(controlEnfermedadTableClass::getNameField(controlEnfermedadTableClass::ID, true));
       
        $ids = array(
            controlEnfermedadTableClass::ID => $id
        );
       controlEnfermedadTableClass::delete($ids, true);
        $this->arrayAjax = array(
            'code'=> 200,
            'msg'=> 'Eliminacion exitosa'
            );
        
        $observacion ='se ha eliminado un controlEnfermedad';
       log::register('Eliminar', controlEnfermedadTableClass::getNameTable(),$observacion,$id);
        session::getInstance()->setSuccess('El campo Fue Eliminado Exitosamente');
        $this->defineView('delete', 'controlEnfermedad', session::getInstance()->getFormatOutput());
      
      }//cierre del if
       else {
        routing::getInstance()->redirect('controlEnfermedad', 'index');
      }//cierre del else
    } //cierre del try
     catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }//cierre del catch
  }//cierre de la funcion execute

}//cierre de la clase

