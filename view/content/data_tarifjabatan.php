<?php 
    if ($_SESSION['level']=='admin'){
 ?>
<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
            <li><a href="<?php echo "http://".$_SERVER['SERVER_NAME'].substr($_SERVER['REQUEST_URI'],0,strlen($_SERVER['REQUEST_URI'])-20);?>">Home</a></li>
				<li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];?>">Transaksi</a></li>
				<li class="active">Perhitungan Gaji Mentoring</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Perhitungan Gaji Mentoring</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
                <!-- begin col-6 -->
			    <div class="col-md-6">
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            </div>
                            <h4 class="panel-title">Tambah Perhitungan Gaji Mentoring</h4>
                        </div>
                        <div class="panel-body panel-form">
                            <form class="form-horizontal form-bordered" data-parsley-validate="true" name="data_pengguna" action="./model/input_tarifjabatan.php" method="POST">
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
									<label class="control-label col-md-4 col-sm-4">Pos Pelayanan :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="jabatan" id="jabatan" data-live-search="true" data-style="btn-white" class="form-control selectpicker" >
                                             <option value="1">---- Pilih Pos Pelayanan ----</option>
                                             <?php
                                            include "config/config.php";
                                             $sql = mysql_query("SELECT * FROM tb_jabatan where kategori_jabatan='Mentor' ORDER BY nama_jabatan ASC");
                                             if(mysql_num_rows($sql) != 0){
                                                 while($data = mysql_fetch_assoc($sql)){
                                                     echo '<option value="'.$data['nama_jabatan'].'">'.$data['nama_jabatan'].'</option>';
                                                 }
                                             }
                                             ?>
                                                </select>
                                    </div>

								</div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Nama Mentor :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama"  readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Tarif Mentoring :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="tarif_mentoring" id="tarif_mentoring" placeholder="Mentoring"  readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Tarif Keehadiran :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="tarif_kehadiran" id="tarif_kehadiran" placeholder="Kehadiran" readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Tarif Kunjungan :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="tarif_kunjungan" id="tarif_kunjungan" placeholder="Kunjungan" readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Tarif tutorial :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="tarif_tutorial" id="tarif_tutorial" placeholder="Tutorial" readonly/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Tarif Lesson plan :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="tarif_lesson" id="tarif_lesson" placeholder="Lesson" readonly/>
                                    </div>
                                </div>


                            <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Tarif Evaluasi Kinerja :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="evaluasi" id="evaluasi" placeholder="Evaluasi" readonly/>
                                    </div>
                                </div>

                            <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Tarif Insentif Kehadiran :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="inskeh" id="inskeh" placeholder="Insentif Kehadiran" readonly/>
                                    </div>
                                </div>

                            <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4"> Tarif Insentif File Data :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="insfile" id="insfile" placeholder="Insentif File  Data" readonly/>
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
                            <h4 class="panel-title">List Komponen Gaji Mentor</h4>
                        </div>
                        <div class="panel-body">
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
                                        $halaman = "index.php?p=data_tarifjabatan";
                                        $action = "model/hapus_tarifjabatan.php?";
                                        $i=0;
                                                $sql=mysql_query("select * from view_gaji_mentor");
                                            while($data=mysql_fetch_array($sql)){
                                                $i++;
                                        ?>
                                            <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo date("d-F-Y", strtotime($data['Tanggal'])); ?></td>
                                            <td><?php echo $data['bulan'].' / '.$data['tahun']; ?></td>
                                            <td><?php echo $data['NIP']; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td align="right"><?php echo 'Rp. '.number_format($data['gaji']+$data['Bonus']+$data['kunjungan']+$data['tutorial']+$data['lesson']+$data['evaluasi']+$data['inkeh']+$data['insfile']) ?></td>
                                                <td align="center">
                                                <a href='index.php?p=cetak_mentor&&no_penggajian=<?php echo $data['no_penggajian']; ?>'class="btn btn-primary btn-icon btn-sm" title='Detail'><i class='glyphicon glyphicon-folder-open'></i></a>
                                                </td>
                                            </tr>
                                            <?php 
                                        }
                                    ?>
                             
                                </tbody>
                            </table>
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
                window.location.href="halaman_error.php";
            </script>
        <?php
        }
     ?>