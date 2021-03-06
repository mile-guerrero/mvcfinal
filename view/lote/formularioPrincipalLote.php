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
<?php $idLote = loteTableClass::ID ?>
<?php $ubi = loteTableClass::UBICACION ?>
<?php $tamano = loteTableClass::TAMANO ?>
<?php $descripcion = loteTableClass::DESCRIPCION ?>
<?php $fecha = loteTableClass::FECHA_INICIO_SIEMBRA ?>
<?php $numero = loteTableClass::NUMERO_PLANTULAS ?>
<?php $presupuesto = loteTableClass::PRESUPUESTO ?>

<?php $idUni = loteTableClass::UNIDAD_DISTANCIA_ID ?>
<?php $idUnidad = unidadDistanciaTableClass::ID ?>
<?php $desUnidad = unidadDistanciaTableClass::DESCRIPCION ?>

<?php $idInsu = loteTableClass::PRODUCTO_INSUMO_ID ?>
<?php $idInsumo = productoInsumoTableClass::ID ?>
<?php $desInsumo = productoInsumoTableClass::DESCRIPCION ?>

      <?php $idCiudad = loteTableClass::ID_CIUDAD ?>
      <?php $descripcionciudad = ciudadTableClass::NOMBRE_CIUDAD ?>
      <?php $idCiudaddes = ciudadTableClass::ID ?>



<div class="container container-fluid" id="cuerpo">
  <div class="center-block" id="cuerpo5">
  <div class="center-block" id="cuerpo3">
    
    <form class="form-horizontal" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('lote', ((isset($objLote)) ? 'updateLote' : 'createLote')) ?>">
<?php if (isset($objLote) == true): ?>
        <input  name="<?php echo loteTableClass::getNameField(loteTableClass::ID, true) ?>" value="<?php echo $objLote[0]->$idLote ?>" type="hidden">
