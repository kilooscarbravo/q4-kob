<?php include "connect.php";

$keyword = $_GET["keyword"];

$stmt = $pdo->prepare("SELECT * FROM member WHERE username LIKE :keyword");
$stmt->execute(['keyword' => '%' . $keyword . '%']);
$row = $stmt->fetch();

if ($row) {
?>
    <div>
        <?php if (!empty($row["mphoto"]) && file_exists('../../csShop/' . $row["mphoto"])): ?>
            <img src='../../csShop/<?= htmlspecialchars($row["mphoto"]) ?>' width='200' >
        <?php else: ?>
            <img src='../../csShop/mphoto/default.jpg' width='200' >
        <?php endif; ?>
    </div>

    <div style="padding: 15px">
        <h2><?= htmlspecialchars($row["name"]) ?></h2>
        Address: <?= htmlspecialchars($row["address"]) ?><br>
        Tel.: <?= htmlspecialchars($row["mobile"]) ?><br>
        Email: <?= htmlspecialchars($row["email"]) ?><br>
    </div>
<?php
} else {
    echo "<p>No member found with that username.</p>";
}
?>