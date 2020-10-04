<?php 
    if ($_SESSION['level']=='admin'){
 ?>
<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
            <li><a href="<?php echo "http://".$_SERVER['SERVER_NAME'].substr($_SERVER['REQUEST_URI'],0,strlen($_SERVER['REQUEST_URI'])-15);?>"> Home</a></li>
				<li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];?>">Master</a></li>
				<li class="active">Komponen Gaji Mentoring</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Komponen Gaji Mentoring</h1>
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
                            <h4 class="panel-title">Tambah Komponen Gaji Mentoring</h4>
                        </div>
                        <div class="panel-body panel-form">
                            <form class="form-horizontal form-bordered" data-parsley-validate="true" name="data_pengguna" action="./model/input_jabatan.php" method="POST">
                                
                                <div class="form-group">
									<label class="control-label col-md-4 col-sm-4">Pos Pelayanan :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="id_gaji" data-live-search="true" data-style="btn-white" class="form-control selectpicker" >
                                             <option value="1">---- Pilih Pos Pelayanan ----</option>
                                             <?php
                                            include "config/config.php";
                                             $sql = mysql_query("SELECT * FROM tb_jabatan where kategori_jabatan='Mentor' ORDER BY nama_jabatan ASC");
                                             if(mysql_num_rows($sql) != 0){
                                                 while($data = mysql_fetch_assoc($sql)){
                                                     echo '<option value='.$data['nama_jabatan'].'>'.$data['nama_jabatan'].'</option>';
                                                 }
                                             }
                                             ?>
                                                </select>
                                    </div>
								</div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Gaji Mentoring :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="gapok" placeholder="Mentoring"  />
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Jumlah Kehadiran Anak &#60;80% :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="float" name="bonus" placeholder="bonus" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Tarif Kunjungan :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="kunjungan" placeholder="Kunjungan" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Tarif tutorial :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="tutorial" placeholder="Tutorial" />
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Lesson plan :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="lesson" placeholder="Lesson" />
                                    </div>
                                </div>


                            <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Evaluasi Kinerja :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="evaluasi" placeholder="Evaluasi" />
                                    </div>
                                </div>

                            <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Insentif Kehadiran :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="inskeh" placeholder="Insentif Kehadiran" />
                                    </div>
                                </div>

                            <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Insentif File Data :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="insfile" placeholder="Insentif File  Data" />
                                    </div>
                                </div>

								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4"></label>
									<div class="col-md-6 col-sm-6">
										<button type="submit" class="btn btn-primary btn-sm">Submit</button> <button type="reset" class="btn btn-danger btn-sm">Reset</button>
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
                                        <th>Nama Jabatan</th>
                                        <th>Mentoring</th>
                                        <th>&#60;80%</th>
                                        <th>Kunjungan</th>
                                        <th>Tutorial</th>
                                        <th>Lesson Plan</th>
                                        <th>Aksi</th>
                                        <th>Evaluasi Kinerja</th>
                                        <th>Intensif Kehadiran</th>
                                        <th>Intensif File Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                        include "config/config.php";
                                        include "deleteModal.php";
                                        $halaman = "index.php?p=data_jabatan";
                                        $action = "model/hapus_jabatan.php";
                                        $_SESSION['deleteTable']="t_tarif_mentor";
                                        $_SESSION['deleteUID']="id_gaji";
                                        $_SESSION['action']=$action;
                                        $i=0;
                                        $sql=mysql_query("SELECT s.id,nama_jabatan,gaji,bonus,kunjungan,tutorial,lesson,evaluasi,inskeh,insfile from t_tarif_mentor s join tb_jabatan j on (j.kode=s.id_jabatan) where kategori_jabatan like 'Mentor'");
                                        while($data=mysql_fetch_array($sql)){
                                                $i++;
                                            
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $data['nama_jabatan']; ?></td>
                                                <td><?php echo 'Rp.'.number_format($data['gaji']); ?></td>
                                                <td><?php echo 'Rp.'.number_format($data['bonus']); ?></td>
                                                <td><?php echo 'Rp.'.number_format($data['kunjungan']); ?></td>
                                                <td><?php echo 'Rp.'.number_format($data['tutorial']); ?></td>
                                                <td><?php echo 'Rp.'.number_format($data['lesson']); ?></td>
                                                <td><?php echo 'Rp.'.number_format($data['evaluasi']); ?></td>
                                                <td><?php echo 'Rp.'.number_format($data['inskeh']); ?></td>
                                                <td><?php echo 'Rp.'.number_format($data['insfile']); ?></td>
                                                <td align="center">
                                                    <a class="btn btn-default btn-icon btn-sm" href="index.php?p=edit_jabatan&&id_jabatan=<?php echo $data['id']; ?>"><i class="fa fa-expand"></i></a>
                                                    <a class="btn btn-danger btn-icon btn-sm" data-toggle="modal" data-target="#deletemodal" onclick="setUID('<?php echo $data['id'];?>')"><i class="fa fa-times"></i></a>
                                                    
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