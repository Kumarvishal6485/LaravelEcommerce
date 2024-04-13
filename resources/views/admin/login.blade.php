<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@700&family=Fira+Sans:wght@100;200&family=Sono&display=swap" rel="stylesheet">
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <form action="check_user" method="post">
            {{@csrf_field()}}
            <table>
                <tr>
                    <td id="login_heading">Login</td>
                </tr>
                <tr>
                    <td><input type="email" name="username" placeholder="Enter Email" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="Enter Password" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td><center><input type="submit" value="Login"></center></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>