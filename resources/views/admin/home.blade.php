@extends('layouts.app')

@section('content')
    <admin-users-table route="{{route('api-users')}}"></admin-users-table>
@endsection
