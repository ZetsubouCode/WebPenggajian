
<?php 
    if ($_SESSION['level']=='admin'){
 ?>
<ol class="breadcrumb pull-right">
<li><a href="<?php echo "http://".$_SERVER['SERVER_NAME'].substr($_SERVER['REQUEST_URI'],0,strlen($_SERVER['REQUEST_URI'])-12);?>">Home</a></li>
    <li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];?>">Master</a></li>
    <li class="active">Profil</li>
</ol>
<h1 class="page-header">Input Data Akun</h1>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">Input Data Akun</h4>
            </div>
            <div class="panel-body panel-form">
                <form class="form-horizontal d" data-parsley-validate="true" name="demo-form" action="model/input_pengguna.php" method="POST" enctype="multipart/form-data">
                
                    <hr>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">Username :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="fullname" name="username" placeholder="Username" data-parsley-required="true" />
                
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4">Password :</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="password" name="pass" id="password-indicator-default" placeholder="Password" class="form-control m-b-5" />
                            <div id="passwordStrengthDiv" class="is0 m-t-5"></div>
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">NIP :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="nip" name="nip" placeholder="NIP Pegawai" data-parsley-required="true" />
                        </div>
                    </div>
                    <div class="form-group">
									<label class="control-label col-md-4 col-sm-4" >Level Akun :</label>
									<div class="col-md-6 col-sm-6">
                                    <select name="levelz" data-live-search="true" data-style="btn-white" class="form-control selectpicker" >
                                             <option value="1">---- Pilih Level ----</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                    </select>
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
                            <h4 class="panel-title">List Data Akun</h4>
                        </div>
                        <div class="panel-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>NIP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                        include "config/config.php";
                                        include "deleteModal.php";
                                        $halaman = "index.php?p=data_user";
                                        $action = "model/hapus_pengguna.php";
                                        $i=0; 
                                            $_SESSION['deleteTable']="tb_pengguna";
                                            $_SESSION['deleteUID']="username";
                                            $_SESSION['action']=$action;
                                            $sql=mysql_query("select username,level,nip from tb_pengguna");
                                            while($data=mysql_fetch_array($sql)){
                                                $i++;
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $data['username']; ?></td>
                                                 <td><?php echo $data['level']; ?></td>
                                                 <td><?php echo $data['nip']; ?></td>
                                                <td align="center">
                                                    <a class="btn btn-default btn-icon btn-sm" href="index.php?p=edit_user&&username=<?php echo $data['username']; ?>"><i class="fa fa-expand"></i></a>
                                                    <a class="btn btn-danger btn-icon btn-sm" data-toggle="modal" data-target="#deletemodal" onclick="setUID('<?php echo $data['username'];?>')"><i class="fa fa-times"></i></a>
                                                    
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