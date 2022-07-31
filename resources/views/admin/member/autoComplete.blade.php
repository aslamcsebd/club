
<!-- Auto complete -->

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script>
        $(function() {
            $('#mobile').autocomplete({
                source:function(request, response) {
                    $.getJSON('{{url('member-list')}}?term='+request.term, function(data){

                        var array = $.map(data, function(row) {
                            return {                        
                                value:row.mobile, //After search input this
                                label:row.mobile, //Search column 

                                id:row.id,
                                name:row.name,
                                email:row.email,
                                password:row.password,
                                confirm_password:row.confirm_password,
                                address:row.address,
                                gender:row.gender,
                                blood:row.blood,
                                dob:row.dob,
                                member_no:row.member_no,                        
                            }
                        })
                        response($.ui.autocomplete.filter(array, request.term));
                    })
                },
                minLength:1,
                delay:500,
                select:function(event, ui){
                
                // console.log(ui.item);
                $('#id').val(ui.item.id);
                $('#mobile').val(ui.item.mobile);
                $('#name').val(ui.item.name);
                $('#email').val(ui.item.email);
                $('#password').prop('disabled', true);
                $('#confirm_password').prop('disabled', true);
                $('#address').val(ui.item.address);
                $('#gender').val(ui.item.gender);
                $('#blood').val(ui.item.blood);
                $('#dob').val(ui.item.dob);

                $('#previousCategory').removeClass('active').css('display', 'block');
                $('#oldMember').val(ui.item.category_id).removeClass('active').css('display', 'block');
                $('#member_no').val(ui.item.member_no);

                var id = ui.item.id;
                // Disable field
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ url('disable-list') }}',
                    data: {'id': id},
                    success: function (data) {
                        
                        Object.keys(data.message.member_category_list).forEach(key => {
                            var id = data.message.member_category_list[key].member_category.id;
                            var name = data.message.member_category_list[key].member_category.name;

                            $('#'+id).val(id).removeClass('active').css({'display': 'none'});
                            
                            var html = '<span class="bg-primary userType">'+name+'</span>&nbsp';
                            $('#previousCategory').append(html);
                        });                     
                    }
                });
                }
            })
        })
    </script>
