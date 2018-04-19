<?php foreach ($supedit as $b): ?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h4>Edit Supplier</h4>
			<span class="close" data-dismiss="modal">&times;</span>
		</div>
		<div class="modal-body">
			<div class="modal-body">
				<div class="form-group input-group-sm">
					<input type="hidden" name="kode" value="<?=$b->kode_supplier?>">
					<input type="text" name="nama" class="form-control" placeholder="Nama Supplier" maxlength="15" required autofocus value="<?=$b->nama_supplier?>">
				</div>
				<div class="form-group input-group-sm">
					<input type="text" name="alamat" class="form-control" placeholder="Alamat" maxlength="40" required value="<?=$b->alamat_supplier?>">
				</div>
				<div class="form-group input-group-sm">
					<input type="number" name="telp" class="form-control" placeholder="Telepon" max="999999999999999" required value="<?=$b->telp_supplier?>">
				</div>
				<div class="form-group input-group-sm">
					<input type="text" name="kota" class="form-control" placeholder="Kota Supplier" maxlength="20" required value="<?=$b->kota_supplier?>">
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
		</div>
	</div>
</div>
<?php endforeach ?>