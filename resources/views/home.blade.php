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
                        @if (Auth::user()->position == 'dispatcher')
                            <button type="submit" class="btn btn-danger"
                                    onclick="location.href='{{ url('dispatcher.dispatcher-dashboard') }}'">
                                {{ __('Start working') }}
                            </button>
                        @else (Auth::user()->position == 'admin')
                            <button type="submit" class="btn btn-danger"
                                    onclick="location.href='{{ url('admin-dashboard') }}'">
                                {{ __('Start working') }}
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
