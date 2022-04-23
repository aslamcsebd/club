
<!-- jQuery -->
   <script src="{{ asset('js/jquery.min.js') }}"></script>

   <!-- Bootstrap v4.6.0 -->
   <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

   <!-- overlayScrollbars -->
   <script src="{{ asset('js/jquery.overlayScrollbars.min.js') }}"></script>
   
   <!-- AdminLTE App -->
   <script src="{{ asset('js/adminlte.min.js') }}"></script>
   
   {{-- Pushmenu --}}
   <script src="{{ asset('js/custom.js') }}"></script> 

   {{-- dataTables --}}
   <script src="{{ asset('js/dataTables.min.js') }}"></script>

   <!-- summernote -->
   {{-- <script src="{{ asset('/') }}summernote/summernote.min.js" ></script> --}}

   <!-- Datepicker -->
   <script src="{{ asset('/') }}js/datepicker.min.js"></script>
   
   <script type="text/javascript">
      // if ($(window).width() > 992) {
        $(window).scroll(function(){
           if ($(this).scrollTop() > 0) { //default: 40
              $('#navbar_top').addClass("fixed-top");
              // add padding top to show content behind navbar
              $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
            }else{
              $('#navbar_top').removeClass("fixed-top");
               // remove padding top from body
              $('body').css('padding-top', '0');
            }   
        });
      // } // end

      window.setTimeout(function(){
         $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
         });
      }, 5000);

      $(".datepicker").datepicker({
         format: "dd-mm-yyyy",
         // startView: "months", 
         // minViewMode: "months"
      });


      $(document).ready(function(){
         $('.table').DataTable();
      });

    
      $(document).ready(function(){
        $('.summernote').summernote();
      });    
      
      //redirect to specific tab
      $(document).ready(function(){
         $('#tabMenu a[href="#{{ old('tab') }}"]').tab('show')
      });


      // Member paid (%)
      $("#paidNo").click(function () {
         var chkFormationDept = document.getElementById("paidNo").checked;
         if (chkFormationDept) {
            $('#paidStatus [data_id="paidAction"]').parent().removeClass('active').css('display', 'none');
         }
      })                       
      $("#paidYes").click(function () {
          var chkFormationDept = document.getElementById("paidYes").checked;
          if (chkFormationDept) {
              $('#paidStatus [data_id="paidAction"]').parent().removeClass('active').css('display', 'block');
          }
      })
      
   </script>
