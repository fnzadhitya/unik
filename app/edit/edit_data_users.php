<?php
$nrp		= $_GET['nrp'];
$query 	= mysqli_query($koneksi,"SELECT * FROM tb_users WHERE nrp='$nrp'");
$view	  = mysqli_fetch_array($query);
?>
<section class="content">
	<div class="container-fluid">
		<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method='post' action='update/update_data_users.php' enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>NRP</label>
                        <input type="text" class="form-control" name="nrp" placeholder="Masukkan NRP" value="<?php echo $view['nrp'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?php echo $view['nama'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan Username" value="<?php echo $view['username'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Masukkan Password" value="<?php echo $view['password'];?>">
                      </div>
                    </div>
					          <div class="col-sm-6">
                      <div class="form-group">
                        <label>Level</label>
                        <select id="inputState" class="form-control" name="level">
                          <option value="<?php echo $view['level'];?>" selected><?php echo $view['level'];?></option>
                          <option>superadmin</option>
                          <option>operator</option>
						            </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <button type="submit" class="btn btn-sm btn-info">Simpan</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
	</div>
</section>