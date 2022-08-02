<!-- Auto complete -->

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<!-- <script>
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
    </script> -->


<script>
    $(function() {
        var typed = false;

        $('#mobile').on('keyup', function(){
            typed = true;
        });

        $(document).on('click', function() {
            if(typed==true)
            {
                $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: '{{url("member-list")}}?term=' + $('#mobile').val(),
                dataType: 'json',
                success: function(data) {
                    $('#id').val(data.message ? data.message.id : '');
                    $('#name').val(data.message ? data.message.name : '').css('display', (data.message ? 'none' : 'block'));
                    $('#email').val(data.message ? data.message.email : '');                  
                    
                    $('#password').prop('disabled', (data.message ? true : false));
                    $('#confirm_password').prop('disabled', (data.message ? true : false));

                    $('#address').val(data.message ? data.message.address : '');
                    $('#gender').val(data.message ? data.message.gender : '');
                    $('#blood').val(data.message ? data.message.blood : '');
                    $('#dob').val(data.message ? data.message.dob : '');
                    
                    $('#customField').removeClass('active').css('display', (data.message ? 'none' : 'block'));

                    $('#previousCategory').removeClass('active').css('display', 'block');
                    $('#oldMember').val(data.message ? data.message.category_id : '').removeClass('active').css('display', 'block');
                    $('#member_no').val(data.message ? data.message.member_no : '');

                    var id = data.message ? data.message.id : null;

                    // Disable field
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: '{{ url("disable-list") }}',
                        data: {
                            'id': id
                        },
                        success: function(data) {

                            $('#previousCategory').html('');
                            if (data.message != null) {
                                Object.keys(data.message.member_category_list).forEach(key => {
                                    var id = data.message.member_category_list[key].member_category.id;
                                    var name = data.message.member_category_list[key].member_category.name;
                                    console.log(name);
                                    $('#' + id).removeClass('active').css({'display': 'none'});

                                    var html = '<span class="bg-primary userType">' + name + '</span>&nbsp';
                                    $('#previousCategory').append(html);
                                });
                            }else{
                                $('.m_c_id').addClass('active').css({'display': 'block'});
                            }

                            typed = false;
                        }
                    });
                },
                error: function() {
                    console.log(data);
                }
            });
            }
           
        })
    })
</script>