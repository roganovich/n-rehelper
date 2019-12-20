@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">i-rehelper.com</div>

                <div class="card-body">
                    @if (Auth::user())
                        Welcome {{Auth::user()->login}}
                    @else
                        @include('auth.login')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
