@extends('layouts.master')

@section('content') 
    <post-list :user="{{json_encode($user)}}"></post-list>
@endsection