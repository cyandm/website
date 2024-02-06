import { appendMiniBubble } from '../modules/bubble';

const header = document.querySelector('header');

if (header) {
	const activeMenu = header.querySelector('.current-menu-item');

	appendMiniBubble(8, activeMenu);
}
