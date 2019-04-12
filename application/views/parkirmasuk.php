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
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/datatables/dataTables.bootstrap4.min.css">
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
              <h1>Parkir Masuk</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url('Masuk') ?>">Parkir Masuk</a></li>
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
              <div class="col-md-4">
                <!-- general form elements -->
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Input Kendaraan Masuk</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="<?php echo base_url('masuk/kendaraanmasuk') ?>" method="post">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Kendaraan</label>
                        <select class="form-control" name="jenis" required="">
                          <option value="" selected disabled="">Pilih Kendaraan</option>
                          <?php foreach ($jenis as $row) { ?>
                          <option value="<?php echo $row['kd_kendaraan'] ?>"><?php echo strtoupper($row['nama_kendaraan']) ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Nomor Plat</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><input class="form-control" type="text" name="plat" size="1" value="B"></span>
                            <input type="number" class="form-control" id="" placeholder="Nomor Plat" name="nomor">
                            <span class="input-group-text"><input class="form-control" type="text" name="back" size="5" ></span>
                          </div>
                        </div>
                       <?php echo $this->session->flashdata('pesan') ?>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary pull-right">Cetak</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
              </div>
              <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-default">
                  <div class="card-header">
                    <h3 class="card-title">Data Kendaraan Masuk Hari <?php echo hari_indo(date('N',strtotime(date('Y-m-d')))).', '.tanggal_indo(date('Y-m-d',strtotime(''.date('Y-m-d').''))) ?></h3>
                  </div>
                  <!-- /.card-header -->
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Kode Karcis</th>
                        <th>Plat Nomor</th>
                        <th>Jenis</th>
                        <th>Jam Masuk</th>
                        <th>Penjaga</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($masuk as $row) { ?>
                      <tr>
                        <td><?php echo $row['kd_masuk'] ?></td>
                        <td><?php echo $row['plat_masuk'] ?></td>
                        <td><?php echo strtoupper($row['nama_kendaraan']) ?></td>
                        <td><?php echo date('H:i:s',strtotime($row['tgl_masuk'])) ?></td>
                        <td><?php echo $row['create_masuk'] ?></td>
                        <td><a href="<?php echo base_url('masuk/cetakstruk/'.$row['kd_masuk']) ?>"><i class="fa fa-barcode"></i></a> | <a href=""><i class="fa fa-trash"></i></a></td>
                      </tr>
                    <?php } ?>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card -->
                </div>
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
      <script src="<?php echo base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url('assets') ?>/plugins/datatables/dataTables.bootstrap4.min.js"></script>
      <!-- page script -->
      <script>
        $(function () {
          $("#example1").DataTable();
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
          });
        });
      </script>
    </body>
  </html>