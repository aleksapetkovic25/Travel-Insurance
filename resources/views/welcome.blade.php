
@extends('layouts.master')

@section('content')
    <buying-insurance :posts="{{json_encode($posts)}}"></buying-insurance>
@endsection

