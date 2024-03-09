@include('include.include')
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 m-auto">
                <form id="createNewAccountForm" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 style=" font-weight:500;">Create New Account</h5>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('/') }}" class="btn btn-dark" style="float:right">Home</a>
                                </div>
                            </div>
                            <div id="result"></div>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control"  placeholder="Enter name" />
                                <small class="form-text text-danger error name_error"></small>
                            </div>
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
                            <div class="form-group mb-3">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Enter confirm password" />
                                <small class="form-text text-danger error password_confirmation_error"></small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="saveNewAccountBtn">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
    $(document).ready(function(){
         $("#saveNewAccountBtn").click(function () {
            event.preventDefault();
            $(this).html('<div class="spinner-border spinner-border-sm" role="status"><span class="sr-only"></span></div>');
            var btn = document.getElementById('saveNewAccountBtn');
                btn.disabled = true;
            var formData = $("#createNewAccountForm").serialize();
            $.ajax({
                type: "POST",
                url: '{{ route("register") }}', 
                data: formData,
                dataType: 'json',
                success: function (data) {
                    $("#result").html('<div class="alert alert-success alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert"></button><strong>Success!</strong>  '+data.message+'</div>');
                    $(".error").text('');
                    setTimeout(function(){
                        $("#result").html('');
                        $("#createNewAccountForm")[0].reset();
                        btn.disabled = false;
                        $("#saveNewAccountBtn").html('Create');
                    },2000);
                },
                error: function (status, error) {
                    btn.disabled = false;
                    $("#saveNewAccountBtn").html('Create');
                    $(".error").text('');
                    let errors = JSON.parse(status.responseText);
                    $.each(errors.errors,function(key,value){
                        if(key == "password"){
                            if(value.length > 1){
                                $(".password_error").text(value[0]);
                                $(".password_confirmation_error").text(value[1]);
                            }else{
                                if(value[0].includes('password confirmation')){
                                    $(".password_confirmation_error").text(value);
                                }else{
                                    $(".password_error").text(value);
                                }
                            }
                        }else{
                            $("."+key+"_error").text(value);
                        }
                    });
                }
            });
        });
    });
    </script>
</html>
