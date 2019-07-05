@extends('layouts.app')


@section('content')


    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title font-weight-bold text-center">Trashed Posts</h3>
                <table class="table table-hover">
                    <thead>
                    <th> Image </th>
                    <th> Title </th>
                    <th> Restore </th>
                    <th> Destroy </th>

                    </thead>
                    <tbody>
                    @if($trposts->count() > 0)
                        @foreach($trposts as $trpost)
                            <tr>
                                <td>
                                    <img src="{{ $trpost->featured }}" alt="{{ $trpost->title }}" width="90px" height="70px">
                                </td>

                                <td>
                                    {{ $trpost->title }}
                                </td>

                                <td>
                                    <a href="{{ route('post.restore', ['id'=>$trpost->id]) }}" class="btn btn-xs btn-success">Restore</a>
                                </td>

                                <td>
                                    <a href="{{ route('post.kill', ['id'=>$trpost->id]) }}" class="btn btn-xs btn-danger">Delete</a>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <th colspan="5" class="text-center">No Trashed Posts</th>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
