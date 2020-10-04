<?php 
    if ($_SESSION['level']=='admin'){
 ?>
<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
            <li><a href="<?php echo "http://".$_SERVER['SERVER_NAME'].substr($_SERVER['REQUEST_URI'],0,strlen($_SERVER['REQUEST_URI'])-15);?>">Home</a></li>
				<li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];?>">Master</a></li>
				<li class="active">Edit Data Mentoring</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Mentoring</h1>
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
                            <h4 class="panel-title">Edit Data Mentoring</h4>
                        </div>
                        <div class="panel-body panel-form">
                   <?php 
                      include "config/config.php";
                      $sql="select * from t_pk where id='$_GET[id]'";
                      $tampil=mysql_query($sql);
                      while($data=mysql_fetch_array($tampil)){
                     ?>
                            <form class="form-horizontal form-bordered" data-parsley-validate="true"  action="./model/update_mentoring.php" method="POST">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" >Nama Jabatan :</label>
									<div class="col-md-6 col-sm-6">
                                     <input type="hidden" name="id_gaji_lama" value="<?php echo $data['id'];?>">
										<input class="form-control" type="text" name="id_gaji" value="<?php echo $data['id_gaji'];?>" readonly />
									</div>
								</div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4"> Jumlah Anak :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="anak" value="<?php echo $data['jumlah_anak'];?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Persentase Kehadiran Anak :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="kehadiran" value="<?php echo $data['kehadiran_anak'];?>"  />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Jumlah Kehadiran Anak &#60;80%:</label>
                                    <div class="col-md-6 col-sm-6">
                                    <select name="bonus" data-live-search="true" data-style="btn-white" class="form-control selectpicker" >
                                             <option value="x">---- Pilih ----</option>
                                             <option value="1">Ya</option>
                                             <option value="0">Tidak</option>
                                    </select>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Jumlah Kunjungan :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="kunjungan" value="<?php echo $data['j_kunjungan'];?>"  />
                                      </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Jumlah Pertemuan :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="pertemuan" value="<?php echo $data['j_pertemuan'];?>" />
                                      </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Lesson Plan :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="lesson" value="<?php echo $data['lesson'];?>" />
                                      </div>
                                    </div>
                                    
									<label class="control-label col-md-4 col-sm-4"></label>
									<div class="col-md-6 col-sm-6">
										<button type="submit" class="btn btn-primary btn-sm">Update</button> 
									</div>
								</div>
                            </form>
                      <?php
                  }
                  ?>
                        </div>
                    </div>
                </div>
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