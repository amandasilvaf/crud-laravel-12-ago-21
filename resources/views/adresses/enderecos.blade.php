@extends('layouts.app')
@section('title', 'Endereços')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-2">
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="text-muted">
                            <span class="svg-icon svg-icon-primary svg-icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" fill="#000000"/>
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('users') }}" class="text-muted">Usuários</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="text-muted">Nome Usuário</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="text-muted">Editar</a>
                    </li>
                    
                    <li class="breadcrumb-item">
                        <a class="text-muted">Endereços</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Endereços</h3>
                    </div>
                    <div class="card-toolbar">
                            <a href="{{ route('adress.new', $user_id) }}" class="btn btn-primary font-weight-bolder">
                                <span class="svg-icon svg-icon-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <circle fill="#000000" cx="9" cy="15" r="6" />
                                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                </span>Novo Endereço</a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- {{ dd($user_id)}} --}}
                    @if ($enderecos)
                        <table class="table table-ordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Logradouro</th>
                                    <th>Nº</th>
                                    <th>Bairro</th>
                                    <th>Cidade</th>
                                    <th>Estado</th>
                                    <th>user_id</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{$user_id}} 
                                @foreach ($enderecos as $e)
                                <tr>
                                    @if($user_id == $e->user_id)
                                        <td>{{$e->id}}</td>
                                        <td>{{$e->logradouro}}</td>
                                        <td>{{$e->numero}}</td>
                                        <td>{{$e->bairro}}</td>
                                        <td>{{$e->cidade}}</td>
                                        <td>{{$e->estado}}</td>
                                        <td>{{$e->user_id}}</td>
                                        <td>
                                            <a href="{{ route('adress.edit', $e->id)}}" class="btn btn-warning btn-sm">Editar</a>
                                            <a href="{{ route('adress.delete', $e->id)}}" class="btn btn-danger btn-sm">Excluir</a>
                                        </td>
                                    @endif
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    @else
                        <h2>Não há endereços cadastradas para serem listadas.</h2>
                    @endif

                </div>
                <div class="card-footer">
                    <div class="card-toolbar">
                        <a href="{{ route('users') }}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path
                                            d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(12.000003, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-12.000003, -11.999999) " />
                                    </g>
                                </svg>
                            </span>Voltar</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

@stop
