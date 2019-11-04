<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page</title>
		<meta name="description" content="User login page" />
	</head>

	<body">
    <form method="post" action="index.php?model=login&method=login">
            username	<input type="text" name="username"   placeholder="Username" /><br/>
            password	<input type="password" name="password"   placeholder="Password" /><br/>
                <button type="submit">
                   Login
                </button>
    </form>
	</body>
</html>
