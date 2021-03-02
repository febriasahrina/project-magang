<?php
  header("Content-type: application/vnd.ms-word");
  header("Content-Disposition: attachment;Filename=Laporan Mingguan.doc");

  
  $start_date = $date[0];
  $end_date = $date[1];

  $start = date_parse_from_format("Y-m-d", $start_date);
  $end = date_parse_from_format("Y-m-d", $end_date);

  $monthStart = DateTime::createFromFormat('!m', $start["month"]);
  $monthNameStart = $monthStart->format('F'); 

  $monthEnd = DateTime::createFromFormat('!m', $end["month"]);
  $monthNameEnd = $monthEnd->format('F'); // March
?>
<style type="text/css">
  .fontexport{
    font: 11pt Calibri, sans-serif;
    font-weight: bold;
    text-decoration: underline;
  }

  .fontsub{
    font: 11pt Calibri, sans-serif;
  }

  table.fontsub, table.fontsub td, table.fontsub th {
    border: none;
}

  table, td, th {
   border: 1px solid black;
  }

  table.isi {
    width: 100%;
    border-collapse: collapse;
  }

  .grid-container {
    display: grid;
    grid-template-columns: auto auto auto;
    padding: 3px;
  }
</style>
<body>
  <p align="center">
    <img src="<?php echo base_url();?>assets/logo/logo_export.png" style="width: 50px">
  </p>
  <p class="fontexport" align="center">RENCANA KERJA MINGGUAN WORK FROM HOME (WFH)</p>
  <br>
  <table class="fontsub" style="border: none;">
    <tr>
      <td>NAMA</td>
      <td>:</td>
      <td><?php echo strtoupper($this->session->userdata('nama_lengkap')); ?></td>
    </tr>
    <tr>
      <td>BIDANG</td>
      <td>:</td>
      <td>UNIVERSITAS CORPORAT</td>
    </tr>
    <tr>
      <td>PERIODE</td>
      <td>:</td>
      <td><?php echo $start["day"].' '.$monthNameStart.' - '.$end["day"].' '.$monthNameEnd.' '.$start["year"] ?></td>
    </tr>
  </table>
  <br>
  <table class="isi" style="border: 1px solid black;">
    <tr>
      <th>No</th>
      <th>Nama Pekerjaan</th>
      <th>Uraian Pekerjaan</th>
      <th>Jenis Pekerjaan</th>
      <th>Bukti Pekerjaan</th>
    </tr>
    <?php
      $no=1;
      foreach ($laporan as $key): 
    ?>
    <tr>
      <td align="center"><?php echo $no++ ?></td>
      <td><?php echo $key->nama_pekerjaan; ?></td>
      <td><?php echo $key->detail_pekerjaan; ?></td>
      <td align="center">Rutin</td>
      <td></td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>