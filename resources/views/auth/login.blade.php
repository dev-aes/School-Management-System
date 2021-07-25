@extends('layouts.app')
@section('title', 'School E-cloud Manager | Login')

@section('content')
<br><br><br><br><br><br>
<div class="container mt-5">
    <div class="row justify-content-center ">
        <div class="col-lg-6 p-5 rounded-left" style="background: #fff ">
            <div class="company-logo text-center ">
                <h3 class="text-info font-weight-bold d-none d-lg-block">School E-Cloud Manager <i class="fas fa-school"></i> </h3>
                <img  class='img-fluid d-none d-lg-block ' width="500"  src="{{ asset('images/school2.jpg') }}" alt="">
            </div>
        </div>
        <div class="col-lg-6 p-5 rounded-right border-left" style="background: #fff">
            <div class="content">
                <div class="header">

                    @if(session('unauthorized'))
                      <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">
                            {{session('unauthorized')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                      </div>
                    @endif
                    
                    <h3 class="text-info">Login </h3>
                </div>
                <br>
            
                <form method="POST" action="{{ route('login') }}">
                    @if($errors->any())
                        <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                  @endif 


                   

                    @csrf
                    <div class="form-group">
                        <label class="text-muted" for="">Email *</label>
                        <input class="form-control" id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="">Password *</label>
                        <input class="form-control" type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label text-muted" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-info form-control">
                            {{ __('Login') }}
                        </button>
                    </div>

                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            @if (Route::has('password.request'))

                            <small><a class="font-italic ml-5 text-muted " href="{{ route('password.request') }}">Forgot Your Password ?</a></small>
                            
                            @endif 
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
