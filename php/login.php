<head>
<title>Login</title>
</head>

    <body>

        <form method="post" action="proclogin.php">

            <label for="name">USERNAME</label>
            <input type="text" name="username" size="20" required>

            <br>
            <br>

            <label for="password">PASSWORD</label>
            <input type="password" name="password" size="20" required>

            <br>

            <input type="submit" value="LOGIN" name="btnsubmit">

            <input type="button" onclick="window.location.href='register.php';" value="REGISTER">
        </form>

    </body>

