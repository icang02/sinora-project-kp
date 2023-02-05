<?php

return [
    'mode'                       => '',
    'format'                     => 'A4',
    'default_font_size'          => '11',
    'default_font'               => 'serif',
    'margin_left'                => 17,
    'margin_right'               => 17,
    'margin_top'                 => 16,
    'margin_bottom'              => 16,
    'margin_header'              => 0,
    'margin_footer'              => 0,
    'orientation'                => 'P',
    'title'                      => 'Laravel mPDF',
    'author'                     => '',
    'watermark'                  => '',
    'show_watermark'             => false,
    'show_watermark_image'       => false,
    'watermark_font'             => 'serif',
    'display_mode'               => 'fullpage',
    'watermark_text_alpha'       => 0.1,
    'watermark_image_path'       => '',
    'watermark_image_alpha'      => 0.2,
    'watermark_image_size'       => 'D',
    'watermark_image_position'   => 'P',
    'custom_font_dir'            => '',
    'custom_font_data'           => [],
    'auto_language_detection'    => false,
    'temp_dir'                   => storage_path('app'),
    'pdfa'                       => false,
    'pdfaauto'                   => false,
    'use_active_forms'           => false,

    'custom_font_dir'  => base_path('resources/fonts/'), // don't forget the trailing slash!
    'custom_font_data' => [
        'times-new-roman' => [ // must be lowercase and snake_case
            'R'  => 'times-new-roman.ttf',    // regular font
            'B'  => 'times-new-roman-bold.ttf',       // optional: bold font
            'I'  => 'times-new-roman-italic.ttf',     // optional: italic font
            'BI' => 'times-new-roman-bold-italic.ttf' // optional: bold-italic font
        ],
        'helvetica' => [ // must be lowercase and snake_case
            'R'  => 'Helvetica.ttf',    // regular font
            'B'  => 'Helvetica-Bold.ttf',       // optional: bold font
        ]
    ]
];
