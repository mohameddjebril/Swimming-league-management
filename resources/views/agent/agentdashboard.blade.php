<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Admin Panel - league de natation</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
  <!-- End fonts -->

<!--Bootstrap 5 icons CDN-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.cs') }}s">
	<!-- End plugin css for this page -->

	<!-- table reche -->
	<link rel="stylesheet" href="{{asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">




	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
	     
        @include('agent.body.sidebar')
     
		<!-- partial -->
	
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
	      
            @include('agent.body.header')

			<!-- partial -->
			<div class="page-content">
				@yield('agent')
			   </div>
             

            

			<!-- partial:partials/_footer.html -->
			@include('agent.body.footer')
			<!-- partial -->
		
		</div>
	</div>

			<!-- ./wrapper -->
		{{-- @include('admin.body.footer-scripts') --}}
	<!-- core:js -->
	<script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/template.js') }}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="{{ asset('backend/assets/js/dashboard-dark.js') }}"></script>
	<!-- End custom js for this page -->

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
 
</script> 
 <!--script table recherche -->
 <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  
 <script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>

 <script src="{{ asset('assets/js/data-table.js') }}"></script>

 <script>
	document.addEventListener('DOMContentLoaded', function() {
		var successMessage = $('#successMessage');
  
		// Display success message and hide after 4 seconds
		if (successMessage.length > 0) {
			successMessage.show();
			setTimeout(function() {
				successMessage.hide();
			}, 3000);
		}
	});
  </script>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		$('#deleteConfirmationModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget);
			var deleteId = button.data('delete-id');
			var form = $('#deleteClubForm');
			
			// Replace the action URL with your actual route for club deletion
			form.attr('action', '/clubs/' + deleteId);
		   
		});
	});
  </script>


</body>
</html>    