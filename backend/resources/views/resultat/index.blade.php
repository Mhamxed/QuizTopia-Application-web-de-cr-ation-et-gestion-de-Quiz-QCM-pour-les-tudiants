<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Resultats</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Liste des Resultats</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID_Resultat</th>
                <th>Points_Obtenus</th>
                <th>ID_Question</th>
                <th>ID_Session</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($resultats as $resultat)
            <tr>
                <td>{{ $resultat->ID_Resultat }}</td>
                <td>{{ $resultat->Points_Obtenus }}</td>
                <td>{{ $resultat->ID_Question }}</td>
                <td>{{ $resultat->ID_Session }}</td>
                <td>
                    <!-- Update button linking to edit page -->
                    <a href="{{ route('resultat.edit', $resultat->ID_Resultat) }}" class="btn btn-sm btn-primary">Update</a>

                    <!-- Delete form -->
                    <form action="{{ route('resultat.destroy', $resultat->ID_Resultat) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this resultat?');">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
