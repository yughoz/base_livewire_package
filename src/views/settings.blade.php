

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('vendor-style')
@endsection

@section('content_header')
    <h1>Settings</h1>
@stop

@section('content')
     @livewire('settings_view') 

@endsection


@section('adminlte_js')
    {{-- Page js files --}}

    {{-- Script according page start here --}}
    <script>

        window.livewire.on('reloadAll', () => {
            $('#createModal').modal('hide');
            $('#updateModal').modal('hide');
        });
        
    </script>
@endsection