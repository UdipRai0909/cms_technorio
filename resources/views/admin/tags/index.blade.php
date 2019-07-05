@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title font-weight-bold text-center">Tags</h3>
                <table class="table table-hover">
                    <thead>
                        <th> Tag Name </th>
                        <th> Edit Tag </th>
                        <th> Delete Tag </th>
                    </thead>
                    <tbody>
                    @if($tags->count()>0)
                        @foreach($tags as $tag)
                            <tr>
                                <td>
                                    {{ $tag->tag }}
                                </td>

                                <td>
                                    <a href="{{ route('tag.edit', ['id' => $tag->id]) }}" class="btn btn-xs btn-info">
                                        Edit
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('tag.delete', ['id' => $tag->id]) }}" class="btn btn-xs btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    @else
                        <th colspan="5" class="text-center">No tags yet!</th>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
