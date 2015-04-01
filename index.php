<?php

$db_hostname = 'localhost';
$db_database = 'im_market_db';
$db_username = 'root';
$db_password = '1111';

try {
    $dbh = new PDO("mysql:host=$db_hostname;dbname=$db_database", $db_username, $db_password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateRandomDate($y = 2012, $v = 1) {
    $year = $y + rand(0, $v);
    $month = rand(1, 12);
    $day = rand(1, 28);
    $hour = rand(0, 11);
    $minut = rand(0, 59);
    $result = date("Y-m-d H:i", mktime($hour, $minut, 0, $month, $day, $year));
    return $result;
}

//$stmt = $dbh -> prepare("INSERT INTO im_users (id, login, password, date_reg, date_last, ip, flag) VALUES (NULL, :login, :password, :date_reg, :date_last, :ip, :flag);");
//$stmt->bindParam(':login', $login);
//$stmt->bindParam(':password', $pass);
//$stmt->bindParam(':date_reg', $dreg);
//$stmt->bindParam(':date_last', $dlast);
//$stmt->bindParam(':ip', $ip);
//$stmt->bindParam(':flag', $flag);
//$login = 'adio4';
//$pass = '4444';
//$dreg = '2015-01-05 10:00';
//$dlast = '2015-05-01 11:00';
//$ip = '127.0.0.1';
//$flag = 0;

//$stmt->execute();

//echo $dbh ->lastInsertId();
//echo $stmt->queryString;

// Заполнение таблицы im_group
//$stmt = $dbh->prepare("INSERT INTO im_group (id, name) VALUES (NULL, 'Temp'), (NULL, 'Regular'), (NULL, 'Editors'), (NULL, 'Admin');");

// Заполнение таблицы im_partn
//$stmt = $dbh->prepare("INSERT INTO im_partn (id, name) VALUES (NULL, 'SAMSUNG'), (NULL, 'LG'), (NULL, 'KIA'), (NULL, 'HYUNDAI'), (NULL, 'HUAWEI'), (NULL, 'FILA'), (NULL, 'SONY'), (NULL, 'CANON'), (NULL, 'NIKON'), (NULL, 'HONDA');");

// Заполнение таблицы im_prod
//$stmt = $dbh->prepare("INSERT INTO im_prod (id, name, price) VALUES (NULL, 'car', '5000'), (NULL, 'tablet', '100.00')");

//$stmt->execute();

//$query = "INSERT INTO im_users (id, login, password, date_reg, date_last, ip, flag) VALUES ";
//$count = 1;
//for ($i=0; $i<=9; $i++) {
//    for ($j=1; $j<=2000; $j++) {
//        $login = generateRandomString(10);
//        $pass = generateRandomString(4);
//        $dreg = generateRandomDate();
//        $dlast = generateRandomDate(2014, 0);
//        $ip = ip2long("127.".$count.".0.1");
//        $flag = rand(0, 1);
//        $q[] = "(NULL, '$login', '$pass', '$dreg', '$dlast', $ip, $flag)";
//    }
//    $count++;
//}
//$query .= implode(',', $q).";";

//Заполнение таблицы im_prod

//$stmt = $dbh->prepare($query);
//$r = $stmt->execute();

$dbh = null;



