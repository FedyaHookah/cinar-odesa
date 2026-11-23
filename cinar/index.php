<?php
declare(strict_types=1);

$config = require __DIR__ . '/config.php';
$menu   = require __DIR__ . '/data/menu.php';

// Початкова мова: ?lang=en або українська за замовчуванням.
// У браузері мову далі перемикає кнопка (запам'ятовується на пристрої).
$lang = (($_GET['lang'] ?? '') === 'en') ? 'en' : 'uk';

function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Двомовний текст: [українською, англійською] */
function tr(array $v): string
{
    return '<span class="l-uk" lang="uk">' . e($v[0]) . '</span><span class="l-en" lang="en">' . e($v[1]) . '</span>';
}

function price(int|float $p): string
{
    // нерозривний пробіл між тисячами: 1 750
    return number_format($p, 0, '', "\u{00A0}");
}

/** Шлях до фото страви: assets/img/menu/<img>.jpg (також .jpeg, .webp, .png), інакше загальна заглушка */
function menu_img(string $slug): string
{
    foreach (['jpg', 'jpeg', 'webp', 'png'] as $ext) {
        $rel = 'assets/img/menu/' . $slug . '.' . $ext;
        if (is_file(__DIR__ . '/' . $rel)) {
            return asset($rel);
        }
    }
    return 'assets/img/placeholder.svg';
}

/** «1 порція», «2 порції», «5 порцій» / «1 portion», «2 portions» */
function portions(int $n): array
{
    $m10 = $n % 10;
    $m100 = $n % 100;
    if ($m10 === 1 && $m100 !== 11) {
        $uk = $n . ' порція';
    } elseif ($m10 >= 2 && $m10 <= 4 && ($m100 < 12 || $m100 > 14)) {
        $uk = $n . ' порції';
    } else {
        $uk = $n . ' порцій';
    }
    return [$uk, $n . ($n === 1 ? ' portion' : ' portions')];
}

function weight_en(string $w): string
{
    return str_replace([' шт', ' мл', ' г'], [' pcs', ' ml', ' g'], $w);
}

function asset(string $path): string
{
    $file = __DIR__ . '/' . $path;
    return $path . (is_file($file) ? '?v=' . filemtime($file) : '');
}

function flag_ua(): string
{
    return '<svg class="flag" viewBox="0 0 3 2" preserveAspectRatio="none" aria-hidden="true"><rect width="3" height="1" fill="#0057B7"/><rect y="1" width="3" height="1" fill="#FFD700"/></svg>';
}

function flag_gb(): string
{
    return '<svg class="flag" viewBox="0 0 60 30" preserveAspectRatio="none" aria-hidden="true"><rect width="60" height="30" fill="#012169"/><path d="M0 0L60 30M60 0L0 30" stroke="#fff" stroke-width="6"/><path d="M0 0L60 30M60 0L0 30" stroke="#C8102E" stroke-width="2"/><path d="M30 0V30M0 15H60" stroke="#fff" stroke-width="10"/><path d="M30 0V30M0 15H60" stroke="#C8102E" stroke-width="6"/></svg>';
}

$logo  = (string) file_get_contents(__DIR__ . '/assets/logo.svg');
$name  = $config['name'];
$title = [
    $name . ' · ' . $config['subtitle'][0] . ' · меню',
    $name . ' · ' . $config['subtitle'][1] . ' · menu',
];
?>
<!doctype html>
<html lang="<?= e($lang) ?>" data-intro="<?= e($config['intro_mode']) ?>" data-title-uk="<?= e($title[0]) ?>" data-title-en="<?= e($title[1]) ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($title[$lang === 'en' ? 1 : 0]) ?></title>
  <meta name="description" content="<?= e($config['lead'][$lang === 'en' ? 1 : 0]) ?>">
  <meta property="og:title" content="<?= e($title[$lang === 'en' ? 1 : 0]) ?>">
  <meta property="og:description" content="<?= e($config['lead'][$lang === 'en' ? 1 : 0]) ?>">
  <meta name="theme-color" content="#FFFFFF">
  <link rel="icon" href="assets/logo.svg" type="image/svg+xml">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@400;500;600;700&display=swap">
  <link rel="stylesheet" href="<?= e(asset('assets/style.css')) ?>">
  <script>
    // Мова до першого малювання: ?lang=… у посиланні, потім збережений вибір, інакше українська
    try {
      var m = location.search.match(/[?&]lang=(uk|en)/);
      var l = m ? m[1] : localStorage.getItem('cinar-lang');
      if (l === 'en' || l === 'uk') document.documentElement.lang = l;
    } catch (e) {}
  </script>
