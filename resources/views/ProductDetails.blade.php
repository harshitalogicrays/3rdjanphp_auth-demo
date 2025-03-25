@extends('layouts.app')
@section('content')

@livewire('productdetails' ,['product'=>$product])

@endsection