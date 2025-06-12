<!DOCTYPE html>
<html>
<head>
    <title>Write a Note</title>
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

        label {
            font-weight: bold;
            color: #3e2723;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #795548;
            border-radius: 5px;
            background-color: #fdfaf6;
            color: #2d2b2a;
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

        p {
            text-align: center;
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Submit Your Note</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form method="POST" action="/story">
        @csrf
        <label>Title:</label><br>
        <input type="text" name="title"><br>

        <label>Tag:</label><br>
        <input type="text" name="genre"><br>

        <label>Note:</label><br>
        <textarea name="content" rows="10"></textarea><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
