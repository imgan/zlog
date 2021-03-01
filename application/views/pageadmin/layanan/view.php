<section class="content">
	<div id="my-modal" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambah">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Add Layanan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
								<input required type="text" id="nama" name="nama" class="form-control" placeholder="Nama Layanan">
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-address-card"></i></span>
								</div>
								<input required type="text" id="harga" name="harga" class="form-control" placeholder="Harga">
								<input type="hidden" id="harga_v" name="harga_v">
								<script language="JavaScript">
									var rupiah3 = document.getElementById('harga');
									rupiah3.addEventListener('keyup', function(e) {
										// tambahkan 'Rp.' pada saat form di ketik
										// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
										rup3 = this.value.replace(/\D/g, '');
										$('#harga_v').val(rup3);
										rupiah3.value = formatRupiah3(this.value, 'Rp. ');
									});

									function formatRupiah3(angka, prefix) {
										var number_string = angka.replace(/[^,\d]/g, '').toString(),
											split = number_string.split(','),
											sisa = split[0].length % 3,
											rupiah3 = split[0].substr(0, sisa),
											ribuan3 = split[0].substr(sisa).match(/\d{3}/gi);

										// tambahkan titik jika yang di input sudah menjadi angka ribuan
										if (ribuan3) {
											separator = sisa ? '.' : '';
											rupiah3 += separator + ribuan3.join('.');
										}

										rupiah3 = split[1] != undefined ? rupiah3 + ',' + split[1] : rupiah3;
										return prefix == undefined ? rupiah3 : (rupiah3 ? 'Rp. ' + rupiah3 : '');
									}
								</script>
							</div>

							<div class="form-group">
								<label>Status Aktif</label>
								<select class="form-control select2" style="width: 100%;" name="status" id="status">
									<option selected="selected">-- Pilih --</option>
									<option value="1">Aktif</option>
									<option value="0 ">Non Aktif</option>
								</select>
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-book"></i></span>
								</div>
								<textarea type="text" id="description" name="description" class="form-control" placeholder="Keterangan"></textarea>
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
							<h4 class="modal-title">Edit Layanan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
								<input required type="hidden" id="e_id" name="e_id" class="form-control">
								<input required type="text" id="e_nama" name="e_nama" class="form-control" placeholder="Nama Layanan">
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-address-card"></i></span>
								</div>
								<input required type="text" id="e_harga" name="e_harga" class="form-control" placeholder="Harga">
								<input type="hidden" id="e_harga_v" name="e_harga_v">
								<script language="JavaScript">
									var rupiah4 = document.getElementById('e_harga');
									rupiah4.addEventListener('keyup', function(e) {
										// tambahkan 'Rp.' pada saat form di ketik
										// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
										rup4 = this.value.replace(/\D/g, '');
										$('#e_harga_v').val(rup3);
										rupiah4.value = formatRupiah3(this.value, 'Rp. ');
									});

									function formatRupiah3(angka, prefix) {
										var number_string = angka.replace(/[^,\d]/g, '').toString(),
											split = number_string.split(','),
											sisa = split[0].length % 3,
											rupiah4 = split[0].substr(0, sisa),
											ribuan4 = split[0].substr(sisa).match(/\d{3}/gi);

										// tambahkan titik jika yang di input sudah menjadi angka ribuan
										if (ribuan4) {
											separator = sisa ? '.' : '';
											rupiah4 += separator + ribuan4.join('.');
										}

										rupiah4 = split[1] != undefined ? rupiah4 + ',' + split[1] : rupiah4;
										return prefix == undefined ? rupiah4 : (rupiah4 ? 'Rp. ' + rupiah4 : '');
									}
								</script>
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-book"></i></span>
								</div>
								<textarea type="text" id="e_description" name="e_description" class="form-control" placeholder="Keterangan"></textarea>
							</div>

							<div class="form-group">
								<label>Status Aktif</label>
								<select class="form-control select2" style="width: 100%;" name="e_status" id="e_status">
									<option selected="selected">-- Pilih --</option>
									<option value=1>Aktif</option>
									<option value=0>Non Aktif</option>
								</select>
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
	<!-- Default box -->

	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Daftar Layanan</h3>
		</div>
		<br>
		<div class="col-sm-2">
			<button href="#my-modal" type="button" role="button" data-toggle="modal" class="btn btn-block btn-primary"><a class="ace-icon fa fa-plus bigger-120"></a> Add Layanan</button>
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
							Nama Layanan
						</th>
						<th class="text-center">
							Harga / Bulan
						</th>
						<th class="text-center">
							Status Product
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
				ktp: {
					required: true
				},

				nama: {
					required: true
				},

				telp: {
					required: true
				},
			},
			messages: {

				ktp: {
					required: "No KTP harus diisi!"
				},

				nama: {
					required: "Nama harus diisi!"
				},

				telp: {
					required: "Telepone harus diisi!"
				},
			},
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('administrator/layanan/simpan') ?>",
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
							$('#my-modal').modal('hide');
						} else {
							swalInputFailed();
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
					url: "<?php echo base_url('administrator/layanan/delete') ?>",
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
			url: '<?php echo site_url('administrator/layanan/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					var status = '';
					if (data[i].status == 1) {
						status = '<td class="project-state"><span class="badge badge-success">Aktif</span></td>'
					} else {
						status = '<td class="project-state"><span class="badge badge-danger">Non Aktif</span></td>'
					}
					html += '<tr>' +
						'<td class="text-left">' + no + '</td>' +
						'<td class="text-left">' + data[i].name + '</td>' +
						'<td class="text-right">' + ConvertFormatRupiah(data[i].price, 'Rp.') + '</td>' +
						status +
						'<td class="text-left">' + data[i].description + '</td>' +
						'<td class="project-actions text-center">' +
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

	$(document).ready(function() {
		show_data();
		$('#table_id').DataTable({
			"searching": true,
			"ordering": true,
			"responsive": true,
			"paging": true,
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
					required: "Nama Jenis Perangkat harus diisi!"
				},

				e_keterangan: {
					required: "Keterangan harus diisi!"
				},

			},
			submitHandler: function(form) {
				$('#btn_edit').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('administrator/layanan/update') ?>",
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

	function ConvertFormatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}

	//get data for update record
	$('#show_data').on('click', '.item_edit', function() {
		document.getElementById("formEdit").reset();
		var id = $(this).data('id');
		$('#modalEdit').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/layanan/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_nama').val(data[0].name);
				$('#e_description').val(data[0].description);
				$('#e_status').val(data[0].status);
				$('#e_harga').val(data[0].price);
				$('#e_harga_v').val(data[0].price);
			}
		});
	});
</script>
