(function( $ ) {
    $.fn.disable = function() {
        return this.attr('disabled', 'disabled');
    };

    $.fn.enable = function() {
        return this.removeAttr('disabled');
    };

    $.fn.isDisabled = function() {
        return this.attr('disabled') ? true : false;
    };

    $.fn.isEnabled = function() {
        return this.isDisabled() ? false : true;
    };

    $.fn.id = function() {
        return this.attr('id');
    };

    $.fn.acpaging = function(o) {

        if (!$.fn.paging) {
            return this;
        }

        // Normal Paging config
        var opts = {
            "perpage": 10,
            "elements": 0,
            "page": 1,
            "format": "",
            "lapping": 0,
            "onSelect": function() {
            }
        };

        $.extend(opts, o || {});

        var $li = $("li", this);

        var masks = {};

        $li.each(function(i) {

            if (0 === i)
            {
                masks.prev = $(this).html();
                opts.format += "<";
            }
            else if (i + 1 === $li.length)
            {
                masks.next = $(this).html();
                opts.format += ">";
            }
            else
            {
                masks[i] = $(this).html().replace(/#[nc]/, function(str) {
                    opts["format"] += str.replace("#", "");
                    return "([...])";
                });
            }
        });

        opts["onFormat"] = function(type) {

            var value = "";

            switch (type) {
                case 'block':

                    value = masks[this["pos"]].replace("([...])", this["value"]);

                    if (!this['active'])
                    {
                        return '<li class="disabled"><a href="#">' + value + '</a></li>';
                    }
                    if (this["page"] !== this["value"])
                    {
                        return '<li><a href="#' + this["value"] + '">' + value + '</a></li>';
                    }
                    return '<li class="active"><a href="#">' + value + '<span class="sr-only">(current)</span></a></li>';

                case 'next':
                    if (!this['active'])
                    {
                        return '<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                    }
                    return '<li><a href="#' + this["value"] + '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';

                case 'prev':
                    if (!this['active'])
                    {
                        return '<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                    }
                    return '<li><a href="#' + this["value"] + '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
            }
        };

        $(this)["paging"](opts['total'], opts);
        
        return this;
    };

}( jQuery ));