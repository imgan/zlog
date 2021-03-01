<section class="content">
	<div id="modalTambah" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambah">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Add Data Pengguna GSM </h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Operator</label>
								<select class="form-control select2" style="width: 100%;" name="operator" id="operator">
									<option selected="selected">-- Pilih --</option>
									<?php foreach ($myoperator as $value) { ?>
										<option value=<?= $value['id'] ?>><?= $value['name'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-tag"></i></span>
								</div>
								<input required type="text" id="nomor_msisdn" name="nomor_msisdn" class="form-control" placeholder="Nomor MSISDN">
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-tag"></i></span>
								</div>
								<input required type="text" id="nomor_iccid" name="nomor_iccid" class="form-control" placeholder="Nomor ICCID">
							</div>

							<div class="form-group">
								<label>Quota</label>
								<select class="form-control select2" style="width: 100%;" name="quota" id="quota">
									<option selected="selected">-- Pilih --</option>
								</select>
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-tag"></i></span>
								</div>
								<input required type="text" id="alokasi" name="alokasi" class="form-control" placeholder="Alokasi">
							</div>

							<div class="form-group">
								<label>Status</label>
								<select required class="form-control select2" style="width: 100%;" name="status" id="status">
									<option value="" selected="selected">-- Pilih --</option>
									<option value="1">-- active --</option>
									<option value="0">-- inactive --</option>
								</select>
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-cogs"></i></span>
								</div>
								<textarea type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<div class="modal-footer">
						<button type="submit" id="btn_import" class="btn btn-sm btn-success pull-left">
							<i class="ace-icon fa fa-save"></i>
							Simpan
						</button>
						<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Batal
						</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<div id="modalEdit" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formEdit">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Edit Pengguna GSM</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">

							<div class="form-group">
								<label>Operator</label>
								<select class="form-control select2" style="width: 100%;" name="e_operator" id="e_operator">
									<option selected="selected">-- Pilih --</option>
									<?php foreach ($myoperator as $value) { ?>
										<option value=<?= $value['id'] ?>><?= $value['name'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-tag"></i></span>
								</div>
								<input required type="hidden" id="e_id" name="e_id" class="form-control" placeholder="Nomor MSISDN">
								<input required type="text" id="e_nomor_msisdn" name="e_nomor_msisdn" class="form-control" placeholder="Nomor MSISDN">
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-tag"></i></span>
								</div>
								<input required type="text" id="e_nomor_iccid" name="e_nomor_iccid" class="form-control" placeholder="Nomor ICCID">
							</div>

							<div class="form-group">
								<label>Quota</label>
								<select class="form-control select2" style="width: 100%;" name="e_quota" id="e_quota">
									<option selected="selected">-- Pilih --</option>
								</select>
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-tag"></i></span>
								</div>
								<input required type="text" id="e_alokasi" name="e_alokasi" class="form-control" placeholder="Alokasi">
							</div>

							<div class="form-group">
								<label>Status</label>
								<select required class="form-control select2" style="width: 100%;" name="e_status" id="e_status">
									<option value="" selected="selected">-- Pilih --</option>
									<option value="1">-- active --</option>
									<option value="0">-- inactive --</option>
								</select>
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-cogs"></i></span>
								</div>
								<textarea type="text" id="e_keterangan" name="e_keterangan" class="form-control" placeholder="Keterangan"></textarea>
							</div>
							<!-- /.card-body -->
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" id="btn_import" class="btn btn-sm btn-success pull-left">
							<i class="ace-icon fa fa-save"></i>
							Simpan
						</button>
						<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Batal
						</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<!-- Default box -->

	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Daftar Pengguna GSM</h3>
		</div>
		<br>
		<div class="col-sm-2">
			<button href="#modalTambah" type="button" role="button" data-toggle="modal" class="btn btn-block btn-primary"><a class="ace-icon fa fa-plus bigger-120"></a> Add Pengguna GSM</button>
		</div>
		<br>
		<div class="card-body p-0">
			<table id="table_id" class="table table-bordered table-hover projects">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th class="text-center">
							Operator
						</th>
						<th class="text-center">
							Nomor MSISDN
						</th>
						<th class="text-center">
							Nomor ICCID
						</th>
						<th class="text-center">
							Besar Quota
						</th>
						<th class="text-center">
							Alokasi
						</th>
						<th class="text-center">
							Status
						</th>
						<th class="text-center">
							Keterangan
						</th>
						<th style="width: 16%" class="text-center">
							Action
						</th>
					</tr>
				</thead>
				<tbody id="show_data">
				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</section>

<script type="text/javascript">
	if ($("#formTambah").length > 0) {
		$("#formTambah").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				nama: {
					required: true
				},

				keterangan: {
					required: true
				},
			},
			messages: {

				nama: {
					required: "Wajib diisi!"
				},

				keterangan: {
					required: "Wajib diisi!"
				},
			},
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('administrator/penggunagsm/simpan') ?>",
					type: "POST",
					data: $('#formTambah').serialize(),
					dataType: "json",
					success: function(response) {
						$('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>' +
							'Simpan');
						if (response == true) {
							document.getElementById("formTambah").reset();
							swalInputSuccess();
							show_data();
							$('#modalTambah').modal('hide');
						} else if (response == 401) {
							swalIdDouble();
						} else {
							swalInputFailed("Data Duplicate");
						}
					}
				});
			}
		})
	}

	$('#show_data').on('click', '.item_hapus', function() {
		var id = $(this).data('id');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda tidak akan dapat mengembalikan ini!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('administrator/penggunagsm/delete') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						show_data();
						Swal.fire(
							'Terhapus!',
							'Data sudah dihapus.',
							'success'
						)
					}
				});
			}
		})
	})

	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('administrator/penggunagsm/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					var status = '';
					if (data[i].status == 1 ) {
						status = '<td class="project-state"><span class="badge badge-success"> Active </span></td>'
					} else {
						status = '<td class="project-state"><span class="badge badge-danger"> Inactive </span></td>'
					}

					html += '<tr>' +
						'<td class="text-left">' + no + '</td>' +
						'<td class="text-left">' + data[i].nama_operator + '</td>' +
						'<td class="text-left">' + data[i].nomor_msisdn + '</td>' +
						'<td class="text-left">' + data[i].nomor_iccid + '</td>' +
						'<td class="text-left">' + data[i].besar_quota_qty + '</td>' +
						'<td class="text-left">' + data[i].alokasi + '</td>' +
						status + 
						'<td class="text-left">' + data[i].keterangan + '</td>' +
						'<td class="project-actions text-right">' +
						'   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].id + '">' +
						'      <i class="fas fa-folder"> </i>  Edit </a>' +
						'</button> &nbsp' +
						'   <button  class="btn btn-danger btn-sm item_hapus"  data-id="' + data[i].id + '">' +
						'      <i class="fas fa-trash"> </i>  Hapus </a>' +
						'</button> ' +
						'</td>' +
						'</tr>';
					no++;
				}
				$("#table_id").dataTable().fnDestroy();
				var a = $('#show_data').html(html);
				//                    $('#mydata').dataTable();
				if (a) {
					$('#table_id').dataTable({
						"searching": true,
						"ordering": true,
						"responsive": true,
						"paging": true,
					});
				}
				/* END TABLETOOLS */
			}

		});
	}

	//get data for update record
	$('#show_data').on('click', '.item_edit', function() {
		document.getElementById("formEdit").reset();
		var id = $(this).data('id');
		$('#modalEdit').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/penggunagsm/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_operator').val(data[0].operator).select2();
				$('#e_keterangan').val(data[0].keterangan);
				$('#e_status').val(data[0].status).select2();
				$('#e_alokasi').val(data[0].alokasi);
				$('#e_nomor_msisdn').val(data[0].nomor_msisdn);
				$('#e_nomor_iccid').val(data[0].nomor_iccid);
				show_data_quota(data[0].operator, function(a){
                    $('#e_quota').val(data[0].besar_quota);
                });
			}
		});
	});

	if ($("#formEdit").length > 0) {
		$("#formEdit").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				e_nama: {
					required: true
				},

				e_keterangan: {
					required: true
				},

			},
			messages: {
				e_nama: {
					required: "Wajib diisi!"
				},

				e_keterangan: {
					required: "Wajib diisi!"
				},

			},
			submitHandler: function(form) {
				$('#btn_edit').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('administrator/penggunagsm/update') ?>",
					type: "POST",
					data: $('#formEdit').serialize(),
					dataType: "json",
					success: function(response) {
						$('#btn_edit').html('<i class="ace-icon fa fa-save"></i>' +
							'Ubah');
						if (response == true) {
							document.getElementById("formEdit").reset();
							swalEditSuccess();
							show_data();
							$('#modalEdit').modal('hide');
						} else if (response == 401) {
							swalIdDouble();
						} else {
							swalEditFailed();
						}
					}
				});
			}
		})
	}

	$(document).ready(function() {
		show_data();
		$('.select2').select2();
		$('#table_id').DataTable({
			"searching": true,
			"ordering": true,
			"responsive": true,
			"paging": true,
		});
	});

	$("#operator").change(function() {
		var id = $('#operator').val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/penggunagsm/showquota') ?>",
			data: {
				id: id
			}
		}).done(function(data) {
			$("#quota").html(data);
		});
	});

	function show_data_quota(id, callback) {
        var id = id;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('administrator/penggunagsm/showquotaedit') ?>",
            data: {
                id: id
            }
        }).done(function(data) {
            $("#e_quota").html(data);
            callback()
        });
    }
</script>
