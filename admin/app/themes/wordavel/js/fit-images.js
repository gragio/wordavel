/**
 * Add a css class to the background images in order to fit their container
 */

var FitImages = Class.extend({
  init: function() {
    var self = this;

    self.$ = {
      imgContainers: $('.fit-img-container'),
    };

    self.fitImages();

    $(window).resize(function() {
      self.fitImages();
    });

  },

  fitImages: function() {
    var self = this;

    self.$.imgContainers.each(function(i, el) {
      var
      $imgContainer = $(this),
      $img          = $imgContainer.children('img');

      if ($img.prop('complete')) {
        self.applyClass($imgContainer, $img);
      }
      else {
        $img.load(function() {
          self.applyClass($imgContainer, $img);
        });
      }
    });
  },

  applyClass: function($imgContainer, $img) {
    var
    containerRatio = $imgContainer.width() / $imgContainer.height(),
    imgRatio       = $img.width() / $img.height();

    if (imgRatio < containerRatio) {
      $img.addClass('fit-width').removeClass('fit-height');
    }
    else {
      $img.addClass('fit-height').removeClass('fit-width');
    }
  },

    rescanImages: function() {
        this.$.imgContainers = $('.fit-img-container');
        this.fitImages();
    }
  });
