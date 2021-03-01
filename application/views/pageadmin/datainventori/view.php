<section class="content">
	<div id="modalTambah" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambah">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Add Data Inventori</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card-body">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-user"></i></span>
										</div>
										<input required type="text" id="nama" name="nama" class="form-control" placeholder="Nama Inventori">
									</div>

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-list-ol"></i></span>
										</div>
										<input required type="text" id="nomor" name="nomor" class="form-control" placeholder="Nomor Inventori">
									</div>

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-tag"></i></span>
										</div>
										<input type="text" id="label" name="label" class="form-control" placeholder="Label Inventori">
									</div>

									<div class="form-group">
										<label>Kategori Inventori</label>
										<select class="form-control select2" style="width: 100%;" name="kategori" id="kategori">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mykategori as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Tanggal Pembelian</label>
										<input type="date" id="tglpembelian" name="tglpembelian" class="form-control" placeholder="Tanggal Pembelian"></input>
									</div>

									<div class="form-group">
										<label>Fungsi</label>
										<input type="text" id="fungsi" name="fungsi" class="form-control" placeholder="Fungsi"></input>
									</div>

									<div class="form-group">
										<label>Ukuran</label>
										<input type="text" id="ukuran" name="ukuran" class="form-control" placeholder="Ukuran"></input>
									</div>

									<div class="form-group">
										<label>Merek Perangkat</label>
										<select class="form-control select2" style="width: 100%;" name="merek" id="merek">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mymerek as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Type</label>
										<input type="text" id="type" name="type" class="form-control" placeholder="Type"></input>
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<div class="col-md-6">
								<div class="card-body">

									<div class="form-group">
										<label>Status Kepemilikan</label>
										<select class="form-control select2" style="width: 100%;" name="statuskepemilikan" id="statuskepemilikan">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mystatuskepemilikan as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-barcode"></i></span>
										</div>
										<input type="text" id="serialnumber" name="serialnumber" class="form-control" placeholder="Serial Number">
									</div>

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-map-pin"></i></span>
										</div>
										<input type="text" id="macaddress" name="macaddress" class="form-control" placeholder="MAC Address">
									</div>

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-map-marked"></i></span>
										</div>
										<input type="text" id="alokasi" name="alokasi" class="form-control" placeholder="Alokasi">
									</div>

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-address-card"></i></span>
										</div>
										<input type="text" id="penanggungjawab" name="penanggungjawab" class="form-control" placeholder="Penanggung Jawab">
									</div>

									<div class="form-group">
										<label>File</label>
										<input type="file" id="foto" name="foto" class="form-control" placeholder="Penanggung Jawab">
									</div>

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-cogs"></i></span>
										</div>
										<textarea type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
									</div>
								</div>
							</div>
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

	<div id="modalEdit" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formEdit">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Edit Data Inventori</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card-body">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-user"></i></span>
										</div>
										<input required type="hidden" id="e_id" name="e_id" class="form-control">
										<input required type="text" id="e_nama" name="e_nama" class="form-control" placeholder="Nama Inventori">
									</div>

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-list-ol"></i></span>
										</div>
										<input required type="text" id="e_nomor" name="e_nomor" class="form-control" placeholder="Nomor Inventori">
									</div>

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-tag"></i></span>
										</div>
										<input type="text" id="e_label" name="e_label" class="form-control" placeholder="Label Inventori">
									</div>

									<div class="form-group">
										<label>Kategori Inventori</label>
										<select class="form-control select2" style="width: 100%;" name="e_kategori" id="e_kategori">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mykategori as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Tanggal Pembelian</label>
										<input type="date" id="e_tglpembelian" name="e_tglpembelian" class="form-control" placeholder="Tanggal Pembelian"></input>
									</div>

									<div class="form-group">
										<label>Fungsi</label>
										<input type="text" id="e_fungsi" name="e_fungsi" class="form-control" placeholder="Fungsi"></input>
									</div>

									<div class="form-group">
										<label>Ukuran</label>
										<input type="text" id="e_ukuran" name="e_ukuran" class="form-control" placeholder="Ukuran"></input>
									</div>

									<div class="form-group">
										<label>Merek Perangkat</label>
										<select class="form-control select2" style="width: 100%;" name="e_merek" id="e_merek">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mymerek as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Type</label>
										<input type="text" id="e_type" name="e_type" class="form-control" placeholder="Type"></input>
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<div class="col-md-6">
								<div class="card-body">
									<div class="form-group">
										<label>Status Kepemilikan</label>
										<select class="form-control select2" style="width: 100%;" name="e_statuskepemilikan" id="e_statuskepemilikan">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mystatuskepemilikan as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-barcode"></i></span>
										</div>
										<input type="text" id="e_serialnumber" name="e_serialnumber" class="form-control" placeholder="Serial Number">
									</div>

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-map-pin"></i></span>
										</div>
										<input type="text" id="e_macaddress" name="e_macaddress" class="form-control" placeholder="MAC Address">
									</div>

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-map-marked"></i></span>
										</div>
										<input type="text" id="e_alokasi" name="e_alokasi" class="form-control" placeholder="Alokasi">
									</div>

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-address-card"></i></span>
										</div>
										<input type="text" id="e_penanggungjawab" name="e_penanggungjawab" class="form-control" placeholder="Penanggung Jawab">
									</div>

									<div class="form-group">
										<label>File</label>
										<input type="file" id="e_foto" name="e_foto" class="form-control" placeholder="Penanggung Jawab">
									</div>

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-cogs"></i></span>
										</div>
										<textarea type="text" id="e_keterangan" name="e_keterangan" class="form-control" placeholder="Keterangan"></textarea>
									</div>
								</div>
							</div>
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
			<h3 class="card-title">Daftar Data Inventori</h3>
		</div>
		<br>
		<div class="col-sm-2">
			<button href="#modalTambah" type="button" role="button" data-toggle="modal" class="btn btn-block btn-primary"><a class="ace-icon fa fa-plus bigger-120"></a> Add Data Inventori</button>
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
							Nama Inventori
						</th>
						<th class="text-center">
							Nomor Inventori
						</th>
						<th class="text-center">
							Nama Label
						</th>
						<th class="text-center">
							Tanggal Pembelian
						</th>
						<th class="text-center">
							Fungsi
						</th>
						<th class="text-center">
							Merek
						</th>
						<th class="text-center">
							Serial Number
						</th>
						<th class="text-center">
							Mac Address
						</th>
						<th class="text-center">
							Penanggung Jawab
						</th>
						<th class="text-center">
							Foto
						</th>
						<th style="width:16%" class="text-center">
							Actions
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
				formdata = new FormData(form);
				$.ajax({
					url: "<?php echo base_url('administrator/datainventori/simpan') ?>",
					type: "POST",
					data: formdata,
					processData: false,
					contentType: false,
					cache: false,
					async: false,
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
							document.getElementById("formTambah").reset();
							swalInputSuccess();
							show_data();
							$('#modalTambah').modal('hide');
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
					url: "<?php echo base_url('administrator/datainventori/delete') ?>",
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
			url: '<?php echo site_url('administrator/datainventori/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-left">' + no + '</td>' +
						'<td class="text-left">' + data[i].nama + '</td>' +
						'<td class="text-left">' + data[i].nomor + '</td>' +
						'<td class="text-left">' + data[i].label + '</td>' +
						'<td class="text-left">' + data[i].tgl_pembelian + '</td>' +
						'<td class="text-left">' + data[i].fungsi + '</td>' +
						'<td class="text-left">' + data[i].merek + '</td>' +
						'<td class="text-left">' + data[i].serial_number + '</td>' +
						'<td class="text-left">' + data[i].mac_address + '</td>' +
						'<td class="text-left">' + data[i].penanggung_jawab + '</td>' +
						'<td class="text-left">' +
						'   <a href="<?php echo base_url().'assets/inventori/'?>'+data[i].foto+'" target="_blank" class="btn btn-success btn-sm"  data-id="' + data[i].id + '">' +
						'      <i class="fas fa-download"> </i>  Download </a>' +
						'</a> &nbsp' +
						 '</td>' +
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
			url: "<?php echo base_url('administrator/datainventori/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_nama').val(data[0].nama);
				$('#e_nomor').val(data[0].nomor);
				$('#e_label').val(data[0].label);
				$('#e_keterangan').val(data[0].keterangan);
				$('#e_kategori').val(data[0].kategori).select2();
				$('#e_tglpembelian').val(data[0].tgl_pembelian);
				$('#e_fungsi').val(data[0].fungsi);
				$('#e_ukuran').val(data[0].ukuran);
				$('#e_merek').val(data[0].merek).select2();
				$('#e_type').val(data[0].type);
				$('#e_statuskepemilikan').val(data[0].status_kepemilikan).select2();
				$('#e_serialnumber').val(data[0].serial_number);
				$('#e_macaddress').val(data[0].mac_address);
				$('#e_alokasi').val(data[0].alokasi);
				$('#e_penanggungjawab').val(data[0].penanggung_jawab);
				$('#e_keterangan').val(data[0].keterangan);

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
					url: "<?php echo base_url('administrator/datainventori/update') ?>",
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
</script>
