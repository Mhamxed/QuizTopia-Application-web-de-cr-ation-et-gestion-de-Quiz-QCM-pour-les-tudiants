<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Choix</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Modifier Choix #{{ $choix->ID_Choix }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('choix.update', $choix->ID_Choix) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="Texte_Choix" class="form-label">Texte du Choix</label>
            <input type="text" class="form-control" id="Texte_Choix" name="Texte_Choix" value="{{ $choix->Texte_Choix }}" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="Est_Correct" name="Est_Correct" value="1" {{ $choix->Est_Correct ? 'checked' : '' }}>
            <label class="form-check-label" for="Est_Correct">Est Correct</label>
        </div>

        <div class="mb-3">
            <label for="ID_Resultat" class="form-label">ID Resultat</label>
            <input type="number" class="form-control" id="ID_Resultat" name="ID_Resultat" value="{{ $choix->ID_Resultat }}" required>
        </div>

        <div class="mb-3">
            <label for="ID_Question" class="form-label">ID Question</label>
            <input type="number" class="form-control" id="ID_Question" name="ID_Question" value="{{ $choix->ID_Question }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('choix.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
