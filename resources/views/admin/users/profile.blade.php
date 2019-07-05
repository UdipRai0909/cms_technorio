@extends('layouts.app')



@section('content')

    @include('admin.includes.errors')

	<div class="container">
		<div class="card">
			<div class="panel panel-default">

				<div class="panel-heading pt-5 text-center">
					<h3>
                        <lead>{{ Auth::user()->name }}'s  &nbsp;  Profile</lead>
                    </h3>
				</div>

				<div class="panel-body p-5">
					<form action="{{ route('user.profile.update') }}" method="post"  enctype="multipart/form-data">

						{{ csrf_field() }}

						<div class="form-group"> 
							<label for="name">Username</label>
							<input type="text" name="name" value="{{ $user->name }}" class="form-control">
						</div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="hotpink" for="featured" style="width:30%;">
                                Upload new avatar
                                <i class="tim-icons icon-image-02 pl-2"></i>
                            </label>
                            <input type="file" name="avatar" class="form-control" style="width:80%; height:40%; padding:3%;">
                        </div>

                        <div class="form-group">
                            <label for="name">Facebook Profile</label>
                            <input type="text" name="facebook" value="{{ $user->profile->facebook }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="name">Youtube Profile</label>
                            <input type="text" name="youtube" value="{{ $user->profile->youtube }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="about">About you</label>
                            <textarea id="about-me" name="about" cols="30" rows="6" value="{{ $user->profile->about }}" class="form-control"></textarea>
                        </div>

						<div class="form-group">
							<div class="text-center">
								<button class="btn btn-success" type="submit">
									Edit User
								</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('my_styles')
    <link href="{{asset('summernote/summernote-lite.css')}}" rel="stylesheet">
@endsection


@section('my_scripts')
    <script src="{{asset('summernote/summernote-lite.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#about-me').summernote();
        });
    </script>
@endsection
