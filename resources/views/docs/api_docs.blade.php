@include('include.include')
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                	<div class="card-header">
                		<div class="row">
                			<div class="col-md-9">
                				<p>{{ __('Authentication API List Using JWT Package') }}</p>
                			</div>
                			<div class="col-md-3">
                				<a href="javascript:;" class="btn btn-sm btn-warning" style="float:right;">Test API On Postman</a>
                			</div>
                		</div>
                	</div>
                	<div class="card-body">
                		<table class="table">
		                    <thead>
		                        <tr>
		                            <th scope="col">S.No.</th>
		                            <th scope="col">Mthod</th>
		                            <th scope="col">Name</th>
		                            <th scope="col">URL</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	<tr>
		                            <th>1</th>
		                            <th><a href="javascript:;" class="btn btn-sm btn-success">POST</a></th>
		                            <th>Crate New User</th>
		                            <th>{{ url('/') }}/api/create-user</th>
		                        </tr>
		                        <tr>
		                            <th>2</th>
		                            <th><a href="javascript:;" class="btn btn-sm btn-success">POST</a></th>
		                            <th>Login User</th>
		                            <th>{{ url('/') }}/api/login</th>
		                        </tr>
		                        <tr>
		                            <th>3</th>
		                            <th><a href="javascript:;" class="btn btn-sm btn-success">POST</a></th>
		                            <th>Logout User</th>
		                            <th>{{ url('/') }}/api/logout</th>
		                        </tr>
		                        <tr>
		                            <th>4</th>
		                            <th><a href="javascript:;" class="btn btn-sm btn-info">GET</a></th>
		                            <th>View User</th>
		                            <th>{{ url('/') }}/api/view/user</th>
		                        </tr>
		                        <tr>
		                            <th>5</th>
		                            <th><a href="javascript:;" class="btn btn-sm btn-success">POST</a></th>
		                            <th>Update User</th>
		                            <th>{{ url('/') }}/update/user/{user-id}</th>
		                        </tr>
		                        <tr>
		                            <th>6</th>
		                            <th><a href="javascript:;" class="btn btn-sm btn-danger">DELETE</a></th>
		                            <th>Delete User</th>
		                            <th>{{ url('/') }}/api/delete/user/{user-id}</th>
		                        </tr>
		                        <tr>
		                            <th>7</th>
		                            <th><a href="javascript:;" class="btn btn-sm btn-success">POST</a></th>
		                            <th>Refresh Token</th>
		                            <th>{{ url('/') }}/api/refresh/token</th>
		                        </tr>
		                    </tbody>
		                </table>
                	</div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</html>
