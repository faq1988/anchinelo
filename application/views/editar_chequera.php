

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar chequera
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Transporte JyG</a></li>
        <li class="active">Editar chequera</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   
      <!-- Main row -->
      <div class="row">

        <div class="col-md-6 col-md-offset-3">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar chequera</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!--form role="form"-->
            <?php echo form_open('Cheque/editar_chequera/' . $chequera[0]['id']); ?>
              <div class="box-body">



                <div class="form-group">
                  <label for="exampleInputEmail1">Descripción</label>
                  <input class="form-control" id="exampleInputEmail1" name="descripcion" placeholder="Descripción" type="text"
                  value="<?php echo $chequera[0]['descripcion']; ?>">
                  <?php echo form_error('descripcion', '<span style="color:red">', '</span>'); ?>
                </div>
            
                <div class="form-group">
                  <label for="cuenta">Cuenta</label>
              
                  <select name="cuenta" class="form-control">                      
                    <option value="<?php echo set_value('cuenta'); ?>">Seleccionar cuenta</option>
                            <?php
                              if (isset($cuentas)){
                               for($i=0; $i<sizeof($cuentas); $i++){ ?>

                              <option value="<?php echo $chequera[0]['cuenta'];?>"
                                <?php if($cuentas[$i]['id']==$chequera[0]['cuenta']) echo 'selected="selected"'; ?>>
                                <?php echo $cuentas[$i]['nombre'];?>                                  
                              </option>                              
                              <?php } }?>                                                                                      
                  </select>  
                  <?php echo form_error('cuenta', '<span style="color:red">', '</span>'); ?>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Número inicial</label>
                  <input class="form-control" id="exampleInputEmail1" name="nro_inicial" placeholder="Número inicial" type="text"
                  value="<?php echo $chequera[0]['nro_inicial']; ?>">
                  <?php echo form_error('nro_inicial', '<span style="color:red">', '</span>'); ?>
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Cantidad de cheques</label>
                  <input class="form-control" id="exampleInputEmail1" name="cant_cheques" placeholder="Cantidad de cheques" type="text"
                  value="<?php echo $chequera[0]['cant_cheques']; ?>">
                  <?php echo form_error('cant_cheques', '<span style="color:red">', '</span>'); ?>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <center>
                <a class="btn btn-success" href="<?=base_url()?>welcome/chequeras">Cancelar</a>
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