<?php endif ?>
      <br><br><br><br><br>

      <?php if (session::getInstance()->hasError('inputUbicacion')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert" id="error">
          <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputUbicacion') ?>
        </div>
      <?php endif ?>

<?php if (session::getInstance()->hasError('selectCiudad')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert" id="error">
          <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('selectCiudad') ?>
        </div>
<?php endif ?>

      <div class="row j1" >
<label for="<?php echo loteTableClass::getNameField(loteTableClass::UBICACION, true) ?>" class="col-sm-2"> <?php echo i18n::__('ubicacion') ?>:</label>     
        <div class="col-lg-5">
          <input  class="form-control"  value="<?php echo (session::getInstance()->hasFlash('inputUbicacion') or request::getInstance()->hasPost(loteTableClass::getNameField(loteTableClass::UBICACION, true))) ? request::getInstance()->getPost(loteTableClass::getNameField(loteTableClass::UBICACION, true)) : ((isset($objLote[0])) ? $objLote[0]->$ubi : '') ?>" type="text" name="<?php echo loteTableClass::getNameField(loteTableClass::UBICACION, true) ?>" placeholder="<?php echo i18n::__('ubicacion') ?>" required>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
          <select  class="form-control" id="<?php loteTableClass::getNameField(loteTableClass::ID, true) ?>" name="<?php echo loteTableClass::getNameField(loteTableClass::ID_CIUDAD, true); ?>">
            <option  value="<?php echo (session::getInstance()->hasFlash('selectCiudad') or request::getInstance()->hasPost(loteTableClass::getNameField(loteTableClass::ID_CIUDAD, true))) ? request::getInstance()->getPost(loteTableClass::getNameField(loteTableClass::ID_CIUDAD, true)) : ((isset($objLote[0])) ? '' : '') ?>" ><?php echo i18n::__('selectCiudad') ?></option>
<?php foreach ($objLC as $C): ?>
              <option <?php echo (request::getInstance()->hasPost(loteTableClass::getNameField(loteTableClass::ID_CIUDAD, true)) === true and request::getInstance()->getPost(loteTableClass::getNameField(loteTableClass::ID_CIUDAD, true)) == $C->$idCiudaddes) ? 'selected' : (isset($objLote[0]->$idCiudad) === true and $objLote[0]->$idCiudad == $C->$idCiudaddes) ? 'selected' : '' ?>  value="<?php echo $C->$idCiudaddes ?>"><?php echo $C->$descripcionciudad ?></option>
<?php endforeach; ?>
          </select>
        </div>
      </div>
<br>  
     


<?php if (session::getInstance()->hasError('inputTamano')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert" id="error">
          <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputTamano') ?>
        </div>
<?php endif ?>


<?php if (session::getInstance()->hasError('selectUnidad')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert" id="error">
          <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('selectUnidad') ?>
        </div>
<?php endif ?>
      
      
      
      <div class="row j1" >
        <label for="<?php echo loteTableClass::getNameField(loteTableClass::TAMANO, true) ?>" class="col-sm-2"> <?php echo i18n::__('tamano') ?>:</label>     
        <div class="col-lg-5">
          <input  class=" form-control"  value="<?php echo (session::getInstance()->hasFlash('inputTamano') or request::getInstance()->hasPost(loteTableClass::getNameField(loteTableClass::TAMANO, true))) ? request::getInstance()->getPost(loteTableClass::getNameField(loteTableClass::TAMANO, true)) : ((isset($objLote[0])) ? $objLote[0]->$tamano : '') ?>" type="text" name="<?php echo loteTableClass::getNameField(loteTableClass::TAMANO, true) ?>" placeholder="<?php echo i18n::__('tamano') ?>" required>

        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
           <select  class="form-control" id="<?php loteTableClass::getNameField(loteTableClass::ID, true) ?>" name="<?php echo loteTableClass::getNameField(loteTableClass::UNIDAD_DISTANCIA_ID, true); ?>">
            <option value="<?php echo (session::getInstance()->hasFlash('selectUnidad') or request::getInstance()->hasPost(loteTableClass::getNameField(loteTableClass::UNIDAD_DISTANCIA_ID, true))) ? request::getInstance()->getPost(loteTableClass::getNameField(loteTableClass::UNIDAD_DISTANCIA_ID, true)) : ((isset($objLote[0])) ? '' : '') ?>" ><?php echo i18n::__('selectUnidadDis') ?></option>
<?php foreach ($objLUD as $C): ?>
              <option <?php echo (request::getInstance()->hasPost(loteTableClass::getNameField(loteTableClass::UNIDAD_DISTANCIA_ID, true)) === true and request::getInstance()->getPost(loteTableClass::getNameField(loteTableClass::UNIDAD_DISTANCIA_ID, true)) == $C->$idUnidad) ? 'selected' : (isset($objLote[0]->$idUni) === true and $objLote[0]->$idUni == $C->$idUnidad) ? 'selected' : '' ?>  value="<?php echo $C->$idUnidad ?>"><?php echo $C->$desUnidad ?></option>
      <?php endforeach; ?>
          </select>
        </div>
      </div>

      <br>  


<?php if (session::getInstance()->hasError('inputDescripcion')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert" id="error">
          <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputDescripcion') ?>
        </div>
<?php endif ?>

      <div class="form-group">
        <label for="<?php echo loteTableClass::getNameField(loteTableClass::DESCRIPCION, true) ?>" class="col-sm-2"> <?php echo i18n::__('des') ?>: </label>     
        <div class="col-sm-10">
          <input  class="form-control"  value="<?php echo (session::getInstance()->hasFlash('inputDescripcion') or request::getInstance()->hasPost(loteTableClass::getNameField(loteTableClass::DESCRIPCION, true))) ? request::getInstance()->getPost(loteTableClass::getNameField(loteTableClass::DESCRIPCION, true)) : ((isset($objLote[0])) ? $objLote[0]->$descripcion : '') ?>" type="text" name="<?php echo loteTableClass::getNameField(loteTableClass::DESCRIPCION, true) ?>" placeholder="<?php echo i18n::__('des') ?>" required>
        </div>
      </div>

      <!--<div class="form-group">
            <label for="<?php echo loteTableClass::getNameField(loteTableClass::FECHA_INICIO_SIEMBRA, true) ?>" class="col-sm-2"> <?php echo i18n::__('fecha siembra') ?>: </label>     
            <div class="col-sm-10">
              <input  class="form-control" value="<?php echo ((isset($objLote) == true) ? $objLote[0]->$fecha : '') ?>" type="datetime-local" name="<?php echo loteTableClass::getNameField(loteTableClass::FECHA_INICIO_SIEMBRA, true) ?>" placeholder="<?php echo i18n::__('fecha siembra') ?>" >
            </div>
       </div>  
        
        <div class="form-group">
            <label for="<?php echo loteTableClass::getNameField(loteTableClass::NUMERO_PLANTULAS, true) ?>" class="col-sm-2"> <?php echo i18n::__('numero') ?>: </label>     
            <div class="col-sm-10">
              <input  class="form-control-gonza1" value="null<?php echo ((isset($objLote) == true) ? $objLote[0]->$numero : '') ?>" type="text" name="<?php echo loteTableClass::getNameField(loteTableClass::NUMERO_PLANTULAS, true) ?>" placeholder="<?php echo i18n::__('numero') ?>" >
            
        
         
      <select  class="form-control-gonza2" id="<?php loteTableClass::getNameField(loteTableClass::ID, true) ?>" name="<?php echo loteTableClass::getNameField(loteTableClass::PRODUCTO_INSUMO_ID, true); ?>">
        <option value="null"><?php echo i18n::__('seleccione insumo') ?></option>
<?php foreach ($objLPI as $C): ?>
               <option <?php echo (isset($objLote[0]->$idInsu) === true and $objLote[0]->$idInsu == $C->$idInsumo) ? 'selected' : '' ?>  value="<?php echo $C->$idInsumo ?>"><?php echo $C->$desInsumo ?></option>
<?php endforeach; ?>
         </select>
           </div>
          </div>
        
      <div class="form-group">
            <label for="<?php echo loteTableClass::getNameField(loteTableClass::PRESUPUESTO, true) ?>" class="col-sm-2"> <?php echo i18n::__('presupuesto') ?>: </label>     
            <div class="col-sm-10">
                <input  class="form-control" value="null<?php echo ((isset($objLote) == true) ? $objLote[0]->$presupuesto : '') ?>" type="text" name="<?php echo loteTableClass::getNameField(loteTableClass::PRESUPUESTO, true) ?>" placeholder="<?php echo i18n::__('presupuesto') ?>" >
            </div>
       </div>   -->




      <input class="btn btn-lg btn-success btn-xs" type="submit" value="<?php echo i18n::__(((isset($objLote)) ? 'update' : 'register')) ?>">
      <a class="btn btn-lg btn-default btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('lote', 'indexLote') ?>" ><?php echo i18n::__('atras') ?> </a>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </form>
  </div>
</div>
</div>