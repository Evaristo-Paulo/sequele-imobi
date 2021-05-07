@extends('site.template')
@section('container')
<div class="container">
    @include('site.partials.navegation')
    @yield('banner')
    <div class="why-choose">
        <div class="intro">
            <h2>Sobre o apartamento</h2>
            <p>Veja todas as informações disponíveis sobre o imovél, em seguida, contacta o colaborador</p>
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
    <div class="apartment-detail">
        <div class="category">
            <div class="movies">
                @foreach($apartment as $value)
                    <div class="movie">
                        <img src="{{ url("storage/apartamentos/". $value->photo. "") }}"
                            alt="foto-do-apartamento">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="apartment-detail-info">
        <div class="information-apartment">
            <h2 class="information-apartment-businness">{{ $apartment[0]->business }}</h2>
            <p class="information-apartment-businness-highlight">Faz-se
                {{ Str::lower($apartment[0]->business) }} deste apartamento</p>
            <h2 class="information-apartment-price">
                {{ number_format($apartment[0]->price ,0,"",".") }}
                kz <span class="information-apartment-negociable">{{ $apartment[0]->negociable }}</span></h2>
            <p class="information-apartment-adress">Bloco {{ $apartment[0]->block }}, Edifício
                {{ $apartment[0]->build }}, Entrada {{ $apartment[0]->entrance }},
                {{ $apartment[0]->flat }}, {{ $apartment[0]->topology }}</p>
            <p class="information-apartment-available">{{ $apartment[0]->available }}</p>
            <p class="information-apartment-topology">{{ $apartment[0]->condiction }}</p>
            <p class="information-apartment-more-information">{{ $apartment[0]->description }}</p>
        </div>
        <aside class="contact-info">
            <form action="{{ route('interests.register.send') }}" method="POST">
                {{ csrf_field() }}

                <h2>Colaborador</h2>
                <div class="cover">
                    <img src="{{ url("storage/users/". $apartment[0]->photo_colab. "") }}"
                        alt="foto-do-colaborador">
                </div>
                <p class="name-collaborator">{{ $apartment[0]->collaborator }}</p>
                <input type="text" required name="nameInterest" value="{{ old('nameInterest') }}"
                    placeholder="Nome Completo">
                <input type="text" required name="phoneInterest" value="{{ old('phoneInterest') }}"
                    placeholder="Telefone">
                <input type="email" required name="emailInterest" value="{{ old('emailInterest') }}"
                    placeholder="Email">
                <input type="hidden" name="apartament_id" value="{{ $apartment[0]->apt_id }}">

                <div class="textarea">
                    <textarea name="descriptionInterest" id="description" required cols="20" rows="4">Assunto</textarea>
                </div>

                <button class="btn">Contactar</button>

            </form>
        </aside>
    </div>

    <!-- FOOTER -->
    @include('site.partials.footer')
    <!-- END FOOTER -->
</div>
@endsection
