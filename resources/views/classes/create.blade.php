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
                    <a href="{{ route('course.show', ['course' => $course->id]) }}" class="text-decoration-none">Curso</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('classe.index', ['course' => $course->id]) }}" class="text-decoration-none">Aulas</a>
                </li>
                <li class="breadcrumb-item active">Aula</li>
            </ol>
        </div>

        <div class="card mb-4 border-light shadow">

            <div class="card-header hstack gap-2">
                <span>Cadastrar</span>

                <span class="ms-auto d-sm-flex flex-row">

                    @can('index-classe')
                        <a href="{{ route('classe.index', ['course' => $course->id]) }}"
                            class="btn btn-info btn-sm me-1 mb-1 mb-sm-0"><i class="fa-solid fa-list"></i> Aulas</a>
                    @endcan

                </span>
            </div>

            <div class="card-body">

                <x-alert />

                <form class="row g-3" action="{{ route('classe.store') }}" method="POST">
                    @csrf
                    @method('POST')

                    <input type="hidden" name="course_id" id="course_id" value="{{ $course->id }}">

                    <div class="col-12">
                        <label for="name_course" class="form-label">Nome</label>
                        <input type="text" name="name_course" class="form-control" id="name_course"
                            placeholder="Nome do curso" value="{{ $course->name }}" disabled required>
                    </div>

                    <div class="col-12">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nome da aula"
                            value="{{ old('name') }}" required>
                    </div>

                    <div class="col-12">
                        <label for="name" class="form-label">Descrição</label>
                        <textarea name="description" rows="4" cols="30" id="description" class="form-control"
                            placeholder="Conteúdo da aula" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
