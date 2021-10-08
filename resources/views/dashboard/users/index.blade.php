@extends('dashboard.layouts.app')

@section('content_title', 'Users List')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
    <li class="breadcrumb-item active">Users List</li>
@endsection

@section('breadcrumb-right')
    @can('user-create')
        <a href="{{ route('users.create') }}">
            <button type="button" class="btn btn-primary"><i data-feather='plus'></i> Add New User</button>
        </a>
    @endcan
@endsection

@section('content')
    <div class="card">
        @if(count($users)!= 0)
            <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            @if($user->image)
                                <img src="{{ $user->image_path }}" class="mr-75" height="40" width="40" alt="" />
                            @endif
                            <span class="font-weight-bold">{{ $user->name }}</span>
                        </td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $role)
                                    <span class="badge badge-pill badge-light-dark mr-1">{{$role}}</span>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if( $user->status == 'active')
                                <span class="badge badge-pill badge-light-success mr-1">Active</span>
                            @else
                                <span class="badge badge-pill badge-light-warning mr-1">Draft</span>
                            @endif
                        </td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>
                            @can('user-edit')
                                <a href="{{route('users.edit',$user->id)}}">
                                    <button type="button" class="btn btn-sm btn-info">
                                        <i data-feather='edit'></i>
                                    </button>
                                </a>
                            @endcan
                            @can('user-delete')
                                <form action="{{ route('users.destroy', $user->id) }}" method="post"
                                      style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="button" class="delete btn btn-sm btn-danger"><i data-feather='trash-2'></i></button>
                                </form><!-- end of form -->
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        </div>
        @else
            <div class="card-body alert-danger">
                <h2 style="color: red">There Are No Users *_*</h2>
            </div>
        @endif
    </div>
    </div>
@endsection
