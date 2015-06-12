<?php mvc\view\viewClass::includePartial('default/menuPrincipal') ?>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?> 
<div class="container container-fluid" id="cuerpo">
    <article id="derecha">
  <h2 class="form-signin-heading">
    <?php echo i18n::__('editDetalleFactura') ?> 
  </h2>
        </article>
   <?php view::includePartial('detalleFacturaVenta/formularioPrincipal', array('objDetalleFactura' => $objDetalleFactura, 'objFactura' => $objFactura, 'objCliente' => $objCliente)) ?>
</div>
  