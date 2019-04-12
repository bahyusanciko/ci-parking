<!-- jQuery -->
<script src="<?php echo base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets') ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets') ?>/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets') ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets') ?>/dist/js/demo.js"></script>
<!-- alert -->
<script src="<?php echo base_url('assets/alert') ?>/jquery.bootstrap-growl.js"></script>
<!-- sweatalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php echo "<script>".$this->session->flashdata('message')."</script>"?>
<?php echo "<script>".$this->session->flashdata('alert')."</script>"?>