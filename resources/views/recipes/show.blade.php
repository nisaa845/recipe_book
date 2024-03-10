<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>{{ $recipe->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 10px;
        }
        ul, ol {
            margin-bottom: 20px;
        }
        li {
            margin-bottom: 5px;
        }
        .recipe-photo {
    width: 400px; /* Fixed width */
    height: 300px; /* Fixed height */
    object-fit: cover; /* Maintain aspect ratio and cover the container */
    margin-bottom: 20px;
}

.container{
    background: #f5fcfc;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $recipe->title }}</h1>

         <!-- Display photo if it exists -->
         @if($recipe->photo)
            <img src="{{ asset('uploads/' . $recipe->photo) }}" alt="Recipe Photo" class="recipe-photo">
        @endif

        <p><strong>Description:</strong> {{ $recipe->description }}</p>
        <p><strong>Ingredients:</strong></p>
        <ul>
            @foreach(explode("\n", $recipe->ingredients) as $ingredient)
                <li>{{ $ingredient }}</li>
            @endforeach
        </ul>
        <p><strong>Instructions:</strong></p>
        <ol>
            @foreach(explode("\n", $recipe->instructions) as $instruction)
                <li>{{ $instruction }}</li>
            @endforeach
        </ol>
    </div>
</body>
</html>
