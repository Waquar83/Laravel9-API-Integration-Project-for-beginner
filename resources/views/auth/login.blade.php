@include('include.include')
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 m-auto">
                <form id="loginAccountForm" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 style=" font-weight:500;">Login Account</h5>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('/') }}" class="btn btn-dark" style="float:right">Home</a>
                                </div>
                            </div>
                            <div id="result"></div>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email" />
                                <small class="form-text text-danger error email_error"></small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password" />
                                <small class="form-text text-danger error password_error"></small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="loginAccountBtn">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
    $(document).ready(function(){
         $("#loginAccountBtn").click(function () {
            event.preventDefault();
            $(this).html('<div class="spinner-border spinner-border-sm" role="status"><span class="sr-only"></span></div>');
            var btn = document.getElementById('loginAccountBtn');
                btn.disabled = true;
            var formData = $("#loginAccountForm").serialize();
            $.ajax({
                type: "POST",
                url: '{{ route("login") }}', 
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if(response.status == true){
                        window.location.replace(response.url);
                    }
                },
                error: function (status, error) {
                    btn.disabled = false;
                    $(".error").text('');
                    $("#loginAccountBtn").html('Login');
                    let errors = JSON.parse(status.responseText);
                    if(errors.status == "error"){
                        $("#result").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert"></button><strong>Error!</strong>  '+errors.message+'</div>');
                    }else{
                        $.each(errors.errors,function(key,value){
                            $("."+key+"_error").text(value);
                        });
                    }
                }
            });
        });
    });
    </script>
</html>
