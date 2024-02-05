import { getRandomInt } from './random';

const bottomFire = document.querySelector('.bottom-fire');
const uiFire = document.querySelector('.ui-fire');

export const makeFire = (config) => {
	const {
		parent,
		count,
		position: { left, top },
		size,
		color: { hue, saturate, lightness },
	} = config;

	if (parent) {
		for (let i = 0; i < count; i++) {
			const circle = document.createElement('div');
			circle.classList.add('circle');
			parent.appendChild(circle);
		}

		const circleGroup = parent.querySelectorAll('.circle');
		circleGroup.forEach((circle) => {
			circle.style.setProperty('--left', getRandomInt(0, left) + '%');
			circle.style.setProperty('--top', getRandomInt(0, top) + '%');

			circle.style.setProperty(
				'--width',
				getRandomInt(size.min, size.max) + 'px'
			);

			circle.style.setProperty('--hue', getRandomInt(hue.min, hue.max));
			circle.style.setProperty(
				'--saturate',
				getRandomInt(saturate.min, saturate.max) + '%'
			);
			circle.style.setProperty(
				'--lightness',
				getRandomInt(lightness.min, lightness.max) + '%'
			);
		});
	}
};

makeFire({
	parent: bottomFire,
	count: 15,
	position: {
		left: 100,
		top: 50,
	},
	size: {
		min: 150,
		max: 450,
	},
	color: {
		hue: {
			min: 180,
			max: 264,
		},
		saturate: {
			min: 65,
			max: 100,
		},
		lightness: {
			min: 31,
			max: 63,
		},
	},
});

makeFire({
	parent: uiFire,
	count: 15,
	position: {
		left: 100,
		top: 50,
	},
	size: {
		min: 150,
		max: 450,
	},
	color: {
		hue: {
			min: 4,
			max: 57,
		},
		saturate: {
			min: 50,
			max: 100,
		},
		lightness: {
			min: 31,
			max: 63,
		},
	},
});
