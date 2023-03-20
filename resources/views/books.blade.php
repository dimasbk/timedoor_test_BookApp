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
        <table id="book-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Book Name</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Rating</th>
                    <th>Voters</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $item)
                <tr>
                    <td>{{$item -> books_name}}</td>
                    <td>{{$item -> category}}</td>
                    <td>{{$item -> name}}</td>
                    <td>{{$item -> average}}</td>
                    <td>{{$item -> Voters}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>


    <script>
        $(document).ready(function() {
            $('#book-table').DataTable({
                "pageLength": 10,
                "responsive": true,
                "lengthMenu": [10, 20, 40, 60, 80,100],
                "order": [[3, "desc"]],
             });
        });
    </script>

</body>

</html>