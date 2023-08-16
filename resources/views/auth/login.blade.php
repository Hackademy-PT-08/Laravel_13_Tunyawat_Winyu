@extends('components.master')

@section('content')
<style>
    .container{
        width: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
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
    {{-- Login Form --}}
    <div class="container">
        <div class="col-12">
            <form action="/login" method="post">  
                @csrf
                <div class="form-group py-5">
                    <h2 class="text-center">Login</h2>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{old('email')}}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="button">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection