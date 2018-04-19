<?php foreach ($barangInfo as $b): ?>
<div class="modal-dialog modal-sm">
	<div class="modal-content">
		<div class="modal-header text-center">
			<h4>Info Barang</h4>
			<span class="close" data-dismiss="modal">&times;</span>
		</div>
		<div class="modal-body">
			<table class="">
				<tr>
					<td width=200>Kode</td>
					<td width=25>:</td>
					<td width=200><?=$b->kode_barang?></td>
				</tr>
				<tr>
					<td width=200>Nama Barang</td>
					<td width=25>:</td>
					<td width=200><?=$b->nama_barang?></td>
				</tr>
				<tr>
					<td width=200>Spesifikasi</td>
					<td width=25>:</td>
					<td width=200><?=$b->spesifikasi?></td>
				</tr>
				<tr>
					<td width=200>Lokasi Barang</td>
					<td width=25>:</td>
					<td width=200><?=$b->lokasi_barang?></td>
				</tr>
				<tr>
					<td width=200>Kategori</td>
					<td width=25>:</td>
					<td width=200><?=$b->kategori?></td>
				</tr>
				<tr>
					<td width=200>Banyak Barang</td>
					<td width=25>:</td>
					<td width=200><?=$b->jml_barang?></td>
				</tr>
				<tr>
					<td width=200>Kondisi</td>
					<td width=25>:</td>
					<td width=200><?=$b->kondisi?></td>
				</tr>
				<tr>
					<td width=200>Jenis Barang</td>
					<td width=25>:</td>
					<td width=200><?=$b->jenis_barang?></td>
				</tr>
				<tr>
					<td width=200>Anggaran</td>
					<td width=25>:</td>
					<td width=200><?=$b->sumber_dana?></td>
				</tr>
			</table>
		</div>
	</div>
</div>
<?php endforeach ?>