@extends('layouts.Navbar')
@section('About')

    @foreach($phones as $phone)
<div class="container">
    <div class="row col-12 shadow-lg justify-content-center d-block mt-5 " style="background: white;padding-bottom: 20px">
       <div class="product_photo text-center">
           <img src="{{$phone->Image}}" alt="">

       </div>
        <div class="product_info">
            <div class="main_info mt-5 d-inline-flex justify-content-between col-12">
                <h5 style="font-size: 35px">{{$phone->Name}}</h5>
                <h3>Ціна: {{$phone->price}}</h3>
            </div>
            <hr class="hr-dark">
        <div class="detail_info mt-3">
            <ul>
                <li>
                    <span><strong>Єкран:</strong> {{$phone->Screen_info}}</span><br>
                </li>
                <li>
                    <span><strong>Процесор:</strong> {{$phone->processor_info}}</span><br>
                </li>
                <li>
                    <span><strong>Память:</strong> {{$phone->memory_info}}</span><br>
                </li>
                <li>
                    <span><strong>Камера:</strong> {{$phone->camera_info}}</span><br>
                </li>
                <li>
                    <span><strong>Корпус:</strong> {{$phone->material_info}}</span>
                </li>

            </ul>
            <hr class="hr-dark">
        </div>

        </div>
        @endforeach
        <h2 class="mb-5">Коментарії</h2>
        @foreach($comments as $comment)
        <div class="product_comment ">
            <hr class="hr-dark">
            <div class="comment_top  d-inline-flex justify-content-between col-12">
                <p><strong>{{$comment->user_name}}</strong></p>
               <p>{{$comment->created_at}}</p>
            </div>
            <div class="comment_bottom">
                <p class="mt-3">{{$comment->comment_text}}</p>
            </div>

            <hr class="hr-dark">

        </div>
         @endforeach
        <h5><strong>Залишити коментарій</strong></h5>
        <form class="md-form mt-3" method="post" action="/phones/{phone_id}/succes_send">
            @csrf
            <input placeholder="Ім`я" name="user_name" type="text" id="inputPrefilledEx" class="form-control">
            <textarea class="form-control  z-depth-1 mt-3" name="text" id="exampleFormControlTextarea6" rows="3" placeholder="Напишіть щось..."></textarea>
            <button type="submit" class="btn col-12 mt-4 btn-dark btn-rounded z-depth-1a">Надіслати</button>

        </form>
    </div>
</div>



@endsection

