<?php
// 仮登録
class CreateUser extends CRUD
{
    public function __construct()
    {
        parent::__construct();
    }
    // hash
    public function hashed($val)
    {
        // ソルト
        $salt = bin2hex(random_bytes(5));
        // ストレッチング
        $cost = rand(1000, 10000);
        for ($i = 0; $i < $cost; $i++) {
            $val = md5($salt . $val);
        }
        $hashed = $val;
        return [$hashed, $salt, $cost];
    }
    // TempUserCreate
    public function createUser($name, $mail, $loginId, $password, $hashLoginId, $salt, $stretch)
    {
        $sql = 'INSERT INTO m_user(name, mail, login_id, password, hash_login_id, salt, stretch, user_state) VALUES (:name,:mail,:loginId,:password,:hashLoginId,:salt,:stretch,0)';
        $pdo = $this->link->prepare($sql);
        $pdo->bindValue(':name', $name, PDO::PARAM_STR);
        $pdo->bindValue(':mail', $mail, PDO::PARAM_STR);
        $pdo->bindValue(':loginId', $loginId, PDO::PARAM_STR);
        $pdo->bindValue(':password', $password, PDO::PARAM_STR);
        $pdo->bindValue(':hashLoginId', $hashLoginId, PDO::PARAM_STR);
        $pdo->bindValue(':salt', $salt, PDO::PARAM_STR);
        $pdo->bindValue(':stretch', $stretch, PDO::PARAM_INT);
        $pdo->execute();
    }

    public function entryMailSend($name, $mailAddress, $hashLoginId)
    {
        // *** 言語と文字コード設定 ***
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");
        // *** メールの情報を設定 ***
        $mailto = $mailAddress;
        $title = "仮登録が完了しました";
        $message = $name . "様<br>
        ご利用頂きありがとうございます。<br>
        本登録を完了する為に、以下のURLをクリックしてください<br>" .
            "<a href='" . BASE_URL . "28\main_entry.php?entryComplete=" . $hashLoginId . "'?></a>";
        $headers = "From:support@shoppies.jp";
        // *** メール送信 ***
        if (mb_send_mail($mailto, $title, $message, $headers)) {
            return true;
        } else {
            return false;
        }
    }
}




// 本登録
class resistUser extends CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function checkTempEntry($hashLoginId)
    {
        // 仮登録済みか
        $sql = 'SELECT id,name,salt,stretch FROM m_user WHERE :hashLoginId = hash_login_id';
        $pdo = $this->link->prepare($sql);
        $pdo->bindValue(':hashLoginId', $hashLoginId);
        $pdo->execute();
        return $pdo->fetch(PDO::FETCH_ASSOC);
    }

    public function checkPassword($id, $salt, $stretch)
    {
        $password = filter_input(INPUT_POST, 'password');
        for ($i = 0; $i < $stretch; $i++) {
            $password = md5($salt . $password);
        }
        $sql = 'SELECT * FROM m_user WHERE :id = id && :password = password';
        $pdo = $this->link->prepare($sql);
        $pdo->bindValue(':id', $id, PDO::PARAM_STR);
        $pdo->bindValue(':password', $password, PDO::PARAM_STR);
        $pdo->execute();
        return !empty($pdo->fetch(PDO::FETCH_ASSOC));
    }

    /**
     * ファイルアップロード
     * 引数 $FILESの 一時保存dir 保存先dir+ファイル保存名
     * @return boolean
     */
    public function uploadFile($id)
    {
        // フォルダ存在しなければ作成
        if (!file_exists('images/user/' . $id)) {
            mkdir('images/user/' . $id);
        }
        // jpgであれば保存
        $ext = str_replace('image/', '', $_FILES['file']['type']);
        if ($ext === 'jpeg') {
            $ext = 'jpg';
        }
        if ($ext == 'jpg') {
            return move_uploaded_file($_FILES['file']['tmp_name'], 'images/user/' . $id . '/' . $_FILES['file']['name']);
        } else {
            return false;
        }
    }
    /**
     * サムネイル作成
     * 引数 ファイル名 , 元画像dir, 保存先dir, 画像サイズ
     * @param int $img_size
     * @param int $thumb_width, $thumb_height
     * @return boolean $boolean
     */
    public function imgCompress($id)
    {
        if ($_FILES['file']['error'] == 0) {
            // ※1 画像サイズを取得 + dir指定
            $img_size = getimagesize('images/user/' . $id . '/' . $_FILES['file']['name']);
            // ※2 圧縮比率 h×w $height:$width + hxw指定
            $height = 70;
            $width = 60;
            if ($img_size[1] / $height > $img_size[0] / $width) {
                $thumb_width = $img_size[0] / ($img_size[1] / $height);
                $thumb_height = $img_size[1] / ($img_size[1] / $height);
            } else {
                $thumb_height = $img_size[1] / ($img_size[0] / $width);
                $thumb_width = $img_size[0] / ($img_size[0] / $width);
            }
            // 拡張子によって圧縮方法変更
            $ext = str_replace('image/', '', $_FILES['file']['type']);
            if ($ext === 'jpeg') {
                $ext = 'jpg';
            }
            switch ($ext) {
                case 'jpg':
                    $img_in = imagecreatefromjpeg('images/user/' . $id . '/' . $_FILES['file']['name']);
                    break;
                case 'png':
                    //◎画像ファイルのコピーおよび画像ファイルの縮小拡大(png)
                    $img_in = imagecreatefrompng('images/user/' . $id . '/' . $_FILES['file']['name']);
                    break;
                case 'gif':
                    $img_in = imagecreatefromgif('images/user/' . $id . '/' . $_FILES['file']['name']);
                    break;
                default:
                    break;
            }
            $img_out = ImageCreateTruecolor(intval($thumb_width), intval($thumb_height));
            // pngのみ透過等がある為設定
            if ($ext === 'png') {
                imagealphablending($img_out, false);
                imagesavealpha($img_out, true);
            }
            ImageCopyResampled($img_out, $img_in, 0, 0, 0, 0, $thumb_width, $thumb_height, $img_size[0], $img_size[1]);
            //画像ファイルの書き出し + dir指定
            switch ($ext) {
                case 'jpg':
                    $boolean = Imagejpeg($img_out, 'images/user/' . $id . '/thumb_' . $_FILES['file']['name']);
                    break;
                case 'png':
                    $boolean = Imagepng($img_out, 'images/user/' . $id . '/thumb_' . $_FILES['file']['name']);
                    break;
                case 'gif':
                    $boolean = Imagegif($img_out, 'images/user/' . $id . '/thumb_' . $_FILES['file']['name']);
                    break;
                default:
                    break;
            }
            //◎画像加工を行った後は、メモリを開放すること
            ImageDestroy($img_in);
            ImageDestroy($img_out);
            return $boolean;
        } else {
            return false;
        }
    }

    public function resistUser($id)
    {
        $sql = 'UPDATE m_user SET user_state = 1,file_name = :fileName WHERE :id = id';
        $pdo = $this->link->prepare($sql);
        $pdo->bindValue(':id', $id);
        $pdo->bindValue(':fileName', $_FILES['file']['name']);
        return $pdo->execute();
    }
}
