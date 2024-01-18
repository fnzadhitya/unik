    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Ukuran</h3>
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
                    <th>Ukuran</th>
                    <th>APD</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $id = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_ukuran
                      INNER JOIN tb_apd ON tb_ukuran.id_apd=tb_apd.id_apd
                    ");
                    while($pch = mysqli_fetch_array($query)){
                      $id++
                    ?>
                  <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $pch['ukuran']; ?></td>
                    <td><?php echo $pch['nama_apd']; ?></td>
                    <td>
                      <a href="index.php?page=edit-data-ukuran&&id=<?php echo $pch['id_ukuran']; ?>" class="btn btn-sm btn-warning">Edit</a>
                      <a onclick="hapus_data(<?php echo $pch['id_ukuran']; ?>)" class="btn btn-sm btn-danger">Hapus</a>
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
            <form method="get" action="add/tambah_data_ukuran.php">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="inputUkuran">Ukuran</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Masukkan Ukuran" name="ukuran" required>
                  </div>
                  <div class="form-group">
                    <label for="inputUOM">UOM</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Masukkan UOM" name="uom" required>
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
        window.location=("delete/hapus_data_ukuran.php?id="+data_id)
      } 
    })
  }
</script> 