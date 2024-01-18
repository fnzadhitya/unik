<?php
$id           = $_GET['id'];
$query 	      = mysqli_query($koneksi,"SELECT * FROM tb_area WHERE id_area='$id'");
$view 	      = mysqli_fetch_array($query);
?>
<section class="content">
	<div class="container-fluid">
		<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data Area</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method='post' action='update/update_data_area.php' enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?php echo $view['nama_area'];?>">
                        <input type="text" class="form-control" name="id" placeholder="Masukkan Nama" value="<?php echo $view['id_area'];?>" hidden>
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