<!DOCTYPE html>
<html>
<head>
    <title>Login | Music Studio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 40px;
        }
        .container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type=email],
        input[type=password] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        button {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
        }
        .alert {
            background-color: #f8d7da;
            color: #842029;
            padding: 10px;
            margin-top: 15px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Music Studio</h2>

        @if(session('error'))
            <div class="alert">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
