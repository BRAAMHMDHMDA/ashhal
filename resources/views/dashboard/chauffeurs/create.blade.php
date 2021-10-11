@extends('dashboard.layouts.app')

@section('content_title', 'Create Chauffeur')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('chauffeurs.index')}}">Chauffeurs</a></li>
    <li class="breadcrumb-item active">Create New Chauffeur</li>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ route('chauffeurs.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('dashboard.chauffeurs._form', [
                 'button' => 'Add',
                ])

            </form>
        </div>
    </div>

@endsection
