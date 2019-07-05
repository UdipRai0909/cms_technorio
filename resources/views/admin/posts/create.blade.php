@extends('layouts.app')



@section('content')

    @include('admin.includes.errors')
	<div class="container">
		<div class="card">
			<div class="panel panel-default">

				<div class="panel-heading pt-5 text-center">
					<h2>Create a new Post!</h2>
				</div>

				<div class="panel-body p-5">
					<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">

						{{ csrf_field() }}

						<div class="form-group"> 
							<label for="title">Title</label>
							<input type="text" name="title" class="form-control">
						</div>

						<div class="form-group">
							<label class="hotpink" for="featured" style="width:20%;">
                                Choose an image
                                <i class="tim-icons icon-image-02 pl-2"></i>
                            </label>
							<input type="file" name="featured" class="form-control" style="padding:1%; height:20%">
						</div>

						<div class="form-group">
							<label for="category">Select a category</label>
							<select name="category_id" id="category" class="form-control">
								@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
						</div>

                        <div class="form-group">
                            <label for="tags">Select tags</label>
                            @foreach($tags as $tag)
                                <div class="checkbox">
                                    <input type="checkbox" class="myCheckbox" name="tags[]" value=" {{ $tag->id }}" >
                                    <label id="labelCheck01"> {{ $tag->tag }} </label>
                                </div>
                            @endforeach
                        </div>

						<div class="form-group">
							<label for="myContent">Content</label>
							<textarea id= "create-content" cols="30" rows="15" name="content" class="form-control"></textarea>
						</div>

						<div class="form-group">
							<div class="text-center">
								<button class="btn btn-success" type="submit">
									Save Post
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
            $('#create-content').summernote();
        });
    </script>
@endsection
