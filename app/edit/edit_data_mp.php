<?php
$id		  = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_mp
  INNER JOIN tb_customer ON tb_mp.id_customer=tb_customer.id_customer
  INNER JOIN tb_area ON tb_mp.id_area=tb_area.id_area
  INNER JOIN tb_job ON tb_mp.id_job=tb_job.id_job
  WHERE id_mp='$id'");
$view	  = mysqli_fetch_array($query);
?>
<section class="content">
	<div class="container-fluid">
		<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data MP</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method='post' action='update/update_data_mp.php' enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?php echo $view['nama_mp'];?>">
						            <input type="text" class="form-control" name="id" placeholder="Masukkan id" value="<?php echo $view['id_mp'];?>" hidden>
                      </div>
                    </div>
					          <div class="col-sm-6">
                      <div class="form-group">
                        <label>Customer</label>
                        <select id="inputState" class="form-control" name="customer">
                          <option value="<?php echo $view['id_customer'];?>" selected><?php echo $view['nama_customer'];?></option>
                          <?php
                          include "../../conf/config_apd.php";
                          $query = mysqli_query($koneksi,"SELECT * FROM tb_customer") or die (mysqli_error($koneksi));
                          while($data = mysqli_fetch_array($query)){
                            echo "<option value=$data[id_customer]> $data[nama_customer] </option>";
                          }
                          ?>
						            </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Area</label>
                        <select id="inputState" class="form-control" name="area">
                          <option value="<?php echo $view['id_area'];?> "selected><?php echo $view['nama_area'];?></option>
                          <?php
                          include "../../conf/config_apd.php";
                          $query = mysqli_query($koneksi,"SELECT * FROM tb_area") or die (mysqli_error($koneksi));
                          while($data = mysqli_fetch_array($query)){
                            echo "<option value=$data[id_area]> $data[nama_area] </option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Job</label>
                        <select id="inputState" class="form-control" name="job">
                          <option value="<?php echo $view['id_job'];?> "selected><?php echo $view['job'];?></option>
                          <?php
                          include "../../conf/config_apd.php";
                          $query = mysqli_query($koneksi,"SELECT * FROM tb_job") or die (mysqli_error($koneksi));
                          while($data = mysqli_fetch_array($query)){
                            echo "<option value=$data[id_job]> $data[job] </option>";
                          }
                          ?>
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