</head>
<body id="top">
  <script>try{var d=document.documentElement;if(d.getAttribute('data-intro')!=='always'&&!/[?&]intro=1/.test(location.search)&&sessionStorage.getItem('cinar-intro'))d.className+=' no-intro'}catch(e){}</script>

  <div class="bg" aria-hidden="true"></div>

  <div class="intro" id="intro">
    <span class="logo intro-logo"><?= $logo ?></span>
    <p class="intro-name"><?= e($name) ?></p>
    <p class="intro-sub"><?= tr($config['subtitle']) ?></p>
    <button class="intro-skip" type="button" id="introSkip"><?= tr($config['intro']['skip']) ?></button>
  </div>

  <header class="masthead">
    <div class="lang" role="group" aria-label="Мова / Language">
      <button class="lang-btn" type="button" data-lang="uk" aria-pressed="<?= $lang === 'uk' ? 'true' : 'false' ?>"><?= flag_ua() ?><span>UA</span></button>
      <button class="lang-btn" type="button" data-lang="en" aria-pressed="<?= $lang === 'en' ? 'true' : 'false' ?>"><?= flag_gb() ?><span>EN</span></button>
    </div>

    <a class="brand" href="#top" aria-label="<?= e($name) ?>">
      <span class="logo"><?= $logo ?></span>
      <span class="brand-name"><?= e($name) ?></span>
      <span class="brand-sub"><?= tr($config['subtitle']) ?></span>
    </a>
    <p class="eyebrow"><?= tr($config['eyebrow']) ?></p>
    <p class="lead"><?= tr($config['lead']) ?></p>
  </header>

  <nav class="bar" aria-label="<?= e($config['ui']['menu'][0]) ?>">
    <div class="wrap bar-inner">
      <label class="search">
        <svg viewBox="0 0 20 20" aria-hidden="true"><circle cx="8.5" cy="8.5" r="5.5"/><path d="M13 13l4 4"/></svg>
        <input id="q" type="search" autocomplete="off"
               placeholder="<?= e($config['ui']['search'][$lang === 'en' ? 1 : 0]) ?>"
               data-ph-uk="<?= e($config['ui']['search'][0]) ?>"
               data-ph-en="<?= e($config['ui']['search'][1]) ?>"
               aria-label="<?= e($config['ui']['search'][0]) ?>">
      </label>
      <div class="tabs" id="tabs">
        <?php foreach ($menu as $i => $cat): ?>
          <a class="tab<?= $i === 0 ? ' is-active' : '' ?>" href="#<?= e($cat['id']) ?>" data-target="<?= e($cat['id']) ?>"><?= tr($cat['title']) ?></a>
        <?php endforeach; ?>
      </div>
    </div>
  </nav>

  <main class="wrap" id="menu">
    <?php foreach ($menu as $cat): ?>
      <section class="cat" id="<?= e($cat['id']) ?>">
        <div class="cat-head">
          <h2><?= tr($cat['title']) ?></h2>
          <?php if (!empty($cat['note'])): ?><p><?= tr($cat['note']) ?></p><?php endif; ?>
        </div>
        <ul class="items">
          <?php foreach ($cat['items'] as $item): ?>
            <?php
              $isSet  = !empty($item['inc']);
              $words  = [$item['n'][0], $item['n'][1]];
              if (!empty($item['d'])) { array_push($words, $item['d'][0], $item['d'][1]); }
              if (!empty($item['c'])) { array_push($words, $item['c'][0], $item['c'][1]); }
              foreach (($item['inc'] ?? []) as $grp) {
                  foreach ($grp['l'] as $line) { array_push($words, $line[0][0], $line[0][1]); }
              }
              $search = mb_strtolower(implode(' ', $words), 'UTF-8');
            ?>
            <li class="item<?= $isSet ? ' item-set' : '' ?>" data-search="<?= e($search) ?>">
              <div class="thumb">
                <img src="<?= e(menu_img($item['img'])) ?>" alt="" width="240" height="240" loading="lazy" decoding="async">
              </div>
              <div class="item-body">
                <div class="item-top">
                  <h3><?= tr($item['n']) ?></h3>
                  <span class="price"><?= price($item['p']) ?><small><?= e($config['currency']) ?></small></span>
                </div>
                <?php if (!empty($item['d'])): ?>
                  <p class="desc"><?= tr($item['d']) ?></p>
                <?php endif; ?>
                <?php if (!empty($item['c'])): ?>
                  <p class="comp"><span class="lab"><?= tr($config['ui']['composition']) ?>:</span><?= tr($item['c']) ?></p>
                <?php endif; ?>
                <?php if (!empty($item['w']) || !empty($item['t'])): ?>
                  <div class="meta">
                    <?php if (!empty($item['w'])): ?>
                      <span class="weight"><?= tr([$item['w'], weight_en($item['w'])]) ?></span>
                    <?php endif; ?>
                    <?php foreach (($item['t'] ?? []) as $tag): ?>
                      <span class="tag tag-<?= e($tag) ?>"><?= tr($config['tags'][$tag] ?? [$tag, $tag]) ?></span>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
                <?php if ($isSet): ?>
                  <div class="inc">
                    <?php foreach ($item['inc'] as $grp): ?>
                      <div class="inc-g">
                        <?php if (!empty($grp['g'])): ?><p class="inc-h"><?= tr($grp['g']) ?></p><?php endif; ?>
                        <ul>
                          <?php foreach ($grp['l'] as $line): ?>
                            <li><span><?= tr($line[0]) ?></span><i class="dots"></i><b><?= tr(portions($line[1])) ?></b></li>
                          <?php endforeach; ?>
                        </ul>
                      </div>
                    <?php endforeach; ?>
                    <?php if (!empty($item['extra'])): ?>
                      <div class="inc-g">
                        <ul>
                          <li><span><?= tr($item['extra'][0]) ?></span><i class="dots"></i><b><?= (int) $item['extra'][1] ?></b></li>
                        </ul>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </section>
    <?php endforeach; ?>
    <p class="empty" id="empty" hidden><?= tr($config['ui']['empty']) ?></p>
  </main>

  <footer class="foot">
    <div class="wrap">
      <span class="logo logo-sm"><?= $logo ?></span>
      <?php foreach ($config['footer'] as $line): ?>
        <p><?= tr($line) ?></p>
      <?php endforeach; ?>
      <p class="copy">© <?= date('Y') ?> <?= e($name) ?></p>
    </div>
  </footer>

  <script src="<?= e(asset('assets/app.js')) ?>" defer></script>
</body>
</html>
