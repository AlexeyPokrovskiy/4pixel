@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Users
                        <a class="float-right" href="{{route("user.create")}}"><button class="btn btn-primary">Add</button></a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            @forelse($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            <form onsubmit="if(confirm('Удалить')){return true}else{return false}" action="{{route('user.destroy',$user)}}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <a class="btn btn btn-secondary" href="{{route('user.edit',$user)}}">
                                                   Edit
                                                </a>
                                                <button type="submit" class="btn btn-danger" >Delete</button>

                                            </form>
                                        </td>
                                    </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <p>данных нет</p>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="4">
                                    <ul class="pagination">
                                        {{$users->links()}}
                                    </ul>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
