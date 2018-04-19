<?php foreach ($kembali as $b): ?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h4>Kembalikan Barang</h4>
			<span class="close" data-dismiss="modal">&times;</span>
		</div>
		<div class="modal-body">
			<div class="alert alert-warning">
				<i class="fa fa-warning"></i> &nbsp;<small>Cek lagi jumlah & kondisi barang yang akan dikembalikan</small>
			</div>
			<table class="">
				<tr>
					<td width=200>Kode</td>
					<td width=25>:</td>
					<td width=200><?=$b->kode_pinjam?></td>
				</tr>
				<tr>
					<td width=200>Nama Barang</td>
					<td width=25>:</td>
					<td width=200><?=$b->nama_barang?></td>
				</tr>
				<tr>
					<td width=200>Tanggal Pinjam</td>
					<td width=25>:</td>
					<td width=200><?=$b->tgl_pinjam?></td>
				</tr>
				<tr>
					<td width=200>Tanggal Kembali</td>
					<td width=25>:</td>
					<td width=200><?=$b->tgl_kembali?></td>
				</tr>
				<tr>
					<td width=200>Banyak Pinjaman</td>
					<td width=25>:</td>
					<td width=200><?=$b->jml_pinjam?></td>
				</tr>
				<tr>
					<td width=200>Pengembalian</td>
					<td width=25>:</td>
					<td width=200>
						<div class="form-group input-group-sm">
							<input type="hidden" name="kopin" class="form-control" required value="<?=$b->kode_pinjam?>">
							<input type="hidden" name="kode" class="form-control" required value="<?=$b->kode_barang?>">
							<input type="number" name="kembali" style="margin-top: 15px" max="<?=$b->jml_pinjam?>" id="kembali" class="form-control" placeholder="Jumlah Barang kembali" required>
						</div>
					</td>
				</tr>
				<tr>
					<td width=200>Peminjam</td>
					<td width=25>:</td>
					<td width=200><?=$b->peminjam?></td>
				</tr>
				<tr>
					<td width=200>Keterangan</td>
					<td width=25>:</td>
					<td width=200><?=$b->keterangan?></td>
				</tr>
			</table>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Kembalikan</button>
		</div>
	</div>
</div>
<?php endforeach ?>
<script>
	$('#jml_pinjam').keyup(function(event) {
		$('#sisa').val(parseInt($('#stok').val()) - parseInt($('#jml_pinjam').val()))
	});
</script>