@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    <label for="">Title</label>
    <input type="text" class="form-control" name="title" placeholder="Title" value="{{$section->title ?? ""}}">
</div>
<div class="form-group">
    <label for="">Description</label>
    <textarea id="description" class="form-control" name="description" placeholder="Описание работы">
        {{$section->description ?? ""}}
    </textarea>
</div>
<p>Image</p>

<img src="{{!empty($section->logo)?$section->logo:"/storage/no-image.jpg"}}" alt="" height="100px"> <br>

<div class="custom-file" >
    <input type="file" name="logo" class="custom-file-input" id="customFile">
    <label class="custom-file-label" for="customFile">Choose file</label>
</div>
<br>
<br>
<h2>Users</h2>

<div class="form-group">
    @foreach($users as $user)
        <div class="form-check">
            <input type="checkbox" name="section_user[]" class="form-check-input" id="user{{$user->id}}" value="{{$user->id}}"
            @isset($section->id)
                @foreach($section->users as $section_user)
                   @if($user->id == $section_user->id)
                       checked
                   @endif
                @endforeach
            @endisset
            >
            <label class="form-check-label" for="user{{$user->id}}">{{$user->name}}(<a href="{{route('user.edit',$user)}}">{{$user->email}}</a>)</label>
        </div>
    @endforeach
</div>

<input type="submit" class="btn btn-primary" value="Send">
