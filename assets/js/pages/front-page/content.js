import { activateFirstEl, activateOnly } from '../../modules/classHandler';
import { getRandomInt } from '../../modules/random';
import { customerSwiperThumbs } from '../../modules/swiper';
import { setCssVariable } from '../../modules/variable';

let customerThumbsHeight;

const ContentHome = () => {
  //Customer Swiper Home Page Vars
  const customerThumbsEl = document.querySelector('.customer-thumbs');
  const customerCon = document.querySelector('.customer-con');

  customerSwiperThumbs.on('progress', () => {
    customerThumbsHeight = customerThumbsEl.clientHeight;
    setCssVariable(customerThumbsHeight, 'customerThumbsHeight', customerCon);
  });

  const SingleServiceCardGroup = document.querySelectorAll(
    '.single-service-card'
  );
  SingleServiceCardGroup.forEach((singleServiceCard) => {
    singleServiceCard.addEventListener('mousemove', (e) => {
      setCssVariable(e.layerY, 'Top', singleServiceCard);
      setCssVariable(e.layerX, 'Left', singleServiceCard);
    });
  });

  const profileGroup = document.querySelectorAll('.team-con .profile');
  //activateFirstEl(profileGroup);
  profileGroup.forEach((profile, key) => {
    profile.addEventListener('click', () => {
      activateOnly(profile, profileGroup);
    });
  });
};

ContentHome();

export { customerThumbsHeight };
