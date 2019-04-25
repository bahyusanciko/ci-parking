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
              <h1>View Member</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url('member') ?>">List Member</a></li>
                <li class="breadcrumb-item active">View Member</li>
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
                    <h3 class="card-title">Kode Member</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="<?php echo base_url('member/tambahmember') ?>" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="nama">Nama Member</label>
                            <input type="text" class="form-control" id="" placeholder="Nama Member" required="" name="nama" value="<?php echo $member['nama_member'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="nama">Plat Member</label>
                            <input type="text" class="form-control" id="" placeholder="Plat Kendaraan" required="" value="<?php echo $member['plat_member'] ?>" name="plat" >
                          </div>
                          <div class="form-group">
                          <label for="nama">Pilih Member</label>
                          <input type="hidden" class="form-control" name="jenis"  value="<?php echo $member['kd_kendaraan'] ?>">
                          <input type="text" class="form-control" id="" placeholder="Plat Kendaraan" required="" readonly="" value="<?php echo $member['nama_kendaraan'] ?>">
                          </div>
                          </div>
                          <div class="col">
                             <div class="form-group">
                            <label for="nama">Nomor Rangka</label>
                            <input type="text" class="form-control" id="" placeholder="Nomor Rangka Kendaraan" required="" name="no_rak" value="<?php echo $member['no_rangka_member'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="nama">Nomor Mesin</label>
                            <input type="text" class="form-control" id="" placeholder="Nomor Mesin Kendaraan" required="" name="no_mes" value="<?php echo $member['no_mesin_member'] ?>">
                          </div>
                           <div class="form-group">
                            <label for="nama">Kode Kartu</label>
                            <input type="text" class="form-control" id="" placeholder="Scan kartu Member" required="" name="no_kar" value="<?php echo $member['kd_kartu'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="">Harga</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><b>Rp</b></span>
                                </div><input type="number" class="form-control" id="harga" placeholder="Harga Kendaraan" name="harga" value="<?php echo $member['harga_kendaraan'] ?>" readonly="">
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <a href="<?php echo base_url('member') ?>" class="btn btn-default">Kembali</a>
                          <input type="submit" class="btn btn-primary pull-right" value="Buat Member">
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