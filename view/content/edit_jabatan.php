<?php 
    if ($_SESSION['level']=='admin'){
 ?>
<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
            <li><a href="<?php echo "http://".$_SERVER['SERVER_NAME'].substr($_SERVER['REQUEST_URI'],0,strlen($_SERVER['REQUEST_URI'])-15);?>">Home</a></li>
				<li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];?>">Master</a></li>
				<li class="active">Edit Tarif Mentoring</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Tarif Mentoring</h1>
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
                            <h4 class="panel-title">Edit Tarif Mentoring</h4>
                        </div>
                        <div class="panel-body panel-form">
                   <?php 
                      include "config/config.php";
                      $sql="SELECT s.id,nama_jabatan,gaji,bonus,kunjungan,tutorial,lesson,evaluasi,inskeh,insfile from t_tarif_mentor s join tb_jabatan j on (j.kode=s.id_jabatan) where s.id='$_GET[id_jabatan]'";
                      $tampil=mysql_query($sql);
                      while($data=mysql_fetch_array($tampil)){
                     ?>
                            <form class="form-horizontal form-bordered" data-parsley-validate="true"  action="./model/update_jabatan.php" method="POST">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" >Nama Jabatan :</label>
									<div class="col-md-6 col-sm-6">
                                     <input type="hidden" name="id_gaji_lama" value="<?php echo $data['id'];?>">
										<input class="form-control" type="text" name="id_gaji" value="<?php echo $data['nama_jabatan'];?>" readonly />
									</div>
								</div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Gaji Pokok :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="gapok" value="<?php echo $data['gaji'];?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Tunjangan :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="tunjangan" value="<?php echo $data['bonus'];?>"  />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Kunjungan :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="kunjungan" value="<?php echo $data['kunjungan'];?>" />
                                      </div>
                                    </div>
                                  <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Tutorial :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="tutorial" value="<?php echo $data['tutorial'];?>"  />
                                      </div>
                                    </div>
                                        <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Lesson :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="lesson" value="<?php echo $data['lesson'];?>" />
                                      </div>
                                    </div>
                                        <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Evaluasi :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="evaluasi" value="<?php echo $data['evaluasi'];?>" />
                                      </div>
                                    </div>
                                        <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Insentif Kehadiran :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="inskeh" value="<?php echo $data['inskeh'];?>"  />
                                      </div>
                                    </div>
                                        <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Insentif File Data :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="insfile" value="<?php echo $data['insfile'];?>" />
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