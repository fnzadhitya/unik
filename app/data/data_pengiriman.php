    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pengiriman</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="index.php?page=tambah-data">
                  <button type="button" class="btn btn-info" data-toggle="modal">
                  Tambah Data
                  </button>
                </a>
                <br></br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>NRP</th>
                    <th>Nama</th>
                    <th>Periode</th>
                    <th>APD</th>
                    <th>Ukuran</th>
                    <th>Jumlah</th>
                    <th>Tanggal Kirim</th>
                    <th>No. Resi</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $id = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_data_seragam
                      INNER JOIN tb_apd ON tb_data_seragam.id_apd=tb_apd.id_apd
                      INNER JOIN tb_ukuran ON tb_data_seragam.id_ukuran=tb_ukuran.id_ukuran
                    ");
                    while($pch = mysqli_fetch_array($query)){
                      $id++
                    ?>
                  <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $pch['nrp']; ?></td>
                    <td><?php echo $pch['nama']; ?></td>
                    <td><?php echo $pch['periode']; ?></td>
                    <td><?php echo $pch['nama_apd']; ?></td>
                    <td><?php echo $pch['ukuran']; ?></td>
                    <td><?php echo $pch['jumlah']; ?></td>
                    <td><?php echo $pch['tanggal_kirim']; ?></td>
                    <td><?php echo $pch['no_resi']; ?></td>
                    <td>
                      <a href="index.php?page=edit-data&&id=<?php echo $pch['id'];?>" class="btn btn-sm btn-warning">Edit</a>
                      <a onclick="hapus_data(<?php echo $pch['id'];?>)" class="btn btn-sm btn-danger">Hapus</a>
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
        window.location=("delete/hapus_data.php?id="+data_id)
      } 
    })
  }
</script> 