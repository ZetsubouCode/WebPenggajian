<?php 
    if ($_SESSION['level']=='admin'){
 ?>
<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
            <li><a href="<?php echo "http://".$_SERVER['SERVER_NAME'].substr($_SERVER['REQUEST_URI'],0,strlen($_SERVER['REQUEST_URI'])-11);?>"> Home</a></li>
				<li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];?>">Master</a></li>
				<li class="active">Data Jabatan</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Data Jabatan</h1>
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
                            <h4 class="panel-title">Tambah Jabatan</h4>
                        </div>
                        <div class="panel-body panel-form">
                            <form class="form-horizontal form-bordered" data-parsley-validate="true" name="data_pengguna" action="./model/input_jab.php" method="POST">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" >Posisi Pelayanan :</label>
									<div class="col-md-6 col-sm-6">
									<!--	<input class="form-control" type="text" name="nama_jab" placeholder="posisi pelayanan" data-parsley-required="true" />
									-->
                                    <select name="posisi" data-live-search="true" data-style="btn-white" class="form-control selectpicker" >
                                             <option value="1">---- Pilih Posisi Pelayanan ----</option>
                                           
                                                <option value="Staff Utama">Staff Utama</option>
                                                <option value="Staff Lain-Lain">Staff Lain-Lain</option>
                                                <option value="Mentor">Mentor</option>
                                               
                                                </select>
                                    </div>
								</div>
                               <div class="panel-body panel-form">
                               <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" >Pos Pelayanan :</label>
                                    <div class="col-md-6 col-sm-6">
                                       <input class="form-control" type="text" name="nama_jab" placeholder="pos pelayanan" data-parsley-required="true" />
                                
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
                            <h4 class="panel-title">List Data Jabatan</h4>
                        </div>
                        <div class="panel-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Posisi Pelayanan</th>
                                        <th>Pos Pelayanan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                        include "config/config.php";
                                        include "deleteModal.php";
                                        $halaman = "index.php?p=data_jab";
                                        $action = "model/hapus_jabatan.php";
                                        $i=0;
                                            $_SESSION['deleteTable']="tb_jabatan";
                                            $_SESSION['deleteUID']="kode";
                                            $_SESSION['action']=$action;
                                            $sql=mysql_query("select * from tb_jabatan");
                                            while($data=mysql_fetch_array($sql)){
                                                $i++;
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $data['kategori_jabatan']; ?></td>
                                                 <td><?php echo $data['nama_jabatan']; ?></td>
                                                <td align="center">
                                                    <a class="btn btn-default btn-icon btn-sm" href="index.php?p=edit_jab&&posisi=<?php echo $data['kode']; ?>"><i class="fa fa-expand"></i></a>
                                                    <a class="btn btn-danger btn-icon btn-sm" data-toggle="modal" data-target="#deletemodal" onclick="setUID('<?php echo $data['kode'];?>')"><i class="fa fa-times"></i></a>
                                                    
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