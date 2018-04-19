<h3><?=$pageHeader?></h3>
<form action="<?=base_url('user/user/cari')?>" method="get">
	<input type="text" placeholder="Cari Disini" name="cari">
	<input type="submit" value="Cari">
</form>
<button class="btn btn-success float-right" data-toggle="modal" data-target="#tambahBrg" style="margin-top: -45px; margin-bottom: 5px"><i class="fa fa-plus-circle"></i> Tambah User</button>
<?=$this->session->flashdata('fail')?>
<table class="table table-hover table-responsive" style="width: 100%">
	<thead class="bg-accent">
		<th>No</th>
		<th>ID</th>
		<th width="300">Nama</th>
		<th>Username</th>
		<th>Akses</th>
		<th width="100">Aksi</th>
	</thead>
	<tbody>
		<?php $no=1;foreach ($user as $b): ?>
		<tr>
			<td><?=$no++?></td>
			<td><?=$b->id_user?></td>
			<td><?=$b->nama?></td>
			<td><?=$b->username?></td>
			<td><?=($b->level==1)?'Administrator':'Kepksek Sarpras'?></td>
			<td class="btn-group">
				<a href="#" title="Edit User" data-action="<?=base_url('user/user/edit')?>" data-kode="<?=$b->id_user?>" data-toggle="modal" data-target="#editu" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
				<a title="Hapus Supplier" href="<?=base_url("user/user/hapus/$b->id_user")?>" onclick="return confirm('Yakin akan menghapus supplier dipilih ?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
<form action="<?=base_url('user/user/tambah')?>" method="post" class="modal" id="tambahBrg">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Barang</h4>
				<span class="close" data-dismiss="modal">&times;</span>
			</div>
			<div class="modal-body">
				<div class="alert alert-warning">
					<i class="fa fa-warning"></i><small>&nbsp; Username tidak akan bisa diubah</small>
				</div>
				<div class="form-group input-group-sm">
					<input type="text" name="nama" class="form-control" placeholder="Nama User" maxlength="15" required autofocus>
				</div>
				<div class="form-group input-group-sm">
					<input type="text" name="uname" class="form-control" placeholder="Username" maxlength="15" required>
				</div>
				<div class="form-group input-group-sm">
					<input type="text" name="pass" class="form-control" placeholder="Password" maxlength="15" required>
				</div>
				<div class="form-group input-group-sm">
					<select name="akses" class="form-control">
						<option value="">-- PILIH HAK AKSES --</option>
						<option value="0">Kepsek Sarana Prasarana</option>
						<option value="1">Administrator</option>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Tambahkan</button>
			</div>
		</div>
	</div>
</form>

<form action="<?=base_url('user/user/update')?>" method="post" class="modal" id="editu">
</form>
