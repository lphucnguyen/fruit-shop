<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | {{ config('APP_NAME', env('APP_NAME')) }}</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        body {
            background-color: #eee;
            font-family: 'Work Sans', sans-serif;
        }

        #wrapper {
            width: 500px;
            height: 50%;
            overflow: hidden;
            border: 0px solid #000;
            margin: 50px auto;
            padding: 10px;
        }

        .main-content {
            width: 250px;
            height: 40%;
            margin: 10px auto;
            background-color: #fff;
            border: 2px solid #e6e6e6;
            padding: 40px 50px;
        }

        .header {
            border: 0px solid #000;
            margin-bottom: 5px;
        }

        .header h4 {
            font-size: 25px;
            text-align: center;
            margin-bottom: 10px;
        }

        .input-1,
        .input-2 {
            width: 100%;
            margin-bottom: 5px;
            padding: 8px 12px;
            border: 1px solid #dbdbdb;
            box-sizing: border-box;
            border-radius: 3px;
        }

        .overlap-text {
            position: relative;
        }

        .overlap-text a {
            position: absolute;
            top: 8px;
            right: 10px;
            color: #003569;
            font-size: 14px;
            text-decoration: none;
            font-family: 'Overpass Mono', monospace;
            letter-spacing: -1px;
        }

        .btn {
            width: 100%;
            background-color: #000;
            border: 1px solid #000;
            padding: 0.75em 1.2em;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            border-radius: 3px;
            margin-top: 1em;
        }

        .sub-content {
            width: 250px;
            height: 40%;
            margin: 10px auto;
            border: 1px solid #e6e6e6;
            padding: 20px 50px;
            background-color: #fff;
        }

        .s-part {
            text-align: center;
            font-family: 'Overpass Mono', monospace;
            word-spacing: -3px;
            letter-spacing: -2px;
            font-weight: normal;
        }

        .s-part a {
            text-decoration: none;
            cursor: pointer;
            color: #3897f0;
            font-family: 'Overpass Mono', monospace;
            word-spacing: -3px;
            letter-spacing: -2px;
            font-weight: normal;
        }

        .text-danger {
            color: red;
            font-size: 12px;
        }

    </style>
</head>

<body>
    <div id="wrapper">
        <div class="main-content">
            <div class="header">
                <h4>{{ config('APP_NAME', env('APP_NAME')) }}</h4>
            </div>
            <div class="l-part">
                <form method="POST" action="{{ route('authentication.login') }}">
                    @csrf
                    <input type="text" name="user_code" placeholder="User Code" class="input-1" />
                    <div class="overlap-text">
                        <input type="password" name="password" placeholder="Password" class="input-2" />
                    </div>
                    @if(session('error'))
                    <div class="text-danger">{{ session('error') }}</div>
                    @endif
                    <input type="submit" value="Log in" class="btn" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>