<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <title>Book Rating App</title>
    <style>
        .container {
            margin-top: 20px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="/rating/submit" method="post">
            @csrf
            <div class="form-group">
                <label for="author">Book Author:</label>
                <select id="author" name="author" class="form-control">
                    <option value="">Select an author</option>
                </select>
            </div>

            <div class="form-group">
                <label for="book">Book Name:</label>
                <select id="book" name="book" class="form-control">
                    <option value="">Select a book</option>
                </select>
            </div>

            <div class="form-group">
                <label for="rating">Rating (1-10):</label>
                <select id="rating" name="rating" class="form-control">
                    <option value="">Select a rating</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "/data/author",
                success: function(data) {
                $.each(data, function(i, author) {
                    $('#author').append($('<option>', {
                    value: author.author_id,
                    text: author.name
                    }));
                });
                }
            });

            $('#author').on('change', function() {
                var authorId = $(this).val();
                $('#book').html('<option value="">Select a book</option>');
                
                if (authorId) {
                    $.ajax({
                    type: "GET",
                    url: "/data/book",
                    data: { authorId: authorId },
                    success: function(data) {
                        $.each(data, function(i, book) {
                        $('#book').append($('<option>', {
                            value: book.books_id,
                            text: book.books_name
                        }));
                        });
                    }
                    });
                }
            });
        });
    </script>
</body>

</html>