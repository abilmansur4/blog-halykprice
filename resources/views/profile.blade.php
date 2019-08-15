@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Профиль
                    <button style="float: right" type="button" class="btn btn-primary">Изменить</button>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped">
                        <tbody>
                          <tr>
                            <th scope="row">Логин</th>
                            <td>{{Auth::user() -> name}}</td>
                          </tr>
                          @if( Auth::user()->sponsorname === "0")
                            <tr style="display: none">
                            </tr>                         
                          @else
                            <tr>
                              <th scope="row">Спонсор</th>
                              <td>{{App\User::find(Auth::user() -> sponsorname)->name}}</td>
                            </tr>      
                          @endif
                          <tr>
                            <th scope="row">ФИО</th>
                            <td>{{Auth::user() -> fullname}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Дата регистрации</th>
                            <td>{{Auth::user() -> created_at}}</td>
                          </tr>
                          <tr>
                            <th scope="row">День рождения</th>
                            <td>{{App\User::find(Auth::user() -> id)->birthdate}}</td>
                          </tr>
                          <tr>
                            <th scope="row">ИИН</th>
                            <td>{{Auth::user() -> ssi}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Телефон</th>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <th scope="row">Эл. почта</th>
                            <td>{{Auth::user() -> email}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Номер карты</th>
                            <td>@mdo</td>
                          </tr>
                        </tbody>
                      </table>     
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection