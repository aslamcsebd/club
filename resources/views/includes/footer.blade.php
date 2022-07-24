
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
      
      // Member payment type
      $("#paymentType").prop("selectedIndex", -1);
      $("#paymentType").click(function () {
         var e = document.getElementById("paymentType");
         var value = e.selectedIndex;
         // var chkFormationDept = e.value;

         if (value==0) {
            $('#monthly [data_id="monthlyFee"]').parent().removeClass('active').css('display', 'block');
         }
         if (value==1) {
            $('#monthly [data_id="monthlyFee"]').parent().removeClass('active').css('display', 'none');
         }
      })

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

      $(document).on('click', '#addExtraDropdown', function (e) {
         e.preventDefault()
         var html = '<div class="row justify-content-center dropdownDelete"> <i class="fa fa-chevron-down pt-3"></i> <div class="col-8 form-group"> <input type="text" name="dropdownValue[]" class="form-control" placeholder="Value name" required/> </div><button type="button" class="btn dropdown-btn"> <i class="fa fa-trash"></i> </button> </div>'

         $('#extraDropdown').append(html)
      });

      $("body").on("click",".dropdown-btn",function(e){
          $(this).parents('.dropdownDelete').remove();
      });

      // member Category Edit
      $(document).ready(function() {
         $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
         $(".editCategory").click(function(){
            var id = $(this).data('id');
            $.ajax({
               method: "GET",
               url: "{{ Route('editCategory') }}",
               data: {id: id},

               success:function(response){   
                  $('.modal-body').html(response);
                  $('#editCategory').modal('show');
               }
            });
         });
      });
   </script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

   <script type="text/javascript">
      $(document).ready(function() {
         $('.multiple-checkboxes').multiselect({
            includeSelectAllOption: true,
         });
      });
   </script>

   <script>
      let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

      elems.forEach(function(html) {
          let switchery = new Switchery(html,  { size: 'small' });
      });

      // Status change
      $(document).ready(function(){
         $('.status').change(function () {

            let model = $(this).data('model');
            let field = $(this).data('field');
            let id = $(this).data('id');
            let tab = $(this).data('tab');

            $.ajax({
               type: "GET",
               dataType: "json",
               url: '{{ route('status') }}',
               data: {'model': model, 'field': field, 'id': id, 'tab': tab},
               success: function (data) {
                  toastr.options.closeButton = true;
                  toastr.options.closeMethod = 'fadeOut';
                  toastr.options.closeDuration = 100;
                  toastr.success(data.message);
               }
            });
         });
      });
   </script>

   <!-- Login page -->
   <script>
      function yesIDo() {
         $("#parentDiv").css("display", "none");        
         $("#loginInfo").css({"display":"block", "text-align":"justify"});        
      }
      function yesIDo2() {
         $("#parentDiv").css("display", "block");
         $("#loginInfo").css("display", "none");
      }
      function yesIDo3() {
         $("#parentDiv").css("display", "block");
         $("#loginInfo").css("display", "none");
      }
   </script>

   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

   <script>
      $(function(){
         $('#mobile2').autocomplete({
            source:function(request, response) {
               $.getJSON('{{url('member-list')}}', function(data){
                  var array = $.map(data, function(row) {
                     return {
                        value:row.id,
                        label:row.name,

                        name:row.name
                     }
                  })
                  response($.ui.autocomplete.filter(array, request.term));
               })
            },
            minLength:1,
            delay:500,
            select:function(event, ui){
               console.log(ui.item);
            }
         })
      })
   </script>
