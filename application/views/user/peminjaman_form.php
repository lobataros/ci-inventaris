<?php foreach ($peminjaman as $b): ?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h4>Pinjamkan Barang</h4>
			<span class="close" data-dismiss="modal">&times;</span>
		</div>
		<div class="modal-body">
			<div class="form-group input-group-sm">
				<input type="hidden" name="kode" class="form-control" required value="<?=$b->kode_barang?>">
				<input type="text" name="nama" class="form-control" placeholder="Nama Barang" maxlength="30" required autofocus value="<?=$b->nama_barang?>" readonly>
			</div>
			<div class="form-group input-group-sm">
				<input type="number" name="stok" id="stok" class="form-control" placeholder="Stok" maxlength="5" required value="<?=$b->jml_barang?>" readonly>
			</div>
			<div class="form-group input-group-sm">
				<input type="number" name="jml_pinjam" id="jml_pinjam" max="<?=$b->jml_barang?>" class="form-control" placeholder="Banyak Barang yang dipinjam" maxlength="5" required>
			</div>
			<div class="form-group input-group-sm">
				<input type="number" name="sisa" id="sisa" class="form-control" placeholder="Sisa Stok" required readonly>
			</div>
			<div class="form-group input-group-sm">
				<input type="text" name="peminjam" class="form-control" placeholder="Peminjam" maxlength="20" required>
			</div>
			<div class="form-group input-group-sm">
				<input type="date" name="kembali" class="form-control" placeholder="Tanggal Kembali" required>
			</div>
			<div class="form-group input-group-sm">
				<input type="text" name="keterangan" class="form-control" placeholder="Keterangan" maxlength="50" required>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Pinjamkan</button>
		</div>
	</div>
</div>
<?php endforeach ?>
<script>
	$('#jml_pinjam').keyup(function(event) {
		$('#sisa').val(parseInt($('#stok').val()) - parseInt($('#jml_pinjam').val()))
	});
</script>