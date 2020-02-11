<?php
$domOBJ = new DOMDocument();
$domOBJ->load("https://app-xml.herokuapp.com/");

$content = $domOBJ->getElementsByTagName("item");

foreach ($content as $data) {

    $id = $data->getElementsByTagName("id")->item(0)->nodeValue;
    $username = $data->getElementsByTagName("username")->item(0)->nodeValue;
    $password = $data->getElementsByTagName("password")->item(0)->nodeValue;

    echo "
    <ul>
    <li>Id: <strong>$id</strong></li>
    <li>Username: <strong>$username</strong></li>
    <li>Password: <strong>$password</strong></li>
    </ul>";
}