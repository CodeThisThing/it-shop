@extends('layouts.Navbar')
@section('About')

    @foreach($phones as $phone)
        <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="row col-12 shadow-lg justify-content-center d-block mt-5 " style="background: white;padding-bottom: 20px">
       <div class="product_photo text-center">
           <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                   <div class="carousel-item active">
                       <img class="d-inline-flex w-50" src="{{$phone->Image}}"
                            alt="First slide">

                   </div>
                   <div class="carousel-item">
                       <img class="d-inline-flex w-50" src="{{$phone->Image}}"
                            alt="Second slide">
                   </div>
                   <div class="carousel-item">
                       <img class="d-inline-flex w-50" src="{{$phone->Image}}"
                            alt="Third slide">
                   </div>
               </div>
               <a class="carousel-control-prev " href="#carouselExampleControls" role="button" data-slide="prev">
                   <span class="carousel-control-prev-icon  btn-dark active" aria-hidden="true"></span>
                   <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next " href="#carouselExampleControls" role="button" data-slide="next">
                   <span class="carousel-control-next-icon btn-dark active" aria-hidden="true"></span>
                   <span class="sr-only ">Next</span>
               </a>
           </div>

       </div>
        <div class="product_info">
            <div class="main_info mt-5 d-inline-flex justify-content-between col-12">
                <h5 style="font-size: 35px">{{$phone->Name}}</h5>
                <div class="d-inline-flex">
                    <i id="addprod" class="fas fa-cart-plus" onclick="addorder({{$phone->id}})" style="font-size: 27px; cursor: pointer" ></i>
                    <h3 class="ml-3">Ціна: {{$phone->price}} UAH</h3>
                </div>
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

<script class="text/javascript">



    function addorder(prod_id) {
    $.ajax(
            {
                url: document.location.href+'/AddOrder',
                type: 'POST',
                dataType:"text",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {product_id:prod_id},
                complete: function() {},
                statusCode: {
                    200: function(message) {
                        alert(message);
                    },
                    403: function(jqXHR) {
                        var error = JSON.parse(jqXHR.responseText);
                        $("body").prepend(error.message);
                    }

                },
                error:function(xhr, status, errorThrown) {
                    alert(errorThrown+'\n'+status+'\n'+xhr.statusText);
                }
            }
    )

    }


   //const requestURL =document.location.href+'/AddOrder';
   /*const requestURL ='AjaxScript.php';
   const prod_id=3;
   function sendRequest(method,url,body=null) {
       const headers={
           'Content-Type': 'application/json'
       };
       return fetch(url,{
           method:method,
           body:prod_id,
           headers:headers
       })
   }


function addorder(prod_id) {
    sendRequest('post', requestURL, prod_id)
        .then(data => console.log(data))
        .catch(err => console.log(err));
}
*/

</script>
