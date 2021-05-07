<div class="sidebar-menu">
    <div class="sidebar-header">
        <a href="{{ route('home') }}">
            <h2 class="logo-title">Painel de Controle</h2>
        </a>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li><a href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i>
                            <span>Home</span></a></li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-users" aria-hidden="true"></i>
                            <span>Colaborador</span></a>
                        <ul class="collapse">
                            @can('only-collaborator')
                            <li><a href="{{  route('collaborators.view', encrypt(Auth::user()->id)) }}">Meu Perfil</a></li>
                            <li><a href="{{  route('collaborators.update.form', encrypt(Auth::user()->id)) }}">Actualização</a></li>
                            @endcan
                            @can('just-admin-and-manager')
                            <li><a href="{{ route('collaborators') }}">Listagem</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-building" aria-hidden="true"></i>
                            <span>Apartamento</span></a>
                        <ul class="collapse">
                            @can('only-collaborator')
                            <li><a href="{{ route('apartments.register.form') }}">Registo</a></li>
                            @endcan
                            <li><a href="{{  route('apartments') }}">Listagem</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-dollar    "></i>
                            <span>Proposta</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('interests') }}">Listagem</a></li>
                        </ul>
                    </li>
                    @can('just-admin-and-manager')
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-cogs" aria-hidden="true"></i>
                            <span>Controle de Acesso</span></a>
                        <ul class="collapse">
                            <li><a href="#" aria-expanded="true">User</a>
                                <ul class="collapse">
                                    <li><a href="{{ route('users.register.form') }}">Registo</a></li>
                                    <li><a href="{{ route('users') }}">Listagem</a></li>
                                    <li data-toggle="modal" data-target="#user-modal-altera-senha"><a href="#">Actualização de
                                            Senha</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    @endcan
                </ul>
                </li>

                </ul>
            </nav>
        </div>
    </div>
</div>
