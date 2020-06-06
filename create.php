<?php
if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK") {
    if (!file_exists('/private')) {
        mkdir("/private");
    }
    if (!file_exists('/private/passwd')) {
        file_put_contents('/private/passwd', null);
    }
    $account = unserialize(file_get_contents('/private/passwd'));
    if ($account) {
        $exist = 0;
        foreach ($account as $k => $v) {
            if ($v['login'] === $_POST['login'])
                $exist = 1;
        }
    }
    if ($exist == 1) {
        echo "Аккаунт с таким логином уже создан\n";
    }
    else {
        $tmp['login'] = $_POST['login'];
        $tmp['passwd'] = hash('sha256', $_POST['passwd']);
        if ($_POST['name'])
            $tmp['name'] = $_POST['name'];
        if ($_POST['last_name'])
        $tmp['last_name'] = $_POST['last_name'];
        $account[] = $tmp;
        file_put_contents('/private/passwd', serialize($account));
        
        $_SESSION['loggued_on_user'] = $_POST['login'];
        echo "Отлично, вы зарегистрированы! Сейчас вы будете перенаправлены на страницу своего аккаунта\n";
        
        header('Location: account.php');
        sleep(5);
    }
} else {
    echo "ERROR\n";
}
?>