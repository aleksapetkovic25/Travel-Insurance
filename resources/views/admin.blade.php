@extends('layouts.master')

@section('content')
    <admin-insurance :insurances="{{json_encode($insurances)}}"></admin-insurance>
@endsection