const rootEl = document.querySelector(':root');
const containerEL = document.querySelector('.container');
const headerEl = document.querySelector('header');
let headerHeight, marginFromSide;

export const makeKebab = (str) =>
  str.replace(
    /[A-Z]+(?![a-z])|[A-Z]/g,
    ($, ofs) => (ofs ? '-' : '') + $.toLowerCase()
  );

export const setCssVariable = (value, name, parent = rootEl, prefix = 'px') => {
  const kebabName = makeKebab(name);
  parent.style.setProperty(`--${kebabName}`, value + prefix);
};

export const setCssVariableGroup = () => {
  headerHeight = headerEl.getClientRects()[0].height;

  const containerWidth = containerEL.clientWidth;
  marginFromSide = (window.innerWidth - containerWidth) / 2;

  setCssVariable(headerHeight, 'headerHeight');
  setCssVariable(marginFromSide, 'marginFromSide');
};

//Global Vars
window.addEventListener('load', setCssVariableGroup);
window.addEventListener('resize', setCssVariableGroup);

//Services Home Page Vars

export { headerHeight, marginFromSide };
