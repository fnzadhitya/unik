<?php
$id		= $_GET['id'];
$query 	= mysqli_query($koneksi,"SELECT * FROM tb_data_seragam 
  INNER JOIN tb_apd ON tb_data_seragam.id_apd=tb_apd.id_apd
  INNER JOIN tb_ukuran ON tb_data_seragam.id_ukuran=tb_ukuran.id_ukuran
  WHERE id='$id'");
$view	= mysqli_fetch_array($query);
?>
<section class="content">
	<div class="container-fluid">
		<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data Pembelian</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method='post' action='update/update_data.php' enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Periode</label>
                        <input type="text" class="form-control" name="periode" placeholder="Masukkan Periode" value="<?php echo $view['periode'];?>">
                        <input type="text" class="form-control" name="id" placeholder="Masukkan ID" value="<?php echo $view['id'];?>" hidden>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" class="form-control" name="jumlah" placeholder="Masukkan Jumlah" value="<?php echo $view['jumlah'];?>">
                      </div>
                    </div>
					          <div class="col-sm-6">
                      <div class="form-group">
                        <label>APD</label>
                        <select id="inputState" class="form-control" name="apd">
                          <option value="<?php echo $view['id_apd'];?>" selected><?php echo $view['nama_apd'];?></option>
                          <?php
                          include "../../conf/config_apd.php";
                          $query = mysqli_query($koneksi,"SELECT * FROM tb_apd") or die (mysqli_error($koneksi));
                          while($data = mysqli_fetch_array($query)){
                            echo "<option value=$data[id_apd]> $data[nama_apd] </option>";
                          }
                          ?>
						            </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Ukuran</label>
                        <select id="inputState" class="form-control" name="ukuran">
                          <option value="<?php echo $view['id_ukuran'];?> "selected><?php echo $view['ukuran'];?></option>
                          <?php
                          include "../../conf/config_apd.php";
                          $query = mysqli_query($koneksi,"SELECT * FROM tb_ukuran") or die (mysqli_error($koneksi));
                          while($data = mysqli_fetch_array($query)){
                            echo "<option value=$data[id_ukuran]> $data[ukuran] </option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tanggal Kirim</label>
                        <input type="date" class="form-control" name="kirim" placeholder="Masukkan Tanggal Kirim" value="<?php echo $view['tanggal_kirim'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>No. Resi</label>
                        <input type="text" class="form-control" name="resi" placeholder="Masukkan Resi" value="<?php echo $view['no_resi'];?>">
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