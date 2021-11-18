<?php

if (function_exists('register_block_pattern_category')) {
    register_block_pattern_category(
        'patagonia',
        array( 'label' => __('Patagonia', 'patagonia'))
    );
}

add_action(
    'init',
    function () {
        $fields = glob(get_template_directory() . '/block-patterns/*.html', GLOB_BRACE);

        array_map(
            function ($field) {
                $file_headers = get_file_data($field, [
                    'title'       => 'Title',
                    'description' => 'Description',
                    'categories'  => 'Categories',
                ]);

                $slug = basename($field);

                ob_start();
                
                $fileStr = file_get_contents($field);
                $result = explode('<start-pattern>', $fileStr);
                echo $result[1];

                $content = ob_get_contents();
                ob_end_clean();

                // Set up block data for registration
                $data = [
                    'title' => $file_headers['title'],
                    'categories' => $file_headers['categories'],
                    'description' => $file_headers['categories'],
                    'content' => $content,
                ];

                //register
                register_block_pattern(
                    'patagonia/' . $slug,
                    array(
                        'title'       => $data['title'],
                        'description' => $data['description'],
                        'categories'  => array($data['categories']),
                        'content'     => $data['content'],
                    )
                );
            },
            $fields
        );
    },
    2
);
