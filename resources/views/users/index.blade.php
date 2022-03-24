<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <div class="container my-3">
        <form method="GET">
            <div class="row my-3">
                <div class="col-md-3">
                    <input type="text" placeholder="Username" name="username" value="@if(isset($_GET['username']) && !empty($_GET['username'])) {{ trim($_GET['username']) }} @endif">
                </div>
                <div class="col-md-3">
                    <input type="text" placeholder="First Name" name="first_name" value="@if(isset($_GET['first_name']) && !empty($_GET['first_name'])) {{ trim($_GET['first_name']) }} @endif">
                </div>
                <div class="col-md-3">
                    <input type="text" placeholder="Last Name" name="last_name" value="@if(isset($_GET['last_name']) && !empty($_GET['last_name'])) {{ trim($_GET['last_name']) }} @endif">
                </div>
                <div class="col-md-3">
                    <input type="text" placeholder="Email" name="email" value="@if(isset($_GET['email']) && !empty($_GET['email'])) {{ trim($_GET['email']) }} @endif">
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-3">
                    <input type="text" placeholder="Gender" name="gender" value="@if(isset($_GET['gender']) && !empty($_GET['gender'])) {{ trim($_GET['gender']) }} @endif">
                </div>
                <div class="col-md-3">
                    <input type="text" placeholder="Language" name="language" value="@if(isset($_GET['language']) && !empty($_GET['language'])) {{ trim($_GET['language']) }} @endif">
                </div>
                <div class="col-md-3">
                    <input type="text" placeholder="Country" name="country" value="@if(isset($_GET['country']) && !empty($_GET['country'])) {{ trim($_GET['country']) }} @endif">
                </div>
                <div class="col-md-3">
                    <input type="text" placeholder="Card Last 4 Digit" name="card_last_four" value="@if(isset($_GET['card_last_four']) && !empty($_GET['card_last_four'])) {{ trim($_GET['card_last_four']) }} @endif">
                </div>
            </div>
            <button class="btn btn-primary mb-2 mr-2">Search</button>
            <a class="btn btn-danger mb-2" href="/users">Reset</a>
        </form>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Language</th>
                    <th>Country</th>
                    <th>Card Last 4 Digit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email  }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->language }}</td>
                    <td>{{ $user->country }}</td>
                    <td>{{ $user->card_last_four }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>