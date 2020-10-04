<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.9/admin/html/extra_invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Nov 2015 11:55:07 GMT -->
<head>
	<meta charset="utf-8" />
	<title>Print Slip Gaji</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="assets/css/animate.min.css" rel="stylesheet" />
	<link href="assets/css/style_nyunyu.min.css" rel="stylesheet" />
    <link href="assets/css/style-responsive_nyunyu.min.css" rel="stylesheet" />
    <link href="assets/css/theme/default_nyunyu.css" rel="stylesheet" id="theme" />
	<link href="assets/css/invoice-print.min.css" rel="stylesheet" />
	<link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->


<!-- begin invoice -->
<?php 
          include "config/config.php";
          $i=0;
          $id=$_GET['no_penggajian'];
          $sql="select * from view_gaji_mentor where no_penggajian=$id";
          $tampil=mysql_query($sql);
          while($data=mysql_fetch_array($tampil)){
            $noslip=str_replace('-', '', $data['Tanggal']);
          $i++;
         ?>
<div class="invoice">
    <div class="invoice-company">
        <div class="invoice-from">
            <span class="pull-right hidden-print">
            <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-success m-b-10"><i class="fa fa-print m-r-5"></i> Print</a>
        </span>
        <table>
            <tr>
                <!--<td>
                    <img src="assets/foto/logo.png" height="85px" width="85px"> 
                </td>-->
                <td>
                    <h3>
                       PPA AGAPE IO-847 SALATIGA
                   </h3> 
                   <span>
                    JL.HASANUDIN N0 3B
                       
                   </span>
                </td>
            </tr>
        </table>
        </div>
    </div>
    <hr>
    <div class="invoice-header">
        <div class="invoice-from">
            <address class="m-t-5 m-b-5">
                NIP <br />
                <strong><?php echo $data['NIP']; ?></strong><br />
                Nama <br />
                <strong><?php echo $data['nama']; ?></strong><br />
            </address>
        </div>
        <div class="invoice-date">
            <small>No Slip</small>
            <div class="date m-t-5"><?php echo $noslip.$data['NIP']; ?></div>
            <small>Tangggal</small>
            <div class="date m-t-5"><?php echo date("d-F-Y", strtotime($data['Tanggal'])); ?></div>
        </div>
    </div>
    <div class="invoice-content">
        <div class="table-responsive">
            <table class="table table-invoice">
                <thead>
                    <tr>
                        <th>DESKRIPSI</th>
                        <th></th>
                        <th></th>
                        <th><p align="right">TOTAL</p></th>
                    </tr>
                </thead>
                <tbody>
           
                <tr>
                        <td>
                            Gaji Mentoring<br />
                        </td>
                        <td></td>
                        <td></td>
                        <td align="right"><?php echo 'Rp.'.number_format($data['gaji']); ?></td>
                    </tr>
                    <tr>
                        <td>
                            Gaji Bonus<br />
                        </td>
                        <td></td>
                        <td></td>
                        <td align="right"><?php echo 'Rp.'.number_format($data['Bonus']); ?></td>
                    </tr>
                    <tr>
                        <td>
                            Gaji Kunjungan<br />
                        </td>
                        <td></td>
                        <td></td>
                        <td align="right"><?php echo 'Rp.'.number_format($data['kunjungan']); ?></td>
                    </tr>
                    <tr>
                        <td>
                            Gaji Tutorial<br />
                        </td>
                        <td></td>
                        <td></td>
                        <td align="right"><?php echo 'Rp.'.number_format($data['tutorial']); ?></td>
                        </td>
                     </tr>
                     <tr>
                        <td>
                            Lesson Plan<br />
                        </td>
                        <td></td>
                        <td></td>
                        <td align="right"><?php echo 'Rp.'.number_format($data['lesson']); ?></td>
                        </td>
                     </tr>
                     <tr>
                        <td>
                            Evaluasi Kinerja<br />
                        </td>
                        <td></td>
                        <td></td>
                        <td align="right"><?php echo 'Rp.'.number_format($data['evaluasi']); ?></td>
                        </td>
                     </tr>
                     <tr>
                        <td>
                            Intensif Kehadiran<br />
                        </td>
                        <td></td>
                        <td></td>
                        <td align="right"><?php echo 'Rp.'.number_format($data['inkeh']); ?></td>
                        </td>
                     </tr>
                     <tr>
                        <td>
                            Intensif File Data<br />
                        </td>
                        <td></td>
                        <td></td>
                        <td align="right"><?php echo 'Rp.'.number_format($data['insfile']); ?></td>
                        </td>
                     </tr>
                </tbody>
            </table>
        </div>
        <div class="invoice-price">
            <div class="invoice-price-left">
                <div class="invoice-price-row">
                  <div class="sub-price">
                        <small>GAJI Mentoring</small>
                        <?php echo 'Rp.'.number_format($data['gaji']); ?>
                    </div>
                    <div class="sub-price">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="sub-price">
                        <small>Gaji Bonus</small>
                        <?php echo 'Rp.'.number_format($data['Bonus']); ?>
                    </div>
                    <div class="sub-price">
                        <i class="fa fa-plus"></i>
                    </div>
                     <div class="sub-price">
                        <small>Gaji Kunjungan</small>
                        <?php echo 'Rp.'.number_format($data['kunjungan']); ?>
                    </div>
                    <div class="sub-price">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="sub-price">
                        <small>Gaji Tutorial</small>
                        <?php echo 'Rp.'.number_format($data['tutorial']); ?>
                    </div>
                    <div class="sub-price">
                        <i class="fa fa-plus"></i>
                    </div>
                   
                    </div>
                    <div class="invoice-price-row">
                    <div class="sub-price">
                        <small>Lesson Plan</small>
                        <?php echo 'Rp.'.number_format($data['lesson']); ?>
                    </div>
                    <div class="sub-price">
                        <i class="fa fa-plus"></i>
                    </div>  
                    <div class="sub-price">
                        <small>Evaluasi Kinerja</small>
                        <?php echo 'Rp.'.number_format($data['evaluasi']); ?>
                    </div>
                    <div class="sub-price">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="sub-price">
                        <small> Intensif Kehadiran</small>
                        <?php echo 'Rp.'.number_format($data['inkeh']); ?>
                    </div>
                    <div class="sub-price">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="sub-price">
                        <small> Intensif File Data</small>
                        <?php echo 'Rp.'.number_format($data['insfile']); ?>
                    </div>
                    </div>
                  
                </div>
            
            <div class="invoice-price-right">
            <?php
            $total=$data['gaji']+$data['Bonus']+$data['kunjungan']+$data['tutorial']+$data['lesson']+$data['evaluasi']+$data['inkeh']+$data['insfile'];
            ?>
                <small>TOTAL</small> <?php echo 'Rp.'.number_format($total); ?>
            </div>
        </div>
    </div>
     <?php
    }
    ?> 
    <div class="invoice-footer text-muted">
        <p class="text-center m-b-5">
        TERIMAKASIH
        </p>
       <!-- <p class="text-center">
            <span class="m-r-10"><i class="fa fa-globe"></i> archindomediakarya.com</span>
            <span class="m-r-10"><i class="fa fa-phone"></i> T:016-18192302</span>
            <span class="m-r-10"><i class="fa fa-envelope"></i> archindomediakarya@gmail.com</span>
        </p>-->
    </div>
</div>

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
	<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-53034621-1', 'auto');
      ga('send', 'pageview');
    </script>
</body>

<!-- Mirrored from seantheme.com/color-admin-v1.9/admin/html/extra_invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Nov 2015 11:55:08 GMT -->
</html>

