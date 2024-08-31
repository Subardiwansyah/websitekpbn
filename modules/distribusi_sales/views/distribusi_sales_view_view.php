					<div class="panel-content">
						<div class="row">
							<div class="col-md-12">

								<div class="row mx-2">
									<div class="col-md-5 col-sm-5 col-xs-5">
										<h5 class="keep-print-font fw-500 mb-2 text-primary flex-1 position-relative">
											<i class="fal fa-tag"></i>&nbsp;&nbsp;
											DATA PRODUK
										</h5>

										<div class="form-group mb-1">
											<div class="input-group">
												<input type="text" class="form-control form-control-sm" placeholder="Pencarian Produk" id="cari_produk">
												<div class="input-group-append">
													<button class="btn btn-sm btn-primary waves-effect waves-themed" type="button" id="btn_cari_produk"><i class="fal fa-search"></i></button>
												</div>
											</div>
										</div>

									</div>
									<div class="col-md-7 col-sm-7 col-xs-7">
										<h5 class="keep-print-font fw-500 mb-2 text-primary flex-1 position-relative">
											<i class="fal fa-barcode-read"></i>&nbsp;&nbsp;
											SERIAL NUMBER
										</h5>

										<div class="form-group mb-1">
											<div class="input-group">
												<input type="text" class="form-control form-control-sm" placeholder="Pencarian Serial Number" id="cari_sn">
												<div class="input-group-append">
													<button class="btn btn-sm btn-primary waves-effect waves-themed" type="button" id="btn_cari_sn"><i class="fal fa-search"></i></button>
												</div>
											</div>
										</div>

									</div>
								</div>

								<div class="slim-scrool-content">

									<div id="loading" style="display:none">
										<div class="spinner-border" role="status">
											<span class="sr-only">Loading...</span>
										</div>
									</div>
									<div id="content"></div>

								</div>
							</div>
						</div>
					</div>
					<div class="panel-content py-3 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-right">
						<button type="button" class="btn btn-sm btn-primary" id="btn_batal"><i class="fal fa-times"></i> Tutup</button>
					</div>

					<script>
						$(document).ready(function()
						{
							reload_produk();

							$('#btn_batal').click(function(){
								bootbox.hideAll(); // Hide all bootbox
							});

							$('#btn_cari_produk').click(function(){
								reload_produk();
							});

							$('#btn_cari_sn').click(function(){
								reload_produk();
							});

							$("#cari_produk, #cari_sn").keypress(function(e){
								if (e.which==13){
									reload_produk();
									return false;
								}
							});

							$('.slim-scrool-content').slimScroll({
								color: color.primary._700,
								size: '12px',
								height: '400px',
								alwaysVisible: true
							});

							$('.slim-scrool').slimScroll({
								position: 'right',
								height: '120px',
								alwaysVisible: true
							});
						});

						function reload_produk(){
							var html = '';
							var no = 1;

							$('#loading').show();
							$('#content').hide();

							$.ajax({
								type: 'POST',
								url: GLOBAL_MAIN_VARS["BASE_URL"] + GLOBAL_MAIN_VARS["MODUL"] + '/get_list_produk_available',
								async: false,
								dataType: 'json',
								data:{
									sales: '<?php echo $id; ?>',
									produk: $('#cari_produk').val(),
									sn: $('#cari_sn').val()
								},
								success: function(response){
									var result = response.rows;
									var len = response.len;

									if (len > 0)
									{
										for (i = 0; i < len; i++)
										{
											var x_sn = result[i]['serial_number'];
											var x_count = result[i]['qty'];
											var x_length = x_sn.length;

											html +=
												" <div class='row mx-2'>" +
												"		<div class='col-md-5 col-sm-5 col-xs-12'>" +
												"			<div class='card mb-3' style='height:148px;'>" +
												"				<div class='card-body'>" +
												"					<div class='p-4 bg-info-500 rounded overflow-hidden position-relative text-white mb-g'>" +
												"						<div class=''>" +
												"							<h3 class='display-4 d-block l-h-n m-0 fw-500'>" +
												"								" + result[i]['qty'] + "" +
												"								<small class='m-0 l-h-n'>" + result[i]['nama_produk'] + "</small>" +
												"							</h3>" +
												"						</div>" +
												"						<i class='fal fa-sim-card position-absolute pos-right pos-bottom opacity-15  mb-n1 mr-n4' style='font-size: 6rem;'></i>" +
												"					</div>" +
												"				</div>" +
												"			</div>" +
												"		</div>" +
												"		<div class='col-md-7 col-sm-7 col-xs-12'>" +
												"			<div class='card mb-3' style='height:148px'>" +
												"				<div class='card-body'>" +
												"					<div class='slim-scrool'>" +
												"						<div class='mx-3'>" +
												"							<div class='row'>";

											for (a=0; a<x_length; a++)
											{

											html +=
												"								<div class='col-md-6'>" +
												"									- " + x_sn[a] + "" +
												"								</div>";
											}

											html +=
												"							</div>" +
												"						</div>" +
												"					</div>" +
												"				</div>" +
												"			</div>" +
												"		</div>" +
												" </div>";
										}
									}
								}
							});

							$('#loading').hide();
							$('#content').show();
							$('#content').html(html);

							$('.slim-scrool').slimScroll({
								position: 'right',
								height: '120px',
								alwaysVisible: true
							});
						}
					</script>