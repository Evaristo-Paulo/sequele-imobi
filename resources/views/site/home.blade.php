@extends('site.template')


@section('banner')
<div class="banner">
    <div class="intro">
        <h1>Seu novo lar, a espera de si</h1>
        <p>Descubra as mais variadas casas anunciadas aqui, pelos moradores da centralidade de cacuaco - sequele. Não
            perca a oportunidade de fazer parte da família sequelense</p>
        <a href="{{ route('site.catalog') }}" class="request-invite">Apartamentos</a>
    </div>
    <div class="intro-img">
        <div class="svg-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1271"
                height="1034">
                <defs>
                    <linearGradient id="c" x1="0%" x2="99.58%" y1="36.147%" y2="63.736%">
                        <stop offset="0%" stop-color="#243E1F" />
                        <stop offset="100%" stop-color="#DDB33B" />
                    </linearGradient>
                    <filter id="a" width="104.9%" height="135.9%" x="-4.8%" y="-17.6%" filterUnits="objectBoundingBox">
                        <feOffset dy="2" in="SourceAlpha" result="shadowOffsetOuter1" />
                        <feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="38.5" />
                        <feColorMatrix in="shadowBlurOuter1"
                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.0240111451 0" />
                    </filter>
                    <path id="b"
                        d="M69.445 572.84L203.73 707.112a100 100 0 0070.708 29.286h70.693a100 100 0 0170.708 29.287l161.04 161.027A100 100 0 00647.584 956h388.853c44.964 0 81.415-36.45 81.415-81.414a81.414 81.414 0 00-23.848-57.57l-86.392-86.386c-12.033-12.032-12.034-31.54-.002-43.574a30.812 30.812 0 0121.788-9.025c17.017 0 30.812-13.795 30.812-30.812 0-8.172-3.246-16.01-9.025-21.788L855.85 430.11a100 100 0 00-70.708-29.287H550.7a100 100 0 01-70.708-29.287l-35.253-35.25A100 100 0 00374.032 307H138.88c-31.769 0-57.523 25.754-57.523 57.523a57.523 57.523 0 0016.85 40.676l28.761 28.76c15.886 15.884 15.887 41.64.003 57.525a40.676 40.676 0 01-28.764 11.915c-22.465 0-40.677 18.211-40.677 40.676a40.676 40.676 0 0011.915 28.764z" />
                </defs>
                <g fill="none" fill-rule="evenodd" transform="translate(15)">
                    <use fill="#000" filter="url(#a)" xlink:href="#b" />
                    <use fill="#DDB33B" xlink:href="#b" />
                    <path fill="url(#c)"
                        d="M207.445 265.84L341.73 400.112a100 100 0 0070.708 29.286h70.693a100 100 0 0170.708 29.287l161.04 161.027A100 100 0 00785.584 649h388.853c44.964 0 81.415-36.45 81.415-81.414a81.414 81.414 0 00-23.848-57.57l-86.392-86.386c-12.033-12.032-12.034-31.54-.002-43.574a30.812 30.812 0 0121.788-9.025c17.017 0 30.812-13.795 30.812-30.812 0-8.172-3.246-16.01-9.025-21.788L993.85 123.11a100 100 0 00-70.708-29.287H688.7a100 100 0 01-70.708-29.287l-35.253-35.25A100 100 0 00512.032 0H276.88c-31.769 0-57.523 25.754-57.523 57.523a57.523 57.523 0 0016.85 40.676l28.761 28.76c15.886 15.884 15.887 41.64.003 57.525a40.676 40.676 0 01-28.764 11.915c-22.465 0-40.677 18.211-40.677 40.676a40.676 40.676 0 0011.915 28.764z" />
                </g>
            </svg>
        </div>
    </div>
