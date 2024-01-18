<!-- Tambah Data -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data</h3>
                    </div>
                    <div class="card-body">
                        <form id="dataForm" method='post' action='add/tambah_data_pengiriman.php'>
                            <div class="form-group">
                                <label for="tanggalKirim">Tanggal Kirim</label>
                                <input type="date" class="form-control" id="tanggalKirim" name="kirim">
                            </div>
                            <div class="form-group">
                                <label for="nomorResi">Nomor Resi</label>
                                <input type="text" class="form-control" id="nomorResi" name="resi">
                            </div>
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NRP</th>
                                        <th>Periode</th>
                                        <th>APD</th>
                                        <th>Ukuran</th>
                                        <th>Jumlah</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select class="form-control searchableDropdown" name="nrp[]" id="nrpDropdown">
                                                <option selected value="">Pilih NRP</option>
                                                <?php
                                                include "../../conf/config_apd.php";
                                                $query = mysqli_query($koneksi, "SELECT * FROM tb_mp") or die(mysqli_error($koneksi));
                                                while ($data = mysqli_fetch_array($query)) {
                                                    echo "<option value='" . $data['nrp_mp'] . "'>" . $data['nrp_mp'] . " - " . $data['nama_mp'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td><input type="text" class="form-control" name="periode[]"></td>
                                        <td>
                                        <select class="form-control searchableDropdown" name="apd[]" id="apdDropdown">
                                            <option selected value="">Pilih APD</option>
                                            <?php
                                            include "../../conf/config_apd.php";
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_apd") or die(mysqli_error($koneksi));
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>    
                                                <option value="<?php echo $data['id_apd'] ?>"><?php echo $data['nama_apd'] ?></option>
                                            <?php    
                                            }
                                            ?>
                                        </select>
                                        </td>
                                        <td>
                                        <select class="form-control searchableDropdown" name="ukuran[]" id="ukuranDropdown">
                                        </select>
                                        </td>
                                        <td><input type="text" class="form-control" name="jumlah[]"></td>
                                        <td>
                                             
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <button type="button" class="btn btn-primary" onclick="addRow()">Tambah Baris</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        // Inisialisasi Select2 untuk dropdown NRP, APD, dan Ukuran
        $('.searchableDropdown').select2({
            placeholder: 'Pilih Opsi',
            allowClear: true
        });

        // Event listener untuk memuat data ukuran saat dropdown APD berubah
        $('#dataTable').on('change', '.searchableDropdown[name="apd[]"]', function() {
            var selectUkuran = $(this).closest('tr').find('.searchableDropdown[name="ukuran[]"]');
            loadUkuranData(selectUkuran, this);
        });
    });

    // Fungsi untuk memuat data ukuran berdasarkan APD yang dipilih
    function loadUkuranData(selectUkuran, dropdownAPD) {
        var apdId = $(dropdownAPD).val();
        // Lakukan fetch API untuk mendapatkan data ukuran dari server
        fetch('/sodata/app/tambah/comboukuran.php?id=' + apdId)
            .then(function(response) {
                return response.json(); // Mengubah respons menjadi objek JSON
            })
            .then(function(data) {
                // Setelah mendapatkan data ukuran, isi dropdown ukuran dengan opsi yang diperoleh
                populateUkuranDropdown(selectUkuran, data);
            })
            .catch(function(error) {
                console.error('Error:', error);
            });
    }

    // Fungsi untuk mengisi dropdown ukuran dengan data yang diperoleh dari server
    function populateUkuranDropdown(selectUkuran, data) {
        // Kosongkan dropdown ukuran
        $(selectUkuran).empty();

        // Tambahkan opsi "Pilih Ukuran" ke dropdown
        $(selectUkuran).append('<option value="">Pilih Ukuran</option>');

        // Tambahkan opsi ukuran berdasarkan data yang diperoleh dari server
        data.forEach(function(ukuran) {
            $(selectUkuran).append('<option value="' + ukuran.id + '">' + ukuran.nama + '</option>');
        });

        // Perbarui Select2 setelah mengisi ulang dropdown ukuran
        $(selectUkuran).trigger('change');
    }

    function addRow() {
        var table = document.getElementById("dataTable").getElementsByTagName('tbody')[0];
        var newRow = table.insertRow(table.rows.length);

        // NRP Column
        var nrpCell = newRow.insertCell(0);
        var selectNRP = document.createElement("select");
        selectNRP.className = "form-control searchableDropdown";
        selectNRP.name = 'nrp[]';
        // Copy options from the first dropdown to the new one
        var originalNRPDropdown = document.getElementById('nrpDropdown');
        for (var j = 0; j < originalNRPDropdown.options.length; j++) {
            var option = document.createElement("option");
            option.value = originalNRPDropdown.options[j].value;
            option.text = originalNRPDropdown.options[j].text;
            selectNRP.appendChild(option);
        }
        nrpCell.appendChild(selectNRP);

        // Periode Column
        var periodeCell = newRow.insertCell(1);
        var inputPeriode = document.createElement("input");
        inputPeriode.type = "text";
        inputPeriode.className = "form-control";
        inputPeriode.name = 'periode[]';
        periodeCell.appendChild(inputPeriode);

        // Kolom APD
        var apdCell = newRow.insertCell(2);
        var selectAPD = document.createElement("select");
        selectAPD.className = "form-control searchableDropdown";
        selectAPD.name = 'apd[]';
        // Tambahkan event listener untuk dropdown APD
        selectAPD.addEventListener('change', function() {
            var selectUkuran = this.parentNode.nextElementSibling.querySelector('select[name="ukuran[]"]');
            loadUkuranData(selectUkuran, this); // Panggil fungsi untuk memuat data ukuran saat dropdown APD berubah
        });
        // Salin opsi dropdown dari dropdown pertama ke dropdown yang baru ditambahkan
        var originalAPDDropdown = document.getElementById('apdDropdown');
        for (var j = 0; j < originalAPDDropdown.options.length; j++) {
            var option = document.createElement("option");
            option.value = originalAPDDropdown.options[j].value;
            option.text = originalAPDDropdown.options[j].text;
            selectAPD.appendChild(option);
        }
        apdCell.appendChild(selectAPD);

        // Ukuran Column
        var ukuranCell = newRow.insertCell(3);
        var selectUkuran = document.createElement("select");
        selectUkuran.className = "form-control searchableDropdown";
        selectUkuran.name = 'ukuran[]';
        ukuranCell.appendChild(selectUkuran);

        // Jumlah Column
        var jumlahCell = newRow.insertCell(4);
        var inputJumlah = document.createElement("input");
        inputJumlah.type = "text";
        inputJumlah.className = "form-control";
        inputJumlah.name = 'jumlah[]';
        jumlahCell.appendChild(inputJumlah);

        // Delete Button Column
        var actionCell = newRow.insertCell(5);
        var deleteButton = document.createElement("button");
        deleteButton.innerHTML = "Hapus";
        deleteButton.className = "btn btn-danger";
        deleteButton.onclick = function() {
            var row = this.parentNode.parentNode;
            row.parentNode.removeChild(row);
        };
        actionCell.appendChild(deleteButton);

        // Reinitialize Select2 for the new dropdowns
        $('.searchableDropdown').select2({
            placeholder: 'Pilih Opsi'
        });
    }

</script>

