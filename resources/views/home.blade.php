@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center text-white bg-danger mb-3">Dashboard</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{Auth::user()->name}}, you are logged in role {{Auth::user()->position}}
                </div>
            </div>

            <div class="mt-5">
                <div class="col-md-6 offset-md-5">
                    <button type="submit" class="btn btn-danger"  onclick="location.href='{{ url('firstWorkPage') }}'">
                        {{ __('Start working') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
