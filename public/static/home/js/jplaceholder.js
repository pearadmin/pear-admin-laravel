// placeholder
    function JPlaceHolder(fn) {
        var PlaceHolder = {
            //check
            _check: function () {
                return 'placeholder' in document.createElement('input');
            },
            //init
            init: function (fn) {
                if (!this._check()) {
                    this.fix(fn);
                }
            },
            //refix
            fix: function (fn) {
               $dom = jQuery('.w-placeholder > :input[placeholder],.w-placeholder > .w-guestbook-item-inner > :input[placeholder]');
                $dom.each(function (index, element) {
                    var self = $(this), txt = self.attr('placeholder');
                    self.wrap($('<div class="placeholder-text"></div>').css({}));

                    var holder = $('<div class="placeholder-text-in"></div>').text(txt).css({}).appendTo(self.parent());
                    self.val() && holder.hide();
                    self.focusin(function (e) {
                        holder.hide();
                    }).focusout(function (e) {
                        if (!self.val()) {
                            holder.show();
                        }
                    });
                    holder.click(function (e) {
                        holder.hide();
                        self.focus();
                    });
                    if (typeof fn === 'function') {
                        fn();
                    }
                });
            }
        };
        PlaceHolder.init(fn);
    }

