<h1>投稿</h1>
<?php
if($errorData->hasError()) {
    $errors = $errorData->getAllErrors();
    echo '<div class="errorMessage">';
    foreach($errors as $error) {
        echo $error . '<br/>';
    }
    echo '</div>';
}
?>
<form action="index.php" method="post">
    <table>
        <tr>
            <th>名前</th>
            <td>
                <input type="text" name="name">
            </td>
        </tr>
        <tr>
            <th>コメント</th>
            <td>
                <input type="text" name ="comment">
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="送信"></td>
        </tr>
    </table>
    <input type="hidden" name="action" value="register" />
</form>
<hr/>
<?php
$posts = $data->getPosts();
foreach($posts as $post) {
    echo '<div>' . $post['name'] . '</div>';
    echo '<div>' . $post['comment'] . '</div>';
    echo '<hr/>';
}