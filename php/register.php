<head>
<link rel="stylesheet" href="loginStyle.css">
<title>Register</title>
</head>

    <form method="post" action="procregister.php">

        <label for="name">USERNAME</label>
        <br>
        <input type="text" name="username" size="20">

        <br>
        <br>

        <label for="password_hash">PASSWORD</label>
        <br>
        <input type="text" name="password_hash" size="20">

        <br>
        <br>

        <label for="email">EMAIL</label>
        <br>
        <input type="email" name="email" size="20">

        <br>
        <br>

        <input type="submit" value="REGISTER" name="btnsubmit">
    </form>