<!-- main content area start -->
<div class="main-content">
    <!-- header area start -->
    <div class="header-area">
        <div class="row align-items-center">
            <!-- nav and search button -->
            <div class="col-md-6 col-sm-8 clearfix">
                <div class="nav-btn pull-left">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <!-- profile info & task notification -->
            <div class="col-md-6 col-sm-4 clearfix">
                <ul class="notification-area pull-right">
                    <li class="dropdown" >
                        <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                            @can('only-collaborator')
                            <span>
                                @if (count($function->qtdOffer(Auth::user()->id)) == 0)
                                    0
                                @else
                                @foreach ( $function->qtdOffer(Auth::user()->id) as $value )
                                    {{ $value->offer }}
                                @endforeach
                                @endif
                            </span>
                            @else
                            <span>{{ count($function->interests()) }}</span>
                            @endcan
                        </i>
                        <div class="dropdown-menu bell-notify-box notify-box" style="height: 170px">
                            <span class="notify-title">Alerta de Proposta</span>
                            <div class="nofity-list">
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb"><i class="fa fa-calendar-times-o bg-danger" aria-hidden="true"></i></div>
                                    <div class="notify-text">
                                        <p>
                                            @can('only-collaborator')
                                                @if(count($function->qtdOffer(Auth::user()->id)) == 0)
                                                    Não existe proposta
                                                @else
                                                    @foreach ( $function->qtdOffer(Auth::user()->id) as $value )
                                                        Existem {{ $value->offer }} proposta(s)
                                                    @endforeach
                                                @endif
                                            @endcan
                                            @can('just-admin-and-manager')
                                                @if(count($function->interests()) == 0)
                                                    Não existe proposta
                                                @else
                                                    Existem {{ count($function->interests()) }} proposta(s)
                                                @endif
                                            @endcan
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
