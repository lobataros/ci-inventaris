<h3><?=$pageHeader?></h3>
<?=$this->session->flashdata('gagal')?>
<!-- <button class="btn btn-success float-right" data-toggle="modal" data-target="#tambahBrg" style="margin-top: -45px; margin-bottom: 5px"><i class="fa fa-plus-circle"></i> Tambah Barang</button> -->
<table class="table table-hover table-responsive" style="width: 100%">
	<thead class="bg-accent">
		<th>No</th>
		<th>Kode</th>
		<th width="200">Nama</th>
		<th>Kategori</th>
		<th>Banyak</th>
		<th>Kondisi</th>
		<th width="100">Aksi</th>
	</thead>
	<tbody>
		<?php $no=1;foreach ($db['barang'] as $b): ?>
		<tr>
			<td><?=$no++?></td>
			<td><?=$b->kode_barang?></td>
			<td><?=$b->nama_barang?></td>
			<td><?=$b->kategori?></td>
			<td><?=$b->jml_barang?></td>
			<td><?=$b->kondisi?></td>
			<td class="btn-group">
				<a href="#" title="Info" data-action="<?=base_url('user/barang/info')?>" data-kode="<?=$b->kode_barang?>" data-toggle="modal" data-target="#info" class="btn btn-sm btn-info"><i class="fa fa-info-circle"></i></a>
				<a href="#" title="Pinjamkan" data-action="<?=base_url('user/transaksi/pinjamkan')?>" data-kode="<?=$b->kode_barang?>" data-toggle="modal" data-target="#pinjamkan" class="btn btn-sm btn-warning"><i class="fa fa-arrow-up"></i></a>
				<a href="<?=base_url('user/admin/barang')?>" title="Edit Barang"class="btn btn-sm btn-success"><i class="fa fa-gear"></i></a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>

<div class="modal" id="info">
</div>

<form method="post" action="<?=base_url('user/transaksi/pinjamkan_proses')?>" class="modal" id="pinjamkan">
</form>