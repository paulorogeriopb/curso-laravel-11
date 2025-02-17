<form class="row g-3" action="{{ isset($classe) ? route('classe.update', $classe->id) : route('classe.store') }}"
    method="POST">

    @csrf
    @if (isset($classe))
        @method('PUT')
    @else
        @method('POST')
    @endif

    <input type="hidden" name="course_id" value="{{ $course->id }}">

    <div class="col-12">
        <label for="name_course" class="form-label">Curso</label>
        <input type="text" class="form-control" id="name_course" value="{{ $course->name }}" disabled>
    </div>

    <div class="col-12">
        <label for="name" class="form-label">Nome da Aula</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nome da aula"
            value="{{ old('name', $classe->name ?? '') }}" required>
    </div>

    <div class="col-12">
        <label for="description" class="form-label">Descrição</label>
        <textarea name="description" id="description" rows="4" class="form-control" placeholder="Conteúdo da aula"
            required>{{ old('description', $classe->description ?? '') }}</textarea>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-{{ isset($classe) ? 'primary' : 'success' }} btn-sm">
            {{ isset($classe) ? 'Atualizar' : 'Cadastrar' }}
        </button>
    </div>

</form>
