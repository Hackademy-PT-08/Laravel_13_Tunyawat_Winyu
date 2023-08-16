@extends('components.master')

@section('content')

<style>
    .container{
        width: 50%;
    }
    .container-post{
        margin-left: 5%;
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


    {{-- Form --}}
    <div class="container mb-5">
        {{-- Email/Name Update Form --}}
        <div class="col-12">
            <div class="form-group py-5">
                <h2 class="text-center py-2">Profile</h2>
                <div class="mb-3">
                    <label for="staticEmail" class="form-label">Email address:</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="staticEmail" name="email" value="{{auth()->user()->email}}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="staticName" class="form-label">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="staticName" name="name" value="{{auth()->user()->name}}">
                    </div>
                </div>
                <div class="button">
                    <a href="{{route('edit.information')}}" type="submit" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-post">
        <div class="row">
            <h2 class="text-center py-4">Your Publication</h2>
            @foreach ($user_paintings as $user_painting)
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('storage/' . $user_painting->image)}}" class="card-img-top" alt="{{$user_painting->title}}" style="max-height: 200px; width: auto;">
                        <div class="card-body">
                            <h5 class="card-title">{{$user_painting->title}}</h5>
                            <p class="card-text">{{$user_painting->description}}</p>
                            <p class="card-float">${{$user_painting->price}}</p>
                            @if (auth()->check())
                                @if (auth()->user()->id == $user_painting->user_id)
                                    <a href="/post/edit/{{$user_painting->id}}" class="btn btn-primary mb-3">Update</a>
                                    <form action="/post/delete/{{$user_painting->id}}" method="post">
                                        
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    
        
    
@endsection