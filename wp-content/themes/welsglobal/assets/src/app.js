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
			filterButton.classList.toggle('shadow-md', isActive);
			filterButton.classList.toggle('shadow-brand-navy/15', isActive);
			filterButton.classList.toggle('text-slate-600', !isActive);

			const count = filterButton.querySelector('[data-filter-count]');
			if (count) {
				count.classList.toggle('bg-white/15', isActive);
				count.classList.toggle('text-white', isActive);
				count.classList.toggle('bg-slate-100', !isActive);
				count.classList.toggle('text-slate-500', !isActive);
			}
		});

		ebookCards.forEach((card) => {
			card.hidden = selectedCategory !== 'all' && card.dataset.category !== selectedCategory;
		});
	});
});

const getCart = () => {
	try {
		return JSON.parse(localStorage.getItem('welsglobalCart')) || {};
	} catch (error) {
		return {};
	}
};

const updateCartCount = () => {
	const total = Object.values(getCart()).reduce((sum, item) => sum + Number(item.quantity || 0), 0);
	document.querySelectorAll('[data-cart-count]').forEach((counter) => {
		counter.textContent = String(total);
	});
};

const quantityInput = document.querySelector('[data-quantity-input]');
const minusButton = document.querySelector('[data-quantity-minus]');
const plusButton = document.querySelector('[data-quantity-plus]');

const updateQuantityState = () => {
	if (!quantityInput) return;
	const value = Math.min(10, Math.max(1, Number.parseInt(quantityInput.value, 10) || 1));
	quantityInput.value = String(value);
	if (minusButton) minusButton.disabled = value <= 1;
	if (plusButton) plusButton.disabled = value >= 10;
};

if (quantityInput) {
	minusButton?.addEventListener('click', () => {
		quantityInput.value = String(Number(quantityInput.value) - 1);
		updateQuantityState();
	});
	plusButton?.addEventListener('click', () => {
		quantityInput.value = String(Number(quantityInput.value) + 1);
		updateQuantityState();
	});
	quantityInput.addEventListener('change', updateQuantityState);
	updateQuantityState();
}

const addToCartButton = document.querySelector('[data-add-to-cart]');

addToCartButton?.addEventListener('click', () => {
	const cart = getCart();
	const id = addToCartButton.dataset.ebookId;
	const quantity = Number(quantityInput?.value || 1);

	cart[id] = {
		id,
		title: addToCartButton.dataset.ebookTitle,
		price: Number(addToCartButton.dataset.ebookPrice),
		quantity: Number(cart[id]?.quantity || 0) + quantity,
	};

	localStorage.setItem('welsglobalCart', JSON.stringify(cart));
	updateCartCount();

	const label = addToCartButton.querySelector('[data-add-to-cart-label]');
	const message = document.querySelector('[data-cart-message]');
	if (label) label.textContent = 'Added to cart';
	if (message) {
		message.classList.remove('hidden');
		message.classList.add('flex');
	}

	window.setTimeout(() => {
		if (label) label.textContent = 'Add to cart';
	}, 1600);
});

updateCartCount();

const cartPage = document.querySelector('[data-cart-page]');

