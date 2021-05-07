@extends('painel.template')
@section('title-page')
Painel de Controle
@endsection
@section('main-content')
<div class="col-lg-12">
    @if( session('password-different') )
        <ul class="alert alert-warning " role="alert">
            <li><i class="fa fa-warning"></i> {{ session('password-different') }}</li>
        </ul>
    @endif
    @if( session('update-auth') )
        <ul class="alert alert-warning " role="alert">
            <li><i class="fa fa-warning"></i> {{ session('update-auth') }}</li>
        </ul>
    @endif
    @if( session('create-auth') )
        <ul class="alert alert-warning " role="alert">
            <li><i class="fa fa-warning"></i> {{ session('create-auth') }}</li>
        </ul>
    @endif
    @if( session('user-not-found') )
        <ul class="alert alert-warning " role="alert">
            <li><i class="fa fa-warning"></i> {{ session('user-not-found') }}</li>
        </ul>
    @endif
    @if( session('error') )
        <ul class="alert alert-warning " role="alert">
            <li><i class="fa fa-warning"></i> {{ session('error') }}</li>
        </ul>
    @endif
    @if( session('error-exception') )
        <ul class="alert alert-warning " role="alert">
            <li><i class="fa fa-warning"></i> {{ session('error-exception') }}</li>
        </ul>
    @endif
    @if( session('created') )
        <ul class="alert alert-success " role="alert">
            <li><i class="fa fa-check"></i> {{ session('created') }}</li>
        </ul>
    @endif
    @if( session('password-changed') )
        <ul class="alert alert-success " role="alert">
            <li><i class="fa fa-check"></i> {{ session('password-changed') }}</li>
        </ul>
    @endif
    @if( session('warning') )
        <ul class="alert alert-warning " role="alert">
            <li><i class="fa fa-warning"></i> {{ session('warning') }}</li>
        </ul>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        @can('only-admin')
        <div class="col-md-4 mt-5 mb-3">
            <div class="card">
                <div class="seo-fact sbg1">
                    <div class="p-4 d-flex justify-content-between align-items-center">
                        <div class="seofct-icon"><img src="{{ url('painel/svg/003-united.svg') }}" alt="">
                            <a href="{{ route('collaborators') }}">Colaboradores </a>
                        </div>
                        <h2>{{  $cont_collab }}</h2>
                    </div>
                    <canvas id="seolinechart1" height="50"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-md-5 mb-3">
            <div class="card">
                <div class="seo-fact sbg2">
                    <div class="p-4 d-flex justify-content-between align-items-center">
                        <div class="seofct-icon"><img src="{{ url('painel/svg/001-apartments.svg') }}" alt="">
                            <a href="{{ route('apartments') }}">Apartamentos </a>
                        </div>
                        <h2>{{ $cont_apt }}</h2>
                    </div>
                    <canvas id="seolinechart2" height="50"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-md-5 mb-3">
            <div class="card">
                <div class="seo-fact sbg4">
                    <div class="p-4 d-flex justify-content-between align-items-center">
                        <div class="seofct-icon"><img src="{{ url('painel/svg/004-deal.svg') }}" alt="">
                            <a href="{{ route('interests') }}">Propostas </a>
                        </div>
                        <h2>{{ $cont_interest }}</h2>
                    </div>
                    <canvas id="seolinechart2" height="50"></canvas>
                </div>
            </div>
        </div>
        @else 
        <div class="col-md-6 mt-md-5 mb-3">
            <div class="card">
                <div class="seo-fact sbg2">
                    <div class="p-4 d-flex justify-content-between align-items-center">
                        <div class="seofct-icon"><img src="{{ url('painel/svg/001-apartments.svg') }}" alt="">
                            <a href="{{ route('apartments') }}">Apartamentos </a>
                        </div>
                        <h2>{{ $cont_apt }}</h2>
                    </div>
                    <canvas id="seolinechart2" height="50"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-md-5 mb-3">
            <div class="card">
                <div class="seo-fact sbg4">
                    <div class="p-4 d-flex justify-content-between align-items-center">
                        <div class="seofct-icon"><img src="{{ url('painel/svg/004-deal.svg') }}" alt="">
                            <a href="{{ route('interests') }}">Propostas </a>
                        </div>
                        <h2>{{ $cont_interest }}</h2>
                    </div>
                    <canvas id="seolinechart2" height="50"></canvas>
                </div>
            </div>
        </div>
        @endcan
        
    </div>
</div>
<!-- seo fact area end -->
@endsection

@push('css')
    <style>
        .main-content-inner .seo-fact a {
            color: #fff
        }

        .main-content-inner .row>div>div:hover {
            animation-name: up;
            animation-duration: .5s;
            animation-timing-function: ease-in-out;
            animation-fill-mode: forwards
        }

        <blade keyframes|%20up%7B%0D>0% {
            transform: translateY(0px)
        }

        100% {
            transform: translateY(-10px)
        }
        }

    </style>

@endpush
