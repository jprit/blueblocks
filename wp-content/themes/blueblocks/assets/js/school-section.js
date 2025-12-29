// school

document.addEventListener('DOMContentLoaded', () => {
  const card = document.getElementById('layeredCard');
  const title = document.getElementById('cardTitle');
  const text = document.getElementById('cardText');
  const link = document.getElementById('cardLink');

  function loadTab(tab) {
    title.textContent = tab.title;
    text.textContent = tab.text;
    link.href = tab.link;

    card.classList.remove('opacity-0', 'translate-x-16');
    card.classList.add('opacity-100', 'translate-x-0');
  }

  // Load first tab by default
  loadTab(SchoolData.tabs[0]);

  document.querySelectorAll('.menu-link').forEach(el => {
    el.addEventListener('click', e => {
      e.preventDefault();
      const key = el.dataset.key;
      const tab = SchoolData.tabs.find(t => t.key === key);
      if (tab) loadTab(tab);
    });
  });
});
