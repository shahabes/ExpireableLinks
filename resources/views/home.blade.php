@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Media List') }} &nbsp;&nbsp;&nbsp;
                    <a href="{{ route("home") }}" id="addMediaModal">Add Media</a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="{{ route("links.index") }}">Add Link</a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="{{ route("customer.index") }}">Add Customer</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @yield("media-list")
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")

    @yield("scripts")
@endsection
