
	<!-- core:js -->
	
  

  {{-- <script src="../../../assets/vendors/select2/select2.min.js"></script> --}}
  <script src="{{ asset('../../../assets/vendors/select2/select2.min.js') }}"></script>
	<!-- endinject -->



	
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  
  <script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>

	<!-- endinject -->

	<!-- Custom js for this page -->
 
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
  <script src="{{ asset('../../../assets/vendors/fullcalendar/main.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/fullcalendar.js') }}"></script>
  <script src="{{ asset('../../../assets/vendors/moment/moment.min.js') }}"></script>
  

  {{-- <script src="../../../assets/vendors/fullcalendar/main.min.js"></script> --}}
{{-- 	<!-- End custom js for this page --> --}}
{{-- <script src="js/sweetalert.js"></script> --}}
<script src="{{ asset('js/sweetalert.js') }}"></script>

























<script>
     // Function to limit the number of characters and disallow numbers in an input field
     function limitCharactersNoNumbers(element, maxLength) {
            // Remove any numeric characters
            element.value = element.value.replace(/[0-9]/g, '');

            // Check and limit the total number of characters
            if (element.value.length > maxLength) {
                element.value = element.value.slice(0, maxLength);
            }
        }


         // Function to allow only numbers in an input field
         function allowNumbersOnly(element, maxLength) {
            // Remove any non-numeric characters
            element.value = element.value.replace(/\D/g, '');

            // Check and limit the total number of characters
            if (element.value.length > maxLength) {
                element.value = element.value.slice(0, maxLength);
            }
        }
        
</script>





<script>
  document.addEventListener('DOMContentLoaded', function() {
      $('#deleteConfirmationModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var deleteId = button.data('delete-id');
      var form = $('#deleteClubForm');
      
      // Replace the action URL with your actual route for president deletion
      form.attr('action', '/presidents/' + deleteId);
});
          
      
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
      $('#deleteConfirmationModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var deleteId = button.data('delete-id');
      var form = $('#deleteClubForm');
      
      // Replace the action URL with your actual route for president deletion
      form.attr('action', '/athletes/' + deleteId);
});
          
      
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
<script>
  document.addEventListener('DOMContentLoaded', function() {
      $('#deleteConfirmationModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var deleteId = button.data('delete-id');
          var form = $('#deleteClubForm');
          
          // Replace the action URL with your actual route for club deletion
          form.attr('action', '/competitions/' + deleteId);
         
      });
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
      $('#deleteConfirmationModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var deleteId = button.data('delete-id');
          var form = $('#deleteClubForm');
          
          // Replace the action URL with your actual route for club deletion
          form.attr('action', '/epreuves/' + deleteId);
         
      });
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
      $('#deleteConfirmationModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var deleteId = button.data('delete-id');
          var form = $('#deleteClubForm');
          
          // Replace the action URL with your actual route for club deletion
          form.attr('action', '/sessions/' + deleteId);
         
      });
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
      $('#deleteConfirmationModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var deleteId = button.data('delete-id');
          var form = $('#deleteClubForm');
          
          // Replace the action URL with your actual route for club deletion
          form.attr('action', '/PreContrat/' + deleteId);
         
      });
  });
</script>



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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}



@yield('scripts')