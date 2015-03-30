<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view?>
<?php $idProveedor = proveedorTableClass::ID ?>
<?php $apellido = proveedorTableClass::APELLIDO ?>
<?php $direccion = proveedorTableClass::DIRECCION ?>
<?php $telefono = proveedorTableClass::TELEFONO ?>
<?php $ciudadId = proveedorTableClass::ID_CIUDAD ?>
<?php $idCiudad = ciudadTableClass::ID?>
<?php $nomCiu = ciudadTableClass::NOMBRE_CIUDAD?>
<div class="container container-fluid" id="cuerpo">
  <article id="derecha">
  <form class="form-horizontal" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('maquina', ((isset($objProveedor)) ? 'updateProveedor' : 'createProveedor')) ?>">
<?php if (isset($objProveedor) == true): ?>
    <input  name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::ID, true) ?>" value="<?php echo $objProveedor[0]->$idProveedor ?>" type="hidden">
<?php endif ?>
  <?php view::includeHandlerMessage()?>
    <div class="form-group">
      <label for="<?php echo proveedorTableClass::getNameField(proveedorTableClass::NOMBREP, true) ?>" class="col-sm-2"> <?php echo i18n::__('nom') ?>:</label>     
      <div class="col-sm-10">
        <input class="form-control" value="<?php echo ((isset($objProveedor) == true) ? $objProveedor[0]->$nombre : '') ?>" type="text" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::NOMBREP, true) ?>" placeholder="Nombre" required>
      </div>
    </div>  

    <div class="form-group">
      <label for="<?php echo proveedorTableClass::getNameField(proveedorTableClass::APELLIDO, true) ?>" class="col-sm-2"> <?php echo i18n::__('apell') ?>:</label>     
      <div class="col-sm-10">            
        <input class="form-control" value="<?php echo ((isset($objProveedor) == true) ? $objProveedor[0]->$apellido : '') ?>" type="text" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::APELLIDO, true) ?>" placeholder="Apellido" required>
      </div>
    </div> 

    <div class="form-group">
      <label for="<?php echo proveedorTableClass::getNameField(proveedorTableClass::DIRECCION, true) ?>" class="col-sm-2"> <?php echo i18n::__('dir') ?>: </label>     
      <div class="col-sm-10">             
        <input class="form-control" value="<?php echo ((isset($objProveedor) == true) ? $objProveedor[0]->$direccion : '') ?>" type="text" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::DIRECCION, true) ?>" placeholder="Direccion" required>
      </div>
    </div>

    <div class="form-group">
      <label for="<?php echo proveedorTableClass::getNameField(proveedorTableClass::TELEFONO, true) ?>" class="col-sm-2"> <?php echo i18n::__('tel') ?>:  </label>     
      <div class="col-sm-10">              
        <input class="form-control" value="<?php echo ((isset($objProveedor) == true) ? $objProveedor[0]->$telefono : '') ?>" type="number" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::TELEFONO, true) ?>" placeholder="Telefono" required>
      </div>
    </div>  
      
      <div class="form-group">
         <label for="" class="col-sm-2"> <?php echo i18n::__('idCiudad') ?> </label>
         <div class="col-sm-10">
           <select class="form-control" id="<?php echo proveedorTableClass::getNameField(proveedorTableClass::ID_CIUDAD, true)?>" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::ID_CIUDAD, true) ?>">
            <option><?php echo i18n::__('selectCiudad') ?></option>
<?php foreach ($objCiudad as $ciudad): ?>
            <option value="<?php echo $ciudad->$idCiudad ?>"><?php echo $ciudad->$nomCiu ?></option>
<?php endforeach; ?>
          </select>
      </div>
    </div>

    <input class="btn btn-lg btn-success btn-xs" type="submit" value="<?php echo i18n::__(((isset($objProveedor)) ? 'update' : 'register')) ?>">
    <a class="btn btn-lg btn-default btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('maquina', 'indexProveedor') ?>" ><?php echo i18n::__('atras') ?> </a>

  </form> 
  </article>
</div>