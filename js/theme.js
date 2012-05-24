(function($, undefined) {

  var THEME = (function () {

    var api = {}
      , currInfoSection
      , infoBoxes = {}
      , infoBoxInitialisers = {};

    // Theme api
    api.init = function () {
      $('.info-box-loader').on("click", api.loadInfoBox);
    };

    // load info box from the top info bar such as the about
    // me section and the site configuration options
    api.loadInfoBox = function (ev) {

      var section = $(this).data('infosection') || 'about'
        , $infoBox = $('#info-box')
        , box;

      if ($infoBox.is(':visible') && currInfoSection === section) {
        $infoBox.animate({top: '-300px'}, 200, function () {
          $infoBox.slideUp(200);
        });
      }
      else {

        if (typeof infoBoxes[section] !== 'object') {
          infoBoxes[section] = api.loadInfoSection(section);
          $infoBox.append(infoBoxes[section]);
        }

        for (box in infoBoxes) {
          if (infoBoxes.hasOwnProperty(box)) {
            infoBoxes[box].style.zIndex = 1;
          }
        }
        infoBoxes[section].style.zIndex = 2;
        $infoBox.slideDown(200, function () {
          $infoBox.animate({top: 0}, 600, 'easeOutBounce', function () {
            if (
              typeof infoBoxes[section]._ldd === 'undefined' && 
              section in infoBoxInitialisers
            ) {
              infoBoxes[section]._ldd = true;
              infoBoxInitialisers[section].call(infoBoxes[section]);
            }
          });
        });

      }

      currInfoSection = section;
      ev.preventDefault();

    };

    // loads an info box section page partial
    api.loadInfoSection = function (section) {
      
      var innerBox = document.createElement('div');

      $.get(section, {_ap: 1}, function (html) {

        if (html) {
          innerBox.innerHTML = html;
        }

      });
      
      innerBox.className = 'info-box-window loading';
      return innerBox;

    };

    // Info boxes

    // the about me section with coderwall badges and the skill bars
    infoBoxInitialisers.about = function () {

      var $infoBox = $(this);

      $infoBox.find('.skill-level').each(function () {
        
        var $sl = $(this)
          , level = ($sl.data('level') || 0) + '%';

        if (Modernizr.csstransitions) {
          $sl.css('width', level);
        }
        else {
          $sl.animate({width: level}, 2000, 'easeInOutQuad');
        }

      });

      $.getJSON('app/cache/api.php?s=cw', function (data) {

        var $cw;

        if (data && 'badges' in data) {
          $cw = $infoBox.find('#cw-badges');
          $.each(data.badges, function (i, badge) {

            var img = new Image;
            img.src = badge.badge;
            img.alt = badge.name;
            img.title = badge.description;
            img.className = 'cw-badge';
            $cw.append(img);

          });
        }

      });

    };

    return api;

  }());

  $(THEME.init);

})(jQuery);
