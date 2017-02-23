	<script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/ajax.js') ?>"></script>
	<script>

		//Sending Data to controller
		function save(){
			if(saveMethod == 'add'){
				url = "<?php echo site_url('contact/save_contact') ?>";
			}else{
				url = "<?php echo site_url('contact/update_contact') ?>";
			}

			console.log(url);

			$.ajax({
				url : url,
				type : 'post',
				data : $('#formContact').serialize(),
				dataType : 'json',
				encode : 'true',
				success : function(data){
					$('#modalFormContact').modal('hide');
					alert('Data berhasil disimpan !');
				},
				error : function(jqXHR,textStatus,errorThrown){
					alert('Data Gagal Disimpan !');
					console.log('Terjadi Kesalahan Dalam Pengambilan Data AJAX!');
				}
			});
		}

		function editContact(id){
			saveMethod = 'update';
			$('#formContact')[0].reset();
			$.ajax({
				url : "<?php echo site_url('contact/ajax_edit/') ?>" + id,
				type : "GET",
				dataType : 'json',
				success : function(data){
					$('[name = "id"]').val(data.id);
					$('[name = "fullname"]').val(data.fullname);
					$('[name = "telephone"]').val(data.telephone);
					$('[name = "email"]').val(data.email);
					$('[name = "address"]').val(data.address);

					$('#modalFormContact').modal('show');
					$('.modal-title').text('Edit Contact')
				},
				error : function(jqXHR,textStatus,errorThrown){
					alert('Kesalahan Dalam Server, Hubungi Administrator !');
				}
			});
		}


		function deleteContact(id){
			if(confirm('Yakin ingin menghapus data ini ?')){
				$.ajax({
					url : "<?php echo site_url('contact/destroy_contact/') ?>" + id,
					type : 'post',
					dataType : 'json',
					success : function(data){
						window.location.reload();
					},
					error : function(jqXHR,textStatus,errorThrown){
						alert('Kesalahan Dalam Server, Hubungi Administrator !');
					}
				});
			}
		}
	</script>
</body>
</html>