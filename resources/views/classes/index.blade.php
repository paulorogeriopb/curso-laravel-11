@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-3">Aula</h2>

            <ol class="breadcrumb mb-3 mt-3 ms-auto">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard.index') }}" class="text-decoration-none">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('course.index') }}" class="text-decoration-none">Cursos</a>
                </li>
                <li class="breadcrumb-item active">Aulas</li>
            </ol>
        </div>

        <div class="card mb-4 border-light shadow">
            <div class="card-header">
                <span>Pesquisar</span>
            </div>

            <div class="card-body">
                <form action="{{ route('classe.index', ['course' => $course]) }}">
                    <div class="row">

                        <div class="col-md-4 col-sm-12">
                            <label class="form-label" for="name">Nome</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $name }}"
                                placeholder="Nome da aula">
                        </div>

                        <div class="col-md-4 col-sm-12 mt-4 pt-3">
                            <button type="submit" class="btn btn-info btn-sm"><i class="fa-solid fa-magnifying-glass"></i>
                                Pesquisa</button>
                            <a href="{{ route('classe.index', ['course' => $course]) }}" class="btn btn-warning btn-sm"><i
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

                    @can('show-course')
                        <a href="{{ route('course.show', ['course' => $course->id]) }}"
                            class="btn btn-primary btn-sm">Curso</a>
                    @endcan

                    @can('create-classe')
                        <a href="{{ route('classe.create', ['course' => $course->id]) }}" class="btn btn-success btn-sm"><i
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
                            <th class="d-none d-md-table-cell">Ordem</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        {{-- Imprimir os registros --}}
                        @forelse ($classes as $classe)
                            <tr>
                                <th class="d-none d-sm-table-cell">{{ $classe->id }}</th>
                                <td>{{ $classe->name }}</td>
                                <td class="d-none d-md-table-cell">{{ $classe->order_classe }}
                                </td>
                                <td class="d-md-flex flex-row justify-content-center">

                                    @can('show-classe')
                                        <a href="{{ route('classe.show', ['classe' => $classe->id]) }}"
                                            class="btn btn-primary btn-sm me-1 mb-1 mb-md-0"><i class="fa-regular fa-eye"></i>
                                            Visualizar</a>
                                    @endcan

                                    @can('edit-classe')
                                        <a href="{{ route('classe.edit', ['classe' => $classe->id]) }}"
                                            class="btn btn-warning btn-sm me-1 mb-1 mb-md-0"><i
                                                class="fa-regular fa-pen-to-square"></i> Editar</a>
                                    @endcan

                                    @can('destroy-classe')
                                        <form action="{{ route('classe.destroy', ['classe' => $classe->id]) }}" method="POST">
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
                                Nenhuma aula encontrada!
                            </div>
                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>

    </div>
@endsection
