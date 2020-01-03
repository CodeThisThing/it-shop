@extends('layouts.Navigation')
@section('content')
@foreach($phones  as $phone)





    <!-- Card Dark -->

        <div class="card mt-5 mr-3" >
        <!-- Card image -->

            <div class="card-image"> <img class="card-img-top mt-2" src="{{$phone->Image}}" alt=""></div>
             <!-- Card content -->
            <div class="card-body  elegant-color white-text rounded-bottom ">

            <!-- Social shares button -->

            <!-- Title -->
            <h4 class="card-title ">{{$phone->Name}}</h4>
            <hr class="hr-light">
            <!-- Text -->
                <span><strong>Єкран:</strong> {{$phone->Screen_info}}</span><br>
                <span><strong>Процесор:</strong> {{$phone->processor_info}}</span><br>
                <span><strong>Память:</strong> {{$phone->memory_info}}</span><br>
                <span><strong>Камера:</strong> {{$phone->camera_info}}</span><br>
                <span><strong>Корпус:</strong> {{$phone->material_info}}</span>
                <!-- Link -->
                <hr class="hr-light ">
                <h3><strong>Ціна:</strong> {{$phone->price}}</h3>

            <a  href="/phones/{{$phone->id}}" class="white-text text-decoration-none d-flex justify-content-end"><h5>Купити <i class="fas fa-angle-double-right"></i></h5></a>

        </div>

        </div>

    <!-- Card Dark -->
@endforeach
@endsection


