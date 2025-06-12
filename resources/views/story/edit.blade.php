<!DOCTYPE html>
<html>
<head>
    <title>Edit Note</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fdfaf6; /* Light coffee cream */
            color: #2d2b2a; /* Dark brown text */
            margin: 0;
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #4e342e; /* Rich brown */
        }

        form {
            background-color: #ffffff;
            width: 60%;
            margin: 0 auto;
            padding: 30px;
            border-radius: 10px;
            border: 1px solid #a1887f;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #795548;
            border-radius: 5px;
            background-color: #fdfaf6;
            color: #2d2b2a;
        }

        textarea {
            resize: vertical;
            height: 150px;
        }

        button {
            background-color: #3e2723;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #5d4037;
        }
    </style>
</head>
<body>
    <h1>Edit Note</h1>

    <form method="POST" action="{{ url('/story/' . $story->id) }}">
        @csrf
        @method('PUT')

        <label>Title:</label>
        <input type="text" name="title" value="{{ $story->title }}">

        <label>Tag:</label>
        <input type="text" name="genre" value="{{ $story->genre }}">

        <label>Note:</label>
        <textarea name="content">{{ $story->content }}</textarea>

        <button type="submit">Update</button>
    </form>
</body>
</html>
