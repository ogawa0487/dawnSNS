<?php
require_once("common.php");
$id = intval($_GET["id"]);
$sql = "select * from users where id = :id";
$stmt =  $pdo->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="CSS/reset.css">
  <link rel="stylesheet" href="CSS/style.css">
  <link rel="stylesheet" href="CSS/responsive.css">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>3章CRUD実装-課題-</title>
</head>

<body>
  <header>
    <div class="icon">
      <a href="list.php">
        <img src="./img/DAWN_icon.png" alt="icon">
      </a>
    </div>
    <h1><br>リストの更新<br><span class="sub">-update-</span></h1>
  </header>
  <div id="content">
    <form action="update.php" method="post" onsubmit="return check()" id="content">
      <h2><span class="strong">「ID：<span class="orange"><?php echo h($id); ?></span>」の登録情報を以下の内容に変更します。</h2>
      <div class="form_input">
        <div class="username">
          <label>ユーザー名</label>
          <input type="text" name="username" value="<?php echo h($result[0]["username"]); ?>">
        </div>
        <div class="mail">
          <label>メールアドレス</label>
          <input type="mail" name="mail" value="<?php echo h($result[0]["mail"]); ?>">
          <input type="hidden" name="id" value="<?php echo h($id); ?>">
        </div>
      </div>
      <div class="form_btn">
        <div class="form_return_btn">
          <p class="return"><a href="list.php">リスト表に戻る</a></p>
        </div>
        <div class="form_create_btn">
          <input type="submit" value="更新する" >
        </div>
      </div>
    </form>
  </div>
  <script type="text/javascript">
    function check() {
      if (window.confirm('登録をしてよろしいですか？')) { // 確認ダイアログを表示
        // 「OK」時は送信を実行
        return true;
      } else { // 「キャンセル」時の処理
        window.alert('登録がキャンセルされました'); // 警告ダイアログを表示
        // 送信を中止
        return false;
      }
    }
  </script>
</body>
</html>
