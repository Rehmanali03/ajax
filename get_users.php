<?php
include 'conn.php';
$user_q = "SELECT * from users;";
$user_res = mysqli_query($con, $user_q);
while ($user_row = mysqli_fetch_assoc($user_res)) {
?>
    <tr>
        <td><?= $user_row["id"] ?></td>
        <td><?= $user_row["name"] ?></td>
        <td><?= $user_row["email"] ?></td>
        <td><?= $user_row["password"] ?></td>
    </tr>
<?php
}
?>