<?php foreach ($uedit as $b): ?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h4>Edit Supplier</h4>
			<span class="close" data-dismiss="modal">&times;</span>
		</div>
		<div class="modal-body">
			<div class="modal-body">
				<div class="form-group input-group-sm">
					<input type="hidden" name="id" value="<?=$b->id_user?>">
					<input type="text" name="nama" class="form-control" placeholder="Nama User" maxlength="20" required autofocus value="<?=$b->nama?>">
				</div>
				<div class="form-group input-group-sm">
					<input type="text" name="pass" class="form-control" placeholder="Password" maxlength="15" required>
				</div>
				<div class="form-group input-group-sm">
					<select name="akses" class="form-control">
						<option value="">-- PILIH HAK AKSES --</option>
						<option value="0" <?=($b->level==0)?'selected':''?>>Kepsek Sarana Prasarana</option>
						<option value="1" <?=($b->level==1)?'selected':''?>>Administrator</option>
					</select>
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