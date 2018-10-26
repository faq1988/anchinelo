

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar cuenta
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Transporte JyG</a></li>
        <li class="active">Editar cuenta</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   
      <!-- Main row -->
      <div class="row">

        <div class="col-md-6 col-md-offset-3">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar cuenta</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!--form role="form"-->
            <?php echo form_open('Cheque/editar_cuenta/' . $cuenta[0]['id']); ?>
              <div class="box-body">



                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input class="form-control" id="exampleInputEmail1" name="nombre" placeholder="Nombre" type="text"
                  value="<?php echo $cuenta[0]['nombre']; ?>">
                  <?php echo form_error('nombre', '<span style="color:red">', '</span>'); ?>
                </div>
            

                 <div class="form-group">
                  <label for="tipo_cuenta">Tipo de cuenta</label>
              
                  <select name="tipo_cuenta" class="form-control">                      
                    <option value="">Seleccionar tipo</option>
                    <option value="BANCO" <?php echo $cuenta[0]['tipo_cuenta']=='BANCO' ? "selected" : "" ?>>BANCO</option>
                    <option value="EFECTIVO" <?php echo $cuenta[0]['tipo_cuenta']=='CAJA' ? "selected" : ""?>>CAJA</option>
                            
                  </select>  
                   <?php echo form_error('tipo_cuenta', '<span style="color:red">', '</span>'); ?>
                </div>



                <div class="form-group">
                  <label for="banco">Banco</label>
              
                  <select name="banco" class="form-control">                      
                    <option value="<?php echo set_value('banco'); ?>">Seleccionar banco</option>
                            <?php
                              if (isset($bancos)){
                               for($i=0; $i<sizeof($bancos); $i++){ ?>

                              <option value="<?php echo $cuenta[0]['banco'];?>" 
                                <?php if($bancos[$i]['id']==$cuenta[0]['banco']) echo 'selected="selected"'; ?>>
                                <?php echo $bancos[$i]['nombre'];?>                                  
                              </option>
                              
                              <?php } }?>                                                                                      
                  </select>  
                   <?php echo form_error('banco', '<span style="color:red">', '</span>'); ?>
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Titular</label>
                  <input class="form-control" id="exampleInputEmail1" name="titular" placeholder="Titular" type="text"
                  value="<?php echo $cuenta[0]['titular']; ?>">
                   <?php echo form_error('titular', '<span style="color:red">', '</span>'); ?>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <center>
                <a class="btn btn-success" href="<?=base_url()?>welcome/cuentas">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>                
                </center>
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
  <?php
       include "footer.php";
   ?>

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
