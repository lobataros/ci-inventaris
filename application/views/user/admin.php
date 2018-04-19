<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title><?=$pageTitle?></title>
	<link rel="stylesheet" href="<?=base_url('assets/styles/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/styles/css/font-awesome.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/styles/css/app.css')?>">
</head>
<body>
	
	<header>
		<nav class="navbar navbar-expand-lg navbar-light" id="login">
			<a href="<?=base_url('user/admin')?>" class="navbar-brand">Aplikasi Inventaris & SarPras SMK</a>
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Master</a>
						<div class="dropdown-menu">
							<?php if ($this->session->userdata('lvl')=='1'): ?>
							<a href="<?=base_url('user/user')?>" class="dropdown-item">Master User</a>
							<?php endif ?>
							<a href="<?=base_url('user/admin/barang')?>" class="dropdown-item">Master Barang</a>
							<a href="<?=base_url('user/supplier')?>" class="dropdown-item">Master Supplier</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Transaksi</a>
						<div class="dropdown-menu">
							<a href="<?=base_url('user/transaksi/peminjaman')?>" class="dropdown-item">Peminjaman</a>
							<a href="<?=base_url('user/transaksi/pengembalian')?>" class="dropdown-item">Pengembalian</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Laporan</a>
						<div class="dropdown-menu">
							<a href="#" data-toggle="modal" data-target="#lapBM" class="dropdown-item">Barang Masuk</a>
							<a href="#" data-toggle="modal" data-target="#lapP" class="dropdown-item">Peminjaman</a>
							<a href="#" data-toggle="modal" data-target="#lapPp" class="dropdown-item">Pengembalian</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?=$this->session->userdata('nama')?></a>
						<div class="dropdown-menu">
							<a href="#" class="dropdown-item">Ganti Password</a>
							<a href="<?=base_url('auth/logout')?>" class="dropdown-item">Keluar</a>
						</div>
					</li>
					<li class="nav-item">
						<a href="#" data-toggle="modal" data-target="#infoapp" class="nav-link">Help / Info</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
<br>
	<section id="content" class="container-fluid">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<?php (isset($pageContent)) ? $this->load->view($pageContent) : '' ?>
			</div>
			<!-- <div class="col-md-3">
				<div class="card">
					<div class="card-body text-center">
						<?=$this->session->userdata('nama')?><br>
						<?=$this->session->userdata('uname')?><br>
						<?=$this->session->userdata('lvl')?><br>
						<?='ONLINE'?>
					</div>
				</div>
			</div> -->
		</div>
	</section>

	<div class="modal fade" id="infoapp">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Info Aplikasi</h4>
					<span class="close" data-dismiss="modal">&times;</span>
				</div>
				<div class="modal-body">
					<p>Aplikasi Inventaris & Sarana Prasarana SMK <br>v0.1 BETA</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<form class="modal" id="lapBM" method="post" action="<?=base_url('user/barang/report_masuk')?>">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<h5 class="text-center">Laporan Barang Masuk</h5><br>
					<!-- <div class="form-group input-group-sm">
						Rentang Awal<input type="date" name="awal" class="form-control">
					</div>
					<div class="form-group input-group-sm">
						Rentang Akhir<input type="date" name="awal" class="form-control">
					</div> -->
					<!-- <input type="submit" class="btn btn-info btn-block" value="Unduh Kustom Laporan"> -->
					<a class="btn btn-info btn-block" href="<?=base_url('user/barang/report_masuk')?>">Unduh Laporan Keseluruhan</a>
				</div>
			</div>
		</div>
	</form>

	<script type="text/javascript" src="<?=base_url('assets/styles/js/jquery.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/styles/js/popper.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/styles/js/bootstrap.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/styles/js/app.js')?>"></script>
</body>
</html>