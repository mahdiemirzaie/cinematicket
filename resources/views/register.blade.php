<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #b7e7ba;
        }

        h1 {
            text-align: center;
            color: #1a0202;
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: rgb(241, 236, 171);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: rgb(26, 2, 2);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid rgb(255, 255, 255);
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="text"]:invalid,
        input[type="email"]:invalid,
        input[type="password"]:invalid {
            border-color: rgb(255, 0, 21);
        }

        input[type="text"]:invalid + .error-message,
        input[type="email"]:invalid + .error-message,
        input[type="password"]:invalid + .error-message {
            display: block;
            color: #ef4444;
            font-size: 14px;
            margin-top: 5px;
        }

        button[type="submit"] {
            padding: 20px 40px;
            background-color: #5270cb;
            color: #1a0204;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #099d0e;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Register</h1>

    <form action="{{ route('register') }}" method="POST" novalidate>
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required pattern="[\w\s]+">
        <div class="error-message">نام را وارد کنید.</div>

        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <div class="error-message">ایمیل را وارد کنید.</div>

        <br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required pattern="[0-9]+">
        <div class="error-message">شماره تلفن را وارد کنید.</div>

        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <div class="error-message">رمز عبور را وارد کنید.</div>

        <br>

        <button type="submit">Register</button>
    </form>
</div>
</body>
</html>









