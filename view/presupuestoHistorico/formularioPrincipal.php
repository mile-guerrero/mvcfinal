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

<?php $idPresupuestoHistorico = presupuestoHistoricoTableClass::ID ?>
<?php $totalProduccion = presupuestoHistoricoTableClass::TOTAL_PRODUCCION ?>
<?php $totalPago = presupuestoHistoricoTableClass::TOTAL_PAGO_TRABAJADOR ?>
<?php $presupuesto = presupuestoHistoricoTableClass::PRESUPUESTO ?>

<?php $lote = presupuestoHistoricoTableClass::LOTE_ID ?>
<?php $idLote = loteTableClass::ID ?>
<?php $nomLote = loteTableClass::UBICACION ?>


<?php $insumo = presupuestoHistoricoTableClass::PRODUCTO_INSUMO_ID ?>
<?php $idInsumo = tipoProductoInsumoTableClass::ID ?>
<?php $nomInsumo = tipoProductoInsumoTableClass::DESCRIPCION ?>

<?php $insumoInsumo = presupuestoHistoricoTableClass::PRODUCTO_INSUMO_ID  ?>
<?php $idInsumoInsumo = productoInsumoTableClass::ID ?>
<?php $nomInsumoInsumo = productoInsumoTableClass::DESCRIPCION ?>

