@extends('layouts.app')


@section('content')

<div class="container">
	<div class="card">
        <div class="card-body">
            <h3 class="card-title font-weight-bold text-center">Categories</h3>
            <table class="table table-hover">
                <thead>
                <th> Category Name </th>
                <th> Edit Category </th>
                <th> Delete Category </th>
                </thead>
                <tbody>
                @if($categories->count()>0)
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{ $category->name }}
                            </td>

                            <td>
                                <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-xs btn-info">
                                    Edit
                                </a>
                            </td>

                            <td>
                                <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-xs btn-danger">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach

                @else
                    <th colspan="5" class="text-center">No Categories yet!</th>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
