@extends('layouts.User_panel')

@section('user_profile')
<div class="row">

    <div class="container col-10 d-inline-flex mt-5">
        <div class="profile profile_img col-3 mr-5 shadow-lg">
            <img class="img-fluid" src="https://i07.fotocdn.net/s113/bc912fc377c811f5/gallery_m/2544439364.jpg" alt="">
        </div>
        <div class="profile_info col-3 ">
            <div class="profile profile_base_info shadow-lg">
            <h2>
                {{Auth::user()->name}}
            </h2>
                <p>
                    email:
                    {{Auth::user()->email}}
                </p>

            </div>
            <div class="profile profile_main_info shadow-lg">
                <h3>Про мене</h3>
                <p>Я розюлбник всякої всячини здоров треба шось пиши там незнаю. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores magnam ratione rem rerum veniam. Consectetur cumque dignissimos earum error, explicabo facilis labore laudantium minus nam nemo non reiciendis suscipit voluptatibus!</p>
            </div>
        </div>
        <div class="profile_orders shadow-lg">
            <h3>Мої замовлення</h3>

        </div>
    </div>

</div>

@endsection
