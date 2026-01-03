<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Resultat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Modifier Resultat #{{ $resultat->ID_Resultat }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('resultat.update', $resultat->ID_Resultat) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="Points_Obtenus" class="form-label">Points Obtenus</label>
            <input type="number" step="0.01" class="form-control" id="Points_Obtenus" name="Points_Obtenus" value="{{ $resultat->Points_Obtenus }}" required>
        </div>

        <div class="mb-3">
            <label for="ID_Question" class="form-label">ID Question</label>
            <input type="number" class="form-control" id="ID_Question" name="ID_Question" value="{{ $resultat->ID_Question }}" required>
        </div>

        <div class="mb-3">
            <label for="ID_Session" class="form-label">ID Session</label>
            <input type="number" class="form-control" id="ID_Session" name="ID_Session" value="{{ $resultat->ID_Session }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('resultat.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
