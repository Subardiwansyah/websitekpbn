<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>bootstrap4</title>
	
	<link id="vendorsbundle" rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>assets/css/vendors.bundle.css">
		<link id="appbundle" rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>assets/css/app.bundle.css">
		<link id="myskin" rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>assets/css/skins/skin-master.css">
		<link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>assets/css/skins/cust-theme-12.css">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>data/img/logo/favicon.png">
		<link rel="shortcut icon" href="#" />
		<link rel="icon" type="image/png" sizes="70x70" href="<?php echo base_url(); ?>data/img/logo/favicon.png">
		<link rel="mask-icon" href="<?php echo base_url(); ?>assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
		<link rel="stylesheet" href="<?=base_url();?>assets/css/datagrid/datatables/datatables.bundle.css"> 
		<link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>assets/css/notifications/toastr/toastr.css">
		<link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>assets/css/formplugins/select2/select2_3_5_4.css">
		<link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>assets/css/formplugins/select2/select2.bundle.css">
		<link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>assets/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css">
		<link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>assets/css/custom.css">
		<link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>assets/css/magnific-popup/magnific-popup.css">
		<script src="<?php echo base_url(); ?>assets/js/knockout/knockout.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/knockout/knockout.validation.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/magnific-popup/jquery.magnific-popup.js"></script>
	
	<!-- SweetAlert2 -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
		<!-- daterange picker -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
		<!-- iCheck for checkboxes and radio inputs -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
		<!-- Bootstrap Color Picker -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
		<!-- Tempusdominus Bootstrap 4 -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets//plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
		<!-- Select2 -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
		<!-- Bootstrap4 Duallistbox -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
		<!-- BS Stepper -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bs-stepper/css/bs-stepper.min.css">
		<!-- dropzonejs -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/dropzone/min/dropzone.min.css">
		<!-- jQuery -->
		<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

		<script type="text/javascript">
			GLOBAL_MAIN_VARS = new Array ();
			GLOBAL_MAIN_VARS['BASE_URL']	= '<?php echo base_url(); ?>';
			GLOBAL_MAIN_VARS['ID_GROUP']	= '<?php echo $this->session->userdata('ID_GROUP'); ?>';
			GLOBAL_MAIN_VARS['ID_BAGIAN']	= '<?php echo $this->session->userdata('ID_BAGIAN'); ?>';
			GLOBAL_MAIN_VARS['ID_USER']	= '<?php echo $this->session->userdata('ID_USER'); ?>';
			GLOBAL_MAIN_VARS['LOGGED_IN']	= '<?php echo $this->session->userdata('logged_in'); ?>';
			GLOBAL_MAIN_VARS['MODUL']	= '<?php echo isset($modul) ? $modul : ''; ?>';
		</script>
	
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
  </head>
  <body>
  <div class="form-row">
	<div class="col-md-4 col-sm-4 col-xs-12 mb-3">
	<div class="form-group">
		<label class="form-label" for="pembiayaan">Deskripsi Pembiayaan <span class="text-danger">*</span> </label>
		<textarea class="form-control form-control-sm" id="pembiayaan" name="pembiayaan" placeholder="Deskripsi Pembiayaan"><?php echo isset($data['NAMA_PEMBIAYAAN']) ? $data['NAMA_PEMBIAYAAN'] : '';?></textarea>
	</div>
	</div>
		
</div>
    <textarea id="summernote"></textarea>
    <script>
	$('textarea#pembiayaan').summernote({
        placeholder: 'Hello bootstrap 4',
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
      });
	$(document).ready(function(){
		
	});
	
      
    </script>
	
	<script src="<?php echo base_url(); ?>assets/js/vendors.bundle.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/app.bundle.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/datagrid/datatables/datatables.bundle.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/notifications/toastr/toastr.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/dependency/moment/moment.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/formplugins/select2/select2_3_5_4.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootbox/bootbox.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/dependency/numeral/numeral.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/dependency/formatcurrency/jquery.formatCurrency.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/dependency/accounting/accounting.js"></script>
		
		<!-- jquery-validation -->
		<script src="<?php echo base_url(); ?>assets/js/jquery-validation/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery-validation/additional-methods.min.js"></script>
		
		<!-- date-range-picker -->
		<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>

		<!-- Tempusdominus Bootstrap 4 -->
		<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

		<!-- InputMask -->
		<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>



		<script type="text/javascript">
			var example_gridsize = $("#example-gridsize");

			$("#gridrange").on("input change", function()
			{
				example_gridsize.attr("placeholder", ".col-" + $(this).val());
				example_gridsize.parent().removeClass().addClass("col-" + $(this).val())
			});
		</script>
  </body>
</html>