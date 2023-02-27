<div class="row col-md-12 ini_bodi">
  <div class="panel panel-info">
    <div class="panel-heading">Data Kelompok Soal
      <div class="tombol-kanan">
        <a class="btn btn-success btn-sm tombol-kanan" href="#" onclick="return m_kel_soal_e(0);"><i class="glyphicon glyphicon-plus"></i> &nbsp;&nbsp;Tambah</a>
      </div>
    </div>
    <div class="panel-body">


      <table class="table table-bordered" id="datatabel">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th width="32%">Nama</th>
			<th width="23">Kategori</th>
            <th width="15%">Passing Grade</th>
            <th width="15%">Aksi</th>
          </tr>
        </thead>

        <tbody>
        </tbody>
      </table>
    
      </div>
    </div>
  </div>
</div>
                    




<div class="modal fade" id="m_kel_soal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="myModalLabel">Data Kategori Soal</h4>
      </div>
      <div class="modal-body">
          <form name="f_kel_soal" id="f_kel_soal" onsubmit="return m_kel_soal_s();">
            <input type="hidden" name="id" id="id" value="0">
              <table class="table table-form">
                <tr><td style="width: 25%">Nama</td><td style="width: 75%"><input type="text" class="form-control" name="nama" id="nama" required></td></tr>				
				<tr><td style="width: 25%">Kategori Soal</td><td style="width: 75%"><?php echo form_dropdown('id_mapel', $p_mapel, '', 'class="form-control" id="id_mapel" required'); ?></td></tr>				
                <tr><td style="width: 25%">Passing Grade</td><td style="width: 75%"><input type="text" class="form-control" name="grade" id="grade" required></td></tr>
              </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary"><i class="fa fa-check"></i> Simpan</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="fa fa-minus-circle"></i> Tutup</button>
      </div>
        </form>
    </div>
  </div>
</div>
