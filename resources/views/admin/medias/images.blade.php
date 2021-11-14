@extends('admin.layouts.app')

@section('content')
    <iframe src="{{ url('laravel-filemanager?type=image') }}" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
@endsection