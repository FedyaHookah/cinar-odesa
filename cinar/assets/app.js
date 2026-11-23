(function () {
  'use strict';

  var tabsBox = document.getElementById('tabs');
  var tabs = Array.prototype.slice.call(document.querySelectorAll('.tab'));
  var sections = Array.prototype.slice.call(document.querySelectorAll('.cat'));
  var items = Array.prototype.slice.call(document.querySelectorAll('.item'));
  var input = document.getElementById('q');
  var empty = document.getElementById('empty');

  // Перемикач мови (UA / EN)
  var htmlEl = document.documentElement;
  var langBtns = Array.prototype.slice.call(document.querySelectorAll('.lang-btn'));
  function setLang(l) {
    htmlEl.lang = l;
    langBtns.forEach(function (b) {
      b.setAttribute('aria-pressed', b.getAttribute('data-lang') === l ? 'true' : 'false');
    });
    input.placeholder = input.getAttribute('data-ph-' + l) || input.placeholder;
    document.title = htmlEl.getAttribute('data-title-' + l) || document.title;
    try { localStorage.setItem('cinar-lang', l); } catch (err) {}
  }
  langBtns.forEach(function (b) {
    b.addEventListener('click', function () { setLang(b.getAttribute('data-lang')); });
  });
  setLang(htmlEl.lang === 'en' ? 'en' : 'uk');

  // Вступна заставка: пропуск за кліком, Esc або Enter; наступного разу в цій сесії не показується
  var intro = document.getElementById('intro');
  var seen = document.documentElement.classList.contains('no-intro');
  var calm = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (intro && (seen || calm)) { intro.remove(); intro = null; }
  if (intro) {
    var root = document.documentElement;
    var done = false;
    var finish = function () {
      if (done) return;
      done = true;
      intro.remove();
      document.body.style.overflow = '';
    };
    var skip = function () {
      root.classList.add('intro-skip-on');
      intro.classList.add('is-out');
    };
    document.body.style.overflow = 'hidden';
    intro.addEventListener('click', skip);
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' || e.key === 'Enter') skip();
    });
    intro.addEventListener('animationend', function (e) {
      if (e.target === intro && e.animationName === 'introOut') finish();
    });
    window.setTimeout(finish, 5000);
    if (root.getAttribute('data-intro') !== 'always') {
      try { sessionStorage.setItem('cinar-intro', '1'); } catch (err) {}
    }
  }

  function setActive(id) {
    tabs.forEach(function (t) {
      var on = t.getAttribute('data-target') === id;
      t.classList.toggle('is-active', on);
      if (on) {
        var left = t.offsetLeft - (tabsBox.clientWidth - t.offsetWidth) / 2;
        tabsBox.scrollTo({ left: left, behavior: 'smooth' });
      }
    });
  }

  // Підсвічування вкладки за положенням прокрутки
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (en.isIntersecting) setActive(en.target.id);
      });
    }, { rootMargin: '-30% 0px -65% 0px', threshold: 0 });
    sections.forEach(function (s) { io.observe(s); });
  }

  // Пошук по назві та опису
  function filter() {
    var q = input.value.trim().toLowerCase();
    var shown = 0;
    items.forEach(function (it) {
      var ok = !q || it.getAttribute('data-search').indexOf(q) !== -1;
      it.hidden = !ok;
      if (ok) shown++;
    });
    sections.forEach(function (s) {
      s.hidden = !s.querySelector('.item:not([hidden])');
    });
    empty.hidden = shown !== 0;
  }

  input.addEventListener('input', filter);
})();
