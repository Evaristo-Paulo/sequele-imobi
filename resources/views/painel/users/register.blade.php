@extends('painel.template')
@section('title-page')
Registo de Usuários
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
                                <div class="x_content">
                                    <div class="payment">
                                        <section class="wizard-section">
                                            <div class="row no-gutters">
                                                <div class="col-lg-12 col-md-6">
                                                    <div class="form-wizard">
                                                        <form role="form" method="POST" action="{{ route('users.register.send') }}" enctype="multipart/form-data">
                                                        {{ csrf_field() }}

                                                            <div class="form-wizard-header">
                                                                <p>Preenche todos os campos do formulário</p>
                                                                <ul class="list-unstyled form-wizard-steps clearfix"
                                                                    style="display: flex; justify-content: center">
                                                                    <li class="active"><span>1</span></li>
                                                                    <li><span>2</span></li>
                                                                </ul>
                                                            </div>
                                                            <fieldset class="wizard-fieldset show">
                                                                <h5>Dados pessoais</h5>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label for="name" class="col-form-label">
                                                                            Nome <span class="required">*</span></label>
                                                                        <input class="form-control wizard-required" required type="text" value="{{ old('name') }}"
                                                                            id="name" name="name">
                                                                            <div class="wizard-form-error"></div>
                                                                    </div>
                                        
                                                                    <div class="col-sm-6">
                                                                        <label for="email" class="col-form-label">
                                                                            Email <span class="required">*</span></label>
                                                                        <input class="form-control wizard-required" required type="email" value="{{ old('email') }}"
                                                                            name="email" id="email">
                                                                            <div class="wizard-form-error"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label class="col-form-label d-block">Gênero <span class="required">*</span></label>
                                                                        @foreach( $genders as $index => $value )
                                                                            <div class="custom-control custom-radio">
                                                                                @if($value->type == 'Masculino')
                                                                                    <input type="radio" checked id="{{ $value->type }}" name="gender"
                                                                                        class="custom-control-input" value="{{ $value->id }}">
                                                                                @else
                                                                                    <input type="radio" id="{{ $value->type }}" name="gender"
                                                                                        class="custom-control-input" value="{{ $value->id }}">
                                                                                @endif
                                                                                <label class="custom-control-label"
                                                                                    for="{{ $value->type }}">{{ $value->type }}</label>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <div class="form-group clearfix">
                                                                    <a href="javascript:;"
                                                                        class="form-wizard-next-btn float-right">Próximo</a>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset class="wizard-fieldset">
                                                                <h5>Role & Senha</h5>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label class="col-form-label d-block">Role <span class="required">*</span></label>
                                                                        @foreach( $roles as $index => $value )
                                                                            <div class="custom-control custom-checkbox">
                                                                                @if($value->type == 'user')
                                                                                    <input type="checkbox" checked class="custom-control-input"
                                                                                        id="{{ $value->type }}" name="role[]"
                                                                                        value="{{ $value->type }}">
                                                                                @else
                                                                                    <input type="checkbox" class="custom-control-input"
                                                                                        id="{{ $value->type }}" name="role[]"
                                                                                        value="{{ $value->type }}">
                                                                                @endif
                                                                                <label class="custom-control-label"
                                                                                    for="{{ $value->type }}">{{ $value->type }}</label>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label for="password" class="col-form-label">
                                                                            Senha <span class="required">*</span></label>
                                                                        <input class="form-control wizard-required" required type="password" value="{{ old('password') }}"
                                                                            id="password" name="password">
                                                                            <div class="wizard-form-error"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group clearfix">
                                                                    <a href="javascript:;"
                                                                        class="form-wizard-previous-btn float-left">Anterior</a>
                                                                    <button type="submit"
                                                                        class="form-wizard-submit float-right btn-success">Enviar</button>
                                                                </div>
                                                            </fieldset>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

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