<?php mvc\view\viewClass::includePartial('default/menuPrincipal') ?>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $id = tipoUsoMaquinaTableClass::ID ?>
<?php $descrip = tipoUsoMaquinaTableClass::DESCRIPCION ?>
<div class="container container-fluid" id="cuerpo">
  <header id="">
    
    </header>
	<nav id="">
</nav>
    <section id="contenido">
      </section>
    <article id='derecha'>
      <a class="btn btn-danger btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('maquina', 'indexTipoUsoMaquina') ?>" > <?php echo i18n::__('atras') ?></a>

      <table class="table table-bordered table-responsive">
          <tr>
            <thead>
            <th colspan="2"><?php echo i18n::__('datos') ?></th>
    </thead>
    </tr>
	<tbody>
              <?php foreach ($objTUM as $key): ?>
                <tr>
                  <th>Descripcion</th>      
                 <th><?php echo $key->$descrip ?></th>
                   </tr>       
                <?php endforeach; ?>
           </tbody>
	    </table>

	  </article>
    
</div>
