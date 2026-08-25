<?php
return [
    'required' => ':attributeは必須です。',
    'url' => ':attributeは正しいURL形式で入力してください。',
    'email' => ':attributeはメールアドレスの形式で入力してください。',
    'max' => [
        'string' => ':attributeは:max文字以内で入力してください。',
    ],
    'min' => [
        'string' => ':attributeは:min文字以上で入力してください。',
    ],
    'unique' => ':attributeはすでに存在しています。',
    'confirmed' => ':attributeと確認用の入力が一致しません。',

    'attributes' => [
        'title' => 'タイトル',
        'url' => 'URL',
        'description' => '備考',
        'tags' => 'タグ',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'name' => '名前',
    ],
];
