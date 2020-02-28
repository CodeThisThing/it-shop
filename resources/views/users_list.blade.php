@extends('layouts.Admin_panel')


@section('user_list')

    <div class="row">
        <div class="container">
            <table class="table table-striped shadow-lg mt-4">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Імя</th>
                    <th scope="col">email</th>
                    <th scope="col">Дата реєстрації</th>
                    <th scope="col">Права</th>


                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            @if($user->is_admin==1)
                                <p>Адмін</p>
                           @else <p>Користувач</p>
                                @endif
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>


@endsection
