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
            <form action="{{ route('painting.do.checkout', $painting->id) }}" method="post">  
                @csrf
                <div class="form-group py-5">
                    <h2 class="text-center">Check Out</h2>
                    <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Mario">
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Rossi">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Your Phone number">
                    </div>
                    <div class="mb-3">
                        <label for="billing_address" class="form-label">Billing Address </label>
                        <input type="text" class="form-control" name="billing_address" id="billing_address" placeholder="Your Billing Address">
                    </div>
                    <div class="mb-3">
                        <label for="shipping_address" class="form-label">Shipping Address</label>
                        <input type="text" class="form-control" name="shipping_address" id="shipping_address" placeholder="Your Shipping Address">
                    </div>
                    <div class="mb-3">
                        <label for="zip_code" class="form-label">Zip Code</label>
                        <input type="number" class="form-control" name="zip_code" id="zip_code" placeholder="Your Zip Code">
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" name="country" id="country" placeholder="Your Country">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" name="city" id="city" placeholder="Your City">
                    </div>
                    <div class="button">
                        <button type="submit" class="btn btn-primary">Buy</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection