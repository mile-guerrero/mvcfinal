<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>
<?php $idEnfermedad = enfermedadTableClass::ID ?>
<?php $nombre = enfermedadTableClass::NOMBRE ?>
<?php $descripcion = enfermedadTableClass::DESCRIPCION ?>
<?php $tratamiento = enfermedadTableClass::TRATAMIENTO ?>

<div class="container container-fluid" id="cuerpo">
  <div class="center-block" id="cuerpo5">
  <div class="center-block" id="cuerpo3">
    
    <form class="form-horizontal" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('enfermedad', ((isset($objEnfermedad)) ? 'update' : 'create')) ?>">
<?php if (isset($objEnfermedad) == true): ?>
        <input  name="<?php echo enfermedadTableClass::getNameField(enfermedadTableClass::ID, true) ?>" value="<?php echo $objEnfermedad[0]->$idEnfermedad ?>" type="hidden">
<?php endif ?>
<br><br><br><br>
 
  <br>
     <?php if(session::getInstance()->hasError('inputNombre')): ?>
   <div class="alert alert-danger alert-dismissible" role="alert" id="error">
    <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputNombre') ?>
    </div>
    <?php endif ?>
        

        
      <div class="form-group">
      <label for="<?php echo enfermedadTableClass::getNameField(enfermedadTableClass::NOMBRE, true) ?>" class="col-sm-2"> <?php echo i18n::__('nom') ?>:</label>     
        <div class="col-sm-10">
          <input  class="form-control" value="<?php echo (session::getInstance()->hasFlash('inputNombre') or request::getInstance()->hasPost(enfermedadTableClass::getNameField(enfermedadTableClass::NOMBRE, true))) ? request::getInstance()->getPost(enfermedadTableClass::getNameField(enfermedadTableClass::NOMBRE, true)) : ((isset($objEnfermedad[0])) ? $objEnfermedad[0]->$nombre : '') ?>" type="text" name="<?php echo enfermedadTableClass::getNameField(enfermedadTableClass::NOMBRE, true) ?>" placeholder="<?php echo i18n::__('nom') ?>"required>
        </div>
      </div>  

        
    <?php if(session::getInstance()->hasError('inputDescripcion')): ?>
    <div class="alert alert-danger alert-dismissible" role="alert" id="error">
    <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputDescripcion') ?>
    </div>
    <?php endif ?>   
        
      <div class="form-group">
        <label for="<?php echo enfermedadTableClass::getNameField(enfermedadTableClass::DESCRIPCION, true) ?>" class="col-sm-2"> <?php echo i18n::__('des') ?>:</label>     
        <div class="col-sm-10">            
          <input class="form-control" value="<?php echo (session::getInstance()->hasFlash('inputDescripcion') or request::getInstance()->hasPost(enfermedadTableClass::getNameField(enfermedadTableClass::DESCRIPCION, true))) ? request::getInstance()->getPost(enfermedadTableClass::getNameField(enfermedadTableClass::DESCRIPCION, true)) : ((isset($objEnfermedad[0])) ? $objEnfermedad[0]->$descripcion : '') ?>" type="text" name="<?php echo enfermedadTableClass::getNameField(enfermedadTableClass::DESCRIPCION, true) ?>" placeholder="<?php echo i18n::__('des') ?>"required>
        </div>
      </div> 
        
      
        
     <?php if(session::getInstance()->hasError('inputTratamiento')): ?>
    <div class="alert alert-danger alert-dismissible" role="alert" id="error">
    <button type="button" class="close" data-dismiss="alert" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputTratamiento') ?>
    </div>
    <?php endif ?> 
     
        
    
    <div class="form-group">
        <label for="<?php echo enfermedadTableClass::getNameField(enfermedadTableClass::TRATAMIENTO, true) ?>" class="col-sm-2"> <?php echo i18n::__('tratamiento') ?>:</label>     
        <div class="col-sm-10">            
          <input class="form-control" value="<?php echo (session::getInstance()->hasFlash('inputTratamiento') or request::getInstance()->hasPost(enfermedadTableClass::getNameField(enfermedadTableClass::TRATAMIENTO, true))) ? request::getInstance()->getPost(enfermedadTableClass::getNameField(enfermedadTableClass::TRATAMIENTO, true)) : ((isset($objEnfermedad[0])) ? $objEnfermedad[0]->$tratamiento : '') ?>" type="text" name="<?php echo enfermedadTableClass::getNameField(enfermedadTableClass::TRATAMIENTO, true) ?>" placeholder="<?php echo i18n::__('tratamiento') ?>"required>
        </div>
      </div> 



      <input class="btn btn-lg btn-success btn-xs" type="submit" value="<?php echo i18n::__(((isset($objEnfermedad)) ? 'update' : 'register')) ?>">
      <a class="btn btn-lg btn-default btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('enfermedad', 'index') ?>" ><?php echo i18n::__('atras') ?> </a>

      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </form>
  </div>
</div>
</div>