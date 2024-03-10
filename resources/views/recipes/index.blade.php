<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Recipe Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .recipe-list {
            list-style-type: none;
            padding: 0;
        }
        .recipe-item {
            background-color: #fff;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .recipe-title {
            font-size: 20px;
            margin-bottom: 5px;
        }
        .btn {
            margin-left: 10px;
        }
        .btn-edit {
            background-color: #28a745;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .recipe-photo {
            max-width: 100px;
            max-height: 100px;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Recipe Book</h1>

        <ul class="recipe-list">
            @foreach($recipes as $recipe)
            <li class="recipe-item">
                <div class="row">
                    <div class="col">
                        <div class="d-flex align-items-center">
                            @if($recipe->photo)
                                <img src="{{ asset('uploads/' . $recipe->photo) }}" alt="Recipe Photo" class="recipe-photo">
                            @endif
                            <h2 class="recipe-title"><a href="{{ route('recipes.show', $recipe->id) }}">{{ $recipe->title }}</a></h2>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-sm btn-success btn-edit">Edit</a>
                        <form method="POST" action="{{ route('recipes.destroy', $recipe->id) }}" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger btn-delete">Delete</button>
                        </form>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>

        <a href="{{ route('recipes.create') }}" class="btn btn-success">Add New Recipe</a>
    </div>
</body>
</html>
