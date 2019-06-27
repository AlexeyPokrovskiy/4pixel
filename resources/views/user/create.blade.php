@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        <form  action="{{route('user.store')}}" method="post">
                            @csrf
                            @include('user.partials.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection