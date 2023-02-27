<?php 
$uri4 = $this->uri->segment(4);
?>

<div class="row col-md-12 ini_bodi">
  <div class="panel panel-info">
    <div class="panel-heading">Daftar Hasil Tes
     <div class="tombol-kanan">
		<a href='<?php echo base_url(); ?>adm/hasil_ujian_excel/<?php echo $uri4; ?>' class='btn btn-warning btn-sm' target='_blank'><i class='glyphicon  glyphicon-download-alt'></i> Export xls</a>
        <!--<a href='#' onclick="return preset(<?=$uri4?>)" class='btn btn-info btn-sm' ><i class='glyphicon glyphicon-refresh'></i> Preset</a>-->
        <a href='<?php echo base_url(); ?>adm/hasil_ujian_cetak/<?php echo $uri4; ?>' class='btn btn-success btn-sm' target='_blank'><i class='glyphicon glyphicon-print'></i> Cetak</a>
      </div>
    </div>
    <div class="panel-body">

      <div class="col-lg-12 alert alert-warning" style="margin-bottom: 20px">
        <div class="col-md-6">
            <table class="table table-bordered" style="margin-bottom: 0px">
              <tr><td>Kategori Soal</td><td><?php echo $detil_tes->namaMapel; ?></td></tr>
              <tr><td>Pengampu</td><td><?php echo $detil_tes->nama_guru; ?></td></tr>
              <tr><td width="30%">Nama Ujian</td><td width="70%"><?php echo $detil_tes->nama_ujian; ?></td></tr>
              <tr><td>Waktu</td><td><?php echo $detil_tes->waktu; ?> menit</td></tr>
            </table>
        </div>
        <!--<div class="col-md-2"></div>-->
        <div class="col-md-6">
            <table class="table table-bordered" style="margin-bottom: 0px">
              <tr><td width="30%">Jumlah Soal</td><td><?php echo $detil_tes->jumlah_soal; ?></td></tr>
              <tr><td>Tertinggi</td><td><?php echo $statistik->max_; ?></td></tr>
              <tr><td>Terendah</td><td><?php echo $statistik->min_; ?></td></tr>
              <tr><td>Rata-rata</td><td><?php echo number_format($statistik->avg_); ?></td></tr>
            </table>
        </div>
      </div>


      <table class="table table-bordered" id="datatabel">
        <thead>
          <tr>
            <th width="5%">No</th>
			<th width="15%">ID Peserta</th>
            <th width="40%">Nama Peserta</th>
            <th width="12%">Kelompok</th>
            <!-- <th width="15%">Jumlah Benar</th> -->
            <th width="15%">Detail Nilai</th>
			<th width="10%">Total Nilai</th>
			<th>Hasil</th>
            <!--<th width="15%">Nilai Bobot</th>-->
            <th width="10%">Review</th><!-- ///////////////// -->
            <th width="10%">Aksi</th>
          </tr>
        </thead>

        <tbody>
        </tbody>
      </table>
    
      </div>
    </div>
  </div>
</div>


<!-- review -->
<div class="modal fade" id="m_hasil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="myModalLabel">Review Hasil Ujian</h4>
      </div>
      <div class="modal-body" style="height:70vh; overflow-y:auto;">
        <!--<a href='<?php echo base_url(); ?>' id="printreview" class='btn btn-info btn-sm' target='_blank'><i class='glyphicon glyphicon-print'></i> Cetak</a>-->
          <table id="tabelreview" class="table table-form">
            <thead>
              <th>#</th>
              <th>Soal</th>
              <th>Kunci Jawaban</th>
              <th>Jawaban</th>
            </thead>
            <tbody>
              
            </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary nextbtn"><i class="fa fa-check"></i> Update</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="fa fa-minus-circle"></i> Tutup</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="u_hasil" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="myModalLabel">Update Hasil Ujian</h4>
      </div>
      <div class="modal-body" style="height:70vh; overflow-y:auto;">
          <input type="hidden" name="id" id="id" value="0">
          <input type="hidden" name="idtes" id="ujian" value="0">
          <table id="tabelrevu" class="table table-form">
            <thead>
              <th>#</th>
              <th>Soal</th>
              <th>Kunci Jawaban</th>
              <th>Jawaban</th>
              <th>-</th>
            </thead>
            <tbody>
              
            </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary updatebtn"><i class="fa fa-check"></i> Simpan</button>
        <button class="btn backbtn"><i class="fa fa-back"></i> Kembali</button>
      </div>
    </div>
  </div>
</div>


<div id="overlay" style="display: none;position: fixed; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, .5); z-index: 2020;">
  <div style="position: absolute; top: 50%; left: 50%; font-size: 50px; color: #fff; transform: translate(-50%,-50%); -ms-transform: translate(-50%,-50%);">Loading...</div>
</div>