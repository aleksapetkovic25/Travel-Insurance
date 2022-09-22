@extends('layouts.master')

@section('content')
    <edit-post :post="{{json_encode($post)}}"></edit-post>
@endsection