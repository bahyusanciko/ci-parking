
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- css -->
  <?php $this->load->view('include/base_css'); ?>
</head>
<body class="hold-transition sidebar-mini">
<!-- navbar -->
<?php $this->load->view('include/base_nav'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Jenis Kendaraan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('JenisKendaraan') ?>">Jenis Kendaraan</a></li>
              <li class="breadcrumb-item active">Tambah Jenis</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Jenis Kendaraan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url('jeniskendaraan/tambahkendaraan') ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Jenis Kendaraan</label>
                    <input type="text" class="form-control" id="" placeholder="Jenis Kendaraan" required="" name="nama">
                   <?php echo form_error('Nama'),'<small class="text-danger pl-3">','</small>'; ?>
                  </div>
                  <div class="form-group">
                    <label for="">Harga</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><b>Rp</b></span>
                    </div><input type="number" class="form-control" id="" placeholder="Harga Kendaraan" name="harga">
                  </div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="" class="btn btn-default">Kembali</a>
                  <input type="submit" class="btn btn-primary pull-right" value="Tambah">
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
     </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- footer -->
  <?php $this->load->view('include/base_footer'); ?>

</div>
<!-- ./wrapper -->

<!-- script -->

<?php $this->load->view('include/base_js'); ?>
<!-- InputMask -->
<script src="<?php echo base_url('assets') ?>/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?php echo base_url('assets/dist/') ?>jquery.mask.min.js"></script>
</body>
</html>
