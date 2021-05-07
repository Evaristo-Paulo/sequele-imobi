@extends('painel.template')
@section('title-page')
Visualização de Colaboradores
@endsection
@section('main-content')
<div class="row">
    <div class="col-lg-12 col-ml-12">

        <div class="row">
            <div class="col-12 mt-5">
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
                @if( session('collaborator-not-found') )
                    <ul class="alert alert-warning " role="alert">
                        <li><i class="fa fa-warning"></i> {{ session('collaborator-not-found') }}</li>
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
                <div class="card">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                @if(session('warning'))
                                    <div class="page-header" id="notification-warning">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="ti-check"></i> {{ session('warning') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(session('success'))
                                    <div class="page-header" id="notification-success">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="ti-check"></i> {{ session('success') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(session('error'))
                                    <div class="page-header" id="notification-error">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="ti-check"></i> {{ session('error') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <div class="view-item">
                                        <div class="view-photo">
                                            <div class="cover">
                                                <img src="{{ url("storage/users/". $collaborator->photo. "") }}"
                                                    alt="foto-de-perfil">
                                            </div>
                                        </div>
                                        <div class="view-content">
                                            <h3 style="margin-bottom: 20px">{{ $collaborator->name }}</h3>
                                            <h5 style="margin-bottom: 20px">Nº BI. {{ $collaborator->bi }}</h5>
                                            <p>{{ date('d/m/Y', strtotime($collaborator->birthday)) }}</p>
                                            <p>{{ $collaborator->gender }}</p>
                                            <p>Rua {{ $collaborator->street }}, bairro {{ $collaborator->neighbourhood }}, {{ $collaborator->municipe }} - {{ $collaborator->province }}</p>
                                            <p>{{ $collaborator->phone }}</p>
                                            <p>{{ $collaborator->email }}</p>
                                            <h5 style="margin-top: 10px">Sobre mim</h5>
                                            <p >@if(Str::length($collaborator->description) == 0)
                                                Nenhuma descrição
                                            @else
                                            {{ $collaborator->description }}
                                            @endif</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- seo fact area end -->
@endsection

@push('css')
@endpush

@push('js')
@endpush
