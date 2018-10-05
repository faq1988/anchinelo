

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cheques Propios
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Panel</a></li>
        <li class="active">Cheques propios</li>
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
            <td class="success ng-binding">$0,00</td><td class="warning ng-binding">$0,00</td>
            <td class="warning ng-binding">$0,00</td><td class="warning ng-binding">$0,00</td>
            <td class="warning ng-binding">$0,00</td><td class="warning ng-binding">$0,00</td>
            <td class="info ng-binding">$0,00</td>
          </tr>
            <tr>
              <td><b>Cantidad de Cheques</b></td>
              <td class="success ng-binding">0</td><td class="warning ng-binding">0</td>
              <td class="warning ng-binding">0</td><td class="warning ng-binding">0</td>
              <td class="warning ng-binding">0</td><td class="warning ng-binding">0</td>
              <td class="info ng-binding">0</td>
            </tr>
        </tbody>
        </table>
</div>
</div>
</div>



      <!-- /.row -->
      <!-- Main row -->
      <div class="row">

        
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="tablachequespropios" class="table table-hover">
                <tbody>
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

                 <?php
                    if (isset($cheques)){
                     for($i=0; $i<count($cheques); $i++){ 
                  ?>

                <tr>
                  <td><?php echo $cheques[$i]['id'];?></td>

                <td>
                  <div class="btn-group">
                  <button type="button" class="btn btn-success btn-xs"><?php echo $cheques[$i]['estado'];?></button>
                  <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Opciones</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Editar</a></li>
                    <li><a href="#">Depositar</a></li>
                    <li><a href="#">Pagar</a></li>
                    <li><a href="#">Rechazar</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Eliminar</a></li>
                  </ul>
                </div>
                </td>
                  
                  
                  <td><?php echo $cheques[$i]['fecha_cheque'];?></td>
                  <td><?php echo $cheques[$i]['fecha_pago'];?></td>
                  <td><?php echo $cheques[$i]['chequera'];?></td>
                  <td><?php echo $cheques[$i]['titular'];?></td>
                  <td><?php echo $cheques[$i]['nro_cheque'];?></td>
                  <td>$ <?php echo $cheques[$i]['monto'];?></td>
                  <td><?php echo $cheques[$i]['banco_emision'];?></td>
                  <td><?php echo $cheques[$i]['proveedor'];?></td>
                  <td>
                                <a href="<?php echo base_url() ?>Cheque/eliminar_cheque/<?php echo $cheques[$i]['id']; ?>"> <i title="Eliminar" class="fa fa-fw fa-trash-o"></i></a>
                                
                              </td>
                </tr>
                <?php } }?>

              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018 <a href="#">Facundo Carignano</a>.</strong> Todos los derechos reservados.
  </footer>

 
  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets_template/bower_components/jquery/dist/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url()?>assets_template/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets_template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?=base_url()?>assets_template/bower_components/raphael/raphael.min.js"></script>

<!-- Sparkline -->
<script src="<?=base_url()?>assets_template/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?=base_url()?>assets_template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url()?>assets_template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url()?>assets_template/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url()?>assets_template/bower_components/moment/min/moment.min.js"></script>
<script src="<?=base_url()?>assets_template/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?=base_url()?>assets_template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url()?>assets_template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?=base_url()?>assets_template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets_template/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets_template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- DataTables -->
<script src="<?=base_url()?>assets_template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets_template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets_template/dist/js/demo.js"></script>

<script>
  $(function () {
    
    $('#tablachequespropios').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>



</body>
</html>
