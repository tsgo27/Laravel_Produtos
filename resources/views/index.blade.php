@extends('layouts.main')

@section('title', 'Lista de Produtos')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-10">
        </div>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                <h2 class="ml-lg-2">Listar Produtos</h2>
                            </div>
                            <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                <div class="container">
                                    {{-- Botão para abrir form create---}}
                                    <a style="border-radius: 8px;" class="btn btn-success" data-toggle="modal" data-target="#adicionarJogoModal">
                                        <i class="material-icons">&#xE147;</i>
                                        <span>Adicionar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome do Produto</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Validade</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produtos as $produto)
                            <tr>
                                <th>{{ $produto->id }}</th>
                                <th>{{ $produto->nome }}</th>
                                <th>{{ $produto->categoria }}</th>
                                <th>{{ $produto->validade }}</th>
                                <td>{{ number_format($produto->valor, 2, ',', '.') }}</td>
                                <th class="d-flex">
                                    {{-- -Button Editar- --}}
                                    <a href="{{ route('produtos-edit', ['id' => $produto->id]) }}" class="btn btn-primary me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                    </a>
                                    <form id="formExcluir{{$produto->id}}" action="{{ route('produtos-destroy',['id'=>$produto->id])}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onclick="confirmarExclusao(event, {{$produto->id}})"> {{---Button Deletar---}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                            </svg>
                                        </button>
                                    </form>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- --------------------Modal Start CREATE-----------------------}}

                <div class="modal fade" id="adicionarJogoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adicionar Produto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('produtos-store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nome">Nome do produto:</label>
                                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Informe nome do produto" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="categoria">Categoria:</label>
                                        <select name="categoria" id="categoria" class="form-control" required>
                                            <option value="" disabled selected>Selecione uma categoria</option>
                                            <option value="Alimentos">Alimentos</option>
                                            <option value="Bebida">Bebida</option>
                                            <option value="Limpeza">Limpeza</option>
                                            <option value="Higiene">Higiene</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="validade">Validade:</label>
                                        <input type="text" name="validade" id="validade" class="form-control" maxlength="7" placeholder="mm/aaaa" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="valor">Valor:</label>
                                        <input type="text" name="valor" id="valor" class="form-control" placeholder="exemplo: 10,00"
                                            pattern="^\d+(\,\d{1,2})?$" maxlength="6" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" id="submitCancelar" data-dismiss="modal">Cancelar</button>
                                        <input type="submit" name="submit" id="submitAdicionar" class="btn btn-success" value="Adicionar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- -------------------Modal CREATE END--------------------- --}}
            @endsection