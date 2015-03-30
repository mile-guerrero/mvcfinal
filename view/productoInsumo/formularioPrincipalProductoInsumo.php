<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view?>
<?php $tipo = productoInsumoTableClass::TIPO_PRODUCTO_INSUMO_ID ?>
<?php $tipos = tipoProductoInsumoTableClass::ID ?>
<?php $des_tipos = tipoProductoInsumoTableClass::DESCRIPCION ?>
<?php $unidad = productoInsumoTableClass::UNIDAD_MEDIDA_ID ?>
<?php $unidades = unidadMedidaTableClass::ID ?>
<?php $des_unidades = unidadMedidaTableClass::DESCRIPCION ?>
<?php $iva = productoInsumoTableClass::IVA ?>
<?php $idPI = productoInsumoTableClass::ID ?>
<?php $descripcion = productoInsumoTableClass::DESCRIPCION ?>
<div class="container container-fluid" id="cuerpo">
   <article id='derecha'>
<form  class="form-horizontal" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('productoInsumo', ((isset($objPI)) ? 'updateProductoInsumo' : 'createProductoInsumo')) ?>">
  <?php if(isset($objPI)==true): ?>
  <input  name="<?php echo productoInsumoTableClass::getNameField(productoInsumoTableClass::ID,true) ?>" value="<?php echo $objPI[0]->$idPI ?>" type="hidden">
  <?php endif ?>
    <?php view::includeHandlerMessage()?>
   <div class="form-group">
      <label for="<?php echo productoInsumoTableClass::getNameField(productoInsumoTableClass::DESCRIPCION, true) ?>" class="col-sm-2">   <?php echo i18n::__('des') ?>: </label>     
      <div class="col-sm-10">
        <input class="form-control" value="<?php echo ((isset($objPI)== true) ? $objPI[0]->$descripcion : '') ?>" type="text" name="<?php echo productoInsumoTableClass::getNameField(productoInsumoTableClass::DESCRIPCION, true) ?>" placeholder="Descripcion del Producto" required>
  </div>
</div>
  
   <div class="form-group">
      <label for="<?php echo productoInsumoTableClass::getNameField(productoInsumoTableClass::IVA, true) ?>" class="col-sm-2">    <?php echo i18n::__('iva') ?>: </label>     
      <div class="col-sm-10">
        <input class="form-control" value="<?php echo ((isset($objPI)== true) ? $objPI[0]->$iva : '') ?>" type="text" name="<?php echo productoInsumoTableClass::getNameField(productoInsumoTableClass::IVA, true) ?>" placeholder="Iva" required>
   </div>
</div>
  
 <div class="form-group">
      <label for="<?php echo productoInsumoTableClass::getNameField(productoInsumoTableClass::UNIDAD_MEDIDA_ID, true) ?>" class="col-sm-2">   <?php echo i18n::__('unidad') ?>:  </label>
      <div class="col-sm-10"> 
        <select class="form-control" id="<?php productoInsumoTableClass::getNameField(productoInsumoTableClass::UNIDAD_MEDIDA_ID, TRUE)?>" name="<?php echo productoInsumoTableClass::getNameField(productoInsumoTableClass::UNIDAD_MEDIDA_ID, TRUE);?>">
       <option><?php echo i18n::__('selectUnidad') ?></option>
       <?php foreach($objPIUM as $UM):?>
       <option value="<?php echo $UM->$unidades?>"><?php echo $UM->$des_unidades?></option>
       <?php endforeach;?>
   </select>   
      </div> 
    </div> 
  
 <div class="form-group">
      <label for="<?php echo productoInsumoTableClass::getNameField(productoInsumoTableClass::TIPO_PRODUCTO_INSUMO_ID, true) ?>" class="col-sm-2">   <?php echo i18n::__('tipo') ?>:  </label>
      <div class="col-sm-10"> 
        <select class="form-control" id="<?php productoInsumoTableClass::getNameField(productoInsumoTableClass::TIPO_PRODUCTO_INSUMO_ID, TRUE)?>" name="<?php echo productoInsumoTableClass::getNameField(productoInsumoTableClass::TIPO_PRODUCTO_INSUMO_ID, TRUE);?>">
       <option><?php echo i18n::__('selectTipoUso') ?></option>
       <?php foreach($objPITPI as $TP):?>
       <option value="<?php echo $TP->$tipos?>"><?php echo $TP->$des_tipos?></option>
       <?php endforeach;?>
   </select>    
      </div> 
    </div>
 
  <input class="btn btn-lg btn-primary btn-xs" type="submit" value="<?php echo i18n::__(((isset($objPI)) ? 'update' : 'register')) ?>">
<a class="btn btn-lg btn-danger btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('productoInsumo', 'indexProductoInsumo') ?>" ><?php echo i18n::__('atras') ?> </a>

</form>
   </article>
</div>