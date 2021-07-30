(function() {
	'use strict';
    const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

    if (isMobile) {
        const links = document.querySelectorAll('.ln-link');
        for (const link of links) {
            link.addEventListener('click', clickedLink);
        }
        function clickedLink(e) {
            e.preventDefault();
            this.removeEventListener('click', clickedLink);
            this.addEventListener('blur', () => this.addEventListener('click', clickedLink));
        }
    }
})();
