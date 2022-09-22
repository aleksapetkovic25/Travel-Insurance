@extends('layouts.master')

@section('content')
    <post-details :post="{{json_encode($post)}}"></post-details>
@endsection