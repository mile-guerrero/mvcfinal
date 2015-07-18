<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>

<?php $idUsuario = usuarioTableClass::ID ?>
<?php $password = usuarioTableClass::PASSWORD ?>
<div class="container container-fluid" id="cuerpo">
  
  
  <article id='derecha'>
<form   class="form-horizontal" role="form" class="form-horizontal" role="form"  method="post" action="<?php echo routing::getInstance()->getUrlWeb('crearUsuario', ((isset($objUsuarios)) ? 'update' : 'create')) ?>">
  <?php if(isset($objUsuarios)==true): ?>
  <input  name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID,true) ?>" value="<?php echo $objUsuarios[0]->$idUsuario ?>" type="hidden">
  <?php endif ?>
  
  
 
  <?php if(session::getInstance()->hasError('inputUsuario')): ?>
  <div class="alert alert-danger alert-dismissible" role="alert" id="error">
    <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputUsuario') ?>
    </div>
    <?php endif ?>
  
  
  <div class="form-group">
      <label for="<?php echo usuariotableClass::getNameField(usuarioTableClass::USUARIO, true) ?>" class="col-sm-2"> <?php echo i18n::__('user') ?>:</label>     
      <div class="col-sm-10">
        <input class="form-control"  value="<?php echo (session::getInstance()->hasFlash('inputUsuario') or request::getInstance()->hasPost(usuarioTableClass::getNameField(usuarioTableClass::USUARIO, true))) ? request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USUARIO, true)) : ((isset($objUsuarios[0])) ? $objUsuarios[0]->$usuario : '') ?>"  type="text" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USUARIO, true) ?>" placeholder="<?php echo i18n::__('user') ?>" required>
     </div>
  </div>  
  
  <?php if(session::getInstance()->hasError('inputPass1')): ?>
    <div class="alert alert-danger alert-dismissible" role="alert" id="error">
      <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputPass1') ?>
    </div>
    <?php endif ?>
  
  <div class="form-group">
      <label for="<?php echo usuariotableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_1' ?>" class="col-sm-2"> <?php echo i18n::__('pass') ?>:</label>     
      <div class="col-sm-10"> 
        <input class="form-control" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_1' ?>" value="<?php echo (session::getInstance()->hasFlash('inputPass1')or '') ? '' : ((isset($objUsuarios[0])) ? '' : '') ?>"  type="password" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true). '_1' ?>" placeholder="<?php echo i18n::__('pass') ?>" required>
      </div>
  </div>   
  
  
   <?php if(session::getInstance()->hasError('inputPass2')): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputPass2') ?>
    </div>
    <?php endif ?>
  
  <div class="form-group">
      <label for="<?php echo usuariotableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_2' ?>" class="col-sm-2"> <?php echo i18n::__('pass') ?>:</label>     
      <div class="col-sm-10"> 
        <input class="form-control" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_2' ?>" value="<?php echo (session::getInstance()->hasFlash('inputPass2') or '') ? '' : ((isset($objUsuarios[0])) ? '' : '') ?>" type="password" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true). '_2' ?>" placeholder="<?php echo i18n::__('pass') ?>" required>
      </div>
  </div> 
    
  <input class="btn btn-lg btn-success btn-xs" type="submit" value="<?php echo i18n::__(((isset($objUsuarios)) ? 'update' : 'register')) ?>">
   <a class="btn btn-lg btn-default btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'login') ?>" ><?php echo i18n::__('atras') ?></a>

  </form>
  </article>
  </div>




