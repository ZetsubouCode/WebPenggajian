<?php 
    if ($_SESSION['level']=='admin'){
 ?>
<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="<?php echo "http://".$_SERVER['SERVER_NAME'].substr($_SERVER['REQUEST_URI'],0,strlen($_SERVER['REQUEST_URI'])-16);?>">Home</a></li>
				<li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];?>">Admin</a></li>
				<li class="active">Data Pengguna</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Data Pengguna</h1>
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
                            <h4 class="panel-title">Tambah Data Pengguna</h4>
                        </div>
                        <div class="panel-body panel-form">
                            <form class="form-horizontal form-bordered" data-parsley-validate="true" name="data_pengguna" action="./model/input_pengguna.php" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="fullname">Username</label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" type="text" id="fullname" name="username" placeholder="Username" data-parsley-required="true" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4">Password</label>
									<div class="col-md-6 col-sm-6">
										<input type="password" name="password" id="password-indicator-default" class="form-control m-b-5"  data-parsley-required="true"/>
										<div id="passwordStrengthDiv" class="is0 m-t-5"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="fullname">Nama Karyawan</label>
									<div class="col-md-6 col-sm-6">
                                            <select name="nip" data-live-search="true" data-style="btn-white" class="form-control selectpicker" >
                                                <option value="1">---- Pilih Nama Karyawan ----</option>
                                                  <?php
                                                    include "config/config.php";
                                                     $sql = mysql_query("SELECT * FROM t_pegawai ORDER BY nama_pegawai ASC");
                                                         while($datax = mysql_fetch_assoc($sql)){
                                                            ?>
                                                <option value="<?php echo $datax['nip']; ?>"><?php echo $datax['nama_pegawai']; ?></option>
                                                      <?php
                                                         }
                                                     ?>
                                            </select>

									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4">Level :</label>
									<div class="col-md-6 col-sm-6">
										<select class="form-control" id="select-required" name="level" data-parsley-required="true">
											<option value="">-----Pilih Level-----</option>
											<option value="admin">Admin</option>
											<option value="user">User</option>
										</select>
									</div>
								</div>
								<div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Foto</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="file" name="imagefile"  />
                                    </div>
                                </div>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4"></label>
									<div class="col-md-6 col-sm-6">
										<button type="submit" class="btn btn-primary btn-sm">Submit</button> <button type="resset" class="btn btn-danger btn-sm">Resset</button>
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
                            <h4 class="panel-title">List Data Pengguna</h4>
                        </div>
                        <div class="panel-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Nama Lengkap</th>
                                        <th>Level</th>
                                        <th><p align="center">Aksi</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                         include "config/config.php";
                                        $halaman = "index.php?p=data_pengguna";
                                        $action = "model/hapus_pengguna.php?";
                                         $i=0;
                                         $sql="select * from view_pengguna";
                                         $tampil=mysql_query($sql);
                                         while($data=mysql_fetch_array($tampil)){
                                            $nip=$data['username'];
                                         $i++;
                                        ?>

                                        <tr>
                                        <td align="center"><?php echo $i ?></td>
                                        <td align="center"><img src="assets/foto/<?php echo $data['imagefile']; ?>" alt="" height="50px" width="50px"/></td>
                                        <td align="center"><?php echo $data['username']; ?></td>
                                        <td align="center"><?php echo $data['password']; ?></td>
                                        <td align="center"><?php echo $data['nama_pegawai']; ?></td>
                                        <td align="center"><?php echo $data['level']; ?></td>
                                        <td style="width: 20%;" align="center">
                                            <a class="btn btn-default btn-icon btn-sm" href="index.php?p=profil&&username=<?php echo $data['username']; ?>"><i class="fa fa-expand" title="Edit Profil"></i></a>
                                            <a class="btn btn-danger btn-icon btn-sm" onclick="konfirmasi('<?php echo $nip;?>','<?php echo $halaman;?>','<?php echo $action;?>')"><i class="fa fa-times" title="Hapus Data Pengguna"></i></a>
                                        </td>
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