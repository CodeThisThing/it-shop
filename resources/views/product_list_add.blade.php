@extends('layouts.Admin_panel')


@section('product_list_del')
    <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
    <div class="container col-6">
    <form class="border border-light p-5 shadow-lg mt-5" action="" method="post" >
        @csrf
        <p class="h4 mb-4 text-center">Додавання продукту</p>

        <input type="text" name="prod_name" id="" class="form-control mb-4" placeholder="Назва_Продукта">

        <input type="text" id="" name="price" class="form-control mb-4" placeholder="Ціна">

        <input type="text" id="" name="imgURL" class="form-control mb-4" placeholder="Зображення(URL)">

        <textarea id="textarea" name="screen" class="form-control mb-4" placeholder="Екран"></textarea>

        <textarea id="textarea" name="processor" class="form-control mb-4" placeholder="Процесор"></textarea>

        <textarea id="textarea" name="camera" class="form-control mb-4" placeholder="Камера"></textarea>

        <textarea id="textarea" name="memory" class="form-control mb-4" placeholder="Пам`ять"></textarea>

        <textarea id="textarea" name="material" class="form-control mb-4" placeholder="Матеріал"></textarea>

        <select class="browser-default custom-select mb-4" name="category" id="select">
            <option value="" disabled="" selected="">Виберіть категорію</option>
            <option value="1">Iphone</option>
            <option value="2">Oneplus</option>
            <option value="3">Xiaomi</option>
            <option value="4">Samsung</option>
        </select>
        <input type="hidden" id="_token" value="{{ csrf_token() }}">

        <button class="btn btn-info btn-block my-4" type="" >Додати</button>
        <div class="status"></div>

    </form>
    </div>
</div>
<script type="text/javascript">
  $('.btn-info').click(function (e) {
        e.preventDefault();
      var formData = {
          'name': $('input[name=prod_name]').val(),
          'price': $('input[name=price]').val(),
          'img': $('input[name=imgURL]').val(),
          'screen': $('textarea[name=screen]').val(),
          'processor': $('textarea[name=processor]').val(),
          'camera': $('textarea[name=camera]').val(),
          'memory': $('textarea[name=memory]').val(),
          'material': $('textarea[name=material]').val(),
          'category': $('select[name=category]').val()
      };
      $.ajax({
          url: "/product_list_add",
          dataType:"text",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: "Post",
          data:formData,
          complete: function () {
          },
          statusCode: {
              200: function (message) {
                  alert(message);
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
</script>


@endsection