if (cartPage) {
	const catalog = {
		'01': { category: 'Content Strategy', color: ['#126aa8', '#0a477c', '#061b35'] },
		'02': { category: 'Digital Marketing', color: ['#e7b54d', '#a96812', '#3b2107'] },
		'03': { category: 'Social Media', color: ['#bc64b4', '#71366e', '#281128'] },
	};
	const itemsContainer = cartPage.querySelector('[data-cart-items]');
	const template = document.querySelector('#cart-item-template');
	const emptyState = cartPage.querySelector('[data-empty-cart]');
	const filledState = cartPage.querySelector('[data-filled-cart]');
	const money = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' });

	const saveCart = (cart) => {
		localStorage.setItem('welsglobalCart', JSON.stringify(cart));
		updateCartCount();
	};

	const renderCart = () => {
		const cart = getCart();
		const items = Object.values(cart);
		const isEmpty = items.length === 0;

		emptyState.classList.toggle('hidden', !isEmpty);
		emptyState.classList.toggle('grid', isEmpty);
		filledState.classList.toggle('hidden', isEmpty);
		filledState.classList.toggle('grid', !isEmpty);
		itemsContainer.replaceChildren();

		let subtotal = 0;
		let quantityTotal = 0;

		items.forEach((item) => {
			const product = catalog[item.id] || catalog['02'];
			const quantity = Math.min(10, Math.max(1, Number(item.quantity) || 1));
			const itemTotal = Number(item.price) * quantity;
			const fragment = template.content.cloneNode(true);
			const detailUrl = `${window.welsglobalHome || '/welsglobal/'}ebook-details/?ebook=${item.id}`;

			fragment.querySelectorAll('[data-item-link]').forEach((link) => {
				link.href = detailUrl;
			});
			fragment.querySelector('[data-item-title]').textContent = item.title;
			fragment.querySelector('[data-item-cover-title]').textContent = item.title;
			fragment.querySelector('[data-item-category]').textContent = product.category;
			fragment.querySelector('[data-item-cover]').style.backgroundImage = `linear-gradient(135deg, ${product.color.join(', ')})`;
			fragment.querySelector('[data-item-unit-price]').textContent = `${money.format(item.price)} each`;
			fragment.querySelector('[data-item-total]').textContent = money.format(itemTotal);

			const input = fragment.querySelector('[data-cart-quantity]');
			input.value = String(quantity);

			const updateItemQuantity = (nextQuantity) => {
				const latestCart = getCart();
				latestCart[item.id].quantity = Math.min(10, Math.max(1, nextQuantity));
				saveCart(latestCart);
				renderCart();
			};

			fragment.querySelector('[data-cart-minus]').addEventListener('click', () => updateItemQuantity(quantity - 1));
			fragment.querySelector('[data-cart-plus]').addEventListener('click', () => updateItemQuantity(quantity + 1));
			input.addEventListener('change', () => updateItemQuantity(Number.parseInt(input.value, 10) || 1));
			fragment.querySelector('[data-remove-item]').addEventListener('click', () => {
				const latestCart = getCart();
				delete latestCart[item.id];
				saveCart(latestCart);
				renderCart();
			});

			itemsContainer.appendChild(fragment);
			subtotal += itemTotal;
			quantityTotal += quantity;
		});

		const itemLabel = cartPage.querySelector('[data-cart-items-label]');
		itemLabel.textContent = `${quantityTotal} ${quantityTotal === 1 ? 'item' : 'items'}`;
		cartPage.querySelector('[data-cart-subtotal]').textContent = money.format(subtotal);
		cartPage.querySelector('[data-cart-total]').textContent = money.format(subtotal);
	};

	cartPage.querySelector('[data-clear-cart]').addEventListener('click', () => {
		saveCart({});
		renderCart();
	});

	renderCart();
}

const checkoutPage = document.querySelector('[data-checkout-page]');

