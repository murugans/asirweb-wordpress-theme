<?php
if (function_exists('acf_add_local_field_group')):
acf_add_local_field_group([
    'key' => 'group_testimonial',
    'title' => 'Testimonial Details',
    'fields' => [
        [
            'key' => 'field_client_name',
            'label' => 'Client Name',
            'name' => 'client_name',
            'type' => 'text',
        ],
        [
            'key' => 'field_client_company',
            'label' => 'Company',
            'name' => 'client_company',
            'type' => 'text',
        ],
        [
            'key' => 'field_rating',
            'label' => 'Rating (1-5)',
            'name' => 'rating',
            'type' => 'number',
            'min' => 1,
            'max' => 5,
        ]
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'testimonial',
            ],
        ],
    ],
]);
endif;