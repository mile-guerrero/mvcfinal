<?php mvc\view\viewClass::includePartial('default/menuPrincipal') ?>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $id = loteTableClass::ID ?>
<?php $ubicacion = loteTableClass::UBICACION ?>
<?php $descripcion = loteTableClass::DESCRIPCION ?>
<?php $tamano = loteTableClass::TAMANO ?>
<?php $created_at = loteTableClass::CREATED_AT ?>
<?php $updated_at = loteTableClass::UPDATED_AT ?>
<?php $nombre_ciudad = loteTableClass::ID_CIUDAD ?>
<div class="container container-fluid" id="cuerpo">
  <header id="">

   
  </header>
  <nav id="">
  </nav>
  <section id="contenido">
    
      </section>
    <article id='derecha'>
       <a class="btn btn-danger btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('lote', 'indexLote') ?>" > <?php echo i18n::__('atras') ?></a>

      <table class="table table-bordered table-responsive">
        <tr>
        <thead>
        <th colspan="2"><?php echo i18n::__('datos') ?></th>
        </thead>
        </tr>
        <tbody>
<?php foreach ($objLote as $key): ?>
            <tr>
              <th>Ubicacion</th>      
              <th><?php echo $key->$ubicacion ?></th>
            </tr>
            <tr>
              <th>Tamaño</th>      
              <th><?php echo $key->$tamano ?></th>
            </tr>
            <tr>
              <th>Descripcion</th>      
              <th><?php echo $key->$descripcion ?></th>
            </tr>
            
            <tr>
              <th>fecha creacion</th>                   
              <th><?php echo $key->$created_at ?></th>
            </tr>
            <tr>
              <th>fecha modificacion</th> 
              <th><?php echo $key->$updated_at ?></th>
            </tr>

<?php endforeach; ?>
            
       <?php foreach ($objLote as $ciudad): ?>     
            <tr>
              <th>Codigo Ciudad</th>      
              <th><?php echo ciudadTableClass::getNameCiudad($ciudad->$nombre_ciudad) ?></th>
            </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    </article>

</div>
