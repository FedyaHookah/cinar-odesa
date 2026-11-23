<?php
// Меню ресторану Çinar. Усі тексти: [українською, англійською].
//
// Страва:
//   'img' => назва файлу без розширення. Фото лежить у assets/img/menu/<img>.jpg
//            (підходить також .jpeg, .webp, .png). Щоб замінити тестове фото на справжнє,
//            просто збережіть своє з тією самою назвою.
//   'n' назва, 'p' ціна, 'w' вага (одиниці перекладаються автоматично),
//   'd' опис (необов'язково).
//   'c' склад: [українською, англійською] (необов'язково). Показується під назвою як «Склад: …».
// Сет: замість 'w' вказується 'inc', тобто склад, та 'extra' для соусів.
//   'inc' => [ ['g' => [заголовок групи] або null, 'l' => [ [[назва], кількість порцій], ... ]], ... ]

return [

    [
        'id' => 'baranina', 'title' => ['Баранина', 'Lamb'], 'note' => null,
        'items' => [
            ['img' => 'baranina-kare',          'n' => ['Баранина каре', 'Lamb rack'],            'p' => 540, 'w' => '300 г',
              'c' => ['Каре ягняти на кістці, спеції, сіль', 'Rack of lamb on the bone, spices, salt']],
            ['img' => 'baranina-lyulya-kebab',  'n' => ['Баранина люля-кебаб', 'Lamb lula kebab'], 'p' => 250, 'w' => '250 г',
              'c' => ['Фарш із баранини, цибуля, спеції, сіль', 'Minced lamb, onion, spices, salt']],
            ['img' => 'baranina-semechki',      'n' => ['Баранина «семечки»', 'Lamb "semechki"'],  'p' => 300, 'w' => '300 г',
              'c' => ['Баранина, спеції, сіль', 'Lamb, spices, salt']],
            ['img' => 'baranina-myakot',        'n' => ['Баранина м\'якоть', 'Lamb boneless'], 'p' => 450, 'w' => '300 г',
              'c' => ['Баранина без кістки, цибуля, спеції, сіль', 'Boneless lamb, onion, spices, salt']],
        ],
    ],

    [
        'id' => 'telyatina', 'title' => ['Телятина', 'Veal'], 'note' => null,
        'items' => [
            ['img' => 'telyatina-myakot',       'n' => ['Телятина м\'якоть', 'Veal boneless'], 'p' => 450, 'w' => '300 г',
              'c' => ['Телятина без кістки, цибуля, спеції, сіль', 'Boneless veal, onion, spices, salt']],
            ['img' => 'telyatina-stejk',        'n' => ['Телятина стейк', 'Veal steak'],           'p' => 350, 'w' => '300 г',
              'c' => ['Телятина, спеції, сіль', 'Veal, spices, salt']],
            ['img' => 'telyatina-lyulya-kebab', 'n' => ['Телятина люля-кебаб', 'Veal lula kebab'], 'p' => 230, 'w' => '250 г',
              'c' => ['Фарш із телятини, цибуля, спеції, сіль', 'Minced veal, onion, spices, salt']],
        ],
    ],

    [
        'id' => 'svinina', 'title' => ['Свинина', 'Pork'], 'note' => null,
        'items' => [
            ['img' => 'svinina-shyya',          'n' => ['Свинина шия', 'Pork neck'],               'p' => 360, 'w' => '350 г',
              'c' => ['Свиняча шия, цибуля, спеції, сіль', 'Pork neck, onion, spices, salt']],
            ['img' => 'svinina-rebra',          'n' => ['Свинина ребра', 'Pork ribs'],             'p' => 300, 'w' => '300 г',
              'c' => ['Свинячі ребра, спеції, сіль', 'Pork ribs, spices, salt']],
            ['img' => 'svinina-stejk',          'n' => ['Свинина стейк', 'Pork steak'],            'p' => 270, 'w' => '300 г',
              'c' => ['Свинина, спеції, сіль', 'Pork, spices, salt']],
            ['img' => 'svinina-lyulya-kebab',   'n' => ['Свинина люля-кебаб', 'Pork lula kebab'],  'p' => 220, 'w' => '250 г',
              'c' => ['Фарш зі свинини, цибуля, спеції, сіль', 'Minced pork, onion, spices, salt']],
        ],
    ],

    [
        'id' => 'kurka', 'title' => ['Курка', 'Chicken'], 'note' => null,
        'items' => [
            ['img' => 'kurka-file',             'n' => ['Куряче філе', 'Chicken fillet'],          'p' => 240, 'w' => '300 г',
              'c' => ['Куряче філе, цибуля, спеції, сіль', 'Chicken fillet, onion, spices, salt']],
            ['img' => 'kurka-lyulya-kebab',     'n' => ['Курячий люля-кебаб', 'Chicken lula kebab'], 'p' => 200, 'w' => '250 г',
              'c' => ['Курячий фарш, цибуля, спеції, сіль', 'Minced chicken, onion, spices, salt']],
            ['img' => 'kurka-krylcya',          'n' => ['Курячі крильця', 'Chicken wings'],        'p' => 210, 'w' => '300 г',
              'c' => ['Курячі крильця, спеції, сіль', 'Chicken wings, spices, salt']],
            ['img' => 'kurka-stehno',           'n' => ['Куряче стегно', 'Chicken thigh'],         'p' => 240, 'w' => '300 г',
              'c' => ['Куряче стегно, цибуля, спеції, сіль', 'Chicken thigh, onion, spices, salt']],
        ],
    ],

    [
        'id' => 'ryba', 'title' => ['Риба', 'Fish'], 'note' => ['На мангалі', 'Charcoal-grilled'],
        'items' => [
            ['img' => 'skumbriya-z-ovochamy',   'n' => ['Скумбрія з овочами на мангалі', 'Grilled mackerel with vegetables'], 'p' => 360, 'w' => '300 г',
              'c' => ['Скумбрія, овочі на мангалі, лимон, спеції', 'Mackerel, grilled vegetables, lemon, spices']],
            ['img' => 'skumbriya',              'n' => ['Скумбрія на мангалі', 'Grilled mackerel'], 'p' => 240, 'w' => '300 г',
              'c' => ['Скумбрія, лимон, спеції, сіль', 'Mackerel, lemon, spices, salt']],
            ['img' => 'somga',                  'n' => ['Сьомга на мангалі', 'Grilled salmon'],    'p' => 500, 'w' => '250 г',
              'c' => ['Сьомга, лимон, спеції, сіль', 'Salmon, lemon, spices, salt']],
            ['img' => 'dorado',                 'n' => ['Дорадо на мангалі', 'Grilled dorado'],    'p' => 350, 'w' => '250 г',
              'c' => ['Дорадо, лимон, спеції, сіль', 'Dorado, lemon, spices, salt']],
        ],
        // Друга ціна з вашого повідомлення (потрібно уточнити, яка діє):
        //   скумбрія з овочами 300 г: 450 · скумбрія 300 г: 300 · сьомга 300 г: 450 · дорадо 250 г: 300
    ],

    [
        'id' => 'sadzh', 'title' => ['Саджі', 'Saj'], 'note' => null,
        'items' => [
            ['img' => 'sadzh-kurka',            'n' => ['Садж з куркою', 'Saj with chicken'],      'p' => 450, 'w' => '500 г',
              'c' => ['Курка, картопля, баклажан, помідор, солодкий перець, цибуля', 'Chicken, potato, eggplant, tomato, sweet pepper, onion']],
            ['img' => 'sadzh-baranina',         'n' => ['Садж з бараниною', 'Saj with lamb'],      'p' => 600, 'w' => '600 г',
              'c' => ['Баранина, картопля, баклажан, помідор, солодкий перець, цибуля', 'Lamb, potato, eggplant, tomato, sweet pepper, onion']],
            ['img' => 'sadzh-telyatina',        'n' => ['Садж з телятиною', 'Saj with veal'],      'p' => 550, 'w' => '600 г',
              'c' => ['Телятина, картопля, баклажан, помідор, солодкий перець, цибуля', 'Veal, potato, eggplant, tomato, sweet pepper, onion']],
        ],
    ],

    [
        'id' => 'garniry', 'title' => ['Овочі та гарніри', 'Vegetables and sides'], 'note' => null,
        'items' => [
            ['img' => 'ovochi-mangal',          'n' => ['Овочі на мангалі', 'Grilled vegetables'], 'p' => 180, 'w' => '300 г',
              'c' => ['Баклажан, помідор, солодкий перець, цибуля', 'Eggplant, tomato, sweet pepper, onion']],
            ['img' => 'suluguni-lavash',        'n' => ['Сулугуні в лаваші на мангалі', 'Grilled suluguni in lavash'], 'p' => 150, 'w' => '200 г',
              'c' => ['Сир сулугуні, лаваш', 'Suluguni cheese, lavash']],
            ['img' => 'hryby',                  'n' => ['Гриби', 'Mushrooms'],                     'p' => 160, 'w' => '200 г',
              'c' => ['Гриби, спеції, сіль', 'Mushrooms, spices, salt']],
            ['img' => 'kartoplya-zapechena',    'n' => ['Картопля запечена', 'Baked potatoes'],    'p' => 150, 'w' => '200 г',
              'c' => ['Картопля, спеції, сіль', 'Potatoes, spices, salt']],
        ],
    ],

    [
        'id' => 'hot', 'title' => ['Гарячі страви', 'Hot dishes'], 'note' => null,
        'items' => [
            ['img' => 'han-kebab',              'n' => ['Хан-кебаб', 'Khan kebab'],                'p' => 240, 'w' => '300 г'],
            ['img' => 'perepilka',              'n' => ['Перепілка', 'Quail'],                     'p' => 270, 'w' => '1 шт',
              'c' => ['Перепілка, спеції, сіль', 'Quail, spices, salt']],
            ['img' => 'hashlama',               'n' => ['Хашлама', 'Khashlama'],                   'p' => 250, 'w' => '350 г',
              'c' => ['М\'ясо, овочі, зелень, спеції', 'Meat, vegetables, herbs, spices']],
            ['img' => 'kyufta',                 'n' => ['Кюфта', 'Kyufta'],                        'p' => 200, 'w' => '350 г',
              'c' => ['Фарш, рис, зелень, спеції, сіль', 'Minced meat, rice, herbs, spices, salt']],
        ],
    ],

    [
        'id' => 'sety', 'title' => ['Сети', 'Sets'], 'note' => ['Для компанії', 'For a group'],
        'items' => [
            [
                'img' => 'set-asorti', 'n' => ['Асорті-сет', 'Assorted set'], 'p' => 1750,
                'inc' => [
                    ['g' => null, 'l' => [
                        [['Куряче філе', 'Chicken fillet'], 1],
                        [['Курячі крильця', 'Chicken wings'], 1],
                    ]],
                    ['g' => ['Свинина', 'Pork'], 'l' => [
                        [['Ребра', 'Ribs'], 1],
                        [['Шия', 'Neck'], 1],
                    ]],
                    ['g' => ['Телятина', 'Veal'], 'l' => [
                        [['Люля-кебаб', 'Lula kebab'], 1],
                    ]],
                    ['g' => null, 'l' => [
                        [['Гриби', 'Mushrooms'], 1],
                        [['Картопля', 'Potatoes'], 1],
                    ]],
                ],
                'extra' => [['Соуси', 'Sauces'], 2],
            ],
            [
                'img' => 'set-baranina', 'n' => ['Сет з баранини', 'Lamb set'], 'p' => 2350,
                'inc' => [
                    ['g' => ['Баранина', 'Lamb'], 'l' => [
                        [['Каре', 'Rack'], 1],
                        [['М\'якоть', 'Boneless'], 1],
                        [['Люля-кебаб', 'Lula kebab'], 1],
                    ]],
                    ['g' => ['Телятина', 'Veal'], 'l' => [
                        [['М\'якоть', 'Boneless'], 1],
                        [['Люля-кебаб', 'Lula kebab'], 1],
                    ]],
                    ['g' => null, 'l' => [
                        [['Гриби', 'Mushrooms'], 1],
                        [['Овочі на мангалі', 'Grilled vegetables'], 1],
                    ]],
                ],
                'extra' => [['Соуси', 'Sauces'], 2],
            ],
            [
                'img' => 'set-svinina', 'n' => ['Сет зі свинини', 'Pork set'], 'p' => 2400,
                'inc' => [
                    ['g' => ['Свинина', 'Pork'], 'l' => [
                        [['Шия', 'Neck'], 2],
                        [['Ребра', 'Ribs'], 2],
                        [['Стейк', 'Steak'], 1],
                        [['Люля-кебаб', 'Lula kebab'], 1],
                    ]],
                    ['g' => null, 'l' => [
                        [['Гриби', 'Mushrooms'], 1],
                        [['Овочі на мангалі', 'Grilled vegetables'], 1],
                        [['Картопля запечена', 'Baked potatoes'], 1],
                    ]],
                ],
                'extra' => [['Соуси', 'Sauces'], 2],
            ],
        ],
    ],

];
