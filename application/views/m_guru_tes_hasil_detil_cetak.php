<!DOCTYPE html>
<html>
<head>
  <title>Laporan Hasil Ujian</title>
  <link href='<?php echo base_url(); ?>___/css/style_print.css' rel='stylesheet' media='' type='text/css'/>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>___/img/favicon.ico">
</head>
<body>

<h3>Laporan Hasil Ujian</h3>
<hr style="border: solid 1px #000"><br>

<h4>Detil Ujian</h4>
<table class="table-bordered" style="margin-bottom: 0px">
  <tr><td width="30%">Kategori Soal</td><td><b><?php echo $detil_tes->namaMapel; ?></b></td></tr>
  <tr><td>Pengampu</td><td width="70%"><b><?php echo $detil_tes->nama_guru; ?></b></td></tr>
  <tr><td>Nama Ujian</td><td width="70%"><b><?php echo $detil_tes->nama_ujian; ?></b></td></tr>
  <tr><td>Jumlah Soal</td><td><b><?php echo $detil_tes->jumlah_soal; ?></b></td></td></tr>
  <tr><td>Waktu</td><td><b><?php echo $detil_tes->waktu; ?> menit</b></td></tr>
  <tr><td>Tertinggi</td><td><b><?php echo $statistik->max_; ?></b></td></tr>
  <tr><td>Terendah</td><td><b><?php echo $statistik->min_; ?></b></td></tr>
  <tr><td>Rata-rata</td><td><b><?php echo number_format($statistik->avg_); ?></b></td></tr>
</table>
<br><br>
<h4>Hasil Ujian</h4>
<table class="table-bordered">
  <thead>
    <tr>
      <th width="5%">No</th>
	  <th width="10%">ID Peserta</th>
      <th width="25%">Nama Peserta</th>
      <th width="20%">Kelompok</th>
      <!--<th width="15%">Jumlah Benar</th>-->
	  <th width="15%">Detail Nilai</th>
      <th width="10%">Total Nilai</th>
	  <th width="15">Hasil</th>
      <!--<th width="15%">Nilai Bobot</th>-->
    </tr>
  </thead>

	<tbody>
	<?php 
		if (!empty($hasil)) {
			$no = 1;
			foreach ($hasil as $d) {
				$tr =  '<tr>
					<td class="ctr">'.$no.'</td>
					<td>'.$d->nim.'</td>
					<td>'.$d->nama.'</td>
					<td>'.$d->jurusan.'</td>
					<!--<td class="ctr">'.$d->jml_benar.'</td>-->';                
				
				
				$bobot_kel = json_decode($d->bobot_kel);
				
				$str_temp = '';
				
				$lulus = true;
				foreach($bobot_kel as $key => $value){
					$kel_soal = $this->db->query("SELECT nama, grade FROM m_kel_soal WHERE id=$key")->row_array();
					$str_temp .= $kel_soal['nama'] . ' : ' . round($value, 2) . '<br>';
					
					if($kel_soal['grade'] > $value)
						$lulus = false;
				}
				
				$tr .= '<td class="">'. $str_temp . '</td>';
				
				$tr.= '<td>' . $d->nilai . '</td>';
				
				if($this->config->item('pass_grade_kel')){
					if($lulus)
						$tr .= '<td class="ctr">Lulus</td>';
					else
						$tr .= '<td class="ctr">Tidak Lulus</td>';
				}
				else{
					if($d['grade'] <= $d['nilai'])
						$tr .= '<td class="ctr">Lulus</td>';
					else
						$tr .= '<td class="ctr">Tidak Lulus</td>';
				}
				
				
				//$tr .= '<td></td>
				
				
                $tr.= '<!--<td class="ctr">'.$d->nilai_bobot.'</td>-->
                </tr>';
				
                echo $tr;
				
				$no++;
			}
		} else {
			echo '<tr><td colspan="5">Belum ada data</td></tr>';
		}
	?>
  </tbody>
</table>


</body>
</html>
