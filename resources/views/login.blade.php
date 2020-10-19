<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <!-- Header, se dung chung voi ben list -->
    <header><h1 class="header">Header Login</h1></header>

    <form method="POST" action="{{ route('post-login') }}">
        @csrf
        <input name="email" placeholder="Email" type="email" />
        <input name="password" placeholder="Password" type="password" />
        <button type="submit">Submit</button>
    </form>

    <!-- Footer -->
    <footer>Footer login</footer>
</body>
</html>
