<?php 
    if ($_SESSION['level']=='admin'){
 ?>
<!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li><a href="<?php echo "http://".$_SERVER['SERVER_NAME'].substr($_SERVER['REQUEST_URI'],0,strlen($_SERVER['REQUEST_URI'])-12);?>">Home</a></li>
                <li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];?>">Transaksi</a></li>
                <li class="active">Gaji</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Perhitungan Gaji Staff</h1>

            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            </div>
                            <h4 class="panel-title">Input Perhitungan Gaji</h4>
                        </div>
                        <div class="panel-body panel-form">
                            <form class="form-horizontal form-bordered" data-parsley-validate="true" name="data_pengguna" action="./model/input_penggajian.php" method="POST">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" >Bulan/Tahun </label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select  class="form-control" name="bulan" id="bulan">
                                                    <?php
                                                        $arr = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                                            foreach ($arr as $key) {
                                                                echo "<option value='$key'>$key";
                                                            }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="tahun" class="form-control" id="tahun">
                                                        <?php
                                                        for ($i = 2020; $i < 2050; $i++) {
                                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                                        }
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">NIP</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="nip" id="nip" data-live-search="true" data-style="btn-white" class="form-control selectpicker" >
                                             <option value="1">---- Pilih NIP ----</option>
                                             <?php
                                            include "config/config.php";
                                             $sql = mysql_query("SELECT * FROM t_pegawai ORDER BY nama_pegawai ASC");
                                             if(mysql_num_rows($sql) != 0){
                                                 while($data = mysql_fetch_assoc($sql)){
                                                     echo '<option value='.$data['nip'].'>'.$data['nip'].' '.'['.$data['nama_pegawai'].']'.'</option>';
                                                 }
                                             }
                                             ?>
                                         </select>
                                    </div>
                                </div>
                               <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" >Nama Pegawai</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text" name="nama_pegawai" id="nama_pegawai"   readonly/>
                                    </div>
                                </div>
                                 <div class="form-group" >
                                    <label class="control-label col-md-4 col-sm-4" >Jabatan</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text" name="nama_jabatan" id="nama_jabatan"  readonly/>
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" >Gaji Kontribusi Gereja </label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-inline">
                                            Rp. 
                                            <input class="form-control" type="text" name="gaji_kontribusi" id="gaji_kontribusi"  readonly/>
                                        </div>
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" >Gaji Kontribusi YCI </label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-inline">
                                            Rp. 
                                            <input class="form-control" type="text" name="gaji_yci" id="gaji_yci"  readonly/>
                                        </div>
                                    </div>
                                </div>
                                 
                                 <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" >Gaji Bersih</label>
                                    <div class="col-md-6 col-sm-6">
                                    <div class="form-inline">
                                            Rp. 
                                            <input class="form-control" type="text" name="gaji_bersih" id="gaji_bersih"value="0" data-parsley-required="true" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4"></label>
                                    <div class="col-md-6 col-sm-6">
                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button> <button type="reset" class="btn btn-danger btn-sm">reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
 
                    
              
            
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            </div>
                            <h4 class="panel-title">List Data Gaji</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <table id="data-table" class="table table-striped table-bordered">
                                
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Periode Gaji</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Gaji Bresih</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                          include "config/config.php";
                                           $halaman = "index.php?p=data_gaji";
                                            $action = "model/hapus_penggajian.php?";
                                          $i=0;
                                          $sql="SELECT * FROM `view_gaji_staff` ";
                                          $tampil=mysql_query($sql);
                                          while($data=mysql_fetch_array($tampil)){
                                          
                                          $i++;
                                         ?>
                                          <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo date("d-F-Y", strtotime($data['Tanggal'])); ?></td>
                                            <td><?php echo $data['Bulan'].' / '.$data['Tahun']; ?></td>
                                            <td><?php echo $data['NIP']; ?></td>
                                            <td><?php echo $data['Nama Pegawai']; ?></td>
                                            <td align="right"><?php echo 'Rp. '.number_format($data['Kontribusi Gereja']+$data['Kontribusi YCI']) ?></td>
                                            <td>
                                               <a href='index.php?p=cetak&&no_penggajian=<?php echo $data['No']; ?>'class="btn btn-primary btn-icon btn-sm" title='Detail'><i class='glyphicon glyphicon-folder-open'></i></a>
                                            </td>
                                          </tr>
                                          <?php
                                          }
  ?>
                             
                                </tbody>
                            </table>
                                
                            </div>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
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