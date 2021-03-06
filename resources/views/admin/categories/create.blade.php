@extends('layouts.app')

@section('content')

	
	@include('admin.includes.errors')
	
	<div class="container">
		<div class="card">

			<div class="panel panel-default">

                <div class="panel-heading pt-5 text-center">
					<h2>Create a new Category!</h2>
				</div>

				<div class="panel-body p-5">
					<form action="{{ route('category.store') }}" method="post">

						{{ csrf_field() }}

						<div class="form-group"> 
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control">
						</div>


						<div class="form-group">
							<div class="text-center">
								<button class="btn btn-success" type="submit">
									Submit Category
								</button>
							</div>
						</div>
					</form>
				</div>


			</div>

		</div>
	</div>
@endsection 
