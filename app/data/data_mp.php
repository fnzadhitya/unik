    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data MP</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Tambah Data
                </button>
                <br></br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>NRP</th>
                    <th>Nama</th>
                    <th>Perusahaan</th>
                    <th>Area</th>
                    <th>Job</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $id = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_mp
                      INNER JOIN tb_customer ON tb_mp.id_customer=tb_customer.id_customer
                      INNER JOIN tb_area ON tb_mp.id_area=tb_area.id_area
                      INNER JOIN tb_job ON tb_mp.id_job=tb_job.id_job");
                    while($pch = mysqli_fetch_array($query)){
                      $id++
                    ?>
                  <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $pch['nrp_mp']; ?></td>
                    <td><?php echo $pch['nama_mp']; ?></td>
                    <td><?php echo $pch['nama_customer']; ?></td>
                    <td><?php echo $pch['nama_area']; ?></td>
                    <td><?php echo $pch['job']; ?></td>
                    <td>
                      <a href="index.php?page=edit-data-mp&&id=<?php echo $pch['id_mp']; ?>" class="btn btn-sm btn-warning">Edit</a>
                      <a onclick="hapus_data(<?php echo $pch['id_mp']; ?>)" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>NO</th>
                    <th>NRP</th>
                    <th>Nama</th>
                    <th>Perusahaan</th>
                    <th>Area</th>
                    <th>Job</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Tambah Data -->
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="get" action="add/tambah_data_mp.php">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="inputNama">NRP</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Masukkan NRP" name="nrp" required>
                  </div>
                  <div class="form-group">
                    <label for="inputNama">Nama</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Masukkan Nama" name="nama" required>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputState">Customer</label>
                      <select id="inputState" class="form-control" name="customer">
                        <option selected>Pilih Customer</option>
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
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputState">Area</label>
                      <select id="inputState" class="form-control" name="area">
                        <option selected>Pilih Area</option>
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
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputState">Job</label>
                      <select id="inputState" class="form-control" name="job">
                        <option selected>Pilih Job</option>
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
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- modal view data -->

<script>
  function hapus_data(data_id){
    //alert('ok');
    // window.location=("delete/hapus_data.php?id=+data_id")
    Swal.fire({
      title: 'Apakah kamu yakin ingin menghapus data?',
      // showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: 'Hapus Data',
      // denyButtonText: `Don't save`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        window.location=("delete/hapus_data_mp.php?id="+data_id)
      } 
    })
  }
</script> 