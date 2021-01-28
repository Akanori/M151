<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['name'];
        $klasse = $_POST['klasse'];
        if($username == ''){
            echo "Was trousch eig kei name azgä?";
        }else{
            echo "Hallo {$username} von der {$klasse}!";
        }
    }
?>

<form method="POST" action="?">
    <input type="text" name="name" placeholder="Benutzername">
    <select name="klasse">
    <option value="INF20s">INF20s</option>
    <option value="INF19s">INF19s</option>
    <option value="INF18s">INF18s</option>
    <option value="INF17s">INF17s</option>
  </select>
    <input type="submit" value="Absenden" />
</form>