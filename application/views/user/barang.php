<h3><?=$pageHeader?></h3>
<button class="btn btn-success float-right" data-toggle="modal" data-target="#tambahBrg" style="margin-top: -45px; margin-bottom: 5px"><i class="fa fa-plus-circle"></i> Tambah Barang</button>
<table class="table table-hover table-responsive" style="width: 100%">
	<thead class="bg-accent">
		<th>No</th>
		<th>Kode</th>
		<th width="130">Nama</th>
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
				<a href="#" title="Tambah Stok" data-action="<?=base_url('user/barang/stok_form')?>" data-kode="<?=$b->kode_barang?>" data-toggle="modal" data-target="#addStok" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i></a>
				<a href="#" title="Edit Barang" data-action="<?=base_url('user/barang/edit')?>" data-kode="<?=$b->kode_barang?>" data-toggle="modal" data-target="#edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
				<a title="Hapus Barang" href="<?=base_url("user/barang/hapus/$b->kode_barang")?>" onclick="return confirm('Yakin akan menghapus barang dipilih ?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>

<form action="<?=base_url('user/barang/tambah')?>" method="post" class="modal" id="tambahBrg">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Barang</h4>
				<span class="close" data-dismiss="modal">&times;</span>
			</div>
			<div class="modal-body">
				<div class="form-group input-group-sm">
					<input type="text" name="nama" class="form-control" placeholder="Nama Barang" maxlength="30" required autofocus>
				</div>
				<div class="form-group input-group-sm">
					<input type="text" name="spek" class="form-control" placeholder="Spesifikasi" maxlength="35" required>
				</div>
				<div class="form-group input-group-sm">
					<input type="text" name="lokasi" class="form-control" placeholder="Lokasi Barang" maxlength="20" required>
				</div>
				<div class="form-group input-group-sm">
					<select name="kategori" required class="form-control">
						<option value="">-- KATEGORI --</option>
						<option value="Elektronik">Elektronik</option>
						<option value="Non Elektronik">Non Elektronik</option>
					</select>
				</div>
				<div class="form-group input-group-sm">
					<select name="kondisi" required class="form-control">
						<option value="">-- KONDISI --</option>
						<option value="Layak Pakai">Layak Pakai</option>
						<option value="Tak Layak Pakai">Tak Layak Pakai</option>
					</select>
				</div>
				<div class="form-group input-group-sm">
					<select name="jenis" required class="form-control">
						<option value="">-- JENIS --</option>
						<option value="Padat">Padat</option>
						<option value="Gas">Gas</option>
						<option value="Cair">Cair</option>
					</select>
				</div>
				<div class="form-group input-group-sm">
					<input type="text" name="sd" class="form-control" placeholder="Sumber Dana" maxlength="25" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Tambahkan</button>
			</div>
		</div>
	</div>
</form>

<form action="<?=base_url('user/barang/update')?>" method="post" class="modal" id="edit">
</form>

<div class="modal in" id="info">
</div>

<form action="<?=base_url('user/barang/tambah_stok')?>" method="post" class="modal" id="addStok">
</form>