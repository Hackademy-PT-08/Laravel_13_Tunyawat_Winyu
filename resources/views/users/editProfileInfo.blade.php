@extends('components.master')

@section('content')
<style>
    .container{
        width: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    .button{
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

    {{-- Includo il form Error --}}

 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
<!-- Create Post Form -->
    {{-- Edit Form --}}
    <div class="container">
        <div class="col-12">
            {{-- Edit Email/Name --}}
            <form action="/user/profile-information" method="post"> 
                @method('PUT')
                @csrf
                <div class="form-group py-5">
                    <h2 class="text-center py-4">Edit Profile Information</h2>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{auth()->user()->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{auth()->user()->name}}">
                    </div>
                    <div class="button">
                        <button type="submit" class="btn btn-primary">update</button>
                    </div>
                </div>
            </form>
        </div>
        {{-- Password Update Form --}}
        <div class="col-12 mb-5">
            <form action="/user/password" method="post">
        
                @method('PUT')
                @csrf
                <div class="form-group">
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="new_password" name="password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Password">
                    </div>
                    <div class="button">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection