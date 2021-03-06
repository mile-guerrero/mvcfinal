<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php
use mvc\request\requestClass as request ?>

<?php $idCliente = clienteTableClass::ID ?>
<?php $nombreC = clienteTableClass::NOMBRE ?>
<?php $apellido = clienteTableClass::APELLIDO ?>
<?php $documento = clienteTableClass::DOCUMENTO ?>
<?php $direccion = clienteTableClass::DIRECCION ?>
<?php $telefono = clienteTableClass::TELEFONO ?>
<?php $idTipo = clienteTableClass::ID_TIPO_ID ?>
<?php $idCiudad = clienteTableClass::ID_CIUDAD ?>
<?php $descripcionciudad = ciudadTableClass::NOMBRE_CIUDAD ?>
<?php $descripciontipo = tipoIdTableClass::DESCRIPCION ?>
<?php $idCiudaddes = ciudadTableClass::ID ?>
<?php $idTipoId = tipoIdTableClass::ID ?>

<div class="container container-fluid" id="cuerpo">
  <div class="center-block" id="cuerpo5">
  <div class="center-block" id="cuerpo3">

    <!--<article id='derecha'>-->


    <!--<div class="row j1" >
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">&nbsp;</div>
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">&nbsp;</div>
    </div>-->

    <form class="form-horizontal julianlasso" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('cliente', ((isset($objCliente)) ? 'updateCliente' : 'createCliente')) ?>">
      <?php if (isset($objCliente) == true): ?>
        <input  name="<?php echo clienteTableClass::getNameField(clienteTableClass::ID, true) ?>" value="<?php echo $objCliente[0]->$idCliente ?>" type="hidden">
      <?php endif ?>

      <!--        &nbsp;-->
      <br><br><br><br>
 
  <br>

          <?php if (session::getInstance()->hasError('inputDocumento')): ?>
            <div class=" alert alert-danger alert-dismissible" role="alert" id="error">
              <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputDocumento') ?>
            </div>
          <?php endif ?>
        


      
          <?php if (session::getInstance()->hasError('selectTipoId')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert" id="error">
              <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('selectTipoId') ?>
            </div>
          <?php endif ?>
        
      


      <div class="row j1" >
        
          <label for="<?php echo clienteTableClass::getNameField(clienteTableClass::DOCUMENTO, true) ?>" class="col-sm-2"> <?php echo i18n::__('documento') ?>:</label>     
        
        <div class="col-lg-5">
          <input class="form-control" value="<?php echo (session::getInstance()->hasFlash('inputDocumento') or request::getInstance()->hasPost(clienteTableClass::getNameField(clienteTableClass::DOCUMENTO, true))) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::DOCUMENTO, true)) : ((isset($objCliente[0])) ? $objCliente[0]->$documento : '') ?>" type="text" name="<?php echo clienteTableClass::getNameField(clienteTableClass::DOCUMENTO, true) ?>" placeholder="<?php echo i18n::__('documento') ?>"required>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
          <select class="form-control" id="<?php clienteTableClass::getNameField(clienteTableClass::ID, TRUE) ?>" name="<?php echo clienteTableClass::getNameField(clienteTableClass::ID_TIPO_ID, TRUE); ?>" >
            <option value="<?php echo (session::getInstance()->hasFlash('selectTipoId') or request::getInstance()->hasPost(clienteTableClass::getNameField(clienteTableClass::ID_TIPO_ID, true))) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::ID_TIPO_ID, true)) : ((isset($objCliente[0])) ? '' : '') ?>"><?php echo i18n::__('selectTipoId') ?></option>
            <?php foreach ($objCTI as $IT): ?>
              <option <?php echo (request::getInstance()->hasPost(clienteTableClass::getNameField(clienteTableClass::ID_TIPO_ID, true)) === true and request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::ID_TIPO_ID, true)) == $IT->$idTipoId) ? 'selected' : (isset($objCliente[0]->$idTipo) === true and $objCliente[0]->$idTipo == $IT->$idTipoId) ? 'selected' : '' ?> value="<?php echo $IT->$idTipoId ?>"><?php echo $IT->$descripciontipo ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

  <br>


     


      <?php if (session::getInstance()->hasError('inputNombre')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert" id="error">
          <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputNombre') ?>
        </div>
      <?php endif ?>

      <div class="form-group">
        <label for="<?php echo clienteTableClass::getNameField(clienteTableClass::NOMBRE, true) ?>" class="col-sm-2"> <?php echo i18n::__('nom') ?>:</label>     
        <div class="col-sm-10">
          <input  class="form-control" value="<?php echo (session::getInstance()->hasFlash('inputNombre') or request::getInstance()->hasPost(clienteTableClass::getNameField(clienteTableClass::NOMBRE, true))) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::NOMBRE, true)) : ((isset($objCliente[0])) ? $objCliente[0]->$nombreC : '') ?>" type="text" name="<?php echo clienteTableClass::getNameField(clienteTableClass::NOMBRE, true) ?>" placeholder="<?php echo i18n::__('nom') ?>"required>
        </div>
      </div>  


      <?php if (session::getInstance()->hasError('inputApellido')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert" id="error">
          <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputApellido') ?>
        </div>
      <?php endif ?>   

      <div class="form-group">
        <label for="<?php echo clienteTableClass::getNameField(clienteTableClass::APELLIDO, true) ?>" class="col-sm-2"> <?php echo i18n::__('apell') ?>:</label>     
        <div class="col-sm-10">            
          <input class="form-control" value="<?php echo (session::getInstance()->hasFlash('inputApellido') or request::getInstance()->hasPost(clienteTableClass::getNameField(clienteTableClass::APELLIDO, true))) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::APELLIDO, true)) : ((isset($objCliente[0])) ? $objCliente[0]->$apellido : '') ?>" type="text" name="<?php echo clienteTableClass::getNameField(clienteTableClass::APELLIDO, true) ?>" placeholder="<?php echo i18n::__('apell') ?>"required>
        </div>
      </div> 



      <?php if (session::getInstance()->hasError('inputDireccion')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert" id="error">
          <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputDireccion') ?>
        </div>
      <?php endif ?> 


      <?php if (session::getInstance()->hasError('selectCiudad')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert" id="error">
          <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('selectCiudad') ?>
        </div>
      <?php endif ?> 
      
      <div class="row j1" >
        
          <label for="<?php echo clienteTableClass::getNameField(clienteTableClass::DIRECCION, true) ?>" class="col-sm-2"> <?php echo i18n::__('dir') ?>: </label>     
        
        <div class="col-lg-5">
          <input class="form-control" value="<?php echo (session::getInstance()->hasFlash('inputDireccion') or request::getInstance()->hasPost(clienteTableClass::getNameField(clienteTableClass::DIRECCION, true))) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::DIRECCION, true)) : ((isset($objCliente[0])) ? $objCliente[0]->$direccion : '') ?>" type="text" name="<?php echo clienteTableClass::getNameField(clienteTableClass::DIRECCION, true) ?>" placeholder="<?php echo i18n::__('dir') ?>"required>
       </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
          <select class="form-control" id="<?php clienteTableClass::getNameField(clienteTableClass::ID, true) ?>" name="<?php echo clienteTableClass::getNameField(clienteTableClass::ID_CIUDAD, true); ?>">
           <option value="<?php echo (session::getInstance()->hasFlash('selectCiudad') or request::getInstance()->hasPost(clienteTableClass::getNameField(clienteTableClass::ID_CIUDAD, true))) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::ID_CIUDAD, true)) : ((isset($objCliente[0])) ? '' : '') ?>"><?php echo i18n::__('selectCiudad')?></option>
<?php foreach ($objCC as $C): ?>
              <option <?php echo (request::getInstance()->hasPost(clienteTableClass::getNameField(clienteTableClass::ID_CIUDAD, true)) === true and request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::ID_CIUDAD, true)) == $C->$idCiudaddes) ? 'selected' : (isset($objCliente[0]->$idCiudad) === true and $objCliente[0]->$idCiudad == $C->$idCiudaddes) ? 'selected' : '' ?> value="<?php echo $C->$idCiudaddes ?>"><?php echo $C->$descripcionciudad ?></option>
<?php endforeach; ?>
              
          </select><br>
        </div>
      </div>
      
     
      <?php if (session::getInstance()->hasError('inputTelefono')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert" id="error">
          <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputTelefono') ?>
        </div>
      <?php endif ?>    
      
      


      <div class="form-group">
        <label for="<?php echo clienteTableClass::getNameField(clienteTableClass::TELEFONO, true) ?>" class="col-sm-2"> <?php echo i18n::__('tel') ?>:  </label>     
        <div class="col-sm-10">              
          <input class="form-control" value="<?php echo (session::getInstance()->hasFlash('inputTelefono') or request::getInstance()->hasPost(clienteTableClass::getNameField(clienteTableClass::TELEFONO, true))) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::TELEFONO, true)) : ((isset($objCliente[0])) ? $objCliente[0]->$telefono : '') ?>" type="text" name="<?php echo clienteTableClass::getNameField(clienteTableClass::TELEFONO, true) ?>" placeholder="<?php echo i18n::__('tel') ?>"required>
        </div>
      </div>





      <input class="btn btn-lg btn-success btn-xs" type="submit" value="<?php echo i18n::__(((isset($objCliente)) ? 'update' : 'register')) ?>">
      <a class="btn btn-lg btn-default btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('cliente', 'indexCliente') ?>" ><?php echo i18n::__('atras') ?> </a>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
    </form> 
    <!--  </article>-->
  </div>
  </div>
</div>
 