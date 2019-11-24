@extends('layouts.app')

@section('content')
    <mapa route="{{route('api-users')}}"></mapa>
@endsection

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_fwV2_3EnXM5IXCvpIQoBvIBnkuSUg1E"
  type="text/javascript"></script>
