@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        <form  action="{{route('section.update',$section)}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="put">
                            @csrf
                            @include('section.partials.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection