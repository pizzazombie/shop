
<?php

function auth($login, $passwd)
{
	$path = "/private";
	$file_path = $path . "/passwd";
	if (!$login || !$passwd)
		return (false);
	
	$array = unserialize(file_get_contents($file_path));
	if ($array)
	{
		foreach ($array as $k => $v)
		{
			if ($v["login"] === $login && $v["passwd"] === hash("sha256", $passwd))
				return (true);
		}
	}
	echo "Пара логин/пароль не найдена\n";
	return (false);
}

session_start();
if ($_POST['login'] && $_POST['passwd'] && auth($_POST['login'], $_POST['passwd']))
{
	$_SESSION['loggued_on_user'] = $_POST['login'];
	echo "OK\n";
	header('Location: account.php');
}
else
{
	$_SESSION['loggued_on_user'] = "";
	echo "Неверный логин/пароль\n";
}
?>