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



    {{-- Register Form --}}
    <div class="container">
        <div class="col-12">
            <form action="/register" method="post">  
                @csrf
                <div class="form-group py-5">
                    <h2 class="text-center">Sign In</h2>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Mario">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>
                    <div class="button">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection