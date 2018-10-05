

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel de control
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   
    <div class="row">
    <div class="col-lg-2">
    <div class="box">
    <a href="<?=base_url()?>Welcome/nueva_chequera" type="button" class="btn btn-block btn-primary">
    <i class="fa fa-plus"></i> Nueva Chequera
    </a>
    </div>
    </div>
    </div>     
     
         <!-- Main row -->
      <div class="row">

        
        <div class="col-xs-8 col-xs-offset-2">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                  <tr>
                  <th>ID</th>
                  <th>Descripción</th>
                  <th>Cuenta</th>
                  <th>Número inicial</th>                  
                  <th>Cantidad de cheques</th>
                  
                </tr>

                 <?php
                    if (isset($chequeras)){
                     for($i=0; $i<count($chequeras); $i++){ 
                  ?>

                <tr onclick="window.location = 'http://ubuntu.com'">
                  <td><?php echo $chequeras[$i]['id'];?></td>                  
                  <td><?php echo $chequeras[$i]['descripcion'];?></td>
                  <td><?php echo $chequeras[$i]['cuenta'];?></td>
                  <td><?php echo $chequeras[$i]['nro_inicial'];?></td>
                  <td><?php echo $chequeras[$i]['cant_cheques'];?></td>
                  
                  <td>
                      <a href="<?php echo base_url() ?>Cheque/eliminar_chequera/<?php echo $chequeras[$i]['id']; ?>"> <i title="Eliminar" class="fa fa-fw fa-trash-o"></i></a>
                            
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

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
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
<script src="<?=base_url()?>assets_template/bower_components/morris.js/morris.min.js"></script>
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
<script src="<?=base_url()?>assets_template/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets_template/dist/js/demo.js"></script>
</body>
</html>
