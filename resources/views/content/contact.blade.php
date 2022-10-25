@extends('layouts.master')
@section('heading')
    <title>FLASH Club Brussels - Contact</title>
@endsection

@section('content')


<!-- Titel -->
<div style="background-color:#c363bd">

    <div class="position-relative overflow-hidden p-2 p-md-5 m-md-3 text-white" >
        <div data-aos="fade-right" class="col-md-6 p-lg-2 mx-auto my-5 pt-5">
          <h1 class="display-4 fw-normal text-center ">{{ __('Contact us!') }}</h1>
          <p class="lead text-center">{{ __('For information, lost something, table booking, special requests, theme ideas or other things.') }}</p>
        </div>
    </div>

<!-- FORM-->

<div class="bg-dark p-3 p-md-5  text-white row featurette px-5 py-5">
    <div data-aos="zoom-in" class="col-md-6 offset-md-3">
        <form action="{{ route('contact.post') }}" method="POST" id="my-form" class="row g-3">
            @csrf  
            <div class="form-group col-12">
                <label for="name" class="form-label">{{ __('Name:') }}</label>
                <input type="text" id="name" class="form-control border border-dark" name="name" >  
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group col-12">
                <label for="email" class="form-label">Email: </label>
                <input type="email" id="email" class="form-control border border-dark" name="email">  
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group col-12">
                <label for="subject" class="form-label">{{ __('Subject:') }} </label>
                <input type="text" id="subject" class="form-control border border-dark" name="subject">  
                {{-- <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="Information">Information</option>
                    <option value="Lost something">Lost something</option>
                    <option value="Table booking">Table booking</option>
                    <option value="Special Requests">Special Requests</option>
                    <option value="Theme idea">Theme idea</option>
                    <option value="Other">Other</option>
                </select> --}}
                @if ($errors->has('subject'))
                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                @endif
            </div>
            <div class="form-group form-floating col-12">
                <label for="message" class="form-label">{{ __('Message:') }}</label>
                <textarea  id="message" class="form-control border border-dark" id="floatingTextarea2" name="message" cols="30" rows="5"></textarea> 
                @if ($errors->has('message'))
                    <span class="text-danger">{{ $errors->first('message') }}</span>
                @endif 
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-light ">{{ __('Send') }}</button>
            </div>
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
            </div>
        </form>
    </div>
</div>

</div>
@endsection