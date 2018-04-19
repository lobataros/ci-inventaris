<?php foreach ($pinjaman as $b): ?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header text-center">
			<h4>Info Peminjaman</h4>
			<span class="close" data-dismiss="modal">&times;</span>
		</div>
		<div class="modal-body">
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
					<td width=200>Peminjam</td>
					<td width=25>:</td>
					<td width=200><?=$b->peminjam?></td>
				</tr>
				<tr>
					<td width=200>Keterangan</td>
					<td width=25>:</td>
					<td width=200><?=$b->keterangan?></td>
				</tr>
				<tr>
					<td width=200>Status Dikembalikan</td>
					<td width=25>:</td>
					<td width=200><?=($b->status==1)?'<strong>SUDAH DIKEMBALIKAN</strong>':'<strong>BELUM DIKEMBALIKAN</strong>'?></td>
				</tr>
			</table>
		</div>
	</div>
</div>
<?php endforeach ?>