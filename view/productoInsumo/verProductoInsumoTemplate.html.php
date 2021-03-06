<?php mvc\view\viewClass::includePartial('default/menuPrincipal2') ?>
  <?php  use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $tipo = ProductoInsumoTableClass::TIPO_PRODUCTO_INSUMO_ID ?>
<?php// $unidad = productoInsumoTableClass::UNIDAD_MEDIDA_ID ?>
<?php $des = productoInsumoTableClass::DESCRIPCION ?>
<?php $id = productoInsumoTableClass::ID ?>
<?php// $cantidad = productoInsumoTableClass::CANTIDAD ?>
<?php $updated = productoInsumoTableClass::UPDATED_AT ?>
<?php $created = productoInsumoTableClass::CREATED_AT ?>
<?php $hash = productoInsumoTableClass::HASH_IMAGEN ?>
<?php $extencion = productoInsumoTableClass::EXTENCION_IMAGEN ?>
<?php $informacion = productoInsumoTableClass::INFORMACION ?>

<div class="container container-fluid" id="cuerpo">
  <div class="center-block" id="cuerpo6">
  <div class="center-block" id="cuerpo2">
  <header id="">
   
    </header>
	<nav id="">
</nav>
    <section id="contenido">
      
    </section>
    <article id='derecha'>
      <br><br>
       <a class="btn btn-success btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('productoInsumo', 'indexProductoInsumo') ?>" > <?php echo i18n::__('atras') ?></a>
       <br>
       <br>
       
     <div class="rwd">
      <table class="table table-bordered table-responsive">
          <tr>
            <thead>
            <th colspan="2"> <?php echo i18n::__('datos') ?></th>
    </thead>
    </tr>
	<tbody>
     
              <?php foreach ($objPI as $key): ?>
                <tr>    
                  <td><?php echo $key->$des ?></td>
                 <td>
                   <?php
              if($key->$extencion == 'jpg'){//para poner icono 
           echo '<a target="_blank" href="'.mvc\config\configClass::getUrlBase() . 'imgInsumo/' . $key->$hash.'"><img id="margenImagen" src="' . routing::getInstance()->getUrlImg('../imgInsumo/' . $key->$hash) . '"/></a>';          
              }
                   ?></td>
                  </tr>                   
                       <tr>
                       <td><?php echo i18n::__('tipoProducto') ?></td> 
                       <td><?php echo tipoProductoInsumoTableClass::getNameTipoProductoInsumo($key->$tipo) ?></td>
                        </tr> 
                        <tr>
                       <td><?php echo i18n::__('informacion') ?></td> 
                       <td><?php echo $key->$informacion ?></td>
                        </tr> 
                  <?php endforeach; ?>
                 
           </tbody>
	    </table>
</div>
	  </article>
    
</div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
  
 </div>