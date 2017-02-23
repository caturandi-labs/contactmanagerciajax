<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center text-header">Contact Manager App <small>Build With Codeigniter 3</small></h3>
			<hr>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<button class="btn btn-primary" onclick="addContact();"><i class="glyphicon glyphicon-plus"></i>Tambah Kontak</button><br><br>
			<table  id="contactTable" class="table table-bordered">
				<thead>
					<tr>
						<th>Full Name</th>
						<th>Telephone </th>
						<th>E-Mail Address</th>
						<th>Address</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($contacts as $contact): ?>
						<tr>
							<td><?php echo $contact->fullname ?></td>
							<td><?php echo $contact->telephone ?></td>
							<td><?php echo $contact->email ?></td>
							<td><?php echo $contact->address ?></td>
							<td>
								<button class="btn btn-warning" onclick="editContact(<?php echo $contact->id ?>)"><i class="glyphicon glyphicon-pencil"></i> </button>
								<button class="btn btn-danger" onclick="deleteContact(<?php echo $contact->id ?>)"><i class="glyphicon glyphicon-remove"></i> </button>
							</td>
						</tr>						
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade " id="modalFormContact" role=""dialog>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label='Close'><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Form Tambah Kontak</h3>
			</div>
			<div class="modal-body form">
				<form action="#" id="formContact" method="post">
					<input type="hidden" value="" name="id">
					<div class="form-group">
						<label class="control-label">Full Name</label>
						<input  name="fullname" type="text" placeholder="Nama Lengkap" class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label">Telepon</label>
						<input type="number" placeholder="Telepon" name="telephone" class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label">E-Mail</label>
						<input type="email" placeholder="Alamat E-Mail" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label">Alamat</label>
						<textarea name="address" class="form-control" placeholder="Alamat Lengkap"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Simpan</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>