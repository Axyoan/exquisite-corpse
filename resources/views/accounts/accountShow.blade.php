<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>

<body>
    <h1>Account</h1>
    <table border='1'>
        <thead>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$account->id}}</td>
                <td>{{$account->username}}</td>
                <td>{{$account->password}}</td>
                <td>{{$account->email}}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>