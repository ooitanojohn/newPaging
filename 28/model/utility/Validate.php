<?php
// バリデーション
// 関数でもfilter~~使っている...プロパティ参照してvalidateしたい
class Validation
{
    protected array $post;
    // サニタイズ
    public function __construct()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->post = $post;
    }
    // ゲッター
    public function getPost()
    {
        return $this->post;
    }
    // 未入力チェック
    public function validateNull()
    {
        $args = [
            'name' =>
            [
                'filter' => FILTER_VALIDATE_BOOL,
                'flags' => FILTER_NULL_ON_FAILURE
            ],
            'loginId' =>
            [
                'filter' => FILTER_VALIDATE_BOOL,
                'flags' => FILTER_NULL_ON_FAILURE
            ],
            'password' =>
            [
                'filter' => FILTER_VALIDATE_BOOL,
                'flags' => FILTER_NULL_ON_FAILURE
            ],
            'mail' =>
            [
                'filter' => FILTER_VALIDATE_BOOL,
                'flags' => FILTER_NULL_ON_FAILURE
            ],
        ];
        return filter_input_array(INPUT_POST, $args);
    }

    public function validateMail()
    {
        return !filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
    }
}















function validate()
{
    $args = [
        'name' =>
        [
            'filter' => FILTER_VALIDATE_BOOL,
            'flags' => FILTER_NULL_ON_FAILURE
        ],
        'loginId' =>
        [
            'filter' => FILTER_VALIDATE_BOOL,
            'flags' => FILTER_NULL_ON_FAILURE
        ],
        'password' =>
        [
            'filter' => FILTER_VALIDATE_BOOL,
            'flags' => FILTER_NULL_ON_FAILURE
        ],
        'mail' =>
        [
            'filter' => FILTER_VALIDATE_BOOL,
            'flags' => FILTER_NULL_ON_FAILURE
        ],
    ];
    return filter_input_array(INPUT_POST, $args);
}

function validateMail()
{
    filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
}
