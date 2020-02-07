@extends('layouts.Admin_panel')

@section('home_message')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header">Добрий день!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Ви увійшли як Адмін!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
