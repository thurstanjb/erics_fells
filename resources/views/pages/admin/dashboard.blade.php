@extends('layouts.app')
@php
$userAccess = json_encode(auth()->user()->can('access user'));
@endphp

@section('content')
    <admin-panel :access-user="{{$userAccess}}"></admin-panel>
@endsection