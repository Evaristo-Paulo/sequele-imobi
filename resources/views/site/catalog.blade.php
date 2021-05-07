@extends('site.template')
@section('container')
<div class="container">
    @include('site.partials.navegation')
    @yield('banner')
    <div class="why-choose">
        <div class="intro">
            <h2>Catálogo de Apartamentos</h2>
            <p>É aqui onde os sequelenses anunciam os seus imóveis. Escolhe o melhor apartamento para si</p>
        </div>
    </div>
    @if( session('success') )
        <ul class="alert " role="alert">
            <li class="alert-success"><i class="fa fa-check"></i> {{ session('success') }}</li>
        </ul>
    @endif
    @if( session('error') )
        <ul class="alert " role="alert">
            <li class="alert-error"><i class="fa fa-warning"></i> {{ session('error') }}</li>
        </ul>
    @endif
    @if( session('warning') )
        <ul class="alert " role="alert">
            <li class="alert-warning"><i class="fa fa-warning"></i> {{ session('warning') }}</li>
        </ul>
    @endif
    @if($errors->any())
        <div class="validation">
            <ul style="list-style: circle">
                @foreach($errors->all() as $error)
                    <li style="list-style: circle">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="catalog">
        <aside class="filter">
            <div class="intro">
                <h2>Filtro</h2>
            </div>
            <div class="filter-group">
                <form action="{{ route('site.catalog.filter') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="business">Tipo de Negócio</label>
                        <select id="business" class="form-control" name="business">
                            <option disabled>Selecionar tipo de negócio</option>
                            @foreach( $businesses as $business )
                                @if($business->id == 1)
                                    <option value="{{ $business->id }}" selected>{{ $business->type }}</option>
                                @else
                                    <option value="{{ $business->id }}">{{ $business->type }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="topology">Topologia</label>
                        <select id="topology" class="form-control" name="topology">
                            <option disabled>Selecionar topologia</option>
                            @foreach( $topologies as $topology )
                                @if($topology->id == 2)
                                    <option value="{{ $topology->id }}" selected>{{ $topology->type }}</option>
                                @else
                                    <option value="{{ $topology->id }}">{{ $topology->type }}</option>
                                @endif
                            @endforeach
                            <option value="todos">Todos</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Preço</label>
                        <select id="price" class="form-control" name="price">
                            <option disabled>Selecionar preço</option>
                            <option value="75000" selected>Abaixo de 75 mil</option>
                            <option value="150000">Abaixo de 150 mil</option>
                            <option value="500000">Abaixo de 500 mil</option>
                            <option value="1000000">Abaixo de 1 milhão</option>
                        </select>
                    </div>
                    <button class="btn-filter" type="submit"><i class="fa fa-filter" aria-hidden="true"></i>
                        Filtro</button>
                </form>
            </div>
        </aside>
        <div class="apartments">
            <div class="intro">
                <h2>Apartamentos</h2>
                <button class="filter-mobile btn-filter">Filtro</button>
            </div>
            <div class="apartment-group">
                @forelse( $catalogs as $catalog )
                    <div class="apartment-item">
                        <div class="cover"><img
                                src="{{ url("storage/apartamentos/". $catalog->photo. "") }}"
                                alt="foto-do-apartamento">
                            <div class="cover-info">
                                <a href="{{ route('site.apartament.detail', encrypt($catalog->apt_id)) }}"
                                    class="business">{{ $catalog->business }}</a>
                                <button class="btn send-message">Contactar</button>
                            </div>
                            <a href="{{ route('site.apartament.detail', encrypt($catalog->apt_id)) }}"
                                class="see-more"></a>
                        </div>
                        <div class="apartment-item-info">
                            <div class="first-line">
                                <a href="#"
                                    class="price">{{ number_format($catalog->price ,0,"",".") }}
                                    kz</a>
                                <p class="negociable">{{ $catalog->negociable }}</p>
                                <p class="topology">{{ $catalog->topology }}</p>
                                <p class="adress">Bloco {{ $catalog->block }}, Prédio {{ $catalog->build }}, Entrada
                                    {{ $catalog->entrance }}</p>
                            </div>
                            <div class="second-line">
                                <p class="status">{{ $catalog->condiction }}</p>
                                <div class="second-line-cover">
                                    <img src="{{ url("storage/users/". $catalog->photo_colab. "") }}"
                                        alt="foto-do-colaborador">
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p style="text-align: center">Sem apartamento disponível</p>
                @endforelse

            </div>
        </div>
    </div>
    <!-- FOOTER -->
    @include('site.partials.footer')
    <!-- END FOOTER -->
</div>
@endsection
