<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


      <?php if ($this->session->flashdata('error')) {?>
              <div class="alert alert-danger">                                
                <?php echo $this->session->flashdata('error');?>
              </div>
          <?php } ?>    
          <?php if ($this->session->flashdata('success')) {?>
              <div class="alert alert-success">                               
                <?php echo $this->session->flashdata('success');?>
              </div>
          <?php } ?>    





    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cheques propios
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Transporte JyG</a></li>
        <li><a href="#">Cheques propios</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


<div class="row">
<div class="col-lg-2">
<div class="box">
  <a href="<?=base_url()?>Welcome/nuevo_cheque_propio" type="button" class="btn btn-block btn-primary">
    <i class="fa fa-plus"></i> Nuevo Cheque
  </a>
</div>
</div>
</div> 

<!--div class="table-responsive placa not-mobile"-->
<div class="row">
  <div class="col-xs-12">
    <div class="box">
            
        <table class="table">
        <thead>
          <tr>
            <th>A PAGAR</th>
            <th data-ng-class="{'capitalize': tableHeaderType === 'dates'}" class="ng-binding">Hoy</th>
            <th data-ng-class="{'capitalize': tableHeaderType === 'dates'}" class="ng-binding">1 - 7 dias</th>
            <th data-ng-class="{'capitalize': tableHeaderType === 'dates'}" class="ng-binding">8 - 15 dias</th>
            <th data-ng-class="{'capitalize': tableHeaderType === 'dates'}" class="ng-binding">16 - 30 dias</th>
            <th data-ng-class="{'capitalize': tableHeaderType === 'dates'}" class="ng-binding">31 - 60 dias</th>
            <th data-ng-class="{'capitalize': tableHeaderType === 'dates'}" class="ng-binding">&gt; 60 dias</th>
            <th class="text-center">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><b>Cantidad en $</b></td>
            <td class="success ng-binding">$ <?php echo isset($monto_hoy->monto) ? ''.$monto_hoy->monto : '0';?></td>
            <td class="warning ng-binding">$ <?php echo isset($monto_1a7->monto) ? ''.$monto_1a7->monto : '0';?></td>
            <td class="warning ng-binding">$ <?php echo isset($monto_8a15->monto) ? ''.$monto_8a15->monto : '0';?></td>
            <td class="warning ng-binding">$ <?php echo isset($monto_16a30->monto) ? ''.$monto_16a30->monto : '0';?></td>
            <td class="warning ng-binding">$ <?php echo isset($monto_31a60->monto) ? ''.$monto_31a60->monto : '0';?></td>
            <td class="warning ng-binding">$ <?php echo isset($monto_mas60->monto) ? ''.$monto_mas60->monto : '0';?></td>
            <td class="info ng-binding">$<?php echo isset($total_monto) ? ''.$total_monto : '0';?></td>
          </tr>
            <tr>
              <td><b>Cantidad de Cheques</b></td>
              <td class="success ng-binding"><?php echo ''.$monto_hoy->cant;?></td><td class="warning ng-binding"><?php echo ''.$monto_1a7->cant;?></td>
              <td class="warning ng-binding"><?php echo ''.$monto_8a15->cant;?></td><td class="warning ng-binding"><?php echo ''.$monto_16a30->cant;?></td>
              <td class="warning ng-binding"><?php echo ''.$monto_31a60->cant;?></td><td class="warning ng-binding"><?php echo ''.$monto_mas60->cant;?></td>
              <td class="info ng-binding"><?php echo ''.$total_cant;?></td>
            </tr>
        </tbody>
        </table>
