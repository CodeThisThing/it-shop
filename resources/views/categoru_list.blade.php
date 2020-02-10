@extends('layouts.Admin_panel')

@section('category_list')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container mt-5">
    <table class="table col-12 mt-3 shadow-lg table-striped">
        <thead class="black white-text">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Category_Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($category_list as $category)
        <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->category}}</td>
        </tr>
       @endforeach
        </tbody>
    </table>
        </div>
    <div class="container col-3">
        <form class="border border-light p-5 shadow-lg mt-5" action="" method="" >
            @csrf
            <p class="h4 mb-4 text-center">Додавання продукту</p>

            <input type="text" name="name" id="" class="form-control mb-4" placeholder="Назва_Категорії">

            <input type="hidden" id="_token" value="{{ csrf_token() }}">

            <button class="btn btn-info btn-block my-4" type="" >Додати</button>
            <div class="status"></div>

        </form>
    </div>

    <script type="text/javascript">
        $('.btn-info').click(function (e) {
            e.preventDefault();
            var formData = {
                'name': $('input[name=name]').val()
            };
            $.ajax({
                url: "/",
                dataType:"text",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "Post",
                data:formData,
                complete: function () {
                    var status=document.getElementsByClassName('status')
                    status.innerHTML='<p>Succes</p>'
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

