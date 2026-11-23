<?php
// Основні налаштування сайту. Тексти двомовні: [українською, англійською].
return [
    'name'     => 'Çinar',
    'subtitle' => ['ресторан', 'restaurant'],
    'eyebrow'  => ['Азербайджанська кухня', 'Azerbaijani cuisine'],
    'lead'     => [
        'Баранина, телятина, свинина, курка та риба на мангалі. Саджі й великі сети для вашої компанії.',
        'Lamb, veal, pork, chicken and fish from the charcoal grill. Sajs and large sets for your company.',
    ],
    'intro'    => [
        'title' => ['Два народи. Одне серце.', 'Two peoples. One heart.'],
        'line'  => ['За одним столом усі свої.', 'At one table, everyone is family.'],
        'az'    => 'Xoş gəlmisiniz',
        'sub'   => ['Ласкаво просимо до Çinar', 'Welcome to Çinar'],
        'skip'  => ['Пропустити', 'Skip'],
    ],
    'ui' => [
        'search' => ['Знайти страву', 'Find a dish'],
        'empty'  => ['Нічого не знайдено. Спробуйте інше слово.', 'Nothing found. Try another word.'],
        'menu'   => ['Меню', 'Menu'],
        'composition' => ['Склад', 'Ingredients'],
        'lang'   => ['Мова', 'Language'],
    ],
    // Коли показувати заставку: 'session' (раз за сеанс у вкладці) або 'always' (при кожному оновленні).
    // Примусово показати один раз: додайте до адреси ?intro=1
    'intro_mode' => 'session',
    'currency' => '₴',
    'tags'     => [
        'hit'   => ['Хіт', 'Favourite'],
        'spicy' => ['Гостре', 'Spicy'],
        'veg'   => ['Вегетаріанське', 'Vegetarian'],
    ],
    'footer'   => [
        ['Ціни вказано в гривнях.', 'Prices are in hryvnia.'],
        ['Якщо у вас алергія, повідомте про це офіціанта до замовлення.', 'If you have an allergy, please tell your server before ordering.'],
    ],
];
