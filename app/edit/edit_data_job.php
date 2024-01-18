<?php
$id           = $_GET['id'];
$query 	      = mysqli_query($koneksi,"SELECT * FROM tb_job WHERE id_job='$id'");
$view 	      = mysqli_fetch_array($query);
?>
<section class="content">
	<div class="container-fluid">
		<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data Job</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method='post' action='update/update_data_job.php' enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="job" placeholder="Masukkan Job" value="<?php echo $view['job'];?>">
                        <input type="text" class="form-control" name="id" placeholder="Masukkan Nama" value="<?php echo $view['id_job'];?>" hidden>
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