<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Choix</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Liste des Choix</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Texte_Choix</th>
                <th>Est_Correct</th>
                <th>ID_Resultat</th>
                <th>ID_Question</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($choixes as $choix)
            <tr>
                <form action="{{ route('choix.update', $choix->ID_Choix) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <td>{{ $choix->ID_Choix }}</td>
                    <td>
                        <input type="text" name="Texte_Choix" class="form-control" value="{{ $choix->Texte_Choix }}">
                    </td>
                    <td class="text-center">
                        <input type="checkbox" name="Est_Correct" value="1" {{ $choix->Est_Correct ? 'checked' : '' }}>
                    </td>
                    <td>{{ $choix->ID_Resultat }}</td>
                    <td>{{ $choix->ID_Question }}</td>
                    <td>
                    <a href="{{ route('choix.edit', $choix->ID_Choix) }}" class="btn btn-sm btn-primary">
                        Update
                    </a>
                        <form action="{{ route('choix.destroy', $choix->ID_Choix) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this choix?');">
                                Delete
                            </button>
                        </form>
                    </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>