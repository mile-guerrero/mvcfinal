<?php mvc\view\viewClass::includePartial('default/menuPrincipal2') ?>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $id = empresaTableClass::ID ?>
<?php $nombre = empresaTableClass::NOMBRE ?>
<?php $direccion = empresaTableClass::DIRECCION ?>
<?php $telefono = empresaTableClass::TELEFONO ?>
<?php $email = empresaTableClass::EMAIL ?>

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
      <a class="btn btn-success btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('empresa', 'index') ?>" > <?php echo i18n::__('atras') ?></a>
      <br><br>
      
     <div class="rwd">
      <table class="table table-bordered table-responsive rwd_auto">
        <tr>
        <thead>
        <th colspan="2"> <?php echo i18n::__('datos') ?></th>
        </thead>
        </tr>
        <tbody>
<?php foreach ($objEmpresa as $key): ?>
            <tr>
              <td><?php echo i18n::__('nom') ?></td>      
              <td><?php echo $key->$nombre ?></td>
            </tr>
            <tr>
          <td><?php echo i18n::__('dir') ?></td>      
          <td><?php echo $key->$direccion ?></td>
          </tr>
          <tr>
          <td><?php echo i18n::__('tel') ?></td>      
          <td><?php echo $key->$telefono ?></td>
          </tr>
          <tr>
            <td><?php echo i18n::__('email') ?></td>      
          <td><?php echo $key->$email ?></td>
          </tr>
          <tr>
          


        <?php endforeach; ?>


        </tbody>
      </table>
     </div>
    </article>
 
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
  
 </div> 