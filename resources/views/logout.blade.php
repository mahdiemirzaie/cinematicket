<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>logout</title>
    <style>
        body {
            font-family: "Arial Black", sans-serif;
            background-color: #b7e7ba;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color:  rgb(241, 236, 171);
            border-radius: 5px;
            box-shadow: 0 2px 5px rgb(26, 2, 4);
        }

        h1 {
            color: #1a0204;
            text-align: center;
        }

        form {
            margin-top: 40px;
        }

        p {
            margin-bottom: 10px;
            text-align: center;
            font-size:20px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px 20px;
            background-color: #5270cb;
            color: #1a0204;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size:16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #6aea71;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Logout</h1>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <p style="text-align: center;">آیا مطمئن هستید که می‌خواهید خارج شوید؟</p>
        <button type="submit">خروج</button>
    </form>
</div>
</body>
</html>
