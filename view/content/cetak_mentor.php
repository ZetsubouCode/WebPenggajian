<?php 
    if ($_SESSION['level']=='admin'){
 ?>
<ol class="breadcrumb hidden-print pull-right">
    <li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];?>">Transaksi</a></li>
	<li class="active">Slip</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header hidden-print">Gaji <small>Slip Gaji</small></h1>
<!-- end page-header -->

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
        <span class="pull-right hidden-print">
                    <a href="cetak_invoice_mentor.php?no_penggajian=<?php echo $data['no_penggajian']; ?>"class="btn btn-sm btn-success m-b-10"><i class="glyphicon glyphicon-eye-open m-r-5"></i> Lihat & Cetak</a>
                    </span>
        PPA AGAPE IO-847 SALATIGA
    </div>
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
            <small>Gaji Periode</small>
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
    </div>
</div>

    <?php 
        }else{
            ?>
            <script type="text/javascript">
                window.location.href="../../halaman_error.php";
            </script>
        <?php
        }
     ?>