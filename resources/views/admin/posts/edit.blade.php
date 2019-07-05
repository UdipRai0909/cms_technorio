@extends('layouts.app')



@section('content')

    @include('admin.includes.errors')
	<div class="container">
		<div class="card">
			<div class="panel panel-default">

				<div class="panel-heading pt-5 text-center">
					<h2>Edit post : {{ $post->title }} </h2>
				</div>

				<div class="panel-body p-5">
					<form action="{{ route('post.update', ['id'=>$post->id]) }}" method="post"  enctype="multipart/form-data">

						{{ csrf_field() }}

						<div class="form-group"> 
							<label for="title">Title</label>
							<input type="text" name="title" class="form-control" value="{{ $post->title }}">
						</div>

						<div class="d-inline-flex form-group">
							<div class="ml-4 font-weight-bold">
                                <label class="hotpink">Previous Image</label><br/>
                                <img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="70px">
                            </div>
                            <div class="ml-5 font-weight-bold" >
                                <label class="hotpink" for="featured" style="width:170px;">
                                    Choose New Image
                                    <i class="tim-icons icon-image-02 pl-2"></i>
                                </label>
                                <input type="file" name="featured" class="form-control" style="width:80%; height:65%; padding:7%;" >
                            </div>
                        </div>

						<div class="form-group">
							<label for="category">Select a category</label>
							<select name="category_id" id="category" class="form-control">
								@foreach($categories as $category)
									<option value="{{ $category->id }}"
                                        @if($post->category->id==$category->id)
                                            selected
                                        @endif
                                    >{{ $category->name }}</option>
								@endforeach
							</select>
						</div>

                        <div class="form-group">
                            <label for="tags">Select tags</label>
                            @foreach($tags as $tag)
                                <div class="checkbox">

                                    <input type="checkbox" class="myCheckbox" name="tags[]" value=" {{ $tag->id }}"
                                           @foreach($post->tags as $t)
                                           @if($tag->id == $t->id)
                                           checked
                                        @endif
                                        @endforeach
                                    >
                                    <label id="labelCheck01">{{ $tag->tag }} </label>
                                </div>
                            @endforeach
                        </div>

						<div class="form-group">
							<label for="content">Content</label>
							<textarea id= "myContent" cols="30" rows="10" name="content" class="form-control">{{ $post->content  }}</textarea>
						</div>

						<div class="form-group">
							<div class="text-center">
								<button class="btn btn-success" type="submit">
									Update Post
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
            $('#myContent').summernote();
        });
    </script>
@endsection
