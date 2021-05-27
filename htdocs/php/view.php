<?php
  $user = 'root';
  $password = getenv('MYSQL_ROOT_PASSWORD');
  $password = '';
  $dbName = 'chapter6_db';
  $dbServer = getenv('DB_SERVER');
  $host = 'mysql3:8889';
  $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
  #$dsn = "mysql:host={$host};port=8889;dbname={$dbName};charset=utf8mb4";
  #$dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>レコード一覧</title>
</head>
<body>
  <center>
    <div>
      <?php
      try{
        echo "0";
        echo "<br />";
        echo $dsn;
        echo "<br />";
        echo $user;
        echo "<br />";
        echo $password;
        echo "<br />";
        
        $pdo = new PDO( $dsn , $user , $password );
        echo "1";
        $pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES , false );
        $pdo->setAttribute( PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );
        $sql = "SELECT * FROM table1";
        $stm = $pdo->prepare( $sql );
        echo "2";
        $stm->execute();
        echo "3";
        $result = $stm->fetchAll( PDO::FETCH_ASSOC );
        echo "<table>";
        echo "<thead><tr>";
        echo "<th>" , "ID" , "</th>";
        echo "<th>" , "名前" , "</th>";
        echo "<th>" , "部署" , "</th>";
        echo "<th>" , "役職" , "</th>";
        echo "</tr></thead>";
        echo "<tbody>";
        foreach( $result as $row ){
          echo "<tr>";
          echo "<td>" , $row['id'] , "</td>";
          echo "<td>" , $row['name'] , "</td>";
          echo "<td>" , $row['dep'] , "</td>";
          echo "<td>" , $row['role'] , "</td>";
          echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
      } catch( Exception $e ) {
        echo "error";
        echo "<br />";
        echo $e->getMessage();
        echo "<br />";
        echo $dsn;
        echo "<br />";
        echo "<font size=5>" , "レコード一覧の取得に失敗しました" , "</font>";
        echo '<p><a href="../index.html">戻る</a></p>';
        exit();
      }
    ?>
    <hr>
    <p><a href="../index.html">戻る</a></p>
  </div>
  </center>
</body>
</html>
