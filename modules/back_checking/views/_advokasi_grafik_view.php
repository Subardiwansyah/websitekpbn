					<div class="row">
						<div class="col-md-12">
							<div id="grafik_advokasi"></div>
						</div>
					</div>

					<input type="hidden" class="" id="xx_id_tap" value="<?php echo $id_tap; ?>">
					<input type="hidden" class="" id="xx_pilperiode" value="<?php echo $pilperiode; ?>">
					<input type="hidden" class="" id="xx_tahun_kuartal" value="<?php echo $tahun_kuartal; ?>">
					<input type="hidden" class="" id="xx_bulan_kuartal" value="<?php echo $bulan_kuartal; ?>">
					<input type="hidden" class="" id="xx_tahun" value="<?php echo $tahun; ?>">
					<input type="hidden" class="" id="xx_bulan" value="<?php echo $bulan; ?>">
					<input type="hidden" class="" id="xx_minggu" value="<?php echo $minggu; ?>">

					<script>
						$(document).ready(function()
						{
							var arr = ['advokasi'];
							var arr_length = arr.length;

							for (var i = 0; i < arr_length; i++)
							{
								var xx_id_tap = $('#xx_id_tap').val();
								var xx_pilperiode = $('#xx_pilperiode').val();
								var xx_tahun_kuartal = $('#xx_tahun_kuartal').val();
								var xx_bulan_kuartal = $('#xx_bulan_kuartal').val();
								var xx_tahun = $('#xx_tahun').val();
								var xx_bulan =  $('#xx_bulan').val();
								var xx_minggu =  $('#xx_minggu').val();

								$('#grafik_'+arr[i]).load(
									GLOBAL_MAIN_VARS["BASE_URL"] + GLOBAL_MAIN_VARS["MODUL"] + '/get_data_grafik_advokasi_' + arr[i] + '/' +
									xx_id_tap + '/' +
									xx_pilperiode + '/' +
									xx_tahun_kuartal + '/' +
									xx_bulan_kuartal + '/' +
									xx_tahun + '/' +
									xx_bulan + '/' +
									xx_minggu + '/'
								);
							}
						});
					</script>