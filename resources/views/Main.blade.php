
@section('content')
    <div class="row justify-content-center " >
        <div class="card-columns d-inline-block col-8 " >
    @foreach($phones  as $phone)
    <!-- Card Dark -->


        <div class="card mt-5 mr-3"   >
        <!-- Card image -->

            <div class="card-image"> <img class="card-img-top mt-2" src="{{$phone->Image}}" alt=""></div>
             <!-- Card content -->
            <div  class="card-body  elegant-color white-text rounded-bottom ">

            <!-- Social shares button -->

            <!-- Title -->
            <div class="d-inline-flex col-12 justify-content-between">
                 <h4 class="card-title ">{{$phone->Name}}</h4>
                  <i class="fas fa-angle-double-down" onclick="hover({{$phone->id}})" ></i>
            </div>
            <!-- Text -->

               <div id="{{$phone->id}}"  class="phone-info" style="display:none;">
                   <hr class="hr-light">
                  <span ><strong>Єкран:</strong> {{$phone->Screen_info}}</span><br>
                  <span ><strong>Процесор:</strong> {{$phone->processor_info}}</span><br>
                  <span><strong>Память:</strong> {{$phone->memory_info}}</span><br>
                  <span><strong>Камера:</strong> {{$phone->camera_info}}</span><br>
                   <span><strong>Корпус:</strong> {{$phone->material_info}}</span>
               </div>

                <!-- Link -->
                <hr class="hr-light ">
                <h3><strong>Ціна:</strong> {{$phone->price}}</h3>

            <a  href="/phones/{{$phone->id_category}}/phone/{{$phone->id}}" class="white-text text-decoration-none d-flex justify-content-end"><h5>Купити <i class="fas fa-angle-double-right"></i></h5></a>

        </div>

        </div>


    <!-- Card Dark -->
@endforeach
        </div>
    </div>
@endsection

<script class="text/javascript">

     function hover(elem_id){
       var elem=document.getElementById(elem_id);
      if(elem.style.display==='none'){
            elem.style.display='block';
       }else elem.style.display='none';

    }


</script>
@extends('layouts.Navbar')
