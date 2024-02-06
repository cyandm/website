import { uiDesignSwiper } from '../modules/swiper';
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

	const startContent = startContentSlide;
	const contentCount = contentCountSlide;
	const endContent = startContent + contentCount;
	const portfolioSlide = endContent + 1;
	const faqSlide = portfolioSlide + 1;
	const contactSlide = faqSlide + 1;

	workSteps.addEventListener('click', () => {
		swiper.slideTo(startContent);
	});

	swiper.on('activeIndexChange', ({ activeIndex }) => {
		deActivateAllButton();

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
			activateEl(contactSlide);
		}
	});
};

footerService(uiDesignSwiper, 1, 3);
