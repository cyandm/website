import { uiDesignSwiper, seoSwiper } from '../modules/swiper';
import { activateEl, deActivateEl } from '../utils/functions';

const footerService = (swiper, startContentSlide, contentCountSlide) => {
	const footerCon = document.querySelector('.service-footer');
	if (!footerCon) return;

	const workSteps = footerCon.querySelector('#workSteps');
	const portfolio = footerCon.querySelector('#portfolio');
	const faq = footerCon.querySelector('#faq');
	const contact = footerCon.querySelector('#contact');
	if (!workSteps || !portfolio || !faq || !contact) return;

	const deActivateAllButton = () => {
		[workSteps, portfolio, faq, contact].map((el) => deActivateEl(el));
	};

	const addListenerToSlide = (el, slide) => {
		el.addEventListener('click', () => {
			swiper.slideTo(slide);
		});
	};

	const startContent = startContentSlide;
	const contentCount = contentCountSlide;
	const endContent = startContent + contentCount - 1;
	const portfolioSlide = endContent + 1;
	const faqSlide = portfolioSlide + 1;
	const contactSlide = faqSlide + 1;

	addListenerToSlide(workSteps, startContent);
	addListenerToSlide(portfolio, portfolioSlide);
	addListenerToSlide(faq, faqSlide);
	addListenerToSlide(contact, contactSlide);

	swiper.on('activeIndexChange', ({ activeIndex }) => {
		deActivateAllButton();

		footerCon.classList.toggle('show', activeIndex !== 0);

		if (activeIndex <= endContent && activeIndex >= startContent) {
			activateEl(workSteps);
		}

		if (activeIndex === portfolioSlide) {
			activateEl(portfolio);
		}

		if (activeIndex === faqSlide) {
			activateEl(faq);
		}
		if (activeIndex === contactSlide) {
			activateEl(contact);
		}
	});
};

footerService(uiDesignSwiper, 1, 3);
footerService(seoSwiper, 1, 2);
