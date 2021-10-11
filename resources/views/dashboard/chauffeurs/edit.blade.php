@extends('dashboard.layouts.app')

@section('content_title', 'Edit Chauffeur')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('chauffeurs.index')}}">Chauffeurs</a></li>
    <li class="breadcrumb-item active">Edit Chauffeur</li>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal needs-validation" action="{{ route('chauffeurs.update',$chauffeur->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                @include('dashboard.chauffeurs._form', [
                 'button' => 'Update',
                ])

            </form>
        </div>
    </div>

@endsection
