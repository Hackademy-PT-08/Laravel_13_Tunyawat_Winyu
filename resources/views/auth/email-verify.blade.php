@extends('components.master')

@section('content')

<style>
    .button{
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col12">
                <h1 class="text-center py-5">Verication Email</h1>
                <p class="text-center">We have sent you a verification email to your mailbox.</p>
                <p class="text-center">if you have not received the email, press the button below.</p>
                <div class="button">
                    <form action="/email/verification-notification" method="post">
                        
                        @csrf
                        <button type="submit" class="btn btn-primary">Resend</button>

                    </form>
                </div>
        </div>
    </div>
</div>
@endsection