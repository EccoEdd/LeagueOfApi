<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome {{ $name }}</h1>
    <p>Thank you for your time, but we are not done yet</p>
    <h2>Authentification code: {{ $code }}</h2>
    <a href="{{ $url }}">Click this link to continue and place the code we gave you in there :)</a>
    <p>The link expires in 40 minutes...</p>
</body>
</html>
