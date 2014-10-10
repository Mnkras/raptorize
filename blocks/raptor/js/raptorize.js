/*
* jQuery Raptorize Plugin 3.0
* www.ZURB.com/playground
* Copyright 2010, ZURB
* Free to use under the MIT license.
* http://www.opensource.org/licenses/mit-license.php
* Hacked up by Mnkras
* 1.1: added options for the img and sounds and added support for more browsers
* 3.0: new konami detection thanks to @korvinszanto
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
          (function() {
            var sequence = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65];
            $('body').keydown(function() {
              var current_sequence = sequence,
              begun = false;

              return function(e) {
                if (current_sequence[0] === e.keyCode) {
                  begun = true;
                  current_sequence = current_sequence.slice(1);
                  if (!current_sequence.length) {
                    init();
                    begun = false;
                    current_sequence = sequence;
                  }
                } else if (begun) {
                  begun = false;
                  current_sequence = sequence;
                }
              };
            }());
          }());
          
        }

      });//each call
    }//orbit plugin call
  })(jQuery);
