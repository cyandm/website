import Swiper from 'swiper';
import { Autoplay, EffectFade, Thumbs } from 'swiper/modules';

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
	autoplay: {
		delay: 1800,
	},
});
export const customerSwiper = new Swiper('.customer-wrapper', {
	modules: [EffectFade, Autoplay, Thumbs],
	slidesPerView: 1,
	effect: 'fade',
	speed: 800,
	thumbs: { swiper: customerSwiperThumbs },
	autoplay: {
		delay: 1800,
	},
});
