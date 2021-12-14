<?php

/**
 * ハッシュ化 md5でソルト,ストレチングランダム
 * @param string $val ハッシュ化したい値
 * @return string $hashed ハッシュ化された値
 * @return string $salt 使用したソルト
 * @return int $cost ストレッチング
 */
function hashed($val)
{
    // ソルト
    $salt = uniqid();
    // ストレッチング
    $cost = rand(1000, 10000);
    for ($i = 0; $i < $cost; $i++) {
        $val = md5($salt . $val);
    }
    $hashed = $val;
    return [$hashed, $salt, $cost];
}
