
<?php

require_once __DIR__ . '/../autoload.php';

session_start();

$_SESSION['old'] = [
    'company_name'          => 'The Great Falcon',
    'phone'                 => '123123123',
    'providing_type_id'     => '1',
    'country'               => 'Sky',
    'city'                  => 'AnySky',
    'address'               => 'Somewhere in the cloud',
    'facebook'              => 'https://www.facebook.com/fALCON/',
    'twitter'               => 'https://twitter.com/falconandwinter',
    'linkedin'              => 'https://www.linkedin.com/company/falconio/',
    'instagram'             => 'https://www.instagram.com/falconio',
    'cover_image'           => 'https://images.unsplash.com/photo-1486122676632-ad1b5681fe33?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1176&q=80',
    'main_title'            => 'The place where Falcon arise',
    'main_subtitle'         => 'The quality of decision is like the well-timed swoop of a falcon',
    'main_description'      => 'Be extremely subtle, even to the point of formlessness. Be extremely mysterious, even to the point of soundlessness. Thereby you can be the director of the opponent\'s fate.',
    'contact_description'   => 'Be motivated like the falcon, hunt gloriously. Be magnificent as the leopard, fight to win. Spend less time with nightingales and peacocks. One is all talk, the other only color.',
    'cards' => [
        0 => [
                'card_image' => 'https://picsum.photos/id/3/600/400',
                'card_title' => 'Beautiful wings',
                'card_description' => 'Be extremely subtle, even to the point of formlessness. Be extremely mysterious, even to the point of soundlessness. Thereby you can be the director of the opponent\'s fate.'
        ],
        1 => [
                'card_image' => 'https://picsum.photos/id/13/600/400',
                'card_title' => 'Captive Legs',
                'card_description' => 'It\'s not an easy thing to captive-breed a falcon. You need to take extreme care of its diet and exercise and keep it close to its natural environment. Whenever the birds take ill, I only use Ayurveda to cure them.'
        ],
        2 => [
                'card_image' => 'https://picsum.photos/id/12/600/400',
                'card_title' => 'Speed Of Light',
                'card_description' => 'It was so emotional to step onto the Millennium Falcon set because that was the play set we all had when we were kids. Suddenly, you were standing in the real thing. There\'s this rush of unreality about it.'
        ],
    ]

];

redirectTo(route('createWebsite'));