if (checkoutPage) {
	const form = checkoutPage.querySelector('[data-checkout-form]');
	const content = checkoutPage.querySelector('[data-checkout-content]');
	const emptyState = checkoutPage.querySelector('[data-checkout-empty]');
	const successState = checkoutPage.querySelector('[data-checkout-success]');
	const itemsContainer = checkoutPage.querySelector('[data-checkout-items]');
	const money = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' });
	const cart = getCart();
	const items = Object.values(cart);
	const isEmpty = items.length === 0;

	emptyState.classList.toggle('hidden', !isEmpty);
	emptyState.classList.toggle('grid', isEmpty);
	content.classList.toggle('hidden', isEmpty);
	content.classList.toggle('grid', !isEmpty);

	let total = 0;
	items.forEach((item) => {
		const lineTotal = Number(item.price) * Number(item.quantity);
		total += lineTotal;
		const row = document.createElement('div');
		row.className = 'flex items-center gap-3';
		row.innerHTML = `
			<span class="grid size-11 shrink-0 place-items-center rounded-xl bg-brand-navy text-xs font-black text-brand-gold" data-checkout-item-id></span>
			<span class="min-w-0 flex-1">
				<strong class="block truncate text-xs text-brand-navy" data-checkout-item-title></strong>
				<small class="text-[11px] text-slate-500" data-checkout-item-quantity></small>
			</span>
			<strong class="text-sm text-brand-navy" data-checkout-item-total></strong>
		`;
		row.querySelector('[data-checkout-item-id]').textContent = item.id;
		row.querySelector('[data-checkout-item-title]').textContent = item.title;
		row.querySelector('[data-checkout-item-quantity]').textContent = `Qty ${item.quantity}`;
		row.querySelector('[data-checkout-item-total]').textContent = money.format(lineTotal);
		itemsContainer.appendChild(row);
	});
	checkoutPage.querySelector('[data-checkout-subtotal]').textContent = money.format(total);
	checkoutPage.querySelector('[data-checkout-total]').textContent = money.format(total);

	const paymentRadios = form.querySelectorAll('[name="payment_method"]');
	const cardPanel = checkoutPage.querySelector('[data-card-panel]');
	const cryptoPanel = checkoutPage.querySelector('[data-crypto-panel]');
	const transactionInput = form.querySelector('[name="transaction_hash"]');

	const updatePaymentMethod = () => {
		const selected = form.querySelector('[name="payment_method"]:checked').value;
		form.querySelectorAll('[data-payment-option]').forEach((option) => {
			const active = option.querySelector('input').checked;
			option.classList.toggle('border-brand-blue', active);
			option.classList.toggle('bg-brand-blue/5', active);
			option.classList.toggle('border-slate-200', !active);
		});
		cardPanel.classList.toggle('hidden', selected !== 'card');
		cryptoPanel.classList.toggle('hidden', selected !== 'crypto');
		transactionInput.required = selected === 'crypto';
	};
	paymentRadios.forEach((radio) => radio.addEventListener('change', updatePaymentMethod));

	const cryptoWallets = {
		TRX: {
			title: 'TRON · TRX',
			address: 'TNAXyfTgARcX4BCTAwyEvyEnSbZN4Q8EMK',
			color: '#df2f36',
			icon: 'TRX',
			note: 'Send only TRX on the TRON network to this address.',
		},
		BNB: {
			title: 'BNB · BEP-20',
			address: '0x938C5663d2a005deB054129911Fdc8F34E84AafA',
			color: '#b68b23',
			icon: 'BNB',
			note: 'Send only BNB using the BNB Smart Chain (BEP-20) network.',
		},
		ETH: {
			title: 'ETHEREUM · ERC-20',
			address: '0x938C5663d2a005deB054129911Fdc8F34E84AafA',
			color: '#4965d6',
			icon: 'ETH',
			note: 'Send only ETH using the Ethereum (ERC-20) network.',
		},
	};
	const cryptoSelect = checkoutPage.querySelector('[data-crypto-select]');
	const walletCard = checkoutPage.querySelector('[data-wallet-card]');
	const walletTitle = checkoutPage.querySelector('[data-wallet-title]');
	const walletAddress = checkoutPage.querySelector('[data-wallet-address]');
	const walletIcon = checkoutPage.querySelector('[data-wallet-icon]');
	const walletNote = checkoutPage.querySelector('[data-wallet-note]');
	const walletQr = checkoutPage.querySelector('[data-wallet-qr]');

	const renderWallet = () => {
		const wallet = cryptoWallets[cryptoSelect.value] || cryptoWallets.TRX;
		walletTitle.textContent = wallet.title;
		walletAddress.textContent = wallet.address;
		walletIcon.textContent = wallet.icon;
		walletNote.textContent = wallet.note;
		walletTitle.style.color = wallet.color;
		walletIcon.style.backgroundColor = wallet.color;
		walletCard.style.borderLeftColor = wallet.color;
		walletQr.replaceChildren();

		if (window.jQuery?.fn?.qrcode) {
			window.jQuery(walletQr).qrcode({
				text: wallet.address,
				width: 176,
				height: 176,
				correctLevel: 2,
				background: '#ffffff',
				foreground: '#000000',
			});
		}
	};
	cryptoSelect.addEventListener('change', renderWallet);

	checkoutPage.querySelector('[data-copy-wallet]').addEventListener('click', (event) => {
		const wallet = walletAddress.textContent;
		const label = event.currentTarget.querySelector('[data-copy-wallet-label]');
		navigator.clipboard?.writeText(wallet);
		if (label) label.textContent = 'Address copied';
		window.setTimeout(() => {
			if (label) label.textContent = 'Click to copy address';
		}, 1200);
	});

	form.addEventListener('submit', async (event) => {
		event.preventDefault();
		const errorBox = checkoutPage.querySelector('[data-checkout-error]');
		const invalidFields = Array.from(form.querySelectorAll(':invalid'));

		form.querySelectorAll('[data-field-error]').forEach((error) => error.classList.add('hidden'));
		errorBox.classList.add('hidden');

		if (invalidFields.length) {
			invalidFields.forEach((field) => {
				field.classList.add('border-red-400');
				const error = field.closest('label')?.querySelector('[data-field-error]');
				if (error) {
					error.textContent = field.validity.typeMismatch ? 'Enter a valid email address.' : 'This field is required.';
					error.classList.remove('hidden');
				}
			});
			errorBox.textContent = 'Please review the highlighted fields before placing your order.';
			errorBox.classList.remove('hidden');
			invalidFields[0].focus();
			return;
		}

		const method = form.querySelector('[name="payment_method"]:checked').value;
		const email = form.querySelector('[name="email"]').value;

		if (method === 'card') {
			const checkoutConfig = window.welsglobalCheckout || {};
			const submitButton = form.querySelector('[data-place-order]');
			const submitLabel = form.querySelector('[data-place-order-label]');
			const originalLabel = submitLabel?.textContent || 'Place secure order';

			if (!checkoutConfig.ajaxUrl || !checkoutConfig.nonce) {
				errorBox.textContent = 'Checkout security configuration is unavailable. Please refresh the page and try again.';
				errorBox.classList.remove('hidden');
				return;
			}

			const payload = new FormData(form);
			payload.set('action', 'welsglobal_create_checkout_order');
			payload.set('nonce', checkoutConfig.nonce);
			payload.set('terms', form.querySelector('[name="terms"]').checked ? '1' : '0');
			payload.set('items', JSON.stringify(items.map((item) => ({
				id: String(item.id),
				quantity: Number(item.quantity),
			}))));

			submitButton.disabled = true;
			if (submitLabel) submitLabel.textContent = 'Connecting to CCAvenue…';

			try {
				const response = await fetch(checkoutConfig.ajaxUrl, {
					method: 'POST',
					body: payload,
					credentials: 'same-origin',
				});
				const result = await response.json();

				if (!response.ok || !result.success || !result.data?.redirect) {
					throw new Error(result.data?.message || 'CCAvenue could not prepare the payment. Please try again.');
				}

				window.location.assign(result.data.redirect);
			} catch (error) {
				errorBox.textContent = error.message || 'CCAvenue could not prepare the payment. Please try again.';
				errorBox.classList.remove('hidden');
				submitButton.disabled = false;
				if (submitLabel) submitLabel.textContent = originalLabel;
			}
			return;
		}

		const reference = `WG-${Date.now().toString().slice(-8)}`;
		const orderData = {
			reference,
			email,
			method,
			items: items.reduce((sum, item) => sum + Number(item.quantity), 0),
			total,
		};
		sessionStorage.setItem('welsglobalLastOrder', JSON.stringify(orderData));
		localStorage.setItem('welsglobalCart', JSON.stringify({}));
		window.location.href = `${window.welsglobalHome || '/welsglobal/'}thank-you/`;
	});

	updatePaymentMethod();
	renderWallet();
}

