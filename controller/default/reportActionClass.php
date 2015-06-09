<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * @author Gonzalo Andres Bejarano, Elcy Milena Guerrero, Andres Eduardo Bahamon 
 * @date: fecha de inicio del desarrollo.
 * @category: modulo de defautl.
 */
class reportActionClass extends controllerClass implements controllerActionInterface {
 /**
* @author: Gonzalo Andres Bejarano, Elcy Milena Guerrero, Andres Eduardo Bahamon .
* @date: fecha de inicio del desarrollo.
* @return   usuarioTableClass::ID retorna (integer),
            usuarioTableClass::USUARIO retorna  (string),
            usuarioTableClass::CREATED_AT retorna  (timestamp),
            usuarioTableClass::ACTIVED retorna  (integer),
 * estos datos retornan en la variable $fields
*/
  public function execute() {
    try {
      
      //$this->mensaje = 'Hola a todos';
     $where = null;
      if(request::getInstance()->hasPost('filter')){
      $filter = request::getInstance()->getPost('filter');
      //validar
      if(isset($filter['usuario']) and $filter['usuario'] !== null and $filter['usuario'] !== ""){
        $where[usuarioTableClass::USUARIO] = $filter['usuario'];
      }//cierre del filtro usuario
       if((isset($filter['fechaIni']) and $filter['fechaIni'] !== null and $filter['fechaIni'] !== "") and (isset($filter['fechaFin']) and $filter['fechaFin'] !== null and $filter['fechaFin'] !== "" )){
        $where[usuarioTableClass::CREATED_AT] = array(
           date(config::getFormatTimestamp(), strtotime($filter['fechaIni'].' 00:00:00')),
           date(config::getFormatTimestamp(), strtotime($filter['fechaFin'].' 23:59:59'))
            );
      }//cierre del filtro fecha1 y fecha2     
      }//cierre del POST del reporte
      $fields = array(
          usuarioTableClass::ID,
          usuarioTableClass::USUARIO,
          usuarioTableClass::CREATED_AT,
          usuarioTableClass::ACTIVED
      );
      $orderBy = array(
         usuarioTableClass::ID
      );
      $this->objUsuarios = usuarioTableClass::getAll($fields, true, $orderBy, 'ASC',null,null,$where);
 
      $this->defineView('index', 'default', session::getInstance()->getFormatOutput());
    } //cierre del try
     catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }//cierre del catch
}//cierre de la funcion execute

}//cierre de la clase