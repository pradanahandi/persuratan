<?php 
	session_start();
	if(!$_SESSION['username'])
    {
        header("Location:../index.php");
    }
    if($_SESSION['username'])
    {    	
        $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
		<title> Aplikasi Persuratan SEAMOLEC </title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="../assets/css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="../assets/css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="../assets/css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="../assets/css/smartadmin-skins.min.css">

		<!-- SmartAdmin RTL Support  -->
		<link rel="stylesheet" type="text/css" media="screen" href="../assets/css/smartadmin-rtl.min.css">

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="../assets/css/demo.min.css">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="../assets/img/logo_seamolec.png" type="image/x-icon">
		<link rel="icon" href="../assets/img/logo_seamolec.png" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">		
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="../assets/img/logo_seamolec.pngimg/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="../assets/img/logo_seamolec.pngimg/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="../assets/img/logo_seamolec.pngimg/splash/iphone.png" media="screen and (max-device-width: 320px)">

	</head>	
	<body class="">
		<header id="header">
			<div id="logo-group">
				<span id="logo"> <img src="../assets/img/logo.png" alt="SmartAdmin"> </span>
			</div>	
			<div class="pull-right">
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>				
								
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
							<img src="../assets/img/avatars/sunny.png" alt="John Doe" class="online" />  
						</a>						
					</li>
				</ul>				
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="logout.php" title="Sign Out" data-action="userLogout" data-logout-msg="Apakah yakin akan keluar?"><i class="fa fa-sign-out"></i></a> </span>
				</div>				
			</div>			
		</header>		
		<aside id="left-panel">
			<?php include 'menu.php';?>			
		</aside>				
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Home</li><li>Dashboard</li>
				</ol>				

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">
				<?php 
					$file = (isset($_REQUEST['page'])&& $_REQUEST['page'] !=NULL)?$_REQUEST['page']:'';
	                if(file_exists($file.".php"))
	                {
	                    include($file.".php");
	                }else{
	                    include("home.php");
	                }               

				?>

			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
		<div class="page-footer">
			<?php include 'footer.php';?>
		</div>
		<!-- END PAGE FOOTER -->		

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="../assets/js/plugin/pace/pace.min.js"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');
			}
		</script>

		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="../assets/js/app.config.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="../assets/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="../assets/js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="../assets/js/notification/SmartNotification.min.js"></script>

		<!-- PAGE RELATED PLUGIN(S) -->
		<script src="../assets/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="../assets/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="../assets/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="../assets/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="../assets/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>



		<!-- JARVIS WIDGETS -->
		<script src="../assets/js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="../assets/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

		<!-- SPARKLINES -->
		<script src="../assets/js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="../assets/js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="../assets/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="../assets/js/plugin/select2/select2.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="../assets/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="../assets/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="../assets/js/plugin/fastclick/fastclick.min.js"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- Demo purpose only -->
		<script src="../assets/js/demo.min.js"></script>

		<!-- MAIN APP JS FILE -->
		<script src="../assets/js/app.min.js"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="../assets/js/speech/voicecommand.min.js"></script>

		<!-- SmartChat UI : plugin -->
		<script src="../assets/js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="../assets/js/smart-chat-ui/smart.chat.manager.min.js"></script>
		
		<!-- PAGE RELATED PLUGIN(S) -->
		
		<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
		<script src="../assets/js/plugin/flot/jquery.flot.cust.min.js"></script>
		<script src="../assets/js/plugin/flot/jquery.flot.resize.min.js"></script>
		<script src="../assets/js/plugin/flot/jquery.flot.time.min.js"></script>
		<script src="../assets/js/plugin/flot/jquery.flot.tooltip.min.js"></script>
		
		<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
		<script src="../assets/js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="../assets/js/plugin/vectormap/jquery-jvectormap-world-mill-en.js"></script>
		
		<!-- Full Calendar -->
		<script src="../assets/js/plugin/moment/moment.min.js"></script>
		<script src="../assets/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>

		<!--DataTable-->
		<script type="text/javascript">
			$(document).ready(function() {
				
				pageSetUp();				
		
				/* BASIC ;*/
					var responsiveHelper_dt_basic = undefined;
					var responsiveHelper_datatable_fixed_column = undefined;
					var responsiveHelper_datatable_col_reorder = undefined;
					var responsiveHelper_datatable_tabletools = undefined;
					
					var breakpointDefinition = {
						tablet : 1024,
						phone : 480
					};
		
					$('#dt_basic').dataTable({
						"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
							"t"+
							"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
						"autoWidth" : true,
						"preDrawCallback" : function() {
							// Initialize the responsive datatables helper once.
							if (!responsiveHelper_dt_basic) {
								responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
							}
						},
						"rowCallback" : function(nRow) {
							responsiveHelper_dt_basic.createExpandIcon(nRow);
						},
						"drawCallback" : function(oSettings) {
							responsiveHelper_dt_basic.respond();
						}
					});
		
				/* END BASIC */
				
				/* COLUMN FILTER  */
			    var otable = $('#datatable_fixed_column').DataTable({			    	
					"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
							"t"+
							"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					"autoWidth" : true,
					"preDrawCallback" : function() {
						// Initialize the responsive datatables helper once.
						if (!responsiveHelper_datatable_fixed_column) {
							responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
						}
					},
					"rowCallback" : function(nRow) {
						responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
					},
					"drawCallback" : function(oSettings) {
						responsiveHelper_datatable_fixed_column.respond();
					}		
				
			    });
			    
			    // custom toolbar
			    $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
			    	   
			    // Apply the filter
			    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
			    	
			        otable
			            .column( $(this).parent().index()+':visible' )
			            .search( this.value )
			            .draw();
			            
			    } );
			    /* END COLUMN FILTER */   
		    
				/* COLUMN SHOW - HIDE */
				$('#datatable_col_reorder').dataTable({
					"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
							"t"+
							"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
					"autoWidth" : true,
					"preDrawCallback" : function() {
						// Initialize the responsive datatables helper once.
						if (!responsiveHelper_datatable_col_reorder) {
							responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
						}
					},
					"rowCallback" : function(nRow) {
						responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
					},
					"drawCallback" : function(oSettings) {
						responsiveHelper_datatable_col_reorder.respond();
					}			
				});
				
				/* END COLUMN SHOW - HIDE */
		
				/* TABLETOOLS */
				$('#datatable_tabletools').dataTable({
					
					// Tabletools options: 
					//   https://datatables.net/extensions/tabletools/button_options
					"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
							"t"+
							"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
			        "oTableTools": {
			        	 "aButtons": [
			             "copy",
			             "csv",
			             "xls",
			                {
			                    "sExtends": "pdf",
			                    "sTitle": "SmartAdmin_PDF",
			                    "sPdfMessage": "SmartAdmin PDF Export",
			                    "sPdfSize": "letter"
			                },
			             	{
		                    	"sExtends": "print",
		                    	"sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
		                	}
			             ],
			            "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
			        },
					"autoWidth" : true,
					"preDrawCallback" : function() {
						// Initialize the responsive datatables helper once.
						if (!responsiveHelper_datatable_tabletools) {
							responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
						}
					},
					"rowCallback" : function(nRow) {
						responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
					},
					"drawCallback" : function(oSettings) {
						responsiveHelper_datatable_tabletools.respond();
					}
				});
				
				/* END TABLETOOLS */
			
			})
		</script>
		<!--EndDataTable-->

		<!--Form-->

		<script>
			  $( function() {
			    $( "#datepicker" ).datepicker();
			  } );
	  	</script>
		<!-- <script type="text/javascript">		
			// DO NOT REMOVE : GLOBAL FUNCTIONS!			
			$(document).ready(function() {				
				pageSetUp();
				var $checkoutForm = $('#checkout-form').validate({
				// Rules for form validation
					rules : {
						fname : {
							required : true
						},
						lname : {
							required : true
						},
						email : {
							required : true,
							email : true
						},
						phone : {
							required : true
						},
						country : {
							required : true
						},
						city : {
							required : true
						},
						code : {
							required : true,
							digits : true
						},
						address : {
							required : true
						},
						name : {
							required : true
						},
						card : {
							required : true,
							creditcard : true
						},
						cvv : {
							required : true,
							digits : true
						},
						month : {
							required : true
						},
						year : {
							required : true,
							digits : true
						}
					},
			
					// Messages for form validation
					messages : {
						fname : {
							required : 'Please enter your first name'
						},
						lname : {
							required : 'Please enter your last name'
						},
						email : {
							required : 'Please enter your email address',
							email : 'Please enter a VALID email address'
						},
						phone : {
							required : 'Please enter your phone number'
						},
						country : {
							required : 'Please select your country'
						},
						city : {
							required : 'Please enter your city'
						},
						code : {
							required : 'Please enter code',
							digits : 'Digits only please'
						},
						address : {
							required : 'Please enter your full address'
						},
						name : {
							required : 'Please enter name on your card'
						},
						card : {
							required : 'Please enter your card number'
						},
						cvv : {
							required : 'Enter CVV2',
							digits : 'Digits only'
						},
						month : {
							required : 'Select month'
						},
						year : {
							required : 'Enter year',
							digits : 'Digits only please'
						}
					},
			
					// Do not change code below
					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});
						
				var $registerForm = $("#smart-form-register").validate({
		
					// Rules for form validation
					rules : {
						username : {
							required : true
						},
						email : {
							required : true,
							email : true
						},
						password : {
							required : true,
							minlength : 3,
							maxlength : 100
						},
						passwordConfirm : {
							required : true,
							minlength : 3,
							maxlength : 20,
							equalTo : '#password'
						},
						firstname : {
							required : true
						},
						lastname : {
							required : true
						},
						gender : {
							required : true
						},
						terms : {
							required : true
						}
					},
		
					// Messages for form validation
					messages : {
						login : {
							required : 'Please enter your login'
						},
						email : {
							required : 'Please enter your email address',
							email : 'Please enter a VALID email address'
						},
						password : {
							required : 'Please enter your password'
						},
						passwordConfirm : {
							required : 'Please enter your password one more time',
							equalTo : 'Please enter the same password as above'
						},
						firstname : {
							required : 'Please select your first name'
						},
						lastname : {
							required : 'Please select your last name'
						},
						gender : {
							required : 'Please select your gender'
						},
						terms : {
							required : 'You must agree with Terms and Conditions'
						}
					},
		
					// Do not change code below
					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});
		
				var $reviewForm = $("#review-form").validate({
					// Rules for form validation
					rules : {
						name : {
							required : true
						},
						email : {
							required : true,
							email : true
						},
						review : {
							required : true,
							minlength : 20
						},
						quality : {
							required : true
						},
						reliability : {
							required : true
						},
						overall : {
							required : true
						}
					},
		
					// Messages for form validation
					messages : {
						name : {
							required : 'Please enter your name'
						},
						email : {
							required : 'Please enter your email address',
							email : '<i class="fa fa-warning"></i><strong>Please enter a VALID email addres</strong>'
						},
						review : {
							required : 'Please enter your review'
						},
						quality : {
							required : 'Please rate quality of the product'
						},
						reliability : {
							required : 'Please rate reliability of the product'
						},
						overall : {
							required : 'Please rate the product'
						}
					},
		
					// Do not change code below
					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});
				
				var $commentForm = $("#comment-form").validate({
					// Rules for form validation
					rules : {
						name : {
							required : true
						},
						email : {
							required : true,
							email : true
						},
						url : {
							url : true
						},
						comment : {
							required : true
						}
					},
		
					// Messages for form validation
					messages : {
						name : {
							required : 'Enter your name',
						},
						email : {
							required : 'Enter your email address',
							email : 'Enter a VALID email'
						},
						url : {
							email : 'Enter a VALID url'
						},
						comment : {
							required : 'Please enter your comment'
						}
					},
		
					// Ajax form submition
					submitHandler : function(form) {
						$(form).ajaxSubmit({
							success : function() {
								$("#comment-form").addClass('submited');
							}
						});
					},
		
					// Do not change code below
					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});
		
				var $contactForm = $("#contact-form").validate({
					// Rules for form validation
					rules : {
						name : {
							required : true
						},
						email : {
							required : true,
							email : true
						},
						message : {
							required : true,
							minlength : 10
						}
					},
		
					// Messages for form validation
					messages : {
						name : {
							required : 'Please enter your name',
						},
						email : {
							required : 'Please enter your email address',
							email : 'Please enter a VALID email address'
						},
						message : {
							required : 'Please enter your message'
						}
					},
		
					// Ajax form submition
					submitHandler : function(form) {
						$(form).ajaxSubmit({
							success : function() {
								$("#contact-form").addClass('submited');
							}
						});
					},
		
					// Do not change code below
					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});
		
				var $loginForm = $("#login-form").validate({
					// Rules for form validation
					rules : {
						email : {
							required : true,
							email : true
						},
						password : {
							required : true,
							minlength : 3,
							maxlength : 20
						}
					},
		
					// Messages for form validation
					messages : {
						email : {
							required : 'Please enter your email address',
							email : 'Please enter a VALID email address'
						},
						password : {
							required : 'Please enter your password'
						}
					},
		
					// Do not change code below
					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});
		
				var $orderForm = $("#order-form").validate({
					// Rules for form validation
					rules : {
						name : {
							required : true
						},
						email : {
							required : true,
							email : true
						},
						phone : {
							required : true
						},
						interested : {
							required : true
						},
						budget : {
							required : true
						}
					},
		
					// Messages for form validation
					messages : {
						name : {
							required : 'Please enter your name'
						},
						email : {
							required : 'Please enter your email address',
							email : 'Please enter a VALID email address'
						},
						phone : {
							required : 'Please enter your phone number'
						},
						interested : {
							required : 'Please select interested service'
						},
						budget : {
							required : 'Please select your budget'
						}
					},
		
					// Do not change code below
					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});
		
				// START AND FINISH DATE
				$('#startdate').datepicker({
					dateFormat : 'd/m/Y',
					prevText : '<i class="fa fa-chevron-left"></i>',
					nextText : '<i class="fa fa-chevron-right"></i>',
					onSelect : function(selectedDate) {
						$('#finishdate').datepicker('option', 'minDate', selectedDate);
					}
				});
				
				$('#finishdate').datepicker({
					dateFormat : 'd/m/Y',
					prevText : '<i class="fa fa-chevron-left"></i>',
					nextText : '<i class="fa fa-chevron-right"></i>',
					onSelect : function(selectedDate) {
						$('#startdate').datepicker('option', 'maxDate', selectedDate);
					}
				});
			
			})
		</script> -->
		<!--EndForm-->

		<!--End Calendar-->
	</body>

</html>
<?php } ?>