const thankYouPage = document.querySelector('[data-thank-you-page]');

if (thankYouPage) {
	let order = {};
	try {
		order = JSON.parse(sessionStorage.getItem('welsglobalLastOrder')) || {};
	} catch (error) {
		order = {};
	}

	const money = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' });
	const reference = order.reference || 'WG-PENDING';
	const methodLabel = order.method === 'crypto' ? 'Cryptocurrency · Verification pending' : 'Credit / Debit Card · CC Avenue';

	document.querySelector('[data-thank-you-reference]').textContent = reference;
	document.querySelector('[data-thank-you-email]').textContent = order.email || 'your email address';
	document.querySelector('[data-thank-you-items]').textContent = String(order.items || 0);
	document.querySelector('[data-thank-you-method]').textContent = methodLabel;
	document.querySelector('[data-thank-you-total]').textContent = money.format(Number(order.total || 0));

	if (order.method === 'crypto') {
		document.querySelector('[data-thank-you-intro]').textContent = 'Your transaction details have been submitted. Our team will verify the transfer and email your secure download link after approval.';
		document.querySelector('[data-step-one-title]').textContent = 'Transaction verification';
		document.querySelector('[data-step-one-copy]').textContent = 'An administrator will verify your transaction hash on the selected crypto network.';
	} else {
		document.querySelector('[data-thank-you-intro]').textContent = 'Your order has been received. Secure CC Avenue payment confirmation and delivery details will be sent to your email.';
	}

	updateCartCount();
}
