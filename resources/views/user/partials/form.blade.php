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
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$user->name ?? ""}}">
</div>
<div class="form-group">
    <label for="">Email</label>
    <input type="text" class="form-control" name="email" placeholder="Email" value="{{$user->email ?? ""}}" >
</div>


<div class="form-group">
    <label for="">Password</label>
    <input type="password" class="form-control" name="password" placeholder="password" value=""  >
</div>
<hr>
<input type="submit" class="btn btn-primary" value="Send">
