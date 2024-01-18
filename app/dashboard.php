<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <select id="periode-filter" class="form-control">
      <option value="">Semua Periode</option>
      <?php
      // Mengurutkan array $periodes dari yang terkecil ke yang terbesar
      sort($periodes);

      foreach ($periodes as $periode) {
          echo "<option value='$periode'>$periode</option>";
      }
      ?>
  </select>
    <br></br>
    <div id="report-pch" class="row"></div>

    </div>
      <!-- /.row -->
      <!-- Main row -->
    <div class="row">
      <!-- Left col -->

      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->

      <!-- right col -->
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>