@extends('layouts.Admin_panel')

@section('order_list_section')
    <div class="row">
        <div class="container col-8 text-center">
        <table class="table table-striped shadow-lg mt-4">
            <thead>
            <tr>
                <th scope="col">ORDER_GROUP</th>
                <th scope="col">#</th>
                <th scope="col">Назва</th>
                <th scope="col">Ціна(грн)</th>
                <th scope="col">зображення</th>



            </tr>
            </thead>
            <tbody>


                @foreach($confirmed_orders as $confirmed_order)

                    @foreach(json_decode($confirmed_order->orders_id,true) as $confirmed_orders_id)
                        @foreach($confirmed_orders_id as $confirmed_order_id)

                            @foreach((new App\Order)->Get_orders_by_id($confirmed_order_id) as $order)
            <tr>
                        <th scope="row">{{$confirmed_order->id}}</th>
                        <td>{{$order->order_id}}</td>
                        <td>{{$order->order_product_name}}</td>
                        <td>{{$order->order_product_cost}}</td>
                        <td>{{$order->order_product_quantity}}</td>
            </tr>

                            @endforeach

                        @endforeach
                    @endforeach
                @endforeach

            </tbody>
        </table>
        </div>
    </div>

@endsection

