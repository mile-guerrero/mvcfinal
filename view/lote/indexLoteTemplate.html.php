<?php mvc\view\viewClass::includePartial('default/menuPrincipal') ?>
<?php  use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view?>

<?php $ubi = loteTableClass::UBICACION ?>
<?php $id = loteTableClass::ID ?>
<?php $idCiudaddes = ciudadTableClass::ID ?>
<?php $descripcionciudad = ciudadTableClass::NOMBRE_CIUDAD ?>
<div class="container container-fluid" id="cuerpo">
  <header id="">
   
    </header>
	<nav id="">
      
</nav>
    <section id="">
      
    </section>
    <article id='derecha'>
     <h1><?php echo i18n::__('lote') ?></h1> 
      <ul>
      
    <a class="btn btn-success btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('lote', 'insertLote') ?>"><?php echo i18n::__('nuevo') ?></a> 
    <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMasivo"><?php echo i18n::__('eliminar en masa') ?></a> 
    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalFiltres"><?php echo i18n::__('filtros') ?></button>  
    <a href="<?php echo routing::getInstance()->getUrlWeb('lote', 'indexLote') ?>" class="btn btn-default btn-xs" ><?php echo i18n::__('eFiltros') ?></a> <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModalReport" ><?php echo i18n::__('informe') ?></button>           
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
        <form class="form-horizontal" id="reportForm" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('cliente', 'reportCliente')?>">
          <div class="form-group">
    <label for="reportNombre" class="col-sm-2 control-label"><?php echo i18n::__('name') ?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="reportNombre" name="report[nombre]" placeholder="Nombre">
    </div>
  </div>
           <div class="form-group">
    <label for="reportCiudad" class="col-sm-2 control-label"><?php echo i18n::__('idCiudad') ?></label>
    <div class="col-sm-10">
      <select class="form-control" id="reportCiudad" name="report[ciudad]">
            <option><?php echo i18n::__('selectCiudad') ?></option>
<?php foreach ($objCC as $ciudad): ?>
            <option value="<?php echo $ciudad->$idCiudaddes ?>"><?php echo $ciudad->$descripcionciudad ?></option>
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
            <form class="form-horizontal" id="filterForm" role="form" action="<?php echo routing::getInstance()->getUrlWeb('lote', 'indexLote') ?>" method="POST">
              <div class="form-group">
                <label for="filterUbicacion" class="col-sm-2 control-label"><?php echo i18n::__('ubicacion') ?></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="filterUbicacion" name="filter[ubicacion]" placeholder="ubicacion">
                </div>
              </div>
              
              <div class="form-group">
                <label for="filterTamano" class="col-sm-2 control-label"><?php echo i18n::__('tamano') ?></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="filterTamano" name="filter[tamano]" placeholder="Tamano">
                </div>
              </div>
              
              <div class="form-group">
                <label for="filterDescripcion" class="col-sm-2 control-label"><?php echo i18n::__('des') ?></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="filterDescripcion" name="filter[descripcion]" placeholder="descripcion">
                </div>
              </div>
          <div class="form-group">
                <label for="filterCiudad" class="col-sm-2 control-label"><?php echo i18n::__('idCiudad') ?></label>
                <div class="col-sm-10">
    
   <select class="form-control" id="filterCiudad" name="filter[ciudad]">
     <option value=""><?php echo i18n::__('selectCiudad') ?></option>
       <?php foreach($objCC as $ci):?>
       <option value="<?php echo $ci->$idCiudaddes?>"><?php echo $ci->$descripcionciudad?></option>
       <?php endforeach;?>
   </select>
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
    
    <form class="form-signin" id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('lote', 'deleteSelectLote') ?>" method="POST">        
        <?php view::includeHandlerMessage()?>
        <table class="table table-bordered table-responsive">
          <tr>
            <thead>
              <th>
                <input type="checkbox" id="chkAll">
              </th>
              <th>
                 <?php echo i18n::__('ubicacion') ?>
              </th>             
              <th>
		        <?php echo i18n::__('acciones') ?>
		      </th>
    </tr>
    </thead>
	<tbody>
              <?php foreach ($objLote as $key): ?>
                <tr>
                                                          
                 <th>
                  <input type="checkbox" name="chk[]" value="<?php echo $key->$id ?>">
                 </th>
                 <td>
                    <?php echo $key->$ubi ?>
                 </td>     
                      <th>
                      <a class="btn btn-warning btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('lote', 'verLote', array(loteTableClass::ID => $key->$id)) ?>" > <?php echo i18n::__('ver') ?></a> - 
                      <a class="btn btn-primary btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('lote', 'editLote', array(loteTableClass::ID => $key->$id)) ?>"> <?php echo i18n::__('modificar') ?> </a> -
                      <a data-toggle="modal" data-target="#myModalDelete<?php echo $key->$id ?>"  class="btn btn-danger btn-xs"> <?php echo i18n::__('eliminar') ?></a>
                      </th>                                                       
                 </tr>
  <div class="modal fade" id="myModalDelete<?php echo $key->$id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmar eliminar') ?></h4>
      </div>
      <div class="modal-body">
        <?php echo i18n::__('Desea  eliminar este campo') ?> <?php echo $key->$ubi ?><?php echo i18n::__('?') ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-xs" data-dismiss="modal"><?php echo i18n::__('cerrar') ?></button>
        <button type="button" class="btn btn-danger btn-xs" onclick="eliminar(<?php echo $key->$id ?>,'<?php echo loteTableClass::getNameField(loteTableClass::ID, true) ?>','<?php echo routing::getInstance()->getUrlWeb('lote', 'deleteLote') ?>')"><?php echo i18n::__('eliminar') ?></button>
      </div>
    </div>
  </div>
</div>                                         
                <?php endforeach; ?>
           </tbody>
	    </table>
     </form> 
      
      <div class="text-right">
        <?php echo i18n::__('paginas') ?> <select id="slqPaginador" onchange="paginador(this, '<?php echo routing::getInstance()->getUrlWeb('lote', 'indexLote')?>')">
         <?php for($x = 1; $x <= $cntPages; $x++):?>
           <option <?php echo (isset($page) and $page == $x) ? 'selected': '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
          <?php endfor;?>
        </select> <?php echo i18n::__('de') ?> <?php echo $cntPages ?>
      </div>
      <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('lote', 'deleteLote') ?>" method="POST">
       <input type="hidden" id="idDelete" name="<?php echo loteTableClass::getNameField(loteTableClass::ID, true) ?>">
    </form>

	  </article>
    
</div>
<div class="modal fade" id="myModalDeleteMasivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('eliminar en masa') ?></h4>
      </div>
      <div class="modal-body">
        <?php echo i18n::__('eliminar en masa') ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><?php echo i18n::__('cerrar') ?></button>
        <button type="button" class="btn btn-danger btn-xs" onclick="$('#frmDeleteAll').submit()"><?php echo i18n::__('eliminar') ?></button>
      </div>
    </div>
  </div>
</div>