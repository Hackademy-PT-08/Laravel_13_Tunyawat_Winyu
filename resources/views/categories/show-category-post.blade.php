@extends('components.master')

@section('content')
    <h3 class="py-4">All Result of {{ $categoryName }}:</h3>

    {{-- Result of category painting --}}
    @if (!$paintings->isEmpty())
    <div class="container py-5">
        <div class="row">
            @foreach ($paintings as $painting)
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                    <img src="{{asset('storage/' . $painting->image)}}" class="card-img-top" alt="{{$painting->title}}" style="max-height: 190px; width: auto;">
                    <div class="card-body">
                        <h5 class="card-title">{{$painting->title}}</h5>
                        <small>Seller: {{ $painting->user->name }}</small> <br>
                        <small>Contact Email: {{ $painting->user->email }}</small>
                        <p class="card-text">{{$painting->description}}</p>
                        <p class="card-float">${{$painting->price}}</p>
                        <a href="{{ route('painting.checkout', $painting->id) }}" class="btn btn-primary">Buy</a>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @else
        <h2>Paintings not found in this category</h2>
    @endif
@endsection