@extends('layouts.app')
@section('title', 'Editar Endereço')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-2">
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}" class="text-muted">
                            <span class="svg-icon svg-icon-primary svg-icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                        </a>
                    </li>
                     <li class="breadcrumb-item">
                        <a href="{{ route('users') }}" class="text-muted">Usuários</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="text-muted">Nome usuário</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('enderecos', $user_id ?? '') }}" class="text-muted">Endereços</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="text-muted">Editar</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">Editar Endereço</h3>
                    <div class="card-toolbar">
                        <a href="{{ route('enderecos', $user_id ?? '') }}" class="btn btn-primary font-weight-bolder">
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
                <form action="{{(route('adress.update', $endereco->id)) }}"
                    class="form" id="edit_adress" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label for="logradouro">Logradouro:</label>
                                <input type="text" id="logradouro" name="logradouro" value="{{ $endereco->logradouro ?? null }}" class="form-control {{ $errors->has('logradouro') ? 'is-invalid' : ''}}">
                                @if($errors->has('logradouro'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('logradouro')}}
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="numero">Nº:</label>
                                <input type="number" id="numero" name="numero" value="{{ $endereco->numero ?? null }}" class="form-control {{ $errors->has('numero') ? 'is-invalid' : ''}}">
                                @if($errors->has('numero'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('numero')}}
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="bairro">Bairro:</label>
                                <div class="input-group">
                                    <input type="text" id="bairro" name="bairro" value="{{ $endereco->bairro ?? null }}" class="form-control {{ $errors->has('bairro') ? 'is-invalid' : ''}}">
                                    @if($errors->has('bairro'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('bairro')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label for="cidade">Cidade:</label>
                                <input type="text" id="cidade" name="cidade"  value="{{ $endereco->cidade ?? null }}"class="form-control {{ $errors->has('cidade') ? 'is-invalid' : ''}}">
                                @if($errors->has('cidade'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('cidade')}}
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="estado">Estado:</label>
                                <div class="input-group">
                                    <input type="text" id="estado" name="estado" value="{{ $endereco->estado ?? null }}"class="form-control  {{ $errors->has('estado') ? 'is-invalid' : ''}}">
                                    @if($errors->has('estado'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('estado')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <button type="submit" id="btnn_submit" class="btn btn-primary mr-0">Editar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection