@extends('layouts.app')


@section('content')


<div class="container">
	<div class="card">
            <div class="card-body">
                <h3 class="card-title font-weight-bold text-center">Published Posts</h3>
                <table class="table table-hover">
                    <thead>
                    <th> Image </th>
                    <th> Title </th>
                    <th> Edit </th>
                    <th> Trash </th>

                    </thead>
                    <tbody>
                    @if($myposts->count() >0)
                        @foreach($myposts as $mypost)
                            <tr>
                                <td>
                                    <img src="{{ $mypost->featured }}" alt="{{ $mypost->title }}" width="90px" height="70px">
                                </td>

                                <td>
                                    {{ $mypost->title }}
                                </td>

                                <td>
                                    <a href="{{ route('post.edit', ['id'=>$mypost->id]) }}" class="btn btn-xs btn-info w-25">
                                        <i class="tim-icons icon-pencil text-center"></i>
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('post.delete', ['id'=>$mypost->id]) }}" class="btn btn-xs btn-danger w-25">
                                        <i class="tim-icons icon-trash-simple text-center"></i>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <th colspan="5" class="text-center">No Posts Created</th>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
	</div>
</div>
@endsection
