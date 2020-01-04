@extends('layouts.Product_page')

@section('About_phone')
    @foreach($phones as $phone)
<img src="{{$phone->Image}}" alt="">
<h5>{{$phone->Name}}</h5>
<h3>Ціна: {{$phone->price}}</h3>
@endforeach
@endsection
