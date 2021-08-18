
<div class="card border">
    <div class="card-header">
        <button class="btn btn-primary" role="button" onClick()="novoEndereco()" >Novo Endereço</button>
    </div>
    <div class="card-body"> 
         <div class="container" id="cards-enderecos">

        </div>
    </div> {{--card-body--}}
</div>{{--card--}}

<div class="modal" tabindex="-1" role="dialog" id="modalEnderecos">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="formEndereco">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Endereço</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" class="form-control">
                    <div class="form-group">
                        <label for="descricao" class="control-lable">Descrição</label>
                        <div class="input-group">
                            <select class="form-control" id="descricao"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="logradouro" class="control-lable">Logradouro</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="logradouro">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="numero" class="control-lable">Número</label>
                        <div class="input-group">
                            <input type="numeber" class="form-control" id="numero">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cep" class="control-lable">CEP</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cep">
                        </div
                    <div class="form-group">
                        <label for="bairro" class="control-lable">Bairro</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="bairro">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>                    
                </div>
            </form>
        </div>
    </div>
</div>

@section('js')
    <script>

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });

        function novoEndereco(){
            $('#id').val('');
            $('#descricao').val('');
            $('#logradouro').val('');
            $('#numero').val('');
            $('#cep').val('');
            $('#bairro').val('');
            $('#cidade').val('');
            $('#estado').val('');
            $('#modalEnderecos').modal('show');
        }


    </script>
@endsection