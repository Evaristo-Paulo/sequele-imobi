@extends('painel.template')
@section('title-page')
Registo de Apartamentos
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
                                                        <form role="form" method="POST" action="{{ route('apartments.register.send') }}" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
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
                                                                <h5>Localização & Topologia</h5>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label for="block" class="col-form-label">
                                                                            Bloco <span class="required">*</span></label>
                                                                        <select required class="select2_single form-control wizard-required" tabindex="-1" required="required" id="block"
                                                                            name="block">
                                                                            <option value="" disabled  >Selecionar bloco</option>
                                                                            @foreach ($blocks as $block )
                                                                                <option value="{{  $block->id }}">{{ $block->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <div class="wizard-form-error"></div>
                                                                    </div>
                                        
                                                                    <div class="col-sm-6">
                                                                        <label for="build" class="col-form-label">
                                                                            Prédio <span class="required">*</span></label>
                                                                        <input required value="{{  old('build') }}" class="form-control wizard-required" required type="number" value=""
                                                                            name="build" id="build">
                                                                            <div class="wizard-form-error"></div>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label class="col-form-label d-block">Entrada <span class="required">*</span></label>
                                                                        <select required class="select2_single form-control wizard-required" tabindex="-1" required="required" id="entrance"
                                                                            name="entrance">
                                                                            <option value="" disabled  >Selecionar entrada</option>
                                                                            @foreach ($entrances as $entrance )
                                                                                <option value="{{  $entrance->id }}">{{ $entrance->type }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <div class="wizard-form-error"></div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="col-form-label d-block">Andar <span class="required">*</span></label>
                                                                        <select required class="select2_single form-control wizard-required" tabindex="-1" required="required" id="flat"
                                                                            name="flat">
                                                                            <option value="" disabled  >Selecionar andar</option>
                                                                            @foreach ($flats as $flat )
                                                                                <option value="{{  $flat->id }}">{{ $flat->type }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <div class="wizard-form-error"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label class="col-form-label d-block">Topologia <span class="required">*</span></label>
                                                                        <select required class="select2_single form-control wizard-required" tabindex="-1" required="required" id="topology"
                                                                            name="topology">
                                                                            <option value="" disabled  >Selecionar topologia</option>
                                                                            @foreach ($topologies as $topology )
                                                                                <option value="{{  $topology->id }}">{{ $topology->type }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <div class="wizard-form-error"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group clearfix">
                                                                    <a href="javascript:;"
                                                                        class="form-wizard-next-btn float-right">Próximo</a>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset class="wizard-fieldset">
                                                                <h5>Condição & Pagamento</h5>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label for="phone" class="col-form-label">
                                                                            Tipo de Negócio <span class="required">*</span></label>
                                                                            <select required class="select2_single form-control wizard-required" tabindex="-1" required="required" id="business"
                                                                            name="business">
                                                                            <option value="" disabled  >Selecionar tipo de negócio</option>
                                                                            @foreach ($businesses as $business )
                                                                                <option value="{{  $business->id }}">{{ $business->type }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <div class="wizard-form-error"></div>
                                                                    </div>
                                        
                                                                    <div class="col-sm-6">
                                                                        <label for="email" class="col-form-label">
                                                                            Condição <span class="required">*</span></label>
                                                                            <select required class="select2_single form-control wizard-required" tabindex="-1" required="required" id="condiction"
                                                                            name="condiction">
                                                                            <option value="" disabled  >Selecionar condição</option>
                                                                            @foreach ($condictions as $condiction )
                                                                                <option value="{{  $condiction->id }}">{{ $condiction->type }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                            <div class="wizard-form-error"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label for="price" class="col-form-label">
                                                                            Preço (kz) <span class="required">*</span></label>
                                                                        <input class="form-control wizard-required" value="{{ old('price') }}" required type="number" value=""
                                                                            name="price" id="price">
                                                                            <div class="wizard-form-error"></div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label for="street" class="col-form-label">
                                                                            Condição do preço <span class="required">*</span></label>
                                                                            <select class="select2_single form-control wizard-required" tabindex="-1" required="required" id="negociable"
                                                                            name="negociable">
                                                                            <option value="" disabled  >Selecionar condicão do preço</option>
                                                                            @foreach ($negociables as $negociable )
                                                                                <option value="{{  $negociable->id }}">{{ $negociable->type }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <div class="wizard-form-error"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label for="available" class="col-form-label">
                                                                            Disponibilidade de mudança <span class="required">*</span></label>
                                                                            <select required class="select2_single form-control wizard-required" tabindex="-1" required="required" id="available"
                                                                            name="available">
                                                                            <option value="" disabled  >Selecionar disponibilidade de mudança</option>
                                                                            @foreach ($availables as $available )
                                                                                <option value="{{  $available->id }}">{{ $available->type }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <div class="wizard-form-error"></div>
                                                                    </div>
                                        
                                                                    <div class="col-sm-6">
                                                                        <label for="description" class="col-form-label">
                                                                            Informação adicional <span class="required">*</span></label>
                                                                            <textarea class="form-control"
                                                                            name="description" id="description">{{ old('description') }}</textarea>
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
                                                                <h5>Foto (deve preencher no mínimo 2 fotos)</h5>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label for="photo1" class="col-form-label">
                                                                            Foto 1 <span class="required">*</span></label>
                                                                        <input class="form-control wizard-required" required type="file" 
                                                                            name="photo[]" id="photo1">
                                                                            <div class="wizard-form-error"></div>

                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label for="photo2" class="col-form-label">
                                                                            Foto 2 <span class="required">*</span></label>
                                                                        <input class="form-control wizard-required" required type="file" 
                                                                            name="photo[]" id="photo2">
                                                                            <div class="wizard-form-error"></div>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    
                                                                    <div class="col-sm-6">
                                                                        <label for="photo3" class="col-form-label">
                                                                            Foto 3 <span class="required"></span></label>
                                                                        <input class="form-control" type="file" 
                                                                            name="photo[]" id="photo3">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label for="photo4" class="col-form-label">
                                                                            Foto 4<span class="required"></span></label>
                                                                        <input class="form-control" type="file" 
                                                                            name="photo[]" id="photo4">
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