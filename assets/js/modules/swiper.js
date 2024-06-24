import Swiper from 'swiper';
import { Mousewheel, Autoplay, EffectFade, Thumbs } from 'swiper/modules';
import { cynDestroySwiper } from '../utils/functions';

export const projectsSwiper = new Swiper('.projects-wrapper', {
	modules: [Autoplay],
	slidesPerView: 1.5,
	centeredSlides: true,

	spaceBetween: 16,
	speed: 800,
	autoplay: {
		delay: 1800,
	},

	breakpoints: {
		768: {
			slidesPerView: 4.2,
			centeredSlides: false,
		},
	},
});

export const customerSwiperThumbs = new Swiper('.customer-thumbs', {
	modules: [Autoplay],
	slidesPerView: 4.2,
	spaceBetween: 16,
	watchSlidesProgress: true,
	speed: 800,
});

export const customerSwiper = new Swiper('.customer-wrapper', {
	modules: [EffectFade, Autoplay, Thumbs],
	slidesPerView: 1,
	effect: 'fade',
	speed: 800,
	thumbs: { swiper: customerSwiperThumbs },
});

export const uiDesignSwiper = new Swiper('#uiDesignSwiper', {
	modules: [EffectFade, Mousewheel],
	slidesPerView: 1,
	effect: 'fade',
	fadeEffect: {
		crossFade: true,
	},
	speed: 800,
	mousewheel: true,
	allowTouchMove: false,
	width: window.innerWidth,
});

export const seoSwiper = new Swiper('#seoMainSwiper', {
	modules: [EffectFade, Mousewheel],
	slidesPerView: 1,
	effect: 'fade',
	fadeEffect: {
		crossFade: true,
	},
	speed: 800,
	mousewheel: true,
	allowTouchMove: false,
	width: window.innerWidth,
});

export const marketingSwiper = new Swiper('#marketingMainSwiper', {
	modules: [EffectFade, Mousewheel],
	slidesPerView: 1,
	effect: 'fade',
	fadeEffect: {
		crossFade: true,
	},
	speed: 800,
	mousewheel: true,
	allowTouchMove: false,
	width: window.innerWidth,
});

export const portfolioServicePage = new Swiper('#portfolioServicePage', {
	modules: [Autoplay],
	slidesPerView: 1.5,
	centeredSlides: true,
	spaceBetween: 16,
	autoplay: {
		disableOnInteraction: false,
	},

	breakpoints: {
		1240: {
			slidesPerView: 4.2,
		},
	},
});

export const brandsSwiper = new Swiper('#brandsSwiper', {
	modules: [Autoplay],
	slidesPerView: 3,
	autoplay: true,
	spaceBetween: 24,

	breakpoints: {
		768: {
			slidesPerView: 5,
		},
		1024: {
			slidesPerView: 7,
		},
		1440: {
			slidesPerView: 9,
		},
	},
});

if (window.innerWidth <= 1240) {
	cynDestroySwiper(uiDesignSwiper, '#uiDesignSwiper');
	cynDestroySwiper(seoSwiper, '#seoMainSwiper');
	cynDestroySwiper(marketingSwiper, '#marketingMainSwiper');
}
  export const mobile_about = new Swiper(".about-sections", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });