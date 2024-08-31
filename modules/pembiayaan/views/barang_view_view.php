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
													DATA DETAIL PEMBIAYAAN
												</h5>
												<input type="hidden" name="id" id="id" value="<?php echo isset($data['id_barang']) ? $data['id_barang'] : '';?>" />
												<div class="card mb-3">
													<div class="card-body">
														<div class="form-row">
															<div class="col-md-4 col-sm-4 col-xs-12 mb-3">
															<div class="form-group">
																<label class="form-label" for="pembiayaan">Deskripsi Pembiayaan <span class="text-danger">*</span> </label>
																<textarea class="form-control form-control-sm" id="pembiayaan" name="pembiayaan" placeholder="Deskripsi Pembiayaan" readonly="readonly"><?php echo isset($data['NAMA_PEMBIAYAAN']) ? $data['NAMA_PEMBIAYAAN'] : '';?></textarea>
															</div>
															</div>
															<div class="col-md-4 col-sm-4 col-xs-12 mb-3">
															<div class="form-group">
																<label class="form-label" for="sisa_rkap">COA<span class="text-danger">*</span></label>
																<input type="text" class="form-control form-control-sm" id="sisa_rkap" name="sisa_rkap" value="<?php echo isset($data['COA']) ? $data['COA'].' - '.$data['KET_COA'] : '';?>" readonly="readonly">
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
																<input type="text" class="form-control form-control-sm nilai" id="pengajuan" name="pengajuan" value="<?php echo isset($data['JUMLAH_PENGAJUAN']) ? $data['JUMLAH_PENGAJUAN'] : '';?>" readonly="readonly">
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
											</div>
											<div class="panel-content py-3 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-right">
												<button onClick="back()" type="button" class="btn btn-sm btn-primary" id="btn-batal" data-bind="click: back"><i class="fal fa-times"></i> Batal</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</main>

					<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>

					<script>
						$(document).ready(function()
						{
							$('.nilai').inputmask({rightAlign: false, 'alias': 'decimal', 'groupSeparator':'.'});
						});
						function back(){
							location.href = GLOBAL_MAIN_VARS["BASE_URL"] + GLOBAL_MAIN_VARS["MODUL"];
						}

					</script>