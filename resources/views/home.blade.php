@extends('layouts.app')

@section('content')

@section('assets')
    <link rel="stylesheet" href="css/style.css">
@endsection

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Dashboard</div> -->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Добро пожаловать, {{ Auth::user() -> name}} --}}
                    <div class="cards-block" style="display: flex; flex-direction: row; justify-content: center;">
                        <div class="card text-white bg-info mb-3" style="max-width: 8rem; display: flex; flex-direction: row; justify-content: center;">
                            <div class="card-body">
                            <p class="card-text" style="text-align: center"><a href="#" style="color: white">{{ Auth::user() -> fullname}}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="cards-block" style="display: flex; flex-direction: row; justify-content: center;">
                        @foreach($users as $user)    
                        <div class="card text-white bg-info mb-3" style="max-width: 8rem; margin-right: 2px; margin-left: 2px;">
                            <div class="card-body">
                            <p class="card-text" style="text-align: center"><a href="#" style="color: white">{{$user->name}}</a></p>
                            </div>
                        </div>
                        @endforeach
                    </div>

            </div>
        </div>
    </div>
</div>

@endsection
