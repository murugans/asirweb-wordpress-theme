document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.querySelector('.dark-mode-toggle');
  const body = document.body;

  toggle.addEventListener('click', () => {
    body.classList.toggle('dark-mode');
    localStorage.setItem('dark-mode', body.classList.contains('dark-mode'));
  });

  if (localStorage.getItem('dark-mode') === 'true') {
    body.classList.add('dark-mode');
  }

  AOS.init({
    duration: 800,
    once: true,
  });
});