<?php

/*
|--------------------------------------------------------------------------
| CMS Sidebar Navigation
|--------------------------------------------------------------------------
|
| Each section has groups; each group has children of [label, route name].
| A child may also list `also` patterns (e.g. edit pages) that should keep
| it highlighted. A `heading` child renders as a sub-heading.
|
*/

return [
    [
        'label' => 'Individual',
        'groups' => [
            [
                'label' => 'Homepage',
                'icon' => 'home',
                'children' => [
                    ['label' => 'Header', 'route' => 'home-header'],
                    ['label' => 'Section 1', 'route' => 'home-sec1'],
                    ['label' => 'Section 2', 'route' => 'home-sec2'],
                ],
            ],
            [
                'label' => 'About Page',
                'icon' => 'info',
                'children' => [
                    ['label' => 'Header', 'route' => 'about-header'],
                    ['label' => 'Section 1', 'route' => 'about-sec1'],
                    ['label' => 'Section 2', 'route' => 'about-sec2'],
                    ['label' => 'Section 3', 'route' => 'about-sec3'],
                    ['label' => 'Section 4', 'route' => 'about-sec4'],
                    ['label' => 'Board of Directors', 'route' => 'about-sec5', 'also' => ['about-create-bod', 'about-sec5-edit']],
                    ['label' => 'Executive Members', 'route' => 'executive-table', 'also' => ['create-executive-member', 'edit-executive-member']],
                ],
            ],
            [
                'label' => 'Products & Solutions',
                'icon' => 'cubes',
                'children' => [
                    ['label' => 'Header', 'route' => 'pns-header'],
                    ['label' => 'Section 1', 'route' => 'pns-sec1'],
                    ['label' => 'Section 2', 'route' => 'pns-sec2'],
                    ['heading' => 'Motor Insurance'],
                    ['label' => 'Header', 'route' => 'pns-motor-header'],
                    ['label' => 'Page', 'route' => 'pns-motor'],
                    ['label' => 'Benefits', 'route' => 'pns-motor-benefits'],
                    ['heading' => 'Travel Insurance'],
                    ['label' => 'Header', 'route' => 'pns-travel-header'],
                    ['label' => 'Page', 'route' => 'pns-travel'],
                    ['label' => 'Benefits', 'route' => 'pns-travel-benefits'],
                    ['heading' => 'Home Insurance'],
                    ['label' => 'Header', 'route' => 'pns-house-header'],
                    ['label' => 'Page', 'route' => 'pns-house-insurance'],
                    ['label' => 'Benefits', 'route' => 'pns-home-benefits'],
                ],
            ],
            [
                'label' => 'Insights',
                'icon' => 'bulb',
                'children' => [
                    ['label' => 'All Blogs', 'route' => 'blogs-all', 'also' => ['edit-blog']],
                    ['label' => 'Add New Blog', 'route' => 'add-blog'],
                ],
            ],
            [
                'label' => 'Careers',
                'icon' => 'briefcase',
                'children' => [
                    ['label' => 'Header', 'route' => 'careers-header'],
                    ['label' => 'Section 1', 'route' => 'careers-section1'],
                    ['label' => 'Section 2', 'route' => 'careers-section2'],
                    ['label' => 'Section 3', 'route' => 'careers-section3'],
                ],
            ],
            [
                'label' => 'Contact',
                'icon' => 'mail',
                'children' => [
                    ['label' => 'Header', 'route' => 'contact-header'],
                    ['label' => 'Contact Details', 'route' => 'contact-details'],
                ],
            ],
        ],
    ],
    [
        'label' => 'Institute',
        'groups' => [
            [
                'label' => 'Products & Solutions',
                'icon' => 'building',
                'children' => [
                    ['label' => 'Header', 'route' => 'institute-pns-header'],
                    ['label' => 'Section 1', 'route' => 'institute-pns-section1'],
                    ['label' => 'Section 2', 'route' => 'institute-pns-section2'],
                    ['heading' => 'Motor Insurance'],
                    ['label' => 'Header', 'route' => 'institute-pns-motor-header'],
                    ['label' => 'Page', 'route' => 'institute-pns-motor-page'],
                    ['label' => 'Benefits', 'route' => 'institute-pns-motor-benefits'],
                    ['heading' => 'Engineering Insurance'],
                    ['label' => 'Header', 'route' => 'institute-pns-engineering-header'],
                    ['label' => 'Page', 'route' => 'institute-pns-engineering-page'],
                    ['label' => 'Benefits', 'route' => 'institute-pns-engineering-benefits'],
                    ['heading' => 'Marine Insurance'],
                    ['label' => 'Header', 'route' => 'institute-pns-marine-header'],
                    ['label' => 'Page', 'route' => 'institute-pns-marine-page'],
                    ['label' => 'Benefits', 'route' => 'institute-pns-marine-benefits'],
                ],
            ],
        ],
    ],
];
