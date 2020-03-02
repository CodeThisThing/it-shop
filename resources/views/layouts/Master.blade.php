
<!doctype html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/Main.css')}}" type="text/css">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <link rel="stylesheet" href="">
    <title>ITShop</title>
    <link rel="shortcut icon" href="http://itshop/favicon.ico" type="image/x-icon">
</head>

<body style="background:#778899; ">
<div class="row wow fadeIn ">

    <nav class="navbar navbar-expand-lg  navbar-dark default-color col-12"  style=" background-color: #000714;">
        <a class="navbar-brand ml-5" href="/"><strong>IT-shop</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach( App\Category::all() as $category)
                <li class="nav-item ">
                    <a class="nav-link" href="/phones/{{$category->id}}">{{$category->category}}</a>
                </li>

                    @endforeach
            </ul>

            <i id="orderList" class="fas fa-shopping-cart " style="color: white;font-size: 23px" ></i>

            <div id="myModal" class="modal">
                    <div class="row justify-content-center">
                        <div id="Node_div_order" class="modal-content col-6">
                            <div class="top_content d-inline-flex justify-content-between">
                                <h1>Корзина</h1>
                                <i id="order_list_close" class="fas fa-times-circle mt-2" style="font-size:30px"></i>
                            </div>
                            <hr class="hr-dark">

                           @auth
                            @foreach((new App\Order)->GetOrder() as $order_list_obj)
                                <div id="{{$order_list_obj->order_id}}" class="shadow-lg  d-inline-flex mb-2 justify-content-between">
                                    <div class="order-info">
                                        <ul id="{{$order_list_obj->order_id}}" class="ul-content text-decoration-none mt-3 mb-2">
                                            <li  class="d-inline-flex">
                                                  <h3>Продукт:</h3>
                                                <h3 class="ml-3">{{$order_list_obj->order_product_name}}</h3>
                                            </li>
                                            <li class="d-inline-flex">
                                                <h3 class="ml-3">Ціна:</h3>
                                                <h3>{{$order_list_obj->order_product_cost}}</h3>
                                            </li>
                                                <li class="d-inline-flex">
                                                <h3 class="ml-3">Кількість:</h3>
                                                <h3>{{$order_list_obj->order_product_quantity}}</h3>
                                            </li>
                                        </ul>
                                    </div>
                                    <i id="order_list_delete" class="fas fa-times mt-3 mr-3" onclick="delorder({{$order_list_obj->order_id}})" style="font-size:25px"></i>
                                </div>
                            @endforeach
                                @endauth

                            <div class="container mb-3 mt-2 justify-content-end">
                                <button class="btn btn-success" onclick="confirmOrders()">Оформити Заказ</button>
                            </div>
                        </div>

                    </div>
            </div>

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        @if(Auth::user()->is_admin==1)
                        <a class="nav-link" href="{{ url('/home') }}">{{ Auth::user()->name }}</a>
                        @endif
                        @if(Auth::user()->is_admin==0)
                                <a class="nav-link" href="{{ url('/user_home') }}">{{ Auth::user()->name }}</a>
                            @endif

                    @else
                        <button class="btn btn-info ml-5" onclick="location.href='{{route('login')}}'" >Вхід</button>

                        @if (Route::has('register'))
                         <button class="btn btn-success" onclick="location.href='{{ route('register') }}'">Регісрація</button>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>
</div>
@yield('content')
</body>
@yield('About')
@yield('succes_message')
@yield('home_message')
<script type="text/javascript" >
var OrderListObj=document.getElementById('orderList');
var Modal=document.getElementById('myModal');
var OrderCloseBtn=document.getElementById('order_list_close');
OrderListObj.onclick=function () {
    Modal.style.display='block';
};
window.onclick = function(event) {
    if (event.target === Modal) {
        Modal.style.display = "none";
    }
};
OrderCloseBtn.onclick=function () {
    Modal.style.display="none";
};


function delorder(order_id) {
    var DelOrder=document.getElementById('order_list_delete');
   DelOrder.parentElement.remove();

    $.ajax(
        {
            url:'/delOrder',
            type: 'POST',
            dataType:"text",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {order_id:order_id},
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
function confirmOrders(){

    let orders=document.getElementsByClassName('ul-content');
    var order_list=[];
    var Node_div=document.getElementById('Node_div_order');
    for(let order of orders){
        order_list.push(order.id);

    }
    for(let child_div_id of order_list){
        Node_div.removeChild(document.getElementById(child_div_id));

    }


    $.ajax(
        {
            url:'/order_confirm',
            type: 'POST',
            dataType:"text",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {order_list},
            complete: function() {

            },
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
    );




}



</script>
</html>

