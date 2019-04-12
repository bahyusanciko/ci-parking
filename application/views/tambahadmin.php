
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
            <h1>Tambah Tambah Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">List Admin</a></li>
              <li class="breadcrumb-item active">Tambah Admin</li>
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
                <h3 class="card-title">Form Tambah Tambah Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="user" method="post" action="<?php echo base_url('admin/daftar') ?>">
                                <div class="card-body">
                <div class="form-group row">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="name" value="<?php echo set_value('name') ?>" placeholder="Full Name">
                    <?php echo form_error('name'),'<small class="text-danger pl-3">','</small>'; ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="email" class="form-control form-control-user" name="email" placeholder="Email">
                  </div>
                  <div class="col-sm-6">
                    <input type="number" class="form-control form-control-user" name="no_hp" placeholder="Nomor HP">
                  </div>
                  <?php echo form_error('email'),'<small class="text-danger pl-3">','</small>'; ?>
                </div>
                <div class="form-group row">
                  <input type="text" class="form-control form-control-user" placeholder="Username" name="username" value="<?php echo set_value('username') ?>">
                  <?php echo form_error('username'),'<small class="text-danger pl-3">','</small>'; ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="password2" placeholder="Repeat Password">
                  </div>
                </div>
                <div class="form-group">
                    <select name="level" class="form-control js-example-basic-single" required >
                      <option value="" selected disabled="">Pilih Hak Akses</option>
                      <option value="2">Penjaga</option>
                      <option value="1">Owner</option>
                    </select>
                  </div>
                 <?php echo form_error('password'),'<small class="text-danger pl-3">','</small>'; ?>
                 <a href="<?php echo base_url('admin') ?>" class="btn btn-default pull-left">Kembali</a>
                <button type="submit" class="btn btn-primary pull-right">
                  Tambah Akun
                </button> 
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
