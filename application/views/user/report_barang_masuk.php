<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Aloha</title>
	<link rel="stylesheet" href="<?=base_url('assets/styles/css/bootstrap.min.css')?>">
	<style>
		p {
			line-height: 3px !important;
		}
	</style>
</head>
<body>
	<h4 class="text-center"><strong>SMK LUGINA RANCAEKEK</strong></h4>
	<h6 class="text-center">Jl. Rancaekek</h6>
	<hr>
	<p class="text-center"><b><u>LAPORAN BARANG MASUK</u></b></p>
	<p class="text-center"><?=date('d M Y')?></p>
	<p class="text-center">No.<?='L.MSK/'.date('Y/d')?></p>
	<br>

	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Kode</th>
			<th>Nama</th>
			<th>Tanggal Masuk</th>
			<th>Banyak</th>
			<th>Supplier</th>
		</tr>
		<?php $no=1;foreach ($barang as $b): ?>
		<tr>
			<td><?=$no++?></td>
			<td><?=$b->kode_barang?></td>
			<td><?=$b->nama_barang?></td>
			<td><?=$b->tgl_masuk?></td>
			<td><?=$b->jml_masuk?></td>
			<td><?=$b->kode_supplier?></td>
		</tr>
		<?php endforeach ?>
</table>
</body>
</html>