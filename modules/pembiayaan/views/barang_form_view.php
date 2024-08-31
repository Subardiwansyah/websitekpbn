					<main class="page-content">
						<ol class="breadcrumb page-breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fal fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="<?php echo base_url(); ?><?php echo $modul; ?>"><?php echo $modul_display; ?></a></li>
							<li class="breadcrumb-item active"><?php echo $breadcrumb_form; ?></li>
						</ol>

						<div class="row">
							<div class="col-xl-12">
								<div id="panel-1" class="panel">
									<div class="panel-hdr">
										<h2 data-bind="text: title">
											&nbsp;
										</h2>
									</div>
									<div class="panel-container show">
										<form id="frm" >
											<div class="panel-content">
												<!-- Begin -->

												<h5 class="keep-print-font fw-500 mb-2 text-primary flex-1 position-relative">
													<i class="fal fa-cubes"></i>&nbsp;&nbsp;
													FORM PEMBIAYAAN
												</h5>
												<input type="hidden" name="id" id="id" value="<?php echo isset($data['ID']) ? $data['ID'] : '';?>" />
												<div class="card mb-3">
													<div class="card-body">
														<div class="form-row">
															<div class="col-md-8 col-sm-8 col-xs-12 mb-3">
															<div class="form-group">
																<label class="form-label" for="pembiayaan">Deskripsi Pembiayaan <span class="text-danger">*</span> </label>
																<textarea class="form-control form-control-sm" id="pembiayaan" name="pembiayaan" placeholder="Deskripsi Pembiayaan"><?php echo isset($data['NAMA_PEMBIAYAAN']) ? $data['NAMA_PEMBIAYAAN'] : '';?></textarea>
															</div>
															</div>
																
														</div>
														<div class="form-row">
															<div class="col-md-4 col-sm-4 col-xs-12 mb-3" >
															<div class="form-group">
																<label class="form-label" for="coa">COA<span class="text-danger">*</span> </label>
																<input type="text" style="width:100%" class="select2" name="coa" id="coa" />
															</div>
															</div>
															<div class="col-md-4 col-sm-4 col-xs-12 mb-3" >
															<div class="form-group">
																<label class="form-label" for="kegiatan">Keterangan Kegiatan<span class="text-danger">*</span> </label>
																<input type="text" style="width:100%" class="select2" name="kegiatan" id="kegiatan" />
															</div>
															</div>
														</div>
														<div class="form-row">
															<div class="col-md-4 col-sm-4 col-xs-12 mb-3">
															<div class="form-group">
																<label class="form-label" for="sisa_rkap">Saldo Sisa RKAP (Rp.)<span class="text-danger">*</span></label>
																<input type="text" class="form-control form-control-sm nilai" id="sisa_rkap" name="sisa_rkap" value="<?php echo isset($data['ANGGARAN_1TAHUN']) ? $data['ANGGARAN_1TAHUN'] : '';?>" readonly="readonly">
															</div>
															</div>
															<div class="col-md-4 col-sm-4 col-xs-12 mb-3">
															<div class="form-group">
																<label class="form-label" for="pengajuan">Jumlah Biaya yang diajukan (Rp.)<span class="text-danger">*</span></label>
																<input type="text" class="form-control form-control-sm nilai" id="pengajuan" name="pengajuan" value="<?php echo isset($data['JUMLAH_PENGAJUAN']) ? $data['JUMLAH_PENGAJUAN'] : '';?>">
															</div>
															</div>
														</div>
														<div class="form-row">
															<div class="col-md-4 col-sm-4 col-xs-12 mb-3">
															<div class="form-group">
																<label class="form-label" for="sisa_akhir">Saldo Sisa Akhir (Rp.)<span class="text-danger">*</span></label>
																<input type="text" class="form-control form-control-sm nilai" id="sisa_akhir" name="sisa_akhir" value="<?php echo isset($data['SISA_PEMBIAYAAN']) ? $data['SISA_PEMBIAYAAN'] : '';?>" readonly="readonly">
															</div>
															</div>
														</div>
													</div>
												</div>

												<!-- End -->
											</div>
											<div class="panel-content py-3 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-right">
												<button onClick="back()" type="button" class="btn btn-sm btn-primary" id="btn-batal" data-bind="click: back"><i class="fal fa-times"></i> Batal</button>
												<button type="submit" class="btn btn-sm btn-primary" id="btn-simpan" data-bind="click: save"><i class="fal fa-save"></i> Simpan</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</main>

					<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>

					<script>
					/*
						$('textarea#pembiayaan').summernote({
							placeholder: 'Isi Deskripsi Pembiayaan disini.',
							tabsize: 2,
							height: 100,
					  toolbar: [
							//['style', ['style']],
							['font', ['bold', 'italic', 'underline', 'clear']],
							// ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
							//['fontname', ['fontname']],
						   // ['fontsize', ['fontsize']],
						   // ['color', ['color']],
							['para', ['ul', 'ol']],
						   // ['height', ['height']],
						   // ['table', ['table']],
						   // ['insert', ['link', 'picture', 'hr']],
							//['view', ['fullscreen', 'codeview']],
							//['help', ['help']]
						  ],
						  });*/
						$(document).ready(function()
						{
							
							$('.nilai').inputmask({rightAlign: false, 'alias': 'decimal', 'groupSeparator':'.'});
							<?php if(isset($data)){?>
							$("#coa").val("<?php echo $data['COA']?>").trigger("change"); 
							<?php }?>

							var coa = "";
							$('#coa').select2({
								minimumInputLength: 0,
								ajax: {
									url: GLOBAL_MAIN_VARS["BASE_URL"] + 'pilih/get_data_coa',
									type: 'POST',
									dataType: 'json',
									quietMillis: 200,
									data: function(term){
										return {
											'status': '1',
											'q': term
										}
									},
									results: function(data){
										return {results: data.results}
									},
								},
								placeholder: 'Pilih Nomor COA',
								allowClear: true,
								openOnEnter: false,
								dropdownAutoWidth : true,
								initSelection: function(element, callback){
									var data = {'text': element.val()};
									callback(data);
								},
								formatResult: function(res){
									return '<div>' + res.nama + '</div>';
								}
							});

							$('#coa').on('change', function(e){
								var value = $(this).val();
								
								coa = value;
								
							}); 

							$('#kegiatan').select2({
								minimumInputLength: 0,
								ajax: {
									url: GLOBAL_MAIN_VARS["BASE_URL"] + 'pilih/get_data_kegiatan_coa',
									type: 'POST',
									dataType: 'json',
									quietMillis: 200,
									data: function(term){
										return {
											'coa': coa,
											'q': term
										}
									},
									results: function(data){
										return {results: data.results}
									},
								},
								placeholder: 'Pilih Keterangan Kegiatan',
								allowClear: true,
								openOnEnter: false,
								dropdownAutoWidth : true,
								initSelection: function(element, callback){
									var data = {'text': element.val()};
									callback(data);
								},
								formatResult: function(res){
									return '<div>' + res.nama + '</div>';
								}
							});

							$('#kegiatan').on('change', function(e){
								var id = $(this).val();
								var url =  GLOBAL_MAIN_VARS["BASE_URL"] + 'pilih/get_data_rkap_coa';
								$.post(url, {
									id: id,
								}, function (data, result){
									var d = JSON.parse(data);
									$('#sisa_rkap').val(d.SISA_RKAP);
								});
								
							}); 

							$('#sisa_rkap').on('keyup', function(e){
								var pengajuan = $('#pengajuan').val();
								var sisa_rkap = $(this).val();
								if(pengajuan != ""){
									var sisa_akhir = (sisa_rkap.replace(/,/gi,"")-(pengajuan.replace(/,/gi,"")));
									$('#sisa_akhir').val(sisa_akhir);
								}
							});

							$('#pengajuan').on('keyup', function(e){
								var sisa_rkap = $('#sisa_rkap').val();
								if(sisa_rkap == ""){
									$('#sisa_rkap').focus();
									$('#sisa_rkap').addClass('is-invalid');
								} else {
									var pengajuan = $(this).val();
									var sisa_akhir = (sisa_rkap.replace(/,/gi,"")-(pengajuan.replace(/,/gi,"")));
									$('#sisa_akhir').val(sisa_akhir);
								}
							});

							$(document).on('submit', '#frm', function(e){
								e.preventDefault();
								var looding = bootbox.dialog({
									size: 'small',
									closeButton: false,
									message: '<div class="text-center"><i class="fal fa-spinner fa-pulse fa-lg fa-fw"></i> Loading...</div>',
									className: 'modal-looding'
								});

								$.ajax({
									url: '<?php echo base_url().$modul.'/proses'; ?>', 
									type: 'POST',
									data: new FormData(this),
									dataType: 'JSON', 
									cache: false,
									contentType: false,
									processData: false,                         
									success: function(res, xhr){
										if (res.isSuccess)
										{
											show_success(res.message);
											setTimeout(function(){
												location.href = GLOBAL_MAIN_VARS["BASE_URL"] + GLOBAL_MAIN_VARS["MODUL"];
											}, 1500)
										}
										else
										{
											show_warning(res.message);
											setTimeout(function(){
												bootbox.hideAll();
											}, 1500)
										}
									}
								});

							});

							$('#frm').validate({
								ignore: [],
								rules: {
									pembiayaan: {
										required: true,
									},
									coa: {
										required: true,
									},
									kegiatan: {
										required: true,
									},
									sisa_rkap: {
										required: true,
									},
									pengajuan: {
										required: true,
									},
								},
								messages: {
									  
								},
								errorElement: 'span',
								errorPlacement: function (error, element) {
								  error.addClass('invalid-feedback');
								  element.closest('.form-group').append(error);
								},
								highlight: function (element, errorClass, validClass) {
								  $(element).addClass('is-invalid');
								},
								unhighlight: function (element, errorClass, validClass) {
								  $(element).removeClass('is-invalid');
								},
							  });

						});

						function back(){
							location.href = GLOBAL_MAIN_VARS["BASE_URL"] + GLOBAL_MAIN_VARS["MODUL"];
						}

						/*
						App.back = function(){
							location.href = GLOBAL_MAIN_VARS["BASE_URL"] + GLOBAL_MAIN_VARS["MODUL"];
						} */
					</script>