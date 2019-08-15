@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Профиль</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>
                        USERS
                    </h1>   
                    <?php
                    foreach ($users as $user) {
                        echo $user->user_id;
                        echo " ";
                        echo $user->stage;
                        echo " ";
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection