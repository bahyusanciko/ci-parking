<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Laporan Data Karcis Pertanggal</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()" >
<div id="laporan">
<table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<!--<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>-->
</table>

<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN KENDARAAN PARKIR</h4></center><br/></td>
</tr>
                       
</table>
 
<table border="0" align="center" style="width:900px;border:none;">
        <tr>
            <th style="text-align:left"></th>
        </tr>
</table>
<table border="1" align="center" style="width:900px;margin-bottom:20px;">
<thead>
<tr>
<th colspan="11"  style="text-align:center;">Laporan Dari Tanggal <?php echo $mulai ?> Sampai <?php echo $sampai ?> </th>
</tr>
    <tr>
        <th>Kode Karcis</th>
        <th>No Plat</th>
        <th>Tanggal Masuk</th>
        <th>Tanggal Keluar </th>
        <TH>Lama Parkir</TH>
        <th>Harga Tarif</th>
        <th>Total Tarif</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($laporan as $row) { ?>
    <tr>
        <td style="text-align:center;"><?php echo $row['kd_masuk'];?></td>
        <td style="text-align:center;"><?php echo $row['plat_masuk'];?></td>
        <td style="text-align:center"><?php echo $row['tgl_jam_masuk'];?></td>
        <td style="text-align:center;"><?php echo $row['tgl_jam_keluar'];?></td>
        <td style="text-align:center;"><?php echo $row['lama_parkir_keluar'];?></td>
        <td style="text-align:center;"><?php echo 'Rp '.number_format($row['tarif_keluar']);?></td>
        <td style="text-align:left;"><?php echo 'Rp '.number_format($row['total_keluar']);?></td>
    </tr>
    <?php } ?>
</tbody>
<tfoot>

    <tr>
        <td colspan="6" style="text-align:center;"><b>Total</b></td>
        <td style="text-align:left;"><b><?php echo 'Rp '.number_format($total);?></b></td>
    </tr>
</tfoot>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td></td>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="right">Jakarta, <?php echo date('d-M-Y')?></td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>
   
    <tr>
    <td><br/><br/><br/><br/></td>
    </tr>    
    <tr>
        <td align="right">( <?php echo $this->session->userdata('username_admin');?> )</td>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <th><br/><br/></th>
    </tr>
    <tr>
        <th align="left"></th>
    </tr>
</table>
</div>
</body>
</html>