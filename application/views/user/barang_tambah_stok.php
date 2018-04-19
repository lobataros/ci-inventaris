<?php foreach ($db['barangStok'] as $b): ?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h4>Tambah Stok Barang</h4>
			<span class="close" data-dismiss="modal">&times;</span>
		</div>
		<div class="modal-body">
			<div class="form-group input-group-sm">
				<input type="hidden" name="kode" class="form-control" required value="<?=$b->kode_barang?>">
				<input type="text" name="nama" class="form-control" placeholder="Nama Barang" maxlength="30" required readonly value="<?=$b->nama_barang?>">
			</div>
			<div class="form-group input-group-sm">
				<input type="number" name="stokawal" id="stokawal" class="form-control" placeholder="Stok Awal" maxlength="5" required value="<?=$b->jml_barang?>" readonly>
			</div>
			<div class="form-group input-group-sm">
				<input type="number" name="stoktambah" id="stoktambah" class="form-control" placeholder="Tambahkan" maxlength="5" required>
			</div>
			<div class="form-group input-group-sm">
				<input type="number" name="stokakhir" id="stokakhir" class="form-control" placeholder="Total" maxlength="5" required readonly>
			</div>
			<div class="form-group input-group-sm">
				<select name="supplier" required class="form-control">
					<option value="">-- SUPLIER --</option>
					<?php foreach ($db['supplier'] as $s): ?>
					<option value="<?=$s->kode_supplier?>"><?=$s->nama_supplier?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group input-group-sm">
				<input type="text" name="keterangan" class="form-control" placeholder="Keterangan" maxlength="30" required>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
		</div>
	</div>
</div>
<?php endforeach ?>
<script>
	$('#stoktambah').keyup(function(event) {
		$('#stokakhir').val(parseInt($('#stoktambah').val()) + parseInt($('#stokawal').val()))
	});
</script>