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



    {{-- Edit/Update Form --}}
    <div class="container">
        <div class="col-12">
            <form action="/post/edit/{{$painting->id}}" method="post" enctype="multipart/form-data">  
                @method('PUT')
                @csrf
                <div class="form-group py-5">
                    <h2 class="text-center">Edit Post Infomation</h2>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Title of your painting" value="{{$painting->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descption of your painting">{{$painting->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control" value="{{$painting->image}}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">price</label>
                        <input type="number" class="form-control" name="price" value="{{$painting->price}}" placeholder="Amout of your painting" id="price" min="1" step="any" />
                    </div>
                    <div class="mb-3 button">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection