@extends('painel.template')
@section('title-page')
Actualização de Colaboradores
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
                                <div class="x_content">
                                    <div class="payment">
                                        <section class="wizard-section">
                                            <div class="row no-gutters">
                                                <div class="col-lg-12 col-md-6">
                                                    <div class="form-wizard">
                                                        <form role="form" method="POST" action="{{ route('collaborators.update', $collaborator->id ) }}" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            @method('PUT')
                                                            
                                                            <input type="hidden" name="collaborator_id" value="{{ $collaborator->id }}">

                                                            <div class="form-wizard-header">
                                                                <p>Preenche todos os campos do formulário</p>
                                                                <ul class="list-unstyled form-wizard-steps clearfix"
                                                                    style="display: flex; justify-content: center">
                                                                    <li class="active"><span>1</span></li>
                                                                    <li><span>2</span></li>
                                                                    <li><span>3</span></li>
                                                                </ul>
                                                            </div>
                                                            <fieldset class="wizard-fieldset show">
                                                                <h5>Dados pessoais</h5>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label for="name" class="col-form-label">
                                                                            Nome <span class="required">*</span></label>
                                                                        <input class="form-control wizard-required" required type="text" value="{{ $collaborator->name }}"
                                                                            id="name" name="name">
                                                                            <div class="wizard-form-error"></div>
                                                                    </div>
                                        
                                                                    <div class="col-sm-6">
                                                                        <label for="birthday" class="col-form-label">
                                                                            Data de Nascimento <span class="required">*</span></label>
                                                                        <input class="form-control wizard-required" required type="date" value="{{ $collaborator->birthday }}"
                                                                            name="birthday" id="birthday">
                                                                            <div class="wizard-form-error"></div>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label class="col-form-label d-block">Gênero <span class="required">*</span></label>
                                                                        @foreach( $genders as $index => $value )
                                                                            <div class="custom-control custom-radio">
                                                                                @if($value->type == $collaborator->gender)
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
                                                                    <div class="col-sm-6">
                                                                        <label for="bi" class="col-form-label">
                                                                            BI <span class="required">*</span></label>
                                                                        <input class="form-control wizard-required" required type="text" value="{{ $collaborator->bi }}"
                                                                            name="bi" id="bi">
                                                                            <div class="wizard-form-error"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group clearfix">
                                                                    <a href="javascript:;"
                                                                        class="form-wizard-next-btn float-right">Próximo</a>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset class="wizard-fieldset">
                                                                <h5>Contacto & Morada</h5>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label for="phone" class="col-form-label">
                                                                            Telefone <span class="required">*</span></label>
                                                                        <input class="form-control wizard-required" required type="text" value="{{ $collaborator->phone }}"
                                                                            id="phone" name="phone">
                                                                            <div class="wizard-form-error"></div>
                                                                    </div>
                                        
                                                                    <div class="col-sm-6">
                                                                        <label for="email" class="col-form-label">
                                                                            Email <span class="required">*</span></label>
                                                                        <input class="form-control wizard-required" required type="email" value="{{ $collaborator->email }}"
                                                                            name="email" id="email">
                                                                            <div class="wizard-form-error"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label for="neighbourhood" class="col-form-label">
                                                                            Bairro <span class="required">*</span></label>
                                                                        <input class="form-control wizard-required" required type="text" value="{{ $collaborator->neighbourhood }}"
                                                                            name="neighbourhood" id="neighbourhood">
                                                                            <div class="wizard-form-error"></div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label for="street" class="col-form-label">
                                                                            Rua <span class="required">*</span></label>
                                                                        <input class="form-control" type="text" value="{{ $collaborator->street }}"
                                                                            id="street" name="street">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label for="province" class="col-form-label">
                                                                            Província <span class="required">*</span></label>
                                                                        <select class="select2_single form-control wizard-required" tabindex="-1" required="required" id="province"
                                                                            name="province">
                                                                            <option value="" disabled selected>Selecionar província</option>
                                                                            @foreach ($provinces as $province )
                                                                                <option value="{{  $province->id }}">{{ $province->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                        
                                                                    <div class="col-sm-6">
                                                                        <label for="municipe" class="col-form-label">
                                                                            Município <span class="required">*</span></label>
                                                                        <select class="select2_single form-control wizard-required" tabindex="-1" id="municipe"
                                                                            name="municipe">
                                                                            <option value="" disabled selected required="required">Aguardando o campo província...</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group clearfix">
                                                                    <a href="javascript:;"
                                                                    class="form-wizard-previous-btn float-left">Anterior</a>
                                                                    <a href="javascript:;"
                                                                        class="form-wizard-next-btn float-right">Próximo</a>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset class="wizard-fieldset">
                                                                <h5>Breve descrição & Foto</h5>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label for="description" class="col-form-label">
                                                                            Descrição <span class="required">*</span></label>
                                                                        <textarea class="form-control"
                                                                            name="description" id="description">{{ $collaborator->description }}</textarea>
                                                                                                                                            
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label for="photo" class="col-form-label">
                                                                            Foto <span class="required"></span></label>
                                                                        <input class="form-control" type="file" 
                                                                            name="photo" id="photo">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group clearfix">
                                                                    <a href="javascript:;"
                                                                    class="form-wizard-previous-btn float-left">Anterior</a>
                                                                    <button type="submit"
                                                                        class="form-wizard-submit float-right">Enviar</button>
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