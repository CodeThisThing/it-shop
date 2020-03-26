@extends('layouts.Admin_panel')

@section('product_list')
   <div class="row">
       <div class="container mt-3" style="text-align: right">
           <button class="btn btn-primary"  onclick="location.href='/home/product_list_add'">Додати продукт</button>
       </div>
       <div class="container">
    <table id="table_phone" class="table table-striped shadow-lg mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Назва</th>
            <th scope="col">Ціна(грн)</th>
            <th scope="col">зображення</th>
            <th scope="col">Екран</th>
            <th scope="col">Процесор</th>
            <th scope="col">Камера</th>
            <th scope="col">Память</th>
            <th scope="col">Матеріали</th>
            <th scope="col">#_категорії</th>



        </tr>
        </thead>
        <tbody>
        @foreach($phone_list as $phone)
        <tr id="{{$phone->id}}">
            <th scope="row">{{$phone->id}}</th>
            <td>{{$phone->Name}}</td>
            <td>{{$phone->price}}</td>
            <td><img class="img-fluid" src="{{$phone->Image}}" alt="" style="width: 100px"></td>
            <td>{{$phone->Screen_info}}</td>
            <td>{{$phone->processor_info}}</td>
            <td>{{$phone->camera_info}}</td>
            <td>{{$phone->memory_info}}</td>
            <td>{{$phone->material_info}}</td>
            <td>{{$phone->id_category}}</td>
            <td>
                <button id="{{$phone->id}}" class="btn btn-danger" onclick="product_delete(this.id,this)">Видалити</button>
            </td>
        </tr>
       @endforeach
        </tbody>
    </table>
       </div>

   </div>


   <script>
       function product_delete(product_id,delete_btn) {
           $.ajax({
               url: "/product_list_delete",
               dataType: "text",
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               type: "POST",
               data:  {'id' : product_id},
               complete: function () {
               },
               statusCode: {
                   200: function (message) {
                       alert(message);
                       var status = document.getElementsByClassName('status');
                       status.innerHTML = '<p>Success</p>';
                   },
                   403: function (jqXHR) {
                       var error = JSON.parse(jqXHR.responseText);
                       $("body").prepend(error.message);
                   }

               },
               error: function (xhr, status, errorThrown) {
                   alert(errorThrown + '\n' + status + '\n' + xhr.statusText);
               }
           });
           delete_btn.closest('tr').remove();

       }

   </script>
@endsection
