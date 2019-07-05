@extends('layouts.app')



@section('content')

    @include('admin.includes.errors')
	<div class="container">
		<div class="card">
			<div class="panel panel-default">

				<div class="panel-heading pt-5 text-center">
					<h2>Create new user</h2>
				</div>

				<div class="panel-body p-5">
					<form action="{{ route('user.store') }}" method="post"  enctype="multipart/form-data">

						{{ csrf_field() }}

						<div class="form-group"> 
							<label for="name">Username</label>
							<input type="text" name="name" class="form-control">
						</div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>

						<div class="form-group">
							<div class="text-center">
								<button class="btn btn-success" type="submit">
									Add User
								</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
@endsection 
