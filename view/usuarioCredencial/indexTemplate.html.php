<?php mvc\view\viewClass::includePartial('default/menuPrincipal') ?>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $id = usuarioCredencialTableClass::ID ?>
<?php $cred = usuarioCredencialTableClass::CREDENCIAL_ID ?>
<?php $usuid = usuarioTableClass::ID ?>
<?php $usuariosid = usuarioTableClass::USUARIO ?>
<?php $usuario = usuarioCredencialTableClass::USUARIO_ID ?>
<?php $credeid = credencialTableClass::ID ?>
<?php $nomcredeid = credencialTableClass::NOMBRE ?>


<div class="container container-fluid" id="cuerpo">
  <header id="">
   
  </header>
  <nav id="">
    
  </nav>
  <section id="">
    </section>
    <article id='derecha'>
      <h1><?php echo i18n::__('usu cre') ?></h1> 
      
    <ul>
      <a class="btn btn-success btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('usuarioCredencial', 'insert') ?>"><?php echo i18n::__('nuevo') ?></a> 
      <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalFiltres"><?php echo i18n::__('filtros') ?></button>  
      <a href="<?php echo routing::getInstance()->getUrlWeb('usuarioCredencial', 'index') ?>" class="btn btn-default btn-xs" ><?php echo i18n::__('eFiltros') ?></a> 
      <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModalReport" ><?php echo i18n::__('informe') ?></button>           
    </ul> 
<!---Informes--->
       <div class="modal fade" id="myModalReport" tabindex="-1" role="modal" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('informe') ?></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="reportForm" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('usuarioCredencial', 'report')?>">
          
          <div class="form-group">
    <label for="reportUsuario" class="col-sm-2 control-label"><?php echo i18n::__('idCiudad') ?></label>
    <div class="col-sm-10">
      <select class="form-control" id="reportUsuario" name="report[usuario]">
            <option><?php echo i18n::__('selectCiudad') ?></option>
<?php foreach ($objUCU as $u): ?>
            <option value="<?php echo $u->$usuid ?>"><?php echo $u->$usuariosid ?></option>
<?php endforeach; ?>
          </select>
    </div>
  </div>
           <div class="form-group">
    <label for="reportCredencial" class="col-sm-2 control-label"><?php echo i18n::__('idCiudad') ?></label>
    <div class="col-sm-10">
      <select class="form-control" id="reportCredencial" name="report[credencial]">
            <option><?php echo i18n::__('selectCiudad') ?></option>
<?php foreach ($objUCC as $c): ?>
            <option value="<?php echo $c->$credeid ?>"><?php echo $c->$nomcredeid ?></option>
<?php endforeach; ?>
          </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label"><?php echo i18n::__('fecha crear') ?></label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="reportFecha1" name="report[fecha1]">
      <br>
       <input type="date" class="form-control" id="reportFecha2" name="report[fecha2]">
    </div>
  </div>
</form>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn btn-xs" data-dismiss="modal">  <?php echo i18n::__('cerrar') ?></button>
        <button type="button" onclick="$('#reportForm').submit()" class="btn btn-warning btn btn-xs"><?php echo i18n::__('informe') ?></button>
      </div>
    </div>
  </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="myModalFiltres" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('filtros') ?></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" id="filterForm" role="form" action="<?php echo routing::getInstance()->getUrlWeb('usuarioCredencial', 'index') ?>" method="POST">
              
              
              <div class="form-group">
                <label for="filterUsuario" class="col-sm-2 control-label"><?php echo i18n::__('user') ?></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="filterUsuario" name="filter[usuario]" placeholder="usuario">
                </div>
              </div>
              
              <div class="form-group">
                <label for="filterCredencial" class="col-sm-2 control-label"><?php echo i18n::__('credencial') ?></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="filterCredencial" name="filter[credencial]" placeholder="descripcion">
                </div>
              </div>
          

              <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo i18n::__('fecha crear') ?></label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="filterFechaIni" name="filter[fechaIni]" >
                </div>
              </div>

              <div class="form-group">
                <label  class="col-sm-2 control-label"><?php echo i18n::__('fecha fin') ?></label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="filterFechaFin" name="filter[fechaFin]" >
                </div>
              </div>

            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><?php echo i18n::__('cerrar') ?></button>
            <button type="button" onclick="$('#filterForm').submit()" class="btn btn-primary btn-xs"><?php echo i18n::__('filtrar') ?></button>
          </div>
        </div>
      </div>
    </div>            
                
      <table class="table table-bordered table-responsive">

        <thead>
          <tr>
            <th>
              <?php echo i18n::__('user') ?>
            </th>
            <th>
              <?php echo i18n::__('credencial') ?>
            </th>
            <th>
              <?php echo i18n::__('acciones') ?>
            </th>

          </tr>
        </thead>
        <tbody>

          <?php foreach ($objUC as $key): ?>
            <tr>

              <td>
                <?php echo usuarioTableClass::getNameUsuario($key->$usuario) ?>
              
              </td>
              <td>
                <?php echo credencialTableClass::getNameCredencial($key->$cred) ?>
              </td>
              <th>
                <a class="btn btn-warning btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('usuarioCredencial', 'ver', array(usuarioCredencialTableClass::ID => $key->$id)) ?>" ><?php echo i18n::__('ver') ?></a> - 
                <a class="btn btn-primary btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('usuarioCredencial', 'edit', array(usuarioCredencialTableClass::ID => $key->$id)) ?>"><?php echo i18n::__('modificar') ?> </a>
              </th>                                        
            <?php endforeach; ?>
        </tbody>
      </table>
      <div class="text-right">
        <?php echo i18n::__('paginas') ?> <select id="slqPaginador" onchange="paginador(this, '<?php echo routing::getInstance()->getUrlWeb('usuarioCredencial', 'index')?>')">
         <?php for($x = 1; $x <= $cntPages; $x++):?>
           <option <?php echo (isset($page) and $page == $x) ? 'selected': '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
          <?php endfor;?>
        </select> <?php echo i18n::__('de') ?> <?php echo $cntPages ?>
      </div>
    </article>
  
</div>

