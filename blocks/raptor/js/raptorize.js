/*
 * jQuery Raptorize Plugin 1.1
 * www.ZURB.com/playground
 * Copyright 2010, ZURB
 * Free to use under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * Hacked up by Mnkras
 * 1.1: added options for the img and sounds and added support for more browsers
 * http://mnkras.com
*/


(function($) {

    $.fn.raptorize = function(options) {

        //Yo' defaults
        var defaults = {
            enterOn: 'click', //timer, konami-code, click
            delayTime: 5000, //time before raptor attacks on timer mode
            img: 'raptor.png', //what image to use
            mp3: 'raptor-sound.mp3', //path to the mp3
            ogg: 'raptor-sound.ogg' //path to the ogg
            };

        //Extend those options
        var options = $.extend(defaults, options);

        return this.each(function() {

			var _this = $(this);
			var audioSupported = false;
			var audioSupported = !!(document.createElement('audio').canPlayType);

			//Raptor Vars
			var raptorImageMarkup = '<img id="elRaptor" style="display: none" src="' + options.img + '" />'
			var raptorAudioMarkup = '<audio id="elRaptorShriek" preload="auto"><source src="' + options.mp3 + '" /><source src="' + options.ogg + '" /></audio>';
			var locked = false;

			//Append Raptor and Style
			$('body').append(raptorImageMarkup);
 			if(audioSupported) { $('body').append(raptorAudioMarkup); }
			var raptor = $('#elRaptor').css({
				"position":"fixed",
				"bottom": "-700px",
				"right" : "0",
				"display" : "block"
			})

			// Animating Code
			function init() {
				locked = true;

				//Sound Hilarity
				if(audioSupported) {
					function playSound() {
						document.getElementById('elRaptorShriek').play();
					}
					playSound();
				}

				// Movement Hilarity
				raptor.animate({
					"bottom" : "0"
				}, function() {
					$(this).animate({
						"bottom" : "-130px"
					}, 100, function() {
						var offset = (($(this).position().left)+400);
						$(this).delay(300).animate({
							"right" : offset
						}, 2200, function() {
							raptor = $('#elRaptor').css({
								"bottom": "-700px",
								"right" : "0"
							})
							locked = false;
						})
					});
				});
			}


			//Determine Entrance
			if(options.enterOn == 'timer') {
				setTimeout(init, options.delayTime);
			} else if(options.enterOn == 'click') {
				_this.bind('click', function(e) {
					e.preventDefault();
					if(!locked) {
						init();
					}
				})
			} else if(options.enterOn == 'konami-code'){
			    var kkeys = [], konami = "38,38,40,40,37,39,37,39,66,65";
			    $(window).bind("keydown.raptorz", function(e){
			        kkeys.push( e.keyCode );
			        if ( kkeys.toString().indexOf( konami ) >= 0 ) {
			        	init();
			        	$(window).unbind('keydown.raptorz');
			        }
			    });

			}

        });//each call
    }//orbit plugin call
})(jQuery);
