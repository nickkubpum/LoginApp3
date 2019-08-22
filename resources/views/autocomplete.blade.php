<!DOCTYPE html>
<html>
<head>
<title>สมัครสมาชิก</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    .box
    {
        width:600px;
        margin:0 auto;
    }
</style>
</head>
<body>
<br/>
<div class="container box">
    <h3 align="center">สมัครสมาชิก</h3><br />
    <form method="POST" action="autocomplete/create" autocomplete="off">
        <div class="form-group row">   
            <label for="name" class="col-md-4" align="right"><h4>{{ __('ชื่อหน่วยงาน') }}</h5></label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" autofocus>
                        <div id="nameList">
                            @csrf 
                        </div>
                </div>
        </div>
        <div class="form-group row">   
            <label for="username" class="col-md-4" align="right"><h4>{{ __('รหัสผู้ใช้งาน') }}</h5></label>
                <div class="col-md-6">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="" required autocomplete="username" autofocus>
                    @csrf
                </div>
        </div>
        <div class="form-group row">   
            <label for="email" class="col-md-4" align="right"><h4>{{ __('อีเมล') }}</h5></label>
                <div class="col-md-6">
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email" autofocus>    
                </div>
        </div>
        <div class="form-group row">   
            <label for="password" class="col-md-4" align="right"><h4>{{ __('รหัสผ่าน') }}</h5></label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" required autocomplete="password" autofocus>
                </div>
        </div>
        <div class="form-group row">   
            <label for="c_password" class="col-md-4" align="right"><h4>{{ __('ยืนยันรหัสผ่าน') }}</h5></label>
                <div class="col-md-6">
                    <input id="c_password" type="password" class="form-control @error('c_password') is-invalid @enderror" name="c_password" value="" required autocomplete="c_password" autofocus>
                    <span id='message'></span>
                </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-4" align="right"></label>
                <div class="col-md-6">
                    <button id="submit" type="submit" class="btn btn-primary" disabled>
                        {{ __('Add') }}
                    </button>
                </div>
        </div>
    </form>
</div>
 </body>
</html>

<script>
$(document).ready(function(){

 $('#name').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#nameList').fadeIn();  
                    $('#nameList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#name').val($(this).text());  
        // var message = document.getElementById("name").value;
        // alert( message );
        // $('#s_name').val("a letter");
        $('#nameList').fadeOut();  
    });  

    $('#password, #c_password').on('keyup', function () {
        if ($('#password').val() == $('#c_password').val() && $('#password').val() != '') {
            $('#message').html('รหัสผ่านตรงกัน').css('color', 'green');
            document.getElementById("submit").disabled = false;
        } else 
            $('#message').html('รหัสผ่านไม่ตรงกัน').css('color', 'red');
            // document.getElementById("submit").disabled = true;
    });

});
</script>