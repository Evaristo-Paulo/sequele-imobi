<div class="menu-humburger-modal">
    <ul class="menu-humburger-modal-body">
        <li class="menu-humburger-item"><a href="{{ route('site.home') }}">Home</a></li>
        <li class="menu-humburger-item"><a href="#">Sobre</a></li>
        <li class="menu-humburger-item"><a href="#differ">Diferencial</a></li>
        <li class="menu-humburger-item"><a href="{{ route('site.catalog') }}">Apartamento</a></li>
        <li class="menu-humburger-item"><a href="#" id="collaborator-register-mobile">Quero Divulgar</a></li>
        @if(Auth::check())
            <li class="menu-humburger-item"><a href="{{ route('home') }}" style="color: #fff"
                    class="request-invite">Painel</a></li>
        @else
            <li class="menu-humburger-item"><a href="{{ route('login') }}" style="color: #fff"
                    class="request-invite">Login</a></li>
        @endif
    </ul>
</div>



<div class="modal-collaborator register-colab">
    <div class="modal-collaborator-body">
        <form action="{{ route('collaborators.register.send') }}" method="POST">
            {{ csrf_field() }}

            <h2 class="form-colab">Sequele iMobi | Registo de Colaborador</h2>
            <div class="form-group">
                <input type="text" placeholder="Nome Completo" value="{{ old('name') }}" required
                    name="name" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="bi" required placeholder="Nº BI" value="{{ old('bi') }}"
                    class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="phone" required placeholder="Nº Telefone"
                    value="{{ old('phone') }}" class="form-control">
            </div>
            <div class="form-group">
                <input type="email" name="email" required placeholder="Email"
                    value="{{ old('email') }}" class="form-control">
            </div>
            <div class="form-group">
                @foreach( $genders as $value )
                    @if($value->type == 'Masculino')
                        <div class="gender">
                            <input type="radio" checked value="{{ $value->id }}" name="gender"
                                id="{{ $value->type }}"><label for="{{ $value->type }}">{{ $value->type }}</label>
                        </div>
                    @else
                        <div class="gender">
                            <input type="radio" value="{{ $value->id }}" name="gender"
                                id="{{ $value->type }}"><label for="{{ $value->type }}">{{ $value->type }}</label>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="form-group">
                <input type="password" name="password" value="{{ old('password') }}" required
                    placeholder="Senha" class="form-control">
            </div>

            <div class="btn-group">
                <button>Enviar</button>
            </div>
            <div class="close-colab">x</div>
        </form>
    </div>
</div>


<div class="modal-collaborator filter-modal">
    <div class="modal-collaborator-body">
        <form action="{{ route('site.catalog.filter') }}" method="POST">
            {{ csrf_field() }}
            <h2 class="form-colab">Sequele iMobi | Filtro</h2>
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
            <div class="btn-group">
                <button type="submit"><i class="fa fa-filter" aria-hidden="true"></i> Filtro</button>
            </div>
            <div class="close-filter">x</div>
        </form>

    </div>
</div>
