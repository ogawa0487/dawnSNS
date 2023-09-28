
<?php
require_once("common.php");
    if (isset($_POST["search"])) {
        $sql = "SELECT * FROM users WHERE username LIKE :name order by id desc";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":name", "%" . h($_POST["search"]) . "%", PDO::PARAM_STR);
    } else {
        $sql = "SELECT * from users order by id asc";
        $stmt = $pdo->prepare($sql);
    }

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
        <!-- fontawesome -->
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="js/base.js"></script>
        <title>3章CRUD実装-課題-</title>
    </head>

    <body>
        <header>
            <div class="icon">
                <a href="#">
                    <img src="./img/DAWN_icon.png" alt="icon">
                </a>
            </div>
            <h1>リストの表示<br><span class="sub">-list-</span></h1>
        </header>
        <div id="content">
            <div class="create_btn">
                <button>
                    <a href="create_form.html"><i class="fas fa-plus-circle"> 新規登録はこちら</i></a>
                </button>
            </div>
            <form action="list.php" method="post">
                <input type="text" name="search" placeholder="ユーザー名で検索">
                <input type="submit" name="submit" value="送信">
            </form>
                <table style="border-collapse: separate">
                        <tr>
                            <th class="id">ID</th>
                            <th class="name">NAME</th>
                            <th class="mail">MAIL</th>
                            <th class="up">EDIT</th>
                            <th class="dele">DELETE</th>
                        </tr>
                    <?php foreach ($result as $list) { ?>
                        <tr>
                            <tr>
    <td class="id"><?php echo h($list["id"]); ?></td>
    <td class="name"><?php echo h($list["username"]); ?></td>
    <td class="mail"><?php echo h($list["mail"]); ?></td>
                            <td class="up">
                                    <a href="update_form.php?id=<?php echo htmlspecialchars($list["id"]); ?>">
                                    <i class="fas fa-file-alt"></i>
                                </a>
                            </td>
                            <td class="dele">
  <a href="delete.php?id=<?php echo htmlspecialchars($list["id"]); ?>" onclick="return confirm('このレコードを削除します。よろしいでしょうか？')">
    <i class="fas fa-trash-alt"></i>
  </a>
</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

    </body>

</html>
