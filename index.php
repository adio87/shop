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

//Заполнение таблицы im_orders
//$query = "INSERT INTO im_orders (prod_id, user_id, partn_id) VALUES ";
//for ($i = 1; $i <= 2000; $i++) {
//    $prod_id = rand(1, 2);
//    $user_id = rand(16001, 20000);
//    $partn_id = rand(0, 10);
//    $partn = ($partn_id == 0)?'NULL':$partn_id;
//    $q[] = "($prod_id, $user_id, $partn)";
//}
//$query .= implode(',', $q).";";

//Заполнение таблицы im_ug
//$query = "INSERT INTO im_ug (id, user_id, group_id) VALUES ";
//for ($i = 150001; $i <= 200000; $i++) {
//    $g = rand(1, 3);
//    for ($j = 1; $j <= $g; $j++) {
//        $l = rand(0, 1);
//        if ($l) {
//            $q[] = "(NULL, $i, $j)";
//        }
//    }
//}
//$query .= implode(',', $q).";";
//$stmt = $dbh->prepare($query);
//$stmt->execute();

//1.) Посчитать сколько товаров в штуках купили активные пользователи себе сами. Т.е необходимо получит ответ вида: " id пользователя, login пользователя, к-во покупок в штуках".
//$query = "SELECT im_users.id, im_users.login, COUNT(im_orders.prod_id) AS item_count FROM im_users LEFT OUTER JOIN im_orders ON (im_users.id=user_id) WHERE im_users.flag=1 AND im_orders.partn_id=0 GROUP BY im_users.id, im_users.login ORDER BY im_users.id, im_users.login;";

//2.) Посчитать то же, что и в п.1, только в деньгах. Т.е на какую сумму скупился каждый юзер.
//$query = "SELECT im_users.id, im_users.login, SUM(im_prod.price) AS total_price FROM im_users LEFT OUTER JOIN im_orders ON (im_users.id=user_id) LEFT OUTER JOIN im_prod ON (im_orders.prod_id=im_prod.id) WHERE im_users.flag=1 AND im_orders.partn_id=0 GROUP BY im_users.id, im_users.login ORDER BY im_users.id;";

//3.) Посчитать скольким пользователям купил товары каждый из партнеров. При этом - если партнер покупает товар одному и тому же пользователя дважды - это 1-на покупка.
//$query = "SELECT DISTINCT im_partn.id, im_partn.name, COUNT(im_orders.user_id) AS total_users FROM im_orders LEFT OUTER JOIN im_partn ON (im_orders.partn_id=im_partn.id) WHERE im_partn.id>0 GROUP BY im_partn.id, im_partn.name;";

//4.) Посчитать какую сумму потратил партнер на каждого пользователя.
//$query = "SELECT im_partn.id, im_partn.name, im_orders.user_id, SUM(im_prod.price) AS total_price FROM im_orders LEFT OUTER JOIN im_partn ON (im_orders.partn_id=im_partn.id) LEFT OUTER JOIN im_prod ON (im_orders.prod_id=im_prod.id) WHERE im_partn.id>0 GROUP BY im_partn.id, im_partn.name, im_orders.user_id ORDER BY im_orders.user_id;";

//5.) Посчитать сколько итого потратил каждый партнер.
//$query = "SELECT im_partn.id, im_partn.name, SUM(im_prod.price) AS total_price FROM im_orders LEFT OUTER JOIN im_partn ON (im_orders.partn_id=im_partn.id) LEFT OUTER JOIN im_prod ON (im_orders.prod_id=im_prod.id) WHERE im_partn.id>0 GROUP BY im_partn.id, im_partn.name;";

$dbh = null;



