@extends('layouts.app')
@section('content')
<div class="container">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel 5.5 ReactJS CRUD Example</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    @include('alert.flash-message')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Permission</div>
                <div class="panel-body">
                    @if(checkPermission(['user','admin','superadmin']))
                    <a href="{{ url('permissions-all-users') }}"><button>Access All Users</button></a>
                    @endif


                    @if(checkPermission(['user','admin','superadmin']))
                    <a href="{{ url('/karyawan') }}"><button>DAFTAR KARYAWAN</button></a>
                    @endif


                    @if(checkPermission(['user','admin','superadmin']))
                    <a href="{{ url('/user') }}"><button>USER SETTING</button></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
 <div id="footer"></div>
</div>

 <script src="{{ asset('js/app.js') }}"></script>
@endsection