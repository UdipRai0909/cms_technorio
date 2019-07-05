@extends('layouts.app')


@section('content')

	
	@include('admin.includes.errors')
	
	<div class="container">
		<div class="card">
			<div class="panel panel-default">

				<div class="panel-heading pt-5 text-center">
					<h2>Update Category: {{ $category->name }}</h2>
				</div>

				<div class="panel-body p-5">
					<form action="{{ route('category.update', ['id' => $category->id]) }}" method="post">

						{{ csrf_field() }}

						<div class="form-group"> 
							<label for="name">Name</label>
							<input type="text" name="name" value="{{ $category->name }}" class="form-control">
						</div>


						<div class="form-group">
							<div class="text-center">
								<button class="btn btn-success" type="submit">
									Update Category
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection


