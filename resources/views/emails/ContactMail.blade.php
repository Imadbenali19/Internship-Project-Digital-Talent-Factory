<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Emails</title>
</head>
<body>
    <h1>Contact massage</h1>
    <p>Name : {{ $details['name'] }}</p>
    <p>Email : {{ $details['email'] }}</p>
    <p>Subject : {{ $details['subject'] }}</p>
    <p>Message : {{ $details['message'] }}</p>
</body>
</html>