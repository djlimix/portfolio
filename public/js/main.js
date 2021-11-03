(function () {
  let scroll = new LocomotiveScroll({
	el: document.querySelector('[data-scroll-container]'),
	smooth: true,
	tablet: {
	  smooth: true
	}
  });
  const swup = new Swup(); // only this line when included with script tag
  swup.on('contentReplaced', () => {
    scroll.destroy();
	scroll = new LocomotiveScroll({
	  el: document.querySelector('[data-scroll-container]'),
	  smooth: true,
	  tablet: {
		smooth: true
	  }
	});
  });
})();

const showDescription = el => {
    const div = document.querySelector(`#${el}`)

    if (div.style.height === 'auto') {
        div.style.height = 0;
    } else {
        div.style.height = 'auto'
    }
}
