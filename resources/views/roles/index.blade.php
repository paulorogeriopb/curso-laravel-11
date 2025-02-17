@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-3">Papel</h2>

            <ol class="breadcrumb mb-3 mt-3 ms-auto">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard.index') }}" class="text-decoration-none">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Papéis</li>
            </ol>
        </div>

        <div class="card mb-4 border-light shadow">
            <div class="card-header">
                <span>Pesquisar</span>
            </div>

            <div class="card-body">
                <form action="{{ route('role.index') }}">
                    <div class="row">

                        <div class="col-md-6 col-sm-12">
                            <label class="form-label" for="name">Nome</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $name }}"
                                placeholder="Nome do curso">
                        </div>

                        <div class="col-md-6 col-sm-12 mt-4 pt-3">
                            <button type="submit" class="btn btn-info btn-sm"><i class="fa-solid fa-magnifying-glass"></i>
                                Pesquisa</button>
                            <a href="{{ route('role.index') }}" class="btn btn-warning btn-sm"><i
                                    class="fa-solid fa-trash"></i> Limpar</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class="card mb-4 border-light shadow">

            <div class="card-header hstack gap-2">
                <span>Listar</span>

                <span class="ms-auto">
                    @can('create-role')
                        <a href="{{ route('role.create') }}" class="btn btn-success btn-sm"><i
                                class="fa-regular fa-square-plus"></i> Cadastrar</a>
                    @endcan
                </span>
            </div>

            <div class="card-body">

                <x-alert />

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell">ID</th>
                            <th>Nome</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        {{-- Imprimir os registros --}}
                        @forelse ($roles as $role)
                            <tr>
                                <th class="d-none d-sm-table-cell">{{ $role->id }}</th>
                                <td>{{ $role->name }}</td>
                                <td class="d-md-flex flex-row justify-content-center">

                                    @can('index-role-permission')
                                        <a href="{{ route('role-permission.index', ['role' => $role->id]) }}"
                                            class="btn btn-info btn-sm me-1 mb-1 mb-md-0"><i class="fa-solid fa-list"></i>
                                            Permissões</a>
                                    @endcan

                                    @can('edit-role')
                                        <a href="{{ route('role.edit', ['role' => $role->id]) }}"
                                            class="btn btn-warning btn-sm me-1 mb-1 mb-md-0">
                                            <i class="fa-solid fa-pen-to-square"></i> Editar
                                        </a>
                                    @endcan

                                    @can('destroy-role')
                                        <form method="POST" action="{{ route('role.destroy', ['role' => $role->id]) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm me-1 mb-1 mb-md-0"
                                                onclick="return confirm('Tem certeza que deseja apagar este registro?')"><i
                                                    class="fa-regular fa-trash-can"></i>
                                                Apagar</button>
                                        </form>
                                    @endcan

                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger" role="alert">
                                Nenhum papel encontrado!
                            </div>
                        @endforelse

                    </tbody>
                </table>

                {{-- Imprimir a paginação --}}
                {{ $roles->links() }}

            </div>
        </div>
    </div>
@endsection
