(function () {
    var process_scripts = false
		rep = /.*\?.*/,
		links = document.getElementsByTagName('link'),
		images = document.getElementsByTagName('img'),
		scripts = document.getElementsByTagName('script')
		value = document.getElementsByName('clear-browser-cache');
    
	if(value) {
		for (var i = 0; i < value.length; i++) {
			var val = value[i],
				outerHTML = val.outerHTML,
				check = /.*value="true".*/;
			if (check.test(outerHTML)) {
				process_scripts = true;
			}
		}
	}
    
	if(links) {
		for (var i = 0; i < links.length; i++) {
			var link = links[i],
				href = link.href;
			if(href) {
				if (rep.test(href)) {
					link.href = href + '&' + Date.now();
				} else {
					link.href = href + '?' + Date.now();
				}
			}
		}
	}
	
	if(images) {
		for (var i = 0; i < images.length; i++) {
			var image = images[i],
				src = image.src;
			if (src !== "") {
				if (rep.test(src)) {
					image.src = src + '&' + Date.now();
				}
				else {
					image.src = src + '?' + Date.now();
				}
			}
		}
	}
	
    if (process_scripts && scripts) {
        for (var i = 0; i < scripts.length; i++) {
            var script = scripts[i],
				src = script.src;
            if (src !== "") {
                if (rep.test(src)) {
                    script.src = src + '&' + Date.now();
                } else {
                    script.src = src + '?' + Date.now();
                }
            }
        }
    }
})();