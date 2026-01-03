<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Liste des Questions</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID_Question</th>
                <th>Num_Ordre</th>
                <th>Point_Question</th>
                <th>Enonce_Question</th>
                <th>ID_Quiz</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
            <tr>
                <td>{{ $question->ID_Question }}</td>
                <td>{{ $question->Num_Ordre }}</td>
                <td>{{ $question->Point_Question }}</td>
                <td>{{ $question->Enonce_Question }}</td>
                <td>{{ $question->ID_Quiz }}</td>
                <td>
                    <!-- Update button linking to edit page -->
                    <a href="{{ route('question.edit', $question->ID_Question) }}" class="btn btn-sm btn-primary">Update</a>

                    <!-- Delete form -->
                    <form action="{{ route('question.destroy', $question->ID_Question) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this question?');">
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
