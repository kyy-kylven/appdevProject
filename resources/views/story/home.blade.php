<!DOCTYPE html>
<html>
<head>
    <title>Notes</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fdfaf6; /* Light coffee cream */
            color: #2d2b2a; /* Dark brown text */
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #4e342e; /* Rich brown */
            text-align: center;
        }

        form {
            margin: 20px 0;
            text-align: center;
        }

        input[type="text"] {
            padding: 10px;
            width: 200px;
            margin: 5px;
            border: 1px solid #795548; /* Coffee border */
            border-radius: 5px;
        }

        button, a button {
            background-color: #3e2723; /* Almost black coffee */
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #5d4037;
        }

        a {
            text-decoration: none;
        }

        .note-card {
            background-color: #ffffff;
            border: 1px solid #a1887f;
            padding: 15px;
            margin: 15px auto;
            width: 80%;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .note-card h2 {
            margin-top: 0;
            color: #3e2723;
        }

        .note-card small {
            color: #757575;
        }

        .note-card a {
            color: #4e342e;
            margin-right: 10px;
        }

        .note-card form {
            display: inline;
        }

        .center {
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>All Submitted Notes</h1>

    <!-- Search Form -->
    <form action="{{ url('/home') }}" method="GET">
        <input type="text" name="title" placeholder="Search by title" value="{{ request('title') }}">
        <input type="text" name="genre" placeholder="Search by Tags" value="{{ request('genre') }}">
        <button type="submit">Search</button>
        <a href="{{ url('/home') }}"><button type="button">Reset</button></a>
    </form>

    <!-- Add Note Button -->
    <div class="center">
        <a href="{{ url('/note') }}">
            <button>➕ Add Note</button>
        </a>
    </div>

    <!-- Show Notes -->
    @php
        $searching = request()->has('title') || request()->has('genre');
    @endphp

    @if($stories->count() > 0)
        @foreach($stories as $story)
            <div class="note-card">
                <h2>{{ $story->title }}</h2>
                <p><strong>Tags:</strong> {{ $story->genre }}</p>
                <p>{{ $story->content }}</p>
                <small>Posted on {{ $story->created_at->format('F d, Y h:i A') }}</small><br><br>

                <a href="{{ url('/story/' . $story->id . '/edit') }}">Edit</a>

                <form action="{{ url('/story/' . $story->id) }}" method="POST" style="margin-left:10px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this story?');">Delete</button>
                </form>
            </div>
        @endforeach
    @else
        <p class="center">
            {{ $searching ? 'No results found for your search.' : 'No stories available yet.' }}
        </p>
    @endif

</body>
</html>
