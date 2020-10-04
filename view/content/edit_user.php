<?php 
    if ($_SESSION['level']=='admin'){
 ?>
<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
            <li><a href="<?php echo "http://".$_SERVER['SERVER_NAME'].substr($_SERVER['REQUEST_URI'],0,strlen($_SERVER['REQUEST_URI'])-11);?>">Home</a></li>
				<li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];?>">Admin</a></li>
				<li class="active">Edit User</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Edit User</h1>
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
                            <h4 class="panel-title">Edit user</h4>
                        </div>
                        <div class="panel-body panel-form">
                   <?php 
                      include "config/config.php";
                      $sql="select * from tb_pengguna where username='$_GET[username]'";
                      $tampil=mysql_query($sql);
                      while($data=mysql_fetch_array($tampil)){
                     ?>
                            <form class="form-horizontal form-bordered" data-parsley-validate="true"  action="./model/update_user.php" method="POST">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" >Username :</label>
									<div class="col-md-6 col-sm-6">
									<input class="form-control" type="text" name="username" value="<?php echo $data['username'];?>"  />
                                    <input type="text" style="display:none" name="hiddenusername" id="hiddenusername" value="<?php echo $data['username'];?>" />
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="control-label col-md-4 col-sm-4" >Password :</label>
									<div class="col-md-6 col-sm-6">
									<input class="form-control" type="password" name="pass" id="password-indicator-default" value=""/>
                                    </div>
								</div>
                                <div class="form-group">
									<label class="control-label col-md-4 col-sm-4" >NIP :</label>
									<div class="col-md-6 col-sm-6">
									<input class="form-control" type="text" name="nip" value="<?php echo $data['nip'];?>"  />
									</div>
								</div>
                                <?php
                                 }
                               ?>
                            <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4">Level Akun :</label>
                          <div class="col-md-6 col-sm-6">
                          <select name="levelz" data-live-search="true" data-style="btn-white" class="form-control selectpicker" >
                                             <option value="1">---- Pilih Level ----</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                    </select></div>
                                </div>
                                 <label class="control-label col-md-4 col-sm-4"></label>
									<div class="col-md-6 col-sm-6">
										<button type="submit" class="btn btn-primary btn-sm">Update</button> 
									</div>
								</div>
                            </form>
                    
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