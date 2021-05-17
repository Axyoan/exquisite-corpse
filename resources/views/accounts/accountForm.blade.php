<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts</title>
</head>

<body>
    <h1>Account form</h1>
    <!--
    <form action="/account" method="POST">
    -->
    <form action="{{ route('account.store') }}" method="POST">
        @csrf
        <label for="username">Username</label>
        <input type="text" name="username" id="">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="">
        <br>
        <label for="email">Email</label>
        <input type="text" name="email" id="">
        <br>
        <input type="submit" value="Send">
    </form>
</body>

</html>