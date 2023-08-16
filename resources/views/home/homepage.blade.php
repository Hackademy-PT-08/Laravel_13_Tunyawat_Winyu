@extends('components.master')

@section('content')

<style>
    .paragraph{
      width: 80%;
      margin-left: 9%;
    }
    .line{
      width: 40px;
      height: 5px;
      background-color: black;
      margin-left: 48%;
    }
</style>
{{-- header --}}
<header>
  <div class="paragraph">
    <h1 class="text-center py-4">Painting World</h1>
    <p class="text-center py-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium iure ut consequuntur nisi repellat aspernatur sapiente dolorem modi vel dicta autem totam omnis provident quaerat ipsam id, ad atque quidem fugit magni maxime numquam. Excepturi ut libero ab fugit laborum placeat aut explicabo porro nulla. Eveniet sapiente sed nesciunt facilis?</p>
    <div class="line"></div>
  </div>
</header>

{{-- Paintings for sale --}}
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


{{--  --}}
@endsection