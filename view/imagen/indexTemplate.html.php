<?php mvc\view\viewClass::includePartial('default/menuPrincipal') ?>
<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>


<div class="container container-fluid" id="cuerpo">
  <header id="">

  </header>
  <nav id=""> 

  </nav>
  <section id=""></section>
  <article id='derecha'>

    <h3></h3>       
  </article>
 
<div class="container container-fluid" id="cuerpo">
  <article id='derecha'>
    <form enctype="multipart/form-data"  class="form-horizontal"  class="form-horizontal" role="form"  method="post" action="<?php echo routing::getInstance()->getUrlWeb('imagen', ((isset($objUsuarios)) ? 'update' : 'index')) ?>">
  
 
  
  
  <div class="form-group">
      <label for="" class="col-sm-2"> <?php echo i18n::__('subir archivos') ?>:</label>     
      <div class="col-sm-10">
        <input class="form-control"  value=""  type="file" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USUARIO, true) ?>" required>
     </div>
  </div>  
  
 
  
    
  <input class="btn btn-lg btn-success btn-xs" type="submit" value="<?php echo i18n::__(((isset($objUsuarios)) ? 'update' : 'register')) ?>">
   <a class="btn btn-lg btn-default btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('imagen', 'index') ?>" ><?php echo i18n::__('atras') ?></a>

   
   
  </form>
  </article>
  
  </div>
 <img src="<?php echo routing::getInstance()->getUrlImg('../uploadImagen/' . $nameFile); ?>" />
<!--<?php echo '<img src="' . routing::getInstance()->getUrlImg('../uploadImagen/' . $nameFile) . '"/>' ?>-->
  </div>