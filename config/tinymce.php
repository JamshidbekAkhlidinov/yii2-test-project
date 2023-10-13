<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 10 2023 19:16:30
 *   https://github.com/JamshidbekAkhlidinov
 */

return [
    'plugins' => [
        'anchor', 'charmap', 'code', 'help', 'hr',
        'image', 'link', 'lists', 'media', 'paste',
        'searchreplace', 'table',
    ],
    'height' => 500,
    'convert_urls' => false,
    'element_format' => 'html',
    'image_caption' => true,
    'keep_styles' => false,
    'paste_block_drop' => true,
    'table_default_attributes' => new yii\web\JsExpression('{}'),
    'table_default_styles' => new yii\web\JsExpression('{}'),
    'invalid_elements' => 'acronym,font,center,nobr,strike,noembed,script,noscript',
    'extended_valid_elements' => 'strong/b,em/i,table[style]',
    // elFinder file manager https://github.com/alexantr/yii2-elfinder
    'file_picker_callback' => alexantr\elfinder\TinyMCE::getFilePickerCallback(['elfinder/tinymce']),
];