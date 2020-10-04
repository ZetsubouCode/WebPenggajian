<?php 
    if ($_SESSION['level']=='admin'){
 ?>
<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
            <li><a href="<?php echo "http://".$_SERVER['SERVER_NAME'].substr($_SERVER['REQUEST_URI'],0,strlen($_SERVER['REQUEST_URI'])-27);?>">Home</a></li>
				<li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];?>">Master</a></li>
				<li class="active"> Komponen Gaji Staff Lain-Lain</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"> Komponen Gaji Staff Lain-Lain</h1>
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
                            <h4 class="panel-title">Tambah Komponen Gaji Staff Lain-Lain</h4>
                        </div>
                        <div class="panel-body panel-form">
                            <form class="form-horizontal form-bordered" data-parsley-validate="true" name="data_pengguna" action="./model/input_jabatanstaflainlain.php" method="POST">
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
                                        <select name="nip" data-live-search="true" data-style="btn-white" class="form-control selectpicker" >
                                             <option value="1">---- Pilih NIP ----</option>
                                             <?php
                                            include "config/config.php";
                                             $sql = mysql_query("SELECT * FROM t_pegawai p join tb_jabatan j on(p.id_jabatan=j.kode) where kategori_jabatan='Staff Lain-Lain' ORDER BY nip ASC");
                                                if(mysql_num_rows($sql) != 0){
                                                    while($data = mysql_fetch_assoc($sql)){
                                                        echo '<option value='.$data['nip'].'>'.$data['nip'].'</option>';
                                                    }
                                             }
                                             ?>
                                        </select>
                                    </div>

								</div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Pos Pelayanan :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="id_jabatan" data-live-search="true" data-style="btn-white" class="form-control selectpicker" >
                                             <option value="1">---- Pilih Pos Pelayanan ----</option>
                                             <?php
                                            include "config/config.php";
                                             $sql = mysql_query("SELECT * FROM tb_jabatan where kategori_jabatan='Staff Lain-Lain' ORDER BY nama_jabatan ASC");
                                             if(mysql_num_rows($sql) != 0){
                                                 while($data = mysql_fetch_assoc($sql)){
                                                     echo '<option value='.$data['kode'].'>'.$data['nama_jabatan'].'</option>';
                                                 }
                                             }
                                             ?>
                                                </select>
                                    </div>
								</div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Gaji Dari  Gereja :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="kontribusi" placeholder=" kontribusi gereja"  />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Gaji Dari YCI :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="yci" placeholder="kontribusi yci" />
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
                            <h4 class="panel-title">List Komponen Gaji Staf Lain-Lain </h4>
                        </div>
                        <div class="panel-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nama Jabatan</th>
                                        <th>Tanggal Penggajian</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th>Kontribusi Gereja</th>
                                        <th>Kontribusi YCI</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                        include "config/config.php";
                                        include "deleteModal.php";
                                        $halaman = "index.php?p=data_jabatan";
                                        $action = "model/hapus_jabatan.php?";
                                        $i=0;
                                        $_SESSION['deleteTable']="tb_jabatan";
                                        $_SESSION['deleteUID']="kode";
                                        $_SESSION['action']=$action;
                                        $sql=mysql_query("select no_penggajian,nama_pegawai,nama_jabatan,tanggal_penggajian,bulan,tahun,gereja,yci from t_penggajian pg join t_tarif_staff s on (s.id=pg.slip_staff) join t_pegawai p on (p.nip=s.nip) join tb_jabatan j on (j.kode=p.id_jabatan) where kategori_jabatan like 'Staff Lain-Lain'");
                                            while($data=mysql_fetch_array($sql)){
                                                $i++;
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $data['nama_pegawai']; ?></td>
                                                <td><?php echo $data['nama_jabatan']; ?></td>
                                                <td><?php echo $data['tanggal_penggajian']; ?></td>
                                                <td><?php echo $data['bulan']; ?></td>
                                                <td><?php echo $data['tahun']; ?></td>
                                                <td><?php echo 'Rp.'.number_format($data['gereja']); ?></td>
                                                <td><?php echo 'Rp.'.number_format($data['yci']); ?></td>
                                                <td align="center">
                                                    <a class="btn btn-default btn-icon btn-sm" href="index.php?p=edit_jabatanstaflainlain&&id_gaji=<?php echo $data['no_penggajian']; ?>"><i class="fa fa-expand"></i></a>
                                                    <a class="btn btn-danger btn-icon btn-sm" data-toggle="modal" data-target="#deletemodal" onclick="setUID('<?php echo $data['no_penggajian'];?>')"><i class="fa fa-times"></i></a>
                                                    
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