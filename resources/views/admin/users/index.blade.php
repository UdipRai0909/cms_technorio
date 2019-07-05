@extends('layouts.app')


@section('content')


<div class="container">
	<div class="card">
            <div class="card-body">
                <h3 class="card-title font-weight-bold text-center">All Users</h3>
                <table class="table table-hover">
                    <thead>
                    <th> Image </th>
                    <th> Name </th>
                    <th> Permissions </th>
                    <th> Delete </th>

                    </thead>
                    <tbody>
                    @if($users->count() > 0)
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <img src="{{ asset($user->profile->avatar) }}"
                                         style="border-radius:50%;" alt="{{ $user->name }}"
                                        width="70px" height="70px">
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    @if($user->admin)
                                        <a href="{{ route('user.not.admin', ['id'=>$user->id]) }}" class="btn btn-xs btn-danger w-75">Remove permission</a>
                                    @else
                                        <a href="{{ route('user.admin', ['id'=>$user->id]) }}" class="btn btn-xs btn-success w-75">Make admin</a>
                                    @endif
                                </td>
                                <td>
                                    @if(Auth::id()!==$user->id)
                                        @if(!$user->admin)
                                            <a href="{{ route('user.delete', ['id'=>$user->id]) }}" class="btn btn-xs btn-danger w-75">Delete User</a>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <th colspan="5" class="text-center">No Users Created</th>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
	</div>
</div>
@endsection