</div>
</div>
</div>







      <div class="row">
        <div class="col-xs-12">
          
         

          <div class="box">

            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>ID</th>
                  <th>Estado</th>
                  <th>Fecha de salida</th>
                  <th>Fecha de cheque</th>
                  <th>Fecha de pago</th>                  
                  <th>Chequera</th>
                  <th>Titular</th>
                  <th>Nro de cheque</th>
                  <th>Nro de factura</th>
                  <th>Monto</th>
                  <th>Banco</th>
                  <th>Proveedor</th>
                  
                </tr>
                </thead>
                <tbody>
                
               <?php
                    if (isset($cheques)){
                     for($i=0; $i<count($cheques); $i++){ 
                  ?>
               
                <tr>
                  <td><?php echo $cheques[$i]['id'];?></td>
                  <td>
                  <div class="btn-group">
                    <?php if ($cheques[$i]['estado']== "CUBRIR") { ?>
                  <button type="button" class="btn btn-success btn-xs" id="estado"><?php echo $cheques[$i]['estado'];?></button>
                  <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                    <?php } ?>
                    <?php if ($cheques[$i]['estado']== "ANULADO") { ?>
                  <button type="button" class="btn btn-warning btn-xs" id="estado"><?php echo $cheques[$i]['estado'];?></button>
                  <button type="button" class="btn btn-warning dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                    <?php } ?>
                    <?php if ($cheques[$i]['estado']== "VENCIDO") { ?>
                  <button type="button" class="btn btn-danger btn-xs" id="estado"><?php echo $cheques[$i]['estado'];?></button>
                  <button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                    <?php } ?>
                    <?php if ($cheques[$i]['estado']== "PAGADO") { ?>
                    <button type="button" class="btn btn-info btn-xs" id="estado"><?php echo $cheques[$i]['estado'];?></button>
                    <button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                  <?php } ?>


                    <span class="caret"></span>
                    <span class="sr-only">Opciones</span>
                  </button>
                  <ul class="dropdown-menu" role="menu" onclick="lang1(event);">
                    <li><a href="<?php echo base_url() ?>Welcome/editar_cheque_propio/<?php echo $cheques[$i]['id']; ?>">Editar</a></li>
                    <li><a href="<?php echo base_url() ?>Cheque/estado_cheque_propio/<?php echo $cheques[$i]['id']; ?>/CUBRIR">CUBRIR</a></li>
                    <li><a href="<?php echo base_url() ?>Cheque/estado_cheque_propio/<?php echo $cheques[$i]['id']; ?>/PAGADO">PAGADO</a></li>
                    <li><a href="<?php echo base_url() ?>Cheque/estado_cheque_propio/<?php echo $cheques[$i]['id']; ?>/ANULADO">ANULADO</a></li>
                    <li><a href="<?php echo base_url() ?>Cheque/estado_cheque_propio/<?php echo $cheques[$i]['id']; ?>/VENCIDO">VENCIDO</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url() ?>Cheque/eliminar_cheque/<?php echo $cheques[$i]['id']; ?>">Eliminar</a></li>
                  </ul>
                </div>
                </td>
                  <td><?php echo $cheques[$i]['fecha_salida'];?></td>
                  <td><?php echo $cheques[$i]['fecha_cheque'];?></td>
                  <td><?php echo $cheques[$i]['fecha_pago'];?></td>
                  <td><?php echo $cheques[$i]['chequera'];?></td>
                  <td><?php echo $cheques[$i]['titular'];?></td>
                  <td><?php echo $cheques[$i]['nro_cheque'];?></td>
                  <td><?php echo $cheques[$i]['nro_factura'];?></td>
                  <td>$ <?php echo $cheques[$i]['monto'];?></td>
                  <td><?php echo $cheques[$i]['banco_emision'];?></td>
                  <td><?php echo $cheques[$i]['proveedor'];?></td>
                  
                </tr>

                 <?php } }?>
                </tbody>
                <!--tfoot>
                <tr>
                    <th>ID</th>
                  <th>Estado</th>
                  <th>Fecha de cheque</th>
                  <th>Fecha de pago</th>                  
                  <th>Chequera</th>
                  <th>Titular</th>
                  <th>Nro de cheque</th>
                  <th>Monto</th>
                  <th>Banco</th>
                  <th>Proveedor</th>
                </tr>
                </tfoot-->
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
   <?php
       include "footer.php";
   ?>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets_template/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets_template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>assets_template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets_template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets_template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets_template/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets_template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!--script src="<?=base_url()?>assets_template/dist/js/demo.js"></script-->
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable({

      "language": {
        "sSearch":        "Buscar:", 
                "oPaginate": {              
                "sNext":    "Siguiente",
                "sPrevious": "Anterior"                          
                },
            },
    


      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false


        })
  })
</script>


</body>
</html>
