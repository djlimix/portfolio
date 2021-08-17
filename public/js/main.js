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