</div>
@endsection
@section('container')
<div class="container">
    @include('site.partials.navegation')
    @yield('banner')
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
    <div class="why-choose" id="differ">
        <div class="intro">
            <h2>Porque escolher o Sequele iMobi?</h2>
            <p>Somos a melhor e a única a trazer a solução dos problemas imobiliarios na centralidade do sequele.</p>
        </div>
        <ul class="group">
            <li class="group-item">
                <div class="svg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                        <defs>
                            <linearGradient id="a" x1="0%" x2="99.58%" y1="0%" y2="99.58%">
                                <stop offset="0%" stop-color="#243E1F" />
                                <stop offset="100%" stop-color="#243E1F" />
                            </linearGradient>
                        </defs>
                        <g fill="none" fill-rule="evenodd">
                            <circle cx="36" cy="36" r="36" fill="url(#a)" />
                            <path fill="#FFF" fill-rule="nonzero"
                                d="M36 16a4.522 4.522 0 014.516 4.516 4.514 4.514 0 01-1.951 3.713c2.647 1.031 4.532 3.601 4.532 6.61v3.226h-6.452v.645c0 .356.29.645.645.645h1.29c1.068 0 1.936.868 1.936 1.935v1.29a1.938 1.938 0 01-1.935 1.936h-1.153l.69.69-.964 1.59c.047.1.081.2.124.3h6.287a5.146 5.146 0 01-1.759-3.87 5.167 5.167 0 015.162-5.161 5.167 5.167 0 015.161 5.16 5.154 5.154 0 01-1.904 4c3.283.621 5.775 3.507 5.775 6.969V56H41.161v-7.42a.969.969 0 00-.967-.967h-.968v1.15l-1.802.443c-.08.215-.17.43-.269.642l.963 1.59-3.453 3.454-1.59-.963c-.214.1-.428.19-.642.268L31.99 56h-4.883l-.442-1.802a8.519 8.519 0 01-.642-.268l-1.59.962-3.454-3.453.963-1.59a8.632 8.632 0 01-.268-.642l-1.803-.443V43.88l1.803-.443c.079-.214.169-.428.268-.642l-.963-1.59.69-.69h-1.153a1.938 1.938 0 01-1.935-1.935v-1.29c0-1.068.868-1.936 1.935-1.936h1.29a.645.645 0 00.646-.645v-.645H16v-3.226c0-3.009 1.885-5.579 4.532-6.61a4.514 4.514 0 01-1.951-3.713A4.522 4.522 0 0123.097 16a4.522 4.522 0 014.516 4.516 4.514 4.514 0 01-1.952 3.713 7.126 7.126 0 013.887 3.67 7.128 7.128 0 013.887-3.67 4.514 4.514 0 01-1.951-3.713A4.522 4.522 0 0136 16zm12.903 28.387H31.806a.969.969 0 000 1.936h8.388a2.26 2.26 0 012.258 2.258v6.129h9.032v-7.097h1.29v7.097h1.936v-4.516a5.813 5.813 0 00-5.807-5.807zm-17.925-6.452h-2.86l-.37 1.514-.347.11a7.029 7.029 0 00-1.113.465l-.32.167-1.339-.81-2.021 2.022.81 1.338-.168.32a7.08 7.08 0 00-.465 1.114l-.11.346-1.514.372v2.86l1.514.37.109.347c.117.368.273.743.466 1.113l.167.32-.81 1.339 2.021 2.021 1.338-.81.322.168c.37.192.744.349 1.114.466l.344.11.373 1.513h2.86l.37-1.514.346-.109a7.029 7.029 0 001.113-.466l.322-.167 1.338.81 2.021-2.021-.81-1.338.167-.322c.193-.37.35-.744.467-1.114l.11-.344 1.512-.373v-.14H35.21a5.813 5.813 0 01-5.662 4.517 5.813 5.813 0 01-5.806-5.806 5.813 5.813 0 015.806-5.807c1.936 0 3.74.985 4.813 2.581h1.503l-.017-.034-.167-.322.81-1.338-2.022-2.021-1.338.81-.321-.167a7.08 7.08 0 00-1.113-.466l-.346-.11-.372-1.514zm-1.43 3.871a4.522 4.522 0 00-4.516 4.517 4.522 4.522 0 004.516 4.516 4.521 4.521 0 004.327-3.226h-1.371a3.225 3.225 0 11-1.71-4.265 2.234 2.234 0 011.012-.251h.898a4.533 4.533 0 00-3.156-1.29zm0 2.581a1.938 1.938 0 00-1.935 1.936c0 1.067.868 1.935 1.935 1.935.623 0 1.184-.3 1.542-.773a2.253 2.253 0 01-1.542-2.13c0-.337.08-.653.212-.94-.071-.009-.14-.028-.212-.028zm17.42-9.032a3.875 3.875 0 00-3.871 3.87 3.875 3.875 0 003.87 3.872 3.875 3.875 0 003.872-3.871 3.875 3.875 0 00-3.871-3.871zm-11.613-1.29H23.742v.645a1.938 1.938 0 01-1.936 1.935h-1.29a.645.645 0 00-.645.645v1.29c0 .357.289.646.645.646h2.443l1.473-1.472 1.59.962c.213-.1.428-.189.642-.268l.443-1.803h4.883l.443 1.803c.214.08.428.169.642.268l1.59-.962 1.472 1.472h2.444a.645.645 0 00.645-.645v-1.29a.645.645 0 00-.645-.646h-1.29a1.938 1.938 0 01-1.936-1.935v-.645zm-12.258-9.033a5.813 5.813 0 00-5.807 5.807v1.935h1.936v-5.161h1.29v5.161h5.161v-5.161h1.29v5.161h1.936V30.84a5.813 5.813 0 00-5.806-5.807zm12.903 0a5.813 5.813 0 00-5.806 5.807v1.935h1.935v-5.161h1.29v5.161h5.162v-5.161h1.29v5.161h1.935V30.84A5.813 5.813 0 0036 25.032zm15.484-1.29A4.522 4.522 0 0156 28.258a4.522 4.522 0 01-4.516 4.516h-7.097v-4.516a4.522 4.522 0 014.516-4.516zm0 1.29h-2.58a3.23 3.23 0 00-3.227 3.226v3.226h5.807a3.23 3.23 0 003.226-3.226 3.23 3.23 0 00-3.226-3.226zm-3.226 3.871v1.29h-1.29v-1.29h1.29zm2.58 0v1.29h-1.29v-1.29h1.29zm2.581 0v1.29h-1.29v-1.29h1.29zm0-2.58v1.29h-6.451v-1.29h6.451zM23.097 17.29a3.23 3.23 0 00-3.226 3.226 3.23 3.23 0 003.226 3.226 3.23 3.23 0 003.226-3.226 3.23 3.23 0 00-3.226-3.226zm12.903 0a3.23 3.23 0 00-3.226 3.226A3.23 3.23 0 0036 23.742a3.23 3.23 0 003.226-3.226A3.23 3.23 0 0036 17.29z" />
                        </g>
                    </svg>
                </div>
                <div class="info">
                    <h2>Conexão vendedor - cliente</h2>
                    <p>É da nossa inteira responsabilidade proporcionar o encontro formal entre o vendedor do imovél e o cliente.</p>
                </div>
            </li>
            <li class="group-item">
                <div class="svg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                        <defs>
                            <linearGradient id="a" x1="0%" x2="99.58%" y1="0%" y2="99.58%">
                                <stop offset="0%" stop-color="#243E1F" />
                                <stop offset="100%" stop-color="#243E1F" />
                            </linearGradient>
                        </defs>
                        <g fill="none" fill-rule="evenodd">
                            <circle cx="36" cy="36" r="36" fill="url(#a)" />
                            <path fill="#FFF" fill-rule="nonzero"
                                d="M44.633 16a3.096 3.096 0 013.092 3.092v7.57c5.23.286 9.393 4.365 9.393 9.338 0 4.973-4.162 9.052-9.393 9.338v7.57A3.095 3.095 0 0144.633 56H27.099a3.095 3.095 0 01-3.092-3.092v-7.24a.587.587 0 111.174 0v3.522h21.37v-3.852a10.479 10.479 0 01-2.89-.568l-4.383 2.391c-.466.254-1.013-.22-.833-.716l1.308-3.596h-6.705a.592.592 0 01-.415-.172l-4.697-4.696a.593.593 0 01-.172-.415V24.728c0-.324.263-.587.587-.587h15.03c.324 0 .587.263.587.587v2.402c.819-.258 1.685-.419 2.583-.468v-4.478H25.18v20.704a.587.587 0 11-1.174 0V19.092A3.096 3.096 0 0127.099 16zm1.918 34.364H25.18v2.544a1.92 1.92 0 001.918 1.918h17.534a1.92 1.92 0 001.918-1.918v-2.544zm-9.433.705c.325 0 .587.262.587.587v1.878a.587.587 0 01-.587.587h-2.505a.587.587 0 01-.587-.587v-1.878c0-.325.263-.587.587-.587zm-.587 1.174h-1.33v.704h1.33v-.704zM47.138 27.82c-4.856 0-8.806 3.67-8.806 8.18 0 2.217.94 4.293 2.647 5.846.177.16.239.41.157.635l-1.056 2.905 3.251-1.773a.587.587 0 01.49-.034 9.343 9.343 0 003.317.601c4.856 0 8.806-3.67 8.806-8.18s-3.95-8.18-8.806-8.18zm0 1.33c.324 0 .587.264.587.588v1.291h.04a2.469 2.469 0 012.465 2.466v.626a.587.587 0 11-1.174 0v-.626c0-.712-.58-1.291-1.292-1.291h-.94c-.884 0-1.604.72-1.604 1.604 0 .885.72 1.605 1.605 1.605h.626a2.782 2.782 0 012.779 2.779c0 1.44-1.1 2.627-2.505 2.765v1.305a.587.587 0 11-1.174 0v-1.291h-.04a2.469 2.469 0 01-2.465-2.466.587.587 0 111.174 0c0 .712.58 1.291 1.292 1.291h.939c.885 0 1.605-.72 1.605-1.604 0-.885-.72-1.605-1.605-1.605h-.626a2.782 2.782 0 01-2.78-2.779c0-1.44 1.102-2.627 2.506-2.765v-1.305c0-.324.263-.587.587-.587zm-4.345-3.835H28.938v11.663h4.11c.324 0 .587.263.587.588v4.11h5.567c-1.327-1.622-2.044-3.593-2.044-5.676 0-1.112.208-2.18.59-3.17h-6.266a.587.587 0 110-1.174h6.82c.399-.711.893-1.369 1.466-1.957h-2.023a.587.587 0 110-1.174h3.13c.076 0 .148.014.214.04.53-.38 1.1-.71 1.704-.985v-2.265zM32.461 38.153h-2.692l2.692 2.692v-2.692zm3.405-3.366a.587.587 0 110 1.174h-4.384a.587.587 0 110-1.174zm-.626-6.263a.587.587 0 110 1.175h-3.758a.587.587 0 110-1.175zm9.393-11.35H27.099a1.92 1.92 0 00-1.918 1.918v1.918h21.37v-1.918a1.92 1.92 0 00-1.918-1.918zm-7.515 1.33a.587.587 0 110 1.175h-2.505a.587.587 0 110-1.174z" />
                        </g>
                    </svg>
                </div>
                <div class="info">
                    <h2>Prático & simples</h2>
                    <p>Podes acessar a plataforma em qualquer dispositivo e qualquer hora.</p>
                </div>
            </li>
            <li class="group-item">
                <div class="svg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                        <defs>
                            <linearGradient id="a" x1="0%" x2="99.58%" y1="0%" y2="99.58%">
                                <stop offset="0%" stop-color="#243E1F" />
                                <stop offset="100%" stop-color="#243E1F" />
                            </linearGradient>
                        </defs>
                        <g fill="none" fill-rule="evenodd">
                            <circle cx="36" cy="36" r="36" fill="url(#a)" />
                            <path fill="#FFF" fill-rule="nonzero"
                                d="M45.984 16a3.336 3.336 0 013.332 3.332v3.727l4.11 4.118a8.72 8.72 0 012.553 6.141v21.994a.666.666 0 01-.667.667H43.32a.666.666 0 01-.667-.667V48.84l-.382-.612a9.632 9.632 0 01-.83-8.553L25.799 45.7a3.332 3.332 0 01-4.307-1.91l-2.504-6.502A3.325 3.325 0 0116 33.99V19.332A3.336 3.336 0 0119.332 16zm8.662 33.316h-10.66v5.33h10.66v-5.33zm-7.996 1.332v1.333h-1.332v-1.333h1.332zm3.675-24.69l2.255 5.855a3.332 3.332 0 01-1.91 4.305l-.683.266 2.465 2.466-.942.942-10.618-10.615a2.222 2.222 0 00-3.209 3.073l5.46 5.957c.196.213.232.53.088.78a8.309 8.309 0 00.169 8.534l.289.462h10.957V33.318a7.379 7.379 0 00-2.162-5.198l-2.159-2.163zm-9.798 11.36H29.565v.004l-7.953 3.065 1.124 2.923a1.999 1.999 0 002.584 1.147l16.073-6.195-.866-.944zm-14.658.004h-5.44l.702 1.824 4.738-1.824zm20.115-19.99H19.332a2 2 0 00-2 2V33.99a2 2 0 002 2h19.974l-2.602-2.843a3.555 3.555 0 015.13-4.916l6.104 6.105c.025-.114.04-.23.045-.346V23.582l-.006-.015h.006v-4.235a2 2 0 00-1.999-2zm3.332 9.712v6.946a3.332 3.332 0 01-.282 1.333l1.156-.446a1.999 1.999 0 001.148-2.584l-2.022-5.25zm-27.32 4.281v1.333h-2.664v-1.333h2.665zm11.994 0v1.333h-2.665v-1.333h2.665zm-11.993-3.998v1.333h-2.665v-1.333h2.665zm3.998 0v1.333h-2.666v-1.333h2.666zm3.998 0v1.333h-2.666v-1.333h2.666zm3.997 0v1.333h-2.665v-1.333h2.665zm-10.394-8.662c.957 0 1.732.776 1.732 1.733v3.198c0 .957-.775 1.732-1.732 1.732h-3.198a1.732 1.732 0 01-1.733-1.732v-3.198c0-.957.776-1.733 1.733-1.733zm0 1.333h-3.198a.4.4 0 00-.4.4v.932h1.332v1.333h-1.332v.933c0 .22.179.4.4.4h3.198a.4.4 0 00.4-.4v-.933h-1.333V21.33h1.333v-.932a.4.4 0 00-.4-.4zm21.722-.666v1.998h-1.333v-1.998h1.333zm-2.666 0v1.998H41.32v-1.998h1.332zm-2.665 0v1.998h-1.332v-1.998h1.332zm-2.665 0v1.998h-1.333v-1.998h1.333z" />
                        </g>
                    </svg>
                </div>
                <div class="info">
                    <h2>Pagamento seguro</h2>
                    <p>O pagamento do imóvel é feito apenas a quando da celebração do contrato.</p>
                </div>
            </li>
            
            
        </ul>
    </div>

    <div class="latest">
        <div class="intro">
            <h2>Nossa Equipa</h2>
        </div>
        <div class="group">
            <div class="group-item">
                <div class="cover"><img src="https://images.unsplash.com/photo-1584048198927-360884379d54?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTl8fGNlbyUyMHBob3RvfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                </div>
                <div class="detail">
                    <p class="by">CEO</p>
                    <p class="main">Evaristo Paulo</p>
                </div>
            </div>
            <div class="group-item">
                <div class="cover"><img src="https://images.unsplash.com/photo-1616179054043-7570cd0d47d6?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mzd8fGNlbyUyMHBob3RvfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                        alt=""></div>
                <div class="detail">
                    <p class="by">Marketing & Área Comercial</p>
                    <p class="main">Joaquim fernandes</p>
                </div>
            </div>
            <div class="group-item">
                <div class="cover"><img src="https://images.unsplash.com/photo-1551836022-deb4988cc6c0?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzV8fGNlbyUyMHBob3RvfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                </div>
                <div class="detail">
                    <p class="by">Porta Voz</p>
                    <p class="main">Domingas Cândido</p>
                </div>
            </div>
            <div class="group-item">
                <div class="cover"><img src="https://images.unsplash.com/photo-1558222218-b7b54eede3f3?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8Y2VvJTIwcGhvdG98ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                </div>
                <div class="detail">
                    <p class="by">Área omercial</p>
                    <p class="main">Mesutério Guilherme</p>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    @include('site.partials.footer')
    <!-- END FOOTER -->
</div>
@endsection
@push('css')
    <style>
        .why-choose {
            background-color: #fff;
            color: rgba(0, 0, 0, 0.795)
        }
        .modal-collaborator-body{
            align-items: flex-start;
        }

        .why-choose .intro h2 {
            margin-bottom: 10px;
            font-size: 20px;
            color: rgba(0, 0, 0, 0.795)
        }

        .why-choose .group .info h2 {
            font-size: 20px;
            margin: 0px;
            margin-bottom: 20px;
        }

        .why-choose p {
            color: #000
        }

        @media screen and (min-width: 1024px){
            .why-choose{
                padding: 0 auto;
                background: rgba(0, 0, 0, 0.014)
            }
            .why-choose .group{
                margin-bottom: 0;
            }
        }

    </style>

    
@endpush
