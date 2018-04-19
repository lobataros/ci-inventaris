<h3><?=$pageHeader?></h3>
<!-- <button class="btn btn-success float-right" data-toggle="modal" data-target="#tambahBrg" style="margin-top: -45px; margin-bottom: 5px"><i class="fa fa-plus-circle"></i> Tambah Barang</button> -->
<table class="table table-hover table-responsive" style="width: 100%">
	<thead class="bg-accent">
		<th>No</th>
		<th>Kode</th>
		<th>Nama Barang</th>
		<th>Banyak</th>
		<th>Peminjam</th>
		<th>Tanggal Kembali</th>
		<th width="100">Aksi</th>
	</thead>
	<tbody>
		<?php $no=1;foreach ($db['pinjam'] as $b): ?>
		<tr>
			<td><?=$no++?></td>
			<td><?=$b->kode_pinjam?></td>
			<td><?=$b->nama_barang?></td>
			<td><?=$b->jml_pinjam?></td>
			<td><?=$b->peminjam?></td>
			<td><?=$b->tgl_kembali?></td>
			<td class="btn-group">
				<a href="#" title="Info" data-action="<?=base_url('user/transaksi/pinjam_info')?>" data-kode="<?=$b->kode_pinjam?>" data-toggle="modal" data-target="#infoku" class="btn btn-sm btn-info"><i class="fa fa-info-circle"></i></a>
				<a href="#" title="Kembalikan" data-action="<?=base_url('user/transaksi/kembalikan_form')?>" data-kode="<?=$b->kode_pinjam?>" data-toggle="modal" data-target="#kembalikan" class="btn btn-sm btn-warning"><i class="fa fa-arrow-down"></i></a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>

<div class="modal" id="infoku">
</div>

<form method="post" action="<?=base_url('user/transaksi/kembalikan_proses')?>" class="modal" id="kembalikan">
</form>