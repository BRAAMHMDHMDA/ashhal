@extends('dashboard.layouts.app')

@section('content_title', 'Roles List')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles</a></li>
    <li class="breadcrumb-item active">Roles List</li>
@endsection

@section('breadcrumb-right')
    @can('role-create')
        <a href="{{ route('roles.create') }}">
            <button type="button" class="btn btn-primary"><i data-feather='plus'></i> Add New Role</button>
        </a>
    @endcan
@endsection

@section('content')
    <div class="card">
        @if(count($roles)!= 0)
            <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Total Users</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->users()->count() }}</td>
                        <td>{{ $role->created_at->diffForHumans() }}</td>
                        <td>
                            @can('role-show')
                            <a href="{{route('roles.show',$role->id)}}">
                                <button type="button" class="btn btn-sm btn-gradient-warning">
                                    <i data-feather='eye'></i>
                                </button>
                            </a>
                            @endcan
                            @can('role-edit')
                                <a href="{{route('roles.edit',$role->id)}}">
                                    <button type="button" class="btn btn-sm btn-gradient-info">
                                        <i data-feather='edit'></i>
                                    </button>
                                </a>
                            @endcan
                            @can('role-delete')
                                <form action="{{ route('roles.destroy', $role->id) }}" method="post"
                                      style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="button" class="delete btn btn-sm btn-gradient-danger"><i data-feather='trash-2'></i></button>
                                </form><!-- end of form -->
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                {{ $roles->links() }}
            </div>
        </div>
        @else
            <div class="card-body alert-danger">
                <h2 style="color: red">There Are No Roles *_*</h2>
            </div>
        @endif
    </div>
    </div>
@endsection
