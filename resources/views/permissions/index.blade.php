@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-3">Página</h2>

            <ol class="breadcrumb mb-3 mt-3 ms-auto">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard.index') }}" class="text-decoration-none">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Páginas</li>
            </ol>
        </div>

        <div class="card mb-4 border-light shadow">
            <div class="card-header">
                <span>Pesquisar</span>
            </div>

            <div class="card-body">
                <form action="{{ route('permission.index') }}">
                    <div class="row">

                        <div class="col-md-4 col-sm-12">
                            <label class="form-label" for="title">Título</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $title }}"
                                placeholder="Título da página">
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <label class="form-label" for="name">Nome</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $name }}"
                                placeholder="Nome da página">
                        </div>

                        <div class="col-md-4 col-sm-12 mt-4 pt-3">
                            <button type="submit" class="btn btn-info btn-sm"><i class="fa-solid fa-magnifying-glass"></i>
                                Pesquisa</button>
                            <a href="{{ route('permission.index') }}" class="btn btn-warning btn-sm"><i
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
                    @can('create-permission')
                        <a href="{{ route('permission.create') }}" class="btn btn-success btn-sm"><i
                                class="fa-regular fa-square-plus"></i> Cadastrar</a>
                    @endcan
                </span>
            </div>

            <div class="card-body">

                <x-alert />

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="d-none d-md-table-cell">Título</th>
                            <th>Nome</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        {{-- Imprimir os registros --}}
                        @forelse ($permissions as $permission)
                            <tr>
                                <th>{{ $permission->id }}</th>
                                <td class="d-none d-md-table-cell">{{ $permission->title }}</td>
                                <td>{{ $permission->name }}</td>
                                <td class="d-md-flex flex-row justify-content-center">

                                    @can('show-permission')
                                        <a href="{{ route('permission.show', ['permission' => $permission->id]) }}"
                                        class="btn btn-primary btn-sm me-1 mb-1 mb-md-0"><i class="fa-regular fa-eye"></i>
                                        Visualizar</a>
                                    @endcan                                    

                                    @can('edit-permission')
                                        <a href="{{ route('permission.edit', ['permission' => $permission->id]) }}"
                                        class="btn btn-warning btn-sm me-1 mb-1 mb-md-0"><i
                                            class="fa-regular fa-pen-to-square"></i> Editar</a>
                                    @endcan                                    

                                    @can('destroy-permission')
                                        <form action="{{ route('permission.destroy', ['permission' => $permission->id]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm me-1"
                                                onclick="return confirm('Tem certeza que deseja apagar este registro?')"><i
                                                    class="fa-regular fa-trash-can"></i> Apagar</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger" role="alert">
                                Nenhuma permissão encontrada!
                            </div>
                        @endforelse

                    </tbody>
                </table>

                {{-- Imprimir a paginação --}}
                {{ $permissions->links() }}

            </div>
        </div>
    </div>
@endsection
