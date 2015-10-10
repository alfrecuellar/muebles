if (!ac) var ac = {};

ac.tools = {
    init : function()
    {
        this.msg.init();
        this.modal.init();
        this.panel.init();
    },
    handlebars : function(template, wrapper, data)
    {
        var hb_template = $(template).html();
        var hb_compile = Handlebars.compile(hb_template);
        var hb_html = hb_compile(data);
        $(wrapper).html(hb_html);
    },
    msg : {
        object : {alert : false, icon : false, title : false, content : false},
        init : function()
        {
            this.object.alert = $("#alert-msg");
            this.object.icon = $("#alert-msg-icon");
            this.object.title = $("#alert-msg-title");
            this.object.content = $("#alert-msg-content");
        },
        fail : function(x, status, error)
        {
            if(x.status == 422)
            {
                ac.tools.msg.error(x.responseJSON);
            }
            else
            {
                ac.tools.msg.error("There was an error in our system:, please try again (Error " + x.status + ": " + error +")");
            }
        },
        error : function(msg)
        {
            this.show(msg, 'error');
        },
        success : function(msg)
        {
            this.show(msg, 'success')
        },
        show: function(msg, type)
        {
            var alert_class = "alert-info";
            var icon_class = "fa-info";
            var alert_title = "Información"

            switch(type)
            {
                case "error":
                    alert_class = "alert-error";
                    icon_class = "fa-ban";
                    alert_title = "Error"
                break;

                case "warning":
                    alert_class = "alert-warning";
                    icon_class = "fa-exclamation-circle";
                    alert_title = "Cuidado"
                break;

                case "success":
                    alert_class = "alert-success";
                    icon_class = "fa-check-circle";
                    alert_title = "Éxito"
                break;
            }

            this.object.alert.removeClass("alert-error alert-warning alert-info alert-success").addClass(alert_class);
            this.object.icon.removeClass("fa-info fa-ban fa-exclamation-circle fa-check-circle").addClass(icon_class);
            this.object.title.html(alert_title);

            this.object.alert.collapse("show");

            if(typeof msg === 'string')
            {
                this.object.content.html(msg);
            }
            else
            {
                var content = "<ul>";
                $.each(msg, function(i, row){
                    content += "<li>"+ row +"</a>";
                });
                content += "</ul>";

                this.object.content.html(content);
            }
            $(window).scrollTo(this.object.alert, {offset : -60});
        }
    },
    modal : {
        object: {wrapper : false, dialog : false, title : false, content : false, btn : false},
        config : {
            confirm : "Confirmar",
            btn : "Ok",
            size : "modal-sm"
        },
        init : function()
        {
            this.object.wrapper = $("#wrapper-modal");
            this.object.dialog  = this.object.wrapper.find(".modal-dialog");
            this.object.title   = this.object.wrapper.find(".modal-title");
            this.object.content = this.object.wrapper.find(".modal-body");
            this.object.btn     = this.object.wrapper.find(".btn-primary");
        },
        confirm : function(options)
        {
            this.show(options.title, options.msg);
            this.callback(this.config.confirm, options.callback);
        },
        handlebars : function(title, template, data)
        {
            var text = arguments[3] ? arguments[3] : this.config.btn;
            var callback = arguments[4] ? arguments[4] : false;
            this.show(title, "");
            ac.tools.handlebars(template, this.object.content, data);
            if(callback)
            {
                this.callback(text, callback);
            }
        },
        callback : function(text, callback)
        {
            this.object.btn.removeClass("hide").html(text).click(function(){
                callback();
                ac.tools.modal.hide();
            });
        },
        show : function(title, content)
        {
            this.object.title.html(title);
            this.object.content.html(content);
            this.object.wrapper.modal("show");
        },
        hide : function()
        {
            this.object.wrapper.modal("hide");
            this.size(this.config.size);
            this.object.title.html("");
            this.object.content.html("");
            this.object.btn.addClass("hide").html(this.config.btn).off( "click");
        },
        size : function(size)
        {
            this.object.dialog.removeClass("modal-sm modal-lg").addClass(size);
        }
    },
    panel : {
        init : function()
        {

        },
        only : function(selector)
        {
            $("#content-dashboard .collapse:not("+selector+", alert.collapse)").collapse("hide");
            this.show(selector);
        },
        hide : function()
        {
            if(arguments.length)
                $(arguments[0]).collapse("hide");
            else
                $("#content-dashboard .collapse").collapse("hide");
        },
        show : function()
        {
            if(arguments.length)
                $(arguments[0]).collapse("show");
            else
                $("#content-dashboard .collapse").collapse("show");
        },
        loading : function(selector)
        {
            $(selector).show();
        },
        loaded : function(selector)
        {
            $(selector).hide();
        },
    },
    paging : function(data, div, callback)
    {
        if(data.pages > 1)
        {
            $(div).append('<nav><ul id="paging" class="pagination"><li>Prev</li><li>#n</li><li>#n</li><li>#c</li><li>#n</li><li>#n</li><li>Next</li></ul></nav>');
            $("#paging").acpaging({
                total: data.total,
                perpage : data.perpage,
                page : data.page,
                onSelect: function(page)
                {
                    if(data.page != page)
                    {
                        callback(page);
                    }
                }
            });
        }
    }
};

$(function(){
    ac.tools.init();
});