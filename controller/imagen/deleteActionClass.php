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
class deleteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

       
      
      
  if (request::getInstance()->isMethod('POST')and request::getInstance()->isAjaxRequest()) {    

        $id = request::getInstance()->getPost(imagenTableClass::getNameField(imagenTableClass::ID, true));
        
        $fields = array(
          imagenTableClass::ID,
          imagenTableClass::HASH,
      );
        $where = array(
            imagenTableClass::ID => $id
        );
       $objEliminarImagen = imagenTableClass::getAll($fields, false, null, null, null, null, $where);
       
       unlink(config::getPathAbsolute() . 'web/uploadImagen/' . $objEliminarImagen[0]->hash);
        
        $ids = array(
            imagenTableClass::ID => $id
        );
       imagenTableClass::delete($ids, false);
       
        $this->arrayAjax = array(
            'code'=> 200,
            'msg'=> 'Eliminacion exitosa'
            );
        session::getInstance()->setSuccess('El campo Fue Eliminado Exitosamente');
        
          
        $this->defineView('delete', 'imagen', session::getInstance()->getFormatOutput());
        
      
      }//cierre del if
       else {
        routing::getInstance()->redirect('imagen', 'ver');
      }//cierre del else

       
        
      
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }
  }

}
