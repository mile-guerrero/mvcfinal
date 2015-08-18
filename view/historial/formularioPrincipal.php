<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>
<?php $idHistorial = historialTableClass::ID ?>
<?php $producto = historialTableClass::PRODUCTO_INSUMO_ID ?>
<?php $productos = productoInsumoTableClass::ID ?>
<?php $desProducto = productoInsumoTableClass::DESCRIPCION ?>

<?php $enfermedad = historialTableClass::ENFERMEDAD_ID ?>
<?php $enfermedads = enfermedadTableClass::ID ?>
<?php $desEnfermedad = enfermedadTableClass::NOMBRE ?>

<?php $plaga = historialTableClass::PLAGA_ID ?>
<?php $plagaId = plagaTableClass::ID ?>
<?php $desPlaga = plagaTableClass::NOMBRE ?>

<?php $lote = historialTableClass::LOTE_ID ?>
<?php $loteId = loteTableClass::ID ?>
<?php $desLote = loteTableClass::UBICACION ?>


<div class="container container-fluid" id="cuerpo">
  <div class="center-block" id="cuerpo5">
    <div class="center-block" id="cuerpo2">
      <article id='derecha'>
<form  class="form-horizontal" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('historial', ((isset($objHistorial)) ? 'update' : 'create')) ?>">
  <?php if(isset($objHistorial)== true): ?>
  <input  name="<?php echo historialTableClass::getNameField(historialTableClass::ID, true) ?>" value="<?php echo $objHistorial[0]->$idHistorial ?>" type="hidden">
  <?php endif ?>
  <br><br><br><br><br>
  
   
   <?php if(session::getInstance()->hasError('inputLote')): ?>
  <div class="alert alert-danger alert-dismissible" role="alert" id="error">
    <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputLote') ?>
    </div>
    <?php endif ?>
  
  <div class="form-group">
      <label for="<?php echo historialTableClass::getNameField(historialTableClass::LOTE_ID, true) ?>" class="col-sm-2"><?php echo i18n::__('lote') ?>: </label>
      <div class="col-sm-10"> 
       <select class="form-control " id="<?php historialTableClass::getNameField(historialTableClass::ID, true) ?>" name="<?php echo historialTableClass::getNameField(historialTableClass::LOTE_ID, true); ?>">
         <option value="<?php echo (session::getInstance()->hasFlash('inputLote')  or request::getInstance()->hasPost(historialTableClass::getNameField(historialTableClass::LOTE_ID, true))) ? request::getInstance()->getPost(historialTableClass::getNameField(historialTableClass::LOTE_ID, true)) : ((isset($objHistorial[0])) ? '' : '') ?>"><?php echo i18n::__('selectLote')?></option>
         <?php foreach($objHistorialLote as $key):?>
          <option <?php echo (request::getInstance()->hasPost(historialTableClass::getNameField(historialTableClass::LOTE_ID, true)) === true and request::getInstance()->getPost(historialTableClass::getNameField(historialTableClass::LOTE_ID, true)) == $key->$loteId) ? 'selected' : (isset($objHistorial[0]->$lote) === true and $objHistorial[0]->$lote == $key->$loteId) ? 'selected' : '' ?> value="<?php echo $key->$loteId ?>"><?php echo $key->$desLote ?></option>  
       <?php endforeach;?>
   </select>    
      </div> 
    </div>
  
  <?php if(session::getInstance()->hasError('inputInsumo')): ?>
  <div class="alert alert-danger alert-dismissible" role="alert" id="error">
    <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputInsumo') ?>
    </div>
    <?php endif ?>
  
  
  <div class="form-group">
    <label for="<?php echo historialTableClass::getNameField(historialTableClass::PRODUCTO_INSUMO_ID, true) ?>" class="col-sm-2"><?php echo i18n::__('insumo') ?>: </label>
      <div class="col-sm-10"> 
       <select class="form-control " id="<?php historialTableClass::getNameField(historialTableClass::ID, true) ?>" name="<?php echo historialTableClass::getNameField(historialTableClass::PRODUCTO_INSUMO_ID, true); ?>">
         <option value="<?php echo (session::getInstance()->hasFlash('inputInsumo')  or request::getInstance()->hasPost(historialTableClass::getNameField(historialTableClass::PRODUCTO_INSUMO_ID, true))) ? request::getInstance()->getPost(historialTableClass::getNameField(historialTableClass::PRODUCTO_INSUMO_ID, true)) : ((isset($objHistorial[0])) ? '' : '') ?>"><?php echo i18n::__('selectInsumo')?></option>
       <?php foreach($objHistoriInsumo as $histoProducto):?>
         
       <option <?php echo (request::getInstance()->hasPost(historialTableClass::getNameField(historialTableClass::PRODUCTO_INSUMO_ID, true)) === true and request::getInstance()->getPost(historialTableClass::getNameField(historialTableClass::PRODUCTO_INSUMO_ID, true)) == $histoProducto->$productos) ? 'selected' : (isset($objHistorial[0]->$producto) === true and $objHistorial[0]->$producto == $histoProducto->$productos) ? 'selected' : '' ?> value="<?php echo $histoProducto->$productos ?>"><?php echo $histoProducto->$desProducto ?></option>  
 <?php endforeach;?>
   </select>    
      </div> 
    </div> 
   
   <?php if(session::getInstance()->hasError('inputPlaga')): ?>
  <div class="alert alert-danger alert-dismissible" role="alert" id="error">
    <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputPlaga') ?>
    </div>
    <?php endif ?>
  
  <div class="form-group">
      <label for="<?php echo historialTableClass::getNameField(historialTableClass::PLAGA_ID, true) ?>" class="col-sm-2"><?php echo i18n::__('plaga') ?>: </label>
      <div class="col-sm-10"> 
       <select class="form-control " id="<?php historialTableClass::getNameField(historialTableClass::ID, true) ?>" name="<?php echo historialTableClass::getNameField(historialTableClass::PLAGA_ID, true); ?>">
         <option value="<?php echo (session::getInstance()->hasFlash('inputPlaga')  or request::getInstance()->hasPost(historialTableClass::getNameField(historialTableClass::PLAGA_ID, true))) ? request::getInstance()->getPost(historialTableClass::getNameField(historialTableClass::PLAGA_ID, true)) : ((isset($objHistorial[0])) ? '' : '') ?>"><?php echo i18n::__('selectPlaga')?></option>
         <?php foreach($objHistorialPlaga as $key):?>
          <option <?php echo (request::getInstance()->hasPost(historialTableClass::getNameField(historialTableClass::PLAGA_ID, true)) === true and request::getInstance()->getPost(historialTableClass::getNameField(historialTableClass::PLAGA_ID, true)) == $key->$plagaId) ? 'selected' : (isset($objHistorial[0]->$plaga) === true and $objHistorial[0]->$plaga == $key->$plagaId) ? 'selected' : '' ?> value="<?php echo $key->$plagaId ?>"><?php echo $key->$desPlaga ?></option>  
       <?php endforeach;?>
   </select>    
      </div> 
    </div>
  
   <?php if(session::getInstance()->hasError('inputEnfermedad')): ?>
  <div class="alert alert-danger alert-dismissible" role="alert" id="error">
    <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputEnfermedad') ?>
    </div>
    <?php endif ?>
  
  <div class="form-group">
      <label for="<?php echo historialTableClass::getNameField(historialTableClass::ENFERMEDAD_ID, true) ?>" class="col-sm-2"><?php echo i18n::__('enfermedad') ?>: </label>
      <div class="col-sm-10"> 
       <select class="form-control " id="<?php historialTableClass::getNameField(historialTableClass::ID, true) ?>" name="<?php echo historialTableClass::getNameField(historialTableClass::ENFERMEDAD_ID, true); ?>">
         <option value="<?php echo (session::getInstance()->hasFlash('inputEnfermedad')  or request::getInstance()->hasPost(historialTableClass::getNameField(historialTableClass::ENFERMEDAD_ID, true))) ? request::getInstance()->getPost(historialTableClass::getNameField(historialTableClass::ENFERMEDAD_ID, true)) : ((isset($objHistorial[0])) ? '' : '') ?>"><?php echo i18n::__('selectEnfermedad')?></option>
         <?php foreach($objHistoriEnfermedad as $histoEnfer):?>
          <option <?php echo (request::getInstance()->hasPost(historialTableClass::getNameField(historialTableClass::ENFERMEDAD_ID, true)) === true and request::getInstance()->getPost(historialTableClass::getNameField(historialTableClass::ENFERMEDAD_ID, true)) == $histoEnfer->$enfermedads) ? 'selected' : (isset($objHistorial[0]->$enfermedad) === true and $objHistorial[0]->$enfermedad == $histoEnfer->$enfermedads) ? 'selected' : '' ?> value="<?php echo $histoEnfer->$enfermedads ?>"><?php echo $histoEnfer->$desEnfermedad ?></option>  
       <?php endforeach;?>
   </select>    
      </div> 
    </div> 
  
  
  <input class="btn btn-lg btn-success btn-xs" type="submit" value="<?php echo i18n::__(((isset($objHistorial)) ? 'update' : 'register')) ?>">
<a class="btn btn-lg btn-default btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('historial', 'index') ?>" ><?php echo i18n::__('atras') ?> </a>
<br><br><br><br><br><br><br><br><br><br><br><br>
</form>
  </article>
</div>
</div>
</div>