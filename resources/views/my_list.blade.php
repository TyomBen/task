<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <a href="{{ route('create') }}" class="btn btn-primary">Create Article</a>
    <input type="text" id="searchInput" placeholder="Search..." >
    <ul id="searchResults"></ul>
    <script>
    document.getElementById('searchInput').addEventListener('input', async function() {
    const searchQuery = this.value;

    if (searchQuery.length > 0) {
        try {
            const response = await fetch(`http://127.0.0.1:8000/search?query=${searchQuery}`);
            const data = await response.json();
            const searchResults = document.getElementById('searchResults');
            searchResults.innerHTML = '';
            data.forEach(result => {
                const li = document.createElement('li');
                li.textContent = result.title;
                searchResults.appendChild(li);
            });
        } catch (error) {
            console.error('Error:', error);
        }
    } else {
        searchResults.innerHTML = '';
    }
});
</script>

    <div class="container mt-5">


        <h2 class="mt-5">Data</h2>
        @if ($errors->has('msg'))
        <div class="alert alert-danger">
            {{ $errors->first('msg') }}
        </div>
    @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>

                    @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        @if ($article->user_id != Auth::user()->id)
                        <td>{{ $article->content }} </td>
                        @else
                        <td>{{ $article->content }} <a href={{route ('edit', $article->id) }}>Edit </a> <a href = {{route('delete', $article->id)}} >Delete</a></td>
                        @endif
                    </tr>

                    @endforeach

            </tbody>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="script.js"></script>
</body>

</html>

