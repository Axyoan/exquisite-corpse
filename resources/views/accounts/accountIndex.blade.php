<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts</title>
</head>

<body>
    <h1>Accounts</h1>
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
            @foreach ($accounts as $account)
            <tr>
                <td>{{$account->id}}</td>
                <td>
                    <!--
                    <a href="/account/{{$account->id}}">
                    -->
                    <a href="{{ route('account.show', $account) }}">
                        {{$account->username}}
                    </a>
                </td>
                <td>{{$account->password}}</td>
                <td>{{$account->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>