<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        textarea,
        input[type="file"] {
            font-family: Arial, sans-serif;
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Recipe</h1>

        <form method="POST" action="{{ route('recipes.update', $recipe->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ $recipe->title }}">
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description">{{ $recipe->description }}</textarea>
            </div>
            <div>
                <label for="ingredients">Ingredients:</label>
                <textarea id="ingredients" name="ingredients" rows="6">{{ $recipe->ingredients }}</textarea>
            </div>
            <div>
                <label for="instructions">Instructions:</label>
                <textarea id="instructions" name="instructions" rows="6">{{ $recipe->instructions }}</textarea>
            </div>
            <div>
                <label for="photo">Photo:</label>
                <input type="file" id="photo" name="photo" accept="image/*">
            </div>
            <button type="submit">Update Recipe</button>
        </form>
    </div>
</body>
</html>
