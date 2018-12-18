

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nuevo cheque de terceros
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Transporte JyG</a></li>
        <li class="active">Nuevo cheque de terceros</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   
      <!-- Main row -->
      <div class="row">

        <div class="col-md-8 col-md-offset-2">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nuevo cheque de terceros</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!--form role="form"-->
            <?php echo form_open('Cheque/crear_cheque_terceros'); ?>
              <div class="box-body">

                <div class="row">
                <div class="col-md-12">
                 
                  <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Fecha de ingreso</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input class="form-control pull-right" id="datepicker" name="fecha_ingreso" type="date" 
                              value="<?php echo set_value('fecha_ingreso'); ?>">                  
                            </div>
                            <?php echo form_error('fecha_ingreso', '<span style="color:red">', '</span>'); ?>
                          </div>
                  </div>

                  <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fecha del cheque</label>
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input class="form-control pull-right" id="datepicker" name="fecha_cheque" type="date"
                                value="<?php echo set_value('fecha_cheque'); ?>">
                              </div>
                              <?php echo form_error('fecha_cheque', '<span style="color:red">', '</span>'); ?>
                            </div>
                  </div>

                  <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fecha de depósito</label>
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input class="form-control pull-right" id="datepicker" name="fecha_deposito" type="date"
                                value="<?php echo set_value('fecha_deposito'); ?>">
                              </div>
                              <?php echo form_error('fecha_deposito', '<span style="color:red">', '</span>'); ?>
                            </div>
                  </div>

              </div>
              </div>

              <div class="form-group">
                  <label for="exampleInputEmail1">Titular</label>
                  <input class="form-control" id="titular" name="titular" placeholder="Titular" type="text"
                  value="<?php echo set_value('titular'); ?>">
                  <?php echo form_error('titular', '<span style="color:red">', '</span>'); ?>
                </div>

                <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nro de cheque</label>
                      <input class="form-control" id="nro_cheque" name="nro_cheque" placeholder="Número de cheque" type="text"
                      value="<?php echo set_value('nro_cheque'); ?>">
                      <?php echo form_error('nro_cheque', '<span style="color:red">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Monto</label>
                       <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="number" step="0.01" class="form-control" id="monto" name="monto" placeholder="Monto"
                      value="<?php echo set_value('monto'); ?>">                
                  </div>
                      <!--input class="form-control" id="monto" name="monto" placeholder="Monto" type="text"
                      value="<?php echo set_value('monto'); ?>"-->
                      <?php echo form_error('monto', '<span style="color:red">', '</span>'); ?>
                    </div>
                  </div>
               </div>
             </div>

              <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
               <div class="form-group">
                  <label for="banco_emision">Banco de emisión</label>
              
                  <select name="banco_emision" class="form-control">                      
                    <option value="<?php echo set_value('banco_emision'); ?>">Seleccionar banco</option>
                            <?php
                              if (isset($bancos)){
                               for($i=0; $i<sizeof($bancos); $i++){ ?>

                              <option value="<?php echo $bancos[$i]['id'];?>">
                                <?php echo $bancos[$i]['nombre'];?>                                  
                              </option>
                              
                              <?php } }?>                                                                                      
                  </select>  
                  <?php echo form_error('banco_emision', '<span style="color:red">', '</span>'); ?>
                </div>
              </div>
               
              <div class="col-md-6">
                <div class="form-group">
                  <label for="cliente">Cliente</label>
               <select name="cliente" class="form-control">                      
                    <option value="<?php echo set_value('cliente'); ?>">Seleccionar cliente</option>
                            <?php
                              if (isset($clientes)){
                               for($i=0; $i<sizeof($clientes); $i++){ ?>

                              <option value="<?php echo $clientes[$i]['id'];?>">
                                <?php echo $clientes[$i]['nombre_apellido'];?>                                  
                              </option>
                              
                              <?php } }?>                                                                                      
                  </select>  
                  <?php echo form_error('cliente', '<span style="color:red">', '</span>'); ?>
                </div>
              </div>
            </div>
          </div>

            <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nro de factura</label>
                  <input class="form-control" id="nro_factura" name="nro_factura" placeholder="Número de factura" type="text"
                  value="<?php echo set_value('nro_factura'); ?>">
                  <?php echo form_error('nro_factura', '<span style="color:red">', '</span>'); ?>
                </div>
              </div>

                 <div class="col-md-6">
                 <div class="form-group">
                  <label for="depositar_en">Depositar en</label>
               <select name="depositar_en" class="form-control">                      
                    <option value="<?php echo set_value('depositar_en'); ?>">Seleccionar cuenta</option>
                            <?php
                              if (isset($cuentas)){
                               for($i=0; $i<sizeof($cuentas); $i++){ ?>

                              <option value="<?php echo $cuentas[$i]['id'];?>">
                                <?php echo $cuentas[$i]['nombre'];?>                                  
                              </option>
                              
                              <?php } }?>                                                                                      
                  </select> 
                  <?php echo form_error('depositar_en', '<span style="color:red">', '</span>'); ?> 
                </div>
              </div>
            </div>
          </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Nota</label>
                <textarea class="form-control" name="nota" rows="3" placeholder="Nota del cheque ..."></textarea>

              </div>
              



               
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <center>
                <a class="btn btn-success" href="<?=base_url()?>welcome/cheques_terceros">Cancelar</a>
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
