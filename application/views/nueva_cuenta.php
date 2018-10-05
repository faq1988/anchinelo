

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nueva cuenta
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Nueva cuenta</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   
      <!-- Main row -->
      <div class="row">

        <div class="col-md-6 col-md-offset-3">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nueva cuenta</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!--form role="form"-->
            <?php echo form_open('Cheque/crear_cuenta'); ?>
              <div class="box-body">



                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input class="form-control" id="exampleInputEmail1" name="nombre" placeholder="Nombre" type="text"
                  value="<?php echo set_value('nombre'); ?>">
                  <?php echo form_error('nombre', '<span style="color:red">', '</span>'); ?>
                </div>
            

                 <div class="form-group">
                  <label for="exampleInputEmail1">Tipo de cuenta</label>
              
                  <select name="tipo_cuenta" class="form-control">                      
                    <option value="-1">Seleccionar tipo</option>
                    <option value="BANCO">BANCO</option>
                    <option value="EFECTIVO">CAJA</option>
                            
                  </select>  
                </div>



                <div class="form-group">
                  <label for="exampleInputEmail1">Banco</label>
              
                  <select name="banco" class="form-control">                      
                    <option value="-1">Seleccionar banco</option>
                            <?php
                              if (isset($bancos)){
                               for($i=0; $i<sizeof($bancos); $i++){ ?>

                              <option value="<?php echo $bancos[$i]['id'];?>">
                                <?php echo $bancos[$i]['nombre'];?>                                  
                              </option>
                              
                              <?php } }?>                                                                                      
                  </select>  
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Titular</label>
                  <input class="form-control" id="exampleInputEmail1" name="titular" placeholder="Titular" type="text"
                  value="<?php echo set_value('titular'); ?>">
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
          </div>

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
