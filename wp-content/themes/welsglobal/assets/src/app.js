document.documentElement.classList.add('js');

const menuToggle = document.querySelector('[data-menu-toggle]');
const mobileMenu = document.querySelector('[data-mobile-menu]');

if (menuToggle && mobileMenu) {
	menuToggle.addEventListener('click', () => {
		const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';
		menuToggle.setAttribute('aria-expanded', String(!isOpen));
		mobileMenu.classList.toggle('hidden', isOpen);
	});

	mobileMenu.querySelectorAll('a').forEach((link) => {
		link.addEventListener('click', () => {
			menuToggle.setAttribute('aria-expanded', 'false');
			mobileMenu.classList.add('hidden');
		});
	});
}

const filterButtons = document.querySelectorAll('[data-ebook-filter]');
const ebookCards = document.querySelectorAll('[data-ebook-card]');

filterButtons.forEach((button) => {
	button.addEventListener('click', () => {
		const selectedCategory = button.dataset.ebookFilter;

		filterButtons.forEach((filterButton) => {
			const isActive = filterButton === button;
			filterButton.setAttribute('aria-pressed', String(isActive));
			filterButton.classList.toggle('bg-brand-navy', isActive);
			filterButton.classList.toggle('text-white', isActive);
			filterButton.classList.toggle('border', !isActive);
			filterButton.classList.toggle('border-slate-300', !isActive);
			filterButton.classList.toggle('bg-white', !isActive);
			filterButton.classList.toggle('text-slate-600', !isActive);
		});

		ebookCards.forEach((card) => {
			card.hidden = selectedCategory !== 'all' && card.dataset.category !== selectedCategory;
		});
	});
});
