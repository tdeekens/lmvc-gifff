;(function ( $, window, document, undefined ) {
   var
      pluginName = "giflove",
      defaults = {
         url: "gif/love"
      };

   // The actual plugin constructor
   function Plugin ( element, options ) {
      this.element = element;
      this.$element = $(element);
      this._defaults = defaults;
      this._name = pluginName;
      this.init();
   }

   Plugin.prototype = {
      init: function () {
         var that = this;

         this.gifId = this.$element.data('id');
         this.$element.on('click', function(e) {
            e.preventDefault();
            that.showLove();
         });
      },
      showLove: function () {
         var that = this;
         $.post(
            window.app.config.appUrl + this._defaults.url,
            {
               id: this.gifId
            },
            function(json) {
               if (json.errors === false) {
                  that.$element.find('.love-count').text(json.loves);
               } else {
                  alert('Was unable to share your love!');
               }
            },
            "json"
         );
      }
   };

   // A really lightweight plugin wrapper around the constructor,
   // preventing against multiple instantiations
   $.fn[ pluginName ] = function ( options ) {
      return this.each(function() {
         if ( !$.data( this, "plugin_" + pluginName ) ) {
            $.data( this, "plugin_" + pluginName, new Plugin( this, options ) );
         }
      });
   };

})( jQuery, window, document );