<div class="container container-fluid" id="cuerpo">
  <div class="center-block" id="cuerpo5">
  <div class="center-block" id="cuerpo3">

    <!--<article id='derecha'>-->


    <!--<div class="row j1" >
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">&nbsp;</div>
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">&nbsp;</div>
    </div>-->

    <form class="form-horizontal julianlasso" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('presupuestoHistorico', ((isset($objpresupuestoHistorico)) ? 'update' : 'create')) ?>">
      <?php if (isset($objpresupuestoHistorico) == true): ?>
        <input  name="<?php echo presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::ID, true) ?>" value="<?php echo $objpresupuestoHistorico[0]->$idPresupuestoHistorico ?>" type="hidden">
      <?php endif ?>

      <!--        &nbsp;-->
      <br><br><br><br><br>
      
      <?php if (session::getInstance()->hasError('selectLote')): ?>
            <div class=" alert alert-danger alert-dismissible" role="alert" id="error">
              <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('selectLote') ?>
            </div>
          <?php endif ?>
      
      <div class="form-group">
          <label class="col-sm-2" for="<?php echo presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::LOTE_ID, true) ?>" >  <?php echo i18n::__('lote') ?>:   </label>
          <div class="col-sm-10"> 
            <select class="form-control"  name="<?php echo presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::LOTE_ID, true); ?>" required>
              <option value="<?php echo (session::getInstance()->hasFlash('selectLote') or request::getInstance()->hasPost(presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::LOTE_ID, true))) ? request::getInstance()->getPost(presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::LOTE_ID, true)) : ((isset($objpresupuestoHistorico[0])) ? '' : '') ?>"><?php echo i18n::__('selectLote') ?></option>
              <?php  foreach ($objLote as $key): ?>
         
              <option <?php echo (request::getInstance()->hasPost(presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::LOTE_ID, true)) === true and request::getInstance()->getPost(presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::LOTE_ID, true)) == $key->$idLote) ? 'selected' : (isset($objpresupuestoHistorico[0]->$lote) === true and $objpresupuestoHistorico[0]->$lote == $key->$idLote) ? 'selected' : ''  ?> value="<?php echo $key->$idLote  ?>"><?php echo $key->$nomLote  ?></option>
                <?php  endforeach; ?>
            </select>
          </div>
        </div>
        <br>
        
            

      <div class="form-group">
          <label class="col-sm-2"  for="<?php echo presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::PRODUCTO_INSUMO_ID, true) ?>">  <?php echo i18n::__('tipo insumo') ?>:   </label>
          <div class="col-sm-10"> 
            <select class="form-control" id="slcTipoDeInsumo" required onchange="cargarInsumo('<?php echo routing::getInstance()->getUrlWeb('@getInsumo') ?>')">
              <option value="">Seleccione el tipo de insumo</option>
              <?php foreach ($objTipo as $key): ?>
              <option <?php echo (isset($idTipoProducto) and $idTipoProducto == $key->$idInsumo ) ? 'selected' : '' ?> value="<?php echo $key->$idInsumo ?>"><?php echo $key->$nomInsumo ?></option>
              <?php endforeach; ?>
             
            </select>
          </div>
        </div>
        
        <?php if (session::getInstance()->hasError('selectProducto')): ?>
            <div class=" alert alert-danger alert-dismissible" role="alert" id="error">
              <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('selectProducto') ?>
            </div>
          <?php endif ?>
        
        <div class="row j1" >
         <label class="col-sm-2" for="<?php echo presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::PRODUCTO_INSUMO_ID, true) ?>" >  <?php echo i18n::__('insumo') ?>:   </label>
         <div class="col-lg-10">
         <select class="form-control" id="slcInsumo" name="<?php echo presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::PRODUCTO_INSUMO_ID, true); ?>" required>
              <option value="<?php echo (session::getInstance()->hasFlash('selectProducto') or request::getInstance()->hasPost(presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::PRODUCTO_INSUMO_ID, true))) ? request::getInstance()->getPost(presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::PRODUCTO_INSUMO_ID, true)) : ((isset($objpresupuestoHistorico[0])) ? '' : '') ?>"><?php echo i18n::__('selectInsumo') ?></option>
              <?php  foreach ($objProducto as $key): ?>
         
              <option <?php echo (request::getInstance()->hasPost(presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::PRODUCTO_INSUMO_ID, true)) === true and request::getInstance()->getPost(presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::PRODUCTO_INSUMO_ID, true)) == $key->$idInsumoInsumo) ? 'selected' : (isset($objpresupuestoHistorico[0]->$insumoInsumo) === true and $objpresupuestoHistorico[0]->$insumoInsumo == $key->$idInsumoInsumo) ? 'selected' : ''  ?> value="<?php echo $key->$idInsumoInsumo  ?>"><?php echo $key->$nomInsumoInsumo  ?></option>
                <?php  endforeach; ?>
            </select>
        </div>        
      </div>
        
       
        <br>
        
         <?php if (session::getInstance()->hasError('inputPresupuesto')): ?>
            <div class=" alert alert-danger alert-dismissible" role="alert" id="error">
              <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputPresupuesto') ?>
            </div>
          <?php endif ?>
        

        <div class="form-group">
      <label for="<?php echo presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::PRESUPUESTO, true) ?>" class="col-sm-2"> <?php echo i18n::__('presupuesto') ?>: </label>     
      <div class="col-sm-10">   
        <input  class="form-control" value="<?php echo (session::getInstance()->hasFlash('inputPresupuesto') or request::getInstance()->hasPost(presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::PRESUPUESTO, true))) ? request::getInstance()->getPost(presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::PRESUPUESTO, true)) : ((isset($objpresupuestoHistorico[0])) ? $objpresupuestoHistorico[0]->$presupuesto : '') ?>" type="text" name="<?php echo presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::PRESUPUESTO, true) ?>" placeholder="<?php echo i18n::__('presupuesto') ?>" >
      </div>
 </div>
        
         <?php if (session::getInstance()->hasError('inputTotalProduccion')): ?>
            <div class=" alert alert-danger alert-dismissible" role="alert" id="error">
              <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputTotalProduccion') ?>
            </div>
          <?php endif ?>
        
        <div class="form-group">
      <label for="<?php echo presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::TOTAL_PRODUCCION, true) ?>" class="col-sm-2"> <?php echo i18n::__('totalProduccion') ?>: </label>     
      <div class="col-sm-10">   
        <input  class="form-control" value="<?php echo (session::getInstance()->hasFlash('inputTotalProduccion') or request::getInstance()->hasPost(presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::TOTAL_PRODUCCION, true))) ? request::getInstance()->getPost(presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::TOTAL_PRODUCCION, true)) : ((isset($objpresupuestoHistorico[0])) ? $objpresupuestoHistorico[0]->$totalProduccion : '') ?>" type="text" name="<?php echo presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::TOTAL_PRODUCCION, true) ?>" placeholder="<?php echo i18n::__('totalProduccion') ?>" >
      </div>
 </div>
        
        <?php if (session::getInstance()->hasError('inputTotalPago')): ?>
            <div class=" alert alert-danger alert-dismissible" role="alert" id="error">
              <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputTotalPago') ?>
            </div>
          <?php endif ?>
        
        <div class="form-group">
      <label for="<?php echo presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::TOTAL_PAGO_TRABAJADOR, true) ?>" class="col-sm-2"> <?php echo i18n::__('totalPago') ?>: </label>     
      <div class="col-sm-10">   
        <input  class="form-control" value="<?php echo (session::getInstance()->hasFlash('inputTotalPago') or request::getInstance()->hasPost(presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::TOTAL_PAGO_TRABAJADOR, true))) ? request::getInstance()->getPost(presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::TOTAL_PAGO_TRABAJADOR, true)) : ((isset($objpresupuestoHistorico[0])) ? $objpresupuestoHistorico[0]->$totalPago : '') ?>" type="text" name="<?php echo presupuestoHistoricoTableClass::getNameField(presupuestoHistoricoTableClass::TOTAL_PAGO_TRABAJADOR, true) ?>" placeholder="<?php echo i18n::__('totalPago') ?>" >
      </div>
 </div>
        

      <input class="btn btn-lg btn-success btn-xs" type="submit" value="<?php echo i18n::__(((isset($objpresupuestoHistorico)) ? 'update' : 'register')) ?>">
      <a class="btn btn-lg btn-default btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('presupuestoHistorico', 'index') ?>" ><?php echo i18n::__('atras') ?> </a>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
    </form> 
    <!--  </article>-->
  </div>
  </div>
</div>
 