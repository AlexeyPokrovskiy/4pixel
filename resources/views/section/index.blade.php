@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       Sections
                        <a class="float-right" href="{{route("section.create")}}"><button class="btn btn-primary">Add</button></a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            @forelse($sections as $section)
                                <tr>
                                    <td>
                                        <img src="{{!empty($section->logo)?$section->logo:"/storage/no-image.jpg"}}" alt="" height="100px">
                                    </td>
                                    <td>
                                        <h5>{{$section->title}}</h5>
                                        <p>{{$section->description}}</p>
                                    </td>
                                    <td>
                                        <h5>Users</h5>
                                        <ol>
                                            @foreach($section->users as $user)
                                                <li><a href="{{route("user.edit",$user)}}">{{$user->name}}</a></li>
                                            @endforeach
                                        </ol>
                                    </td>
                                    <td style="width: 20%;">
                                        <form onsubmit="if(confirm('Удалить')){return true}else{return false}" action="{{route('section.destroy',$section)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <a class="btn btn btn-secondary" href="{{route('section.edit',$section)}}">
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
                                        {{$sections->links()}}
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
