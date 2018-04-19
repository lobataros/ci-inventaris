<h3><?=$pageHeader?></h3>
<button class="btn btn-success float-right" data-toggle="modal" data-target="#tambahBrg" style="margin-top: -45px; margin-bottom: 5px"><i class="fa fa-plus-circle"></i> Tambah Supplier</button>
<table class="table table-hover table-responsive" style="width: 100%">
	<thead class="bg-accent">
		<th>No</th>
		<th>Kode</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Kontak</th>
		<th>Kota</th>
		<th width="100">Aksi</th>
	</thead>
	<tbody>
		<?php $no=1;foreach ($supplier as $b): ?>
		<tr>
			<td><?=$no++?></td>
			<td><?=$b->kode_supplier?></td>
			<td><?=$b->nama_supplier?></td>
			<td><?=$b->alamat_supplier?></td>
			<td><?=$b->telp_supplier?></td>
			<td><?=$b->kota_supplier?></td>
			<td class="btn-group">
				<a href="#" title="Edit Supplier" data-action="<?=base_url('user/supplier/edit')?>" data-kode="<?=$b->kode_supplier?>" data-toggle="modal" data-target="#editsup" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
				<a title="Hapus Supplier" href="<?=base_url("user/supplier/hapus/$b->kode_supplier")?>" onclick="return confirm('Yakin akan menghapus supplier dipilih ?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>

<form action="<?=base_url('user/supplier/tambah')?>" method="post" class="modal" id="tambahBrg">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Barang</h4>
				<span class="close" data-dismiss="modal">&times;</span>
			</div>
			<div class="modal-body">
				<div class="form-group input-group-sm">
					<input type="text" name="nama" class="form-control" placeholder="Nama Supplier" maxlength="15" required autofocus>
				</div>
				<div class="form-group input-group-sm">
					<input type="text" name="alamat" class="form-control" placeholder="Alamat" maxlength="40" required>
				</div>
				<div class="form-group input-group-sm">
					<input type="number" name="telp" class="form-control" placeholder="Telepon" max="999999999999999" required>
				</div>
				<div class="form-group input-group-sm">
					<input type="text" name="kota" class="form-control" placeholder="Kota Supplier" maxlength="20" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Tambahkan</button>
			</div>
		</div>
	</div>
</form>

<form action="<?=base_url('user/supplier/update')?>" method="post" class="modal" id="editsup">
</form>
