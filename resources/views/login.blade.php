<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:  #b7e7ba;
        }

        h1 {
            text-align: center;
            color: #1a0204;
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: rgb(241, 236, 171);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.26);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #1a0202;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="email"]:invalid,
        input[type="password"]:invalid {
            border-color: red;
        }

        input[type="email"]:invalid + .error-message,
        input[type="password"]:invalid + .error-message {
            display: block;
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #5c7ee3;
            color: #1a0204;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #48c04f;
        }
    </style>
</head>
<body>
<h1>Login</h1>

<form action="{{ route('login') }}" method="POST">
    @csrf
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <div class="error-message">ایمیل را وارد کنید.</div>

    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <div class="error-message">رمز عبور را وارد کنید.</div>

    <br>

    <button type="submit">Login</button>
</form>

</body>
</html>
