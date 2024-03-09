@include('include.include')
<body>
	<div class="container mt-3">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-md-8">
								<p>{{ __('Welcome to dashboard') }}</p>
							</div>
							<div class="col-md-4">
								<p style="float:right;">{{ __('You have logged In.') }}&nbsp;<a href="{{ route('logout') }}">Logout</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                	<div class="card-header">
                		<div class="row">
                			<div class="col-md-9">
                				<p>{{ __('Users List') }}</p>
                			</div>
                			<div class="col-md-3">
                				<section class="pagination">
								    <div class="container">
								        <div class="row">
								            <div class="col-md-12">
								                {{ $users->links() }}
								            </div>
								        </div>
								    </div>
								</section>
                			</div>
                		</div>
                	</div>
                	<div class="card-body">
                		<table class="table">
		                    <thead>
		                        <tr>
		                            <th scope="col">S.No.</th>
		                            <th scope="col">Name</th>
		                            <th scope="col">Email</th>
		                            <th scope="col">Timestamp</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($users as $key=>$user)
		                        <tr>
		                            <th>{{$loop->iteration}}</th>
		                            <td>{{$user->name}}</td>
		                            <td>{{$user->email}}</td>
		                            <td>{{$user->created_at}}</td>
		                        </tr>
		                        @endforeach
		                    </tbody>
		                </table>
		                <section class="pagination">
						    <div class="container">
						        <div class="row">
						            <div class="col-12">
						                {{ $users->links() }}
						            </div>
						        </div>
						        <hr>
						    </div>
						</section>
                	</div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</html>
