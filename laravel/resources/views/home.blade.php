@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in! as ') }}

                    @role('superadmin')
                    Super Admin
                    @endrole

                    @role('admin')
                    Admin
                    @endrole

                    @role('subscriber')
                    Subscriber
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
