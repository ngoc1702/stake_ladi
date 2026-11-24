(() => {
  'use strict';
  const article = document.querySelector('.review-article');
  if (!article) return;
  const links = [...document.querySelectorAll('.review-toc a')];
  const sections = [...article.querySelectorAll('h2[id]')];
  const progress = document.querySelector('.review-progress span');
  let queued = false;
  function update() {
    const start = article.getBoundingClientRect().top + window.scrollY;
    const length = Math.max(1, article.offsetHeight - window.innerHeight);
    if (progress) progress.style.width = `${Math.min(100, Math.max(0, (window.scrollY - start) / length * 100))}%`;
    const current = sections.filter(section => section.getBoundingClientRect().top < 150).pop();
    links.forEach(link => {
      if (current && link.hash === `#${current.id}`) link.setAttribute('aria-current', 'location');
      else link.removeAttribute('aria-current');
    });
    queued = false;
  }
  const schedule = () => { if (!queued) { queued = true; requestAnimationFrame(update); } };
  window.addEventListener('scroll', schedule, { passive: true });
  window.addEventListener('resize', schedule);
  update();
  document.getElementById('review-copy')?.addEventListener('click', async () => {
    const status = document.getElementById('review-copy-status');
    try {
      await navigator.clipboard.writeText(window.location.href.split('#')[0]);
      status.textContent = 'Article link copied.';
    } catch {
      status.textContent = 'Copy the address from your browser to share this article.';
    }
  });
})();
