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
        Chequeras
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Transporte JyG</a></li>
        <li><a href="#">Chequeras</a></li>
        
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




      <div class="row">
        <div class="col-xs-12">
          
         

          <div class="box">

            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Descripción</th>
                  <th>Cuenta</th>
                  <th>Número inicial</th>                  
                  <th>Cantidad de cheques</th>
                  <th></th>
                  
                </tr>
                </thead>
                <tbody>
                
               <?php
                    if (isset($chequeras)){
                     for($i=0; $i<count($chequeras); $i++){ 
                  ?>
               
                <tr>
                  
                 <td><?php echo $chequeras[$i]['id'];?></td>                  
                  <td><?php echo $chequeras[$i]['descripcion'];?></td>
                  <td><?php echo $chequeras[$i]['cuenta'];?></td>
                  <td><?php echo $chequeras[$i]['nro_inicial'];?></td>
                  <td><?php echo $chequeras[$i]['cant_cheques'];?></td>
                  
                  <td>
                  <div class="btn-group">
                  <button type="button" class="btn btn-success btn-xs">Opciones</button>
                  <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Opciones</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url() ?>Welcome/editar_chequera/<?php echo $chequeras[$i]['id']; ?>">Editar</a></li>
                    <li><a href="<?php echo base_url() ?>Cheque/eliminar_chequera/<?php echo $chequeras[$i]['id']; ?>">Eliminar</a></li>
                  </ul>
                </div>
                </td>


                </tr>

                 <?php } }?>
                </tbody>
              
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
