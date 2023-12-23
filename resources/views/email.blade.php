<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Post Created</title>
</head>
<body>
    <p>Dear {{ $user->name }},</p>

    <p>We have added a new article that we believe will also be of interest to you. For details, please <a href="{{route('post.index')}}" target="_blank">click here</a>.
</p>
    <p>Best regards</p>
</body>
</html>