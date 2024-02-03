import gsap from 'gsap';
import { EasePack, ScrollToPlugin, ScrollTrigger } from 'gsap/all';
import { toggleFadeOff, toggleShow } from '../../modules/classHandler';
import {
  singlePlanetThreeTL,
  singlePlanetThreeEclipseTL,
} from './singlePlanet';

gsap.registerPlugin(ScrollTrigger, ScrollToPlugin, EasePack);

const PreloaderHome = () => {
  //Elements
  const mainFrontPage = document.querySelector('main.front-page');
  const clockEl = document.querySelector('.clock');
  const preClockScrollDown = document.querySelector('.pre-clock .scroll-down');
  const clockSection = document.querySelector('.clock-section');
  const clockInnerElements = document.querySelectorAll(
    '.content .mask-wrapper > *'
  );
  const letsGo = document.querySelector('#letsGo');
  const bottomFire = document.querySelector('.bottom-fire');
  const singlePlanetContent = document.querySelector(
    '#singlePlanet .content h2'
  );
  const singlePlanetScroll = document.querySelector(
    '#singlePlanet .content .scroll'
  );
  const multiPlanetSection = document.querySelector('.multi-planet');
  const multiPlanetGroup = document.querySelectorAll(
    '.multi-planet .planet-con'
  );

  //TimeLines Config
  const clockSpinTL = gsap.timeline();
  const preloader_TL = gsap.timeline({ defaults: { duration: 1 } });
  const slide2Content_TL = gsap.timeline();
  const singlePlanet_TL = gsap.timeline();
  const multiPlanet_TL = gsap.timeline();

  //Functions
  const endClock = () => {
    toggleShow(clockSection, true);
    toggleFadeOff(bottomFire, true);
    clockSpinTL.timeScale(0.05);
  };

  const backToStart = () => {
    clockSpinTL.timeScale(1);
    toggleShow(clockSection, false);
    toggleFadeOff(bottomFire, false);
  };

  const clickToLabel = (el, label) => {
    el.addEventListener('click', () => {
      gsap.to(window, {
        duration: 5,
        scrollTo: preloader_TL.scrollTrigger.labelToScroll(label),
      });
    });
  };

  const startMultiPlanet = () => {
    toggleShow(multiPlanetSection, true);
  };

  //TimeLines
  clockSpinTL.to(clockEl, {
    duration: 5,
    repeat: -1,
    ease: 'none',
    '--rotate': 360,
  });

  clockInnerElements.forEach((el, i) => {
    slide2Content_TL.fromTo(
      el,
      {
        y: 100,
        opacity: 0,
        duration: 1000,
        ease: 'ease',
        delay: i * 5,
      },
      {
        y: 0,
        opacity: 1,
      }
    );
  });

  singlePlanet_TL
    .add(singlePlanetThreeTL)
    .from(singlePlanetContent, {
      yPercent: 200,
      duration: 2,
      delay: +3,
    })
    .from(singlePlanetScroll, {
      opacity: 0,
      duration: 2,
    });

  multiPlanet_TL.to('.multi-planet', { opacity: 1 });
  multiPlanetGroup.forEach((planet) => {
    multiPlanet_TL.from(planet, { y: 50, opacity: 0 });
  });
  multiPlanet_TL.fromTo(
    '.multi-planet .scroll-down',
    { opacity: 0, y: 100 },
    { opacity: 1, y: 0 }
  );

  //MainTimeline
  preloader_TL.addLabel('start');
  preloader_TL.to('.clock', { scale: 18, onComplete: endClock });
  preloader_TL.addLabel('endClock');
  preloader_TL.add(slide2Content_TL, 'endClock');
  preloader_TL.addLabel('endShowingContent');
  preloader_TL.to('.clock', {
    borderRadius: 0,
  });
  preloader_TL
    .to('.pre-clock , .clock-section, .clock', {
      y: window.innerHeight * -1,
      duration: 3,
    })
    .addLabel('endOfSlide2');
  preloader_TL
    .add(singlePlanet_TL, 'endSinglePlanet')
    .addLabel('endSinglePlanetContent')
    .add(singlePlanetThreeEclipseTL, 'endSinglePlanetContent')
    .to([singlePlanetContent, singlePlanetScroll], {
      opacity: 0,
      duration: 1,
      delay: '+2',
      onComplete: startMultiPlanet,
    })
    .addLabel('startMultiPlanet')
    .add(multiPlanet_TL)
    .addLabel('endMultiPlanet');

  //Scroll Trigger
  ScrollTrigger.create({
    animation: preloader_TL,
    trigger: 'body',
    pin: true,
    scrub: 2,
    start: '+1',
    end: '+3000',
    onLeaveBack: backToStart,
  });

  clickToLabel(preClockScrollDown, 'endShowingContent');
  clickToLabel(letsGo, 'endOfSlide2');
};

PreloaderHome();
