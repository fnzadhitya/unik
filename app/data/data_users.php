    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Users</h3>
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
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $id = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_users");
                    while($pch = mysqli_fetch_array($query)){
                      $id++
                    ?>
                  <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $pch['nrp']; ?></td>
                    <td><?php echo $pch['nama']; ?></td>
                    <td><?php echo $pch['username']; ?></td>
                    <td><?php echo $pch['password']; ?></td>
                    <td><?php echo $pch['level']; ?></td>
                    <td>
                      <a href="index.php?page=edit-data-users&&nrp=<?php echo $pch['nrp'];?>" class="btn btn-sm btn-warning">Edit</a>
                      <a onclick="hapus_data(<?php echo $pch['nrp'];?>)" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    
                  </tr>
                  <?php } ?>
                  </tbody>
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
            <form method="get" action="add/tambah_data_users.php">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="inputNRP">NRP</label>
                    <input type="text" class="form-control" id="inputNRP" placeholder="Masukkan NRP" name="nrp" required>
                  </div>
                  <div class="form-group">
                    <label for="inputPeriode">Nama</label>
                    <input type="text" class="form-control" id="inputNama" placeholder="Masukkan Nama" name="nama" required>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputUsername">Username</label>
                      <input type="text" class="form-control" id="inputUsername" placeholder="Masukkan Username" name="username" required>
                    </div>              
                    <div class="form-group col-md-6">
                      <label for="inputPassword">Password</label>
                      <input type="text" class="form-control" id="inputPassword" placeholder="Masukkan Password" name="password" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputState">Level</label>
                      <select id="inputState" class="form-control" name="level">
                        <option selected>Pilih Level</option>
                        <option>superadmin</option>
                        <option>operator</option>
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
  function hapus_data(data_nrp){
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
        window.location=("delete/hapus_data_users.php?nrp="+data_nrp)
      } 
    })
  }
</script> 