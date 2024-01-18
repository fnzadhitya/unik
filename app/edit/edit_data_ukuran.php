<?php
$id           = $_GET['id'];
$query 	      = mysqli_query($koneksi,"SELECT * FROM tb_ukuran WHERE id_ukuran='$id'");
$view 	      = mysqli_fetch_array($query);
?>
<section class="content">
	<div class="container-fluid">
		<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data Ukuran</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method='post' action='update/update_data_ukuran.php' enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Ukuran</label>
                        <input type="text" class="form-control" name="ukuran" placeholder="Masukkan Ukuran" value="<?php echo $view['ukuran'];?>">
                        <input type="text" class="form-control" name="id" placeholder="Masukkan Nama" value="<?php echo $view['id_ukuran'];?>" hidden>
                      </div>
                    </div>
					          <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>UOM</label>
                        <input type="text" class="form-control" name="uom" placeholder="Masukkan UOM" value="<?php echo $view['uom'];?>">
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