@extends('layouts.Admin_panel')

@section('order_list_section')
    <div class="row">
        <div class="container col-8 text-center">
        <table class="table table-striped shadow-lg mt-4">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Назва</th>
                <th scope="col">Ціна(грн)</th>
                <th scope="col">зображення</th>



            </tr>
            </thead>
            <tbody>
                @foreach($confirmed_orders as $confirmed_order)
                    @foreach((new App\Order)->Get_orders_by_id($confirmed_order->orders_id) as $order)
                    <tr>
                    <th scope="row">{{$order->order_id}}</th>
                    <td>
                    </td>
                </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
        </div>
    </div>

@endsection
