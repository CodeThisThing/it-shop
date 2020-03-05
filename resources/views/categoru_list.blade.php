@extends('layouts.Admin_panel')

@section('category_list')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div id="Update_category" class="modal">
        <div class="row justify-content-center">
            <div class="modal-content col-5 shadow-lg text-center">
                <form action="" class="d-block">
                    <h3>Редагування категорії</h3>
                    <input name="id" id="category_id" type="text" disabled value="">
                    <input name="name" id="category_name" type="text" value="">


                    <button id="send_btn" class="btn btn-success">Редагувати</button>
                </form>
            </div>
        </div>

    </div>
    <div class="container mt-5">
    <table class="table col-12 mt-3 shadow-lg table-striped">
        <thead class="black white-text">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Category_Name</th>
            <th scope="col" >Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($category_list as $category)
        <tr>
            <th scope="row">{{$category->id}}</th>
            <td class="col">{{$category->category}}</td>
            <td class="col">
                <button id="{{$category->id}}" class="btn btn-warning btn-sm" onclick="form_open(this.id,'{{$category->category}}')">Редагувати</button>
                <button id="{{$category->id}}" class="btn btn-danger btn-sm " onclick="category_delete(this.id)">Видалити</button>
            </td>
        </tr>
       @endforeach
        </tbody>
    </table>
        </div>
    <div class="container col-3">
        <form class="border border-light p-5 shadow-lg mt-5" action="" method="" >
            @csrf
            <p class="h4 mb-4 text-center">Додавання продукту</p>

            <input type="text" name="category_name" id="cat_input" class="form-control mb-4" placeholder="Назва_Категорії">

            <input type="hidden" id="_token" value="{{ csrf_token() }}">

            <button class="btn btn-info btn-block my-4" type="" >Додати</button>
            <div class="status"></div>

        </form>
    </div>


    <script type="text/javascript">

        var category_update_btn=document.getElementsByClassName('btn-update');
        var update_div=document.getElementById('Update_category');
        var form_content=document.getElementsByClassName('modal-content');
        var send_btn=document.getElementById('send_btn');


         function form_open(category_id,category_name) {
            update_div.style.display = 'block';
            document.getElementById('category_id').value = category_id;
            document.getElementById('category_name').value = category_name;
        }
        window.onclick = function(event) {
            if (event.target === update_div) {
                update_div.style.display = "none";
            }
        };
        /*OrderCloseBtn.onclick=function (event){
            Modal.style.display="none";
        };*/

        //AJAX_REQUESTS

        $('.btn-info').click(function (e) {
                e.preventDefault();
            var formData = {
                'category': $('input[name=category_name]').val()
            };
            $.ajax({
                url: "/category_list_add",
                dataType:"text",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                data:formData,
                complete: function () {

                },
                statusCode: {
                    200: function (message) {
                        alert(message);
                        var status=document.getElementsByClassName('status');
                        status.innerHTML='<p>Success</p>';
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

       document.getElementById('cat_input').value='';

        });

        $('.btn-success').click(function (e) {
            e.preventDefault();
            var formData = {
                'name': $('input[name=name]').val(),
                'id': $('input[name=id]').val()
            };
            $.ajax({
                url: "/category_list_update",
                dataType:"text",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                data:formData,
                complete: function () {

                },
                statusCode: {
                    200: function (message) {
                        alert(message);
                        var status=document.getElementsByClassName('status');
                        status.innerHTML='<p>Success</p>';
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
        });

       function category_delete(category_id) {
           $.ajax({
               url: "/category_list_delete",
               dataType: "text",
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               type: "POST",
               data:  {'id' : category_id},
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
       }
    </script>


@endsection

