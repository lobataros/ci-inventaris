<?php foreach ($barangEdit as $b): ?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h4>Edit Barang</h4>
			<span class="close" data-dismiss="modal">&times;</span>
		</div>
		<div class="modal-body">
			<div class="form-group input-group-sm">
				<input type="hidden" name="kode" class="form-control" required value="<?=$b->kode_barang?>">
				<input type="text" name="nama" class="form-control" placeholder="Nama Barang" maxlength="30" required autofocus value="<?=$b->nama_barang?>">
			</div>
			<div class="form-group input-group-sm">
				<input type="text" name="spek" class="form-control" placeholder="Spesifikasi" maxlength="35" required value="<?=$b->spesifikasi?>">
			</div>
			<div class="form-group input-group-sm">
				<input type="text" name="lokasi" class="form-control" placeholder="Lokasi Barang" maxlength="20" required value="<?=$b->lokasi_barang?>">
			</div>
			<div class="form-group input-group-sm">
				<select name="kategori" required class="form-control">
					<option value="">-- KATEGORI --</option>
					<option value="Elektronik" <?=($b->kategori=='Elektronik') ? 'selected' : ''?>>Elektronik</option>
					<option value="Non Elektronik" <?=($b->kategori!='Elektronik') ? 'selected' : ''?>>Non Elektronik</option>
				</select>
			</div>
			<div class="form-group input-group-sm">
				<select name="kondisi" required class="form-control">
					<option value="">-- KONDISI --</option>
					<option value="Layak Pakai" <?=($b->kondisi=='Layak Pakai') ? 'selected' : ''?>>Layak Pakai</option>
					<option value="Tak Layak Pakai" <?=($b->kondisi!='Layak Pakai') ? 'selected' : ''?>>Tak Layak Pakai</option>
				</select>
			</div>
			<div class="form-group input-group-sm">
				<select name="jenis" required class="form-control">
					<option value="">-- JENIS --</option>
					<option value="Padat" <?=($b->jenis_barang=='Padat') ? 'selected' : ''?>>Padat</option>
					<option value="Gas" <?=($b->jenis_barang=='Gas') ? 'selected' : ''?>>Gas</option>
					<option value="Cair" <?=($b->jenis_barang=='Cair') ? 'selected' : ''?>>Cair</option>
				</select>
			</div>
			<div class="form-group input-group-sm">
				<input type="text" name="sd" class="form-control" placeholder="Sumber Dana" maxlength="25" required value="<?=$b->sumber_dana?>">
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
		</div>
	</div>
</div>
<?php endforeach ?>