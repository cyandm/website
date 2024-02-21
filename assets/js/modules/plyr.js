import Plyr from 'plyr';

const customerVideos = document.querySelectorAll('.plyr');

customerVideos.forEach((el) => {
	const vid = new Plyr(el);
});
