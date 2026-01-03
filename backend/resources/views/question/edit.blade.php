<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Question</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Modifier Question #{{ $question->ID_Question }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('question.update', $question->ID_Question) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="Num_Ordre" class="form-label">Numéro d'ordre</label>
            <input type="number" class="form-control" id="Num_Ordre" name="Num_Ordre" value="{{ $question->Num_Ordre }}" required>
        </div>

        <div class="mb-3">
            <label for="Point_Question" class="form-label">Points de la question</label>
            <input type="number" class="form-control" id="Point_Question" name="Point_Question" value="{{ $question->Point_Question }}" required>
        </div>

        <div class="mb-3">
            <label for="Enonce_Question" class="form-label">Énoncé de la question</label>
            <textarea class="form-control" id="Enonce_Question" name="Enonce_Question" rows="4" required>{{ $question->Enonce_Question }}</textarea>
        </div>

        <div class="mb-3">
            <label for="ID_Quiz" class="form-label">ID Quiz</label>
            <input type="number" class="form-control" id="ID_Quiz" name="ID_Quiz" value="{{ $question->ID_Quiz }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('question.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
