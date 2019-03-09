@extends('layouts.app')

@section('content')
    <admin-panel access-user="{{auth()->user()->can('access user')}}"></admin-panel>
@endsection