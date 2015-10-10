if (!ac) var ac = {};
if (!ac.crud) ac.crud = {};

/* ********** CLASES ACCESORIAS ********** */
ac.crud.render = Class({
    options : {
        handlebars : {
            compile : false,
            template : " .hbt",
            wrapper : " .hbw",
            data : {}
        },
        ajax : {
            url : false,
            type : "GET",
            processData : true
        },
        event : {
            done : function(){},
            error : function(){},
            always : function(){}
        },
        method : "get"
    },
    construct : function(options)
    {

        if(typeof options.ajax.data == "function")
            options.ajax.data = options.ajax.data();

        this.options = $.extend(true, this.options, options);
        if(this.options.handlebars.compile)
            $(this.options.handlebars.wrapper).html("");

        if(this.options.ajax.url)
            this[this.options.method]();
        else if(this.options.handlebars.compile)
            this.handlebars();
    },
    get : function()
    {
        this.options.ajax = $.extend(true, this.options.ajax, {
            type : "GET"
        });
        this.ajax();
    },
    post : function()
    {
        this.options.ajax = $.extend(true, this.options.ajax, {
            type : "POST",
            data : {
                _token : ac.config._token
            }
        });
        this.ajax();
    },
    put : function()
    {
        this.options.ajax = $.extend(true, this.options.ajax, {
            type : "PUT",
            data : {
                _token : ac.config._token
            }
        });
        this.ajax();
    },
    delete : function()
    {
        this.options.ajax = $.extend(true, this.options.ajax, {
            type : "DELETE",
            data : {
                _token : ac.config._token
            }
        });
        this.ajax();
    },
    ajax : function()
    {
        var context = this;
        var options = this.options;
        $.ajax({
            url : ac.config.url + options.ajax.url,
            dataType : 'json',
            type: options.ajax.type,
            processData : options.ajax.processData,
            data : options.ajax.data
        })
        .done(function(data) {
            if (!data.errors)
            {
                if(context.options.handlebars.compile)
                    context.handlebars(data);
                else
                    context.done(data);
            }
            else
            {
                context.options.event.error(data);
            }
        })
        .fail(context.options.event.error)
        .always(function(){
            context.options.event.always();
        });
    },
    handlebars : function()
    {
        var data = arguments[0] ? arguments[0] : this.options.handlebars.data;
        ac.tools.handlebars(this.options.handlebars.template, this.options.handlebars.wrapper, data);
        this.done(data);
        this.options.event.always();
    },
    done : function(data)
    {
        this.options.event.done(data);
    }
});

/* ********** MODOS DE UI ********** */
ac.crud.modal = Class({
    options : {
        div : false,
        id : false,
        parent : false,
        modal : $("#crud_modal"),
        autoload : 'load',
        load : {
            url : false,
            handlebars : true,
            data : {},
            done : function(){},
            submit : false
        },
        send : {
            url : false,
            data : {},
            done : function(){},
            method : "post"
        }
    },
    construct : function(options)
    {
        this.options = $.extend(true, this.options, options);
        this.options.div = $(this.options.id);

        this[this.options.autoload]();
    },
    load : function()
    {
        var options = this.options;
        var context = this;

        new ac.crud.render({
            ajax : {
                url : options.load.url,
                data : options.load.data
            },
            handlebars : {
                compile : options.load.handlebars,
                template : options.div.find('.hbt'),
                wrapper : options.modal.find('.hbw'),
                data : options.load.data
            },
            event : {
                done : function(data){
                    context.show();
                    if(options.load.submit)
                    {
                        $(options.modal.find('form')).submit(function(){
                            context.send();
                            return false;
                        });
                    }
                    options.load.done(context, data);
                },
                error : context.fail
            },
            autoload : "get"
        });
    },
    send : function()
    {
        var options = this.options;
        var context = this;

        options.div.find("form button[type=submit]").disable();

        new ac.crud.render({
            ajax : {
                url : options.send.url,
                data : options.send.data
            },
            event : {
                done : function(data){
                    options.send.done(context, data);
                },
                always : function(){
                    options.div.find("form button[type=submit]").enable();
                },
                error : context.fail
            },
            method : options.send.method
        });
    },
    show : function()
    {
        $(this.options.modal).modal('show');
    },
    hide : function()
    {
        $(this.options.modal).modal('hide');
    },
    fail : function(x, status, error)
    {
        this.alert("There was an error in our system:, please try again (Error " + x.status + ": " + error +")", "error");
    },
    alert : function(msg)
    {
        var type = arguments[1] ? arguments[1] : "info";
        this.options.modal.find("div.modal-body").prepend('<div class="alert alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-ban"></i> <span class="title"></span></h4><span class="msg"></span><div>');
        var alert = this.options.modal.find("div.alert");

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

        alert.removeClass("alert-error alert-warning alert-info alert-success").addClass(alert_class);
        alert.find("i.icon").removeClass("fa-info fa-ban fa-exclamation-circle fa-check-circle").addClass(icon_class);
        alert.find("span.title").html(alert_title);

        if(typeof msg === 'string')
        {
            alert.find("span.msg").html(msg);
        }
        else
        {
            var ul = "<ul>";
            $.each(msg, function(i, row){
                ul += "<li>"+ row +"</a>";
            });
            ul += "</ul>";

            alert.find("span.msg").html(ul);
        }
    }
});

ac.crud.collapse = Class({
    options : {
        div : false,
        id : false,
        parent : false,
        autoload : 'load',
        load : {
            url : false,
            handlebars : true,
            data : {},
            done : function(){},
            submit : false
        },
        send : {
            url : false,
            data : {},
            done : function(){},
            method : "post"
        }
    },
    construct : function(options)
    {
        this.options = $.extend(true, this.options, options);
        this.options.div = $(this.options.id);

        this[this.options.autoload]();
    },
    load : function()
    {
        var options = this.options;
        var context = this;

        this.show(true);
        options.div.find('.overlay').show();

        new ac.crud.render({
            ajax : {
                url : options.load.url,
                data : options.load.data
            },
            handlebars : {
                compile : options.load.handlebars,
                template : options.div.find('.hbt'),
                wrapper : options.div.find('.hbw'),
                data : options.load.data
            },
            event : {
                done : function(data)
                {
                    if(options.load.submit)
                    {
                        $(options.div.find('form')).submit(function(){
                            context.send();
                            return false;
                        });
                    }
                    options.load.done(data);
                    $(options.div.find('[data-action=cancel]')).click(function(){
                        context.hide();
                    });
                },
                always : function()
                {
                    options.div.find('.overlay').hide();
                },
                error : ac.tools.msg.fail
            },
            autoload : "get"
        });
    },
    send : function()
    {
        var options = this.options;
        var context = this;

        this.show(true);
        options.div.find('.overlay').show();
        options.div.find("form button[type=submit]").disable();

        var render = new ac.crud.render({
            ajax : {
                url : options.send.url,
                data : options.send.data
            },
            event : {
                done : function(data){
                    options.send.done(data);
                    options.parent.load();
                },
                always : function(){
                    options.div.find("form button[type=submit]").enable();
                    options.div.find('.overlay').hide();
                },
                error : ac.tools.msg.fail
            },
            method : options.send.method
        });
    },
    show : function(only)
    {
        if(only)
            $(".crud .collapse:not(" + this.options.id + " .collapse)").collapse('hide');

        if(!this.options.div.find('.collapse').hasClass('in'))
            this.options.div.find('.collapse').collapse('show');
    },
    hide : function()
    {
        this.options.div.find('.collapse').collapse('hide');
        this.options.parent.load();
    }
});

/* ********** TIPOS DE CRUD ********** */
ac.crud.parent = Class({
    parent : false,
    options : {
        entitie : false,
        relations : [],
        transitions : [],
        table : {
            wrapper : "#crud_table",
            paging : {
                page : 1,
                perpage : 20,
                wrapper : "#crud_table .hbw"
            },
            data : {}
        },
        show : {
            wrapper : "#crud_show",
            trigger : "#crud_table [data-action=show]"
        },
        add : {
            wrapper : "#crud_add",
            trigger : "#crud_table [data-action=add]",
            added : function(){
                return "The " + opt.entitie + " was created";
            }
        },
        edit : {
            wrapper : "#crud_edit",
            trigger : "#crud_table [data-action=edit]",
            edited : function(){
                return "The " + opt.entitie + " was edited";
            }
        },
        destroy : {
            trigger : "#crud_table [data-action=destroy]",
            title : function(trigger){
                return "Delete " + opt.entitie;
            },
            msg : function(trigger){
                return "Are you sure you want to delete the " + opt.entitie + "?";
            },
            destroyed : function(data){
                return "The " + opt.entitie + " was deleted";
            }
        }
    },
    construct : function(options)
    {
        this.options = $.extend(true, this.options, options);
        this.table();
        this.add();
    },
    table : function()
    {
        if(arguments[0])
            this.options.table.paging.page = arguments[0];

        var options = this.options;
        var context = this;
        this.parent = new ac.crud.collapse({
            id : options.table.wrapper,
            load : {
                url : options.entitie,
                data : {
                    page : options.table.paging.page,
                    perpage : options.table.paging.perpage
                },
                handlebars : true,
                done : function(data){
                    context.show();
                    context.add();
                    context.edit();
                    context.destroy();

                    ac.tools.paging(data.paging, options.table.paging.wrapper, function(page){
                        context.table.call(context, page);
                    })
                }
            }
        });
    },
    show : function()
    {
        var context = this;
        $(this.options.show.trigger).click(function(){
            new ac.crud.collapse({
                id : context.options.show.wrapper,
                parent : context.parent,
                load : {
                    url : context.options.entitie + '/' + $(this).data('id'),
                    handlebars : true
                }
            });
        });
    },
    add : function()
    {
        var context = this;
        var options = this.options;
        $(options.add.trigger).click(function(){
            new ac.crud.collapse({
                id : options.add.wrapper,
                parent : context.parent,
                load : {
                    handlebars : true,
                    submit : true,
                    done : function() {
                        context.relations()
                    }
                },
                send : {
                    url : options.entitie,
                    method : 'post',
                    data : function(){
                        return $(options.add.wrapper).find('form').serializeObject()
                    },
                    done : function(data) {
                        ac.tools.msg.success(options.add.added(data));
                    }
                }
            });
        });
    },
    edit : function()
    {
        var context = this;
        var options = this.options;
        $(options.edit.trigger).click(function(){
            new ac.crud.collapse({
                id : options.edit.wrapper,
                parent : context.parent,
                load : {
                    url : options.entitie + '/' + $(this).data('id') + '/edit',
                    handlebars : true,
                    submit : true,
                    done : function() {
                        context.relations()
                    }
                },
                send : {
                    url : options.entitie + '/' + $(this).data('id'),
                    method : 'put',
                    data : function(){
                        var data = $(options.edit.wrapper).find('form').serializeObject();
                        return data;
                    },
                    done : function(data) {
                        ac.tools.msg.success(options.edit.edited(data));
                    }
                }
            });
        });
    },
    destroy : function()
    {    
        var context = this;
        var options = this.options;
        $(options.destroy.trigger).click(function(){
            var trigger = $(this);
            var title = options.destroy.title(trigger.data());
            var msg = options.destroy.msg(trigger.data());
            ac.tools.modal.confirm({
                title : title,
                msg : msg,
                callback : function(){
                    new ac.crud.collapse({
                        parent : context.parent,
                        autoload : 'send',
                        send : {
                            url : options.entitie + '/' + trigger.data('id'),
                            method : 'delete',
                            done : function(data)
                            {
                                ac.tools.msg.success(options.destroy.destroyed(data));
                            }
                        }
                    });
                }
            });
        });
    },
    relations : function()
    {
        for(var relation in this.options.relations)
        {
            this.options.relations[relation].options.entitie_parent = this.options.entitie;
            this.options.relations[relation].load();
        }
    }
});

ac.crud.relation = Class({
    main : false,
    options : {
        entitie : false,
        entitie_parent : false,
        parent : false,
        autoload : ['search'],
    },
    construct : function(options)
    {
        this.options = $.extend(true, this.options, {
            target : {
                text : "[data-relation=" + options.entitie + "][data-target=text]",
                id : "[data-relation=" + options.entitie + "][data-target=id]"
            },
            search : {
                wrapper : "[data-relation=" + options.entitie + "][data-template=search]",
                trigger : "[data-relation=" + options.entitie + "][data-action=search]",
                submit : "[data-relation=" + options.entitie + "][data-action=submit]",
                typeahead : {
                    source : [],
                    trigger : "[data-relation=" + options.entitie + "][data-action=typeahead][data-typeahead=trigger]",
                    target : "[data-relation=" + options.entitie + "][data-action=typeahead][data-typeahead=target]",
                    select : function(){}
                }
            },
            show : {
                wrapper : "[data-relation=" + options.entitie + "][data-template=show]",
                trigger : "[data-relation=" + options.entitie + "][data-action=show]",
                submit : "[data-relation=" + options.entitie + "][data-action=submit]"
            },
            add : {
                wrapper : "[data-relation=" + options.entitie + "][data-template=add]",
                trigger : "[data-relation=" + options.entitie + "][data-action=add]",
                submit : "[data-relation=" + options.entitie + "][data-action=submit]",
                added : function(){
                    return "The " + options.entitie + " was created";
                }
            },
            edit : {
                wrapper : "[data-relation=" + options.entitie + "][data-template=edit]",
                trigger : "[data-relation=" + options.entitie + "][data-action=edit]",
                submit : "[data-relation=" + options.entitie + "][data-action=submit]",
                edited : function(){
                    return "The " + options.entitie + " was edited";
                }
            },
            destroy : {
                trigger : "[data-relation=" + options.entitie + "][data-action=destroy]",
                title : function(trigger){
                    return "Delete " + options.entitie;
                },
                msg : function(trigger){
                    return "Are you sure you want to delete the " + options.entitie + "?";
                },
                destroyed : function(data){
                    return "The " + options.entitie + " was deleted";
                }
            }
        }, options)
    },
    load : function()
    {
        for(var i in this.options.autoload)
        {
            this[this.options.autoload[i]]();
        }
    },
    search : function()
    {
        var context = this;
        var options = this.options;
        $(options.search.trigger).off('click');
        $(options.search.trigger).click(function(){
            context.main = new ac.crud.modal({
                id : options.search.wrapper,
                load : {
                    handlebars : true,
                    done : function(modal, data){
                        $.getJSON(ac.config.url + options.entitie + "/typeahead", function(json){
                            $(options.search.submit).click(function(){
                                $(options.target.text).val($(".tt-input"+options.search.typeahead.trigger).val());
                                $(options.target.id).val($(options.search.typeahead.target).val());
                                modal.hide();
                            });

                            var source = new Bloodhound({
                                datumTokenizer:  function (data) {
                                    return Bloodhound.tokenizers.whitespace(data.name);
                                },
                                queryTokenizer: Bloodhound.tokenizers.whitespace,
                                local: json.data
                            });

                            $(options.search.typeahead.trigger).typeahead({
                                hint: true,
                                highlight: true,
                                minLength: 2
                            },{
                                name: 'name',
                                displayKey: 'name',
                                source: source
                            });
                            $(options.search.typeahead.trigger).bind('typeahead:select', function(ev, suggestion) {
                                $(options.search.typeahead.target).val(suggestion.id);
                                options.search.typeahead.select(suggestion);
                                $(options.search.submit).enable();

                                $.getJSON(ac.config.url + options.entitie + "/" + suggestion.id, function(json){
                                    $(modal.options.modal).find('.resume_wrapper').show();
                                    ac.tools.handlebars($(options.show.wrapper).find('.hbt'), $(modal.options.modal).find('.resume_wrapper'), json);

                                    $(modal.options.modal).find('[data-action=edit]').data('id', suggestion.id).show();
                                    context.edit();
                                });
                            });
                        });
                    }
                }
            });
        });
    },
    add : function()
    {
        var context = this;
        var options = this.options;
        $(options.add.trigger).off('click');
        $(options.add.trigger).click(function(){
            context.main = new ac.crud.modal({
                id : options.add.wrapper,
                load : {
                    handlebars : true,
                    submit : true,
                    done : function(modal, data){
                    }
                },
                send : {
                    url : options.entitie,
                    method : 'post',
                    data : function(){
                        return $(options.add.wrapper).find('form').serializeObject()
                    },
                    done : function(modal, data) {
                        $(modal.options.modal).find('.form_wrapper, [type=submit]').hide();
                        $(modal.options.modal).find('.resume_wrapper, [data-action=submit], [data-action=edit]').show();
                        ac.tools.handlebars($(options.show.wrapper).find('.hbt'), $(modal.options.modal).find('.resume_wrapper'), data);
                        $(options.add.submit).click(function(){
                            $(options.target.text).val(data.client.name);
                            $(options.target.id).val(data.client.id);
                            modal.hide();
                        });
                        $(modal.options.modal).find('[data-action=edit]').data('id', data.client.id);
                        context.edit();
                    }
                }
            });
        });
    },
    edit : function()
    {
        var context = this;
        var options = this.options;
        $(options.edit.trigger).off('click');
        $(options.edit.trigger).click(function(){
            context.main = new ac.crud.modal({
                id : options.edit.wrapper,
                load : {
                    url : options.entitie + '/' + $(this).data('id') + '/edit',
                    handlebars : true,
                    submit : true,
                    done : function(modal, data){
                    }
                },
                send : {
                    url : options.entitie,
                    method : 'post',
                    data : function(){
                        return $(options.add.wrapper).find('form').serializeObject()
                    },
                    done : function(modal, data) {
                        $(modal.options.modal).find('.form_wrapper, [type=submit]').hide();
                        $(modal.options.modal).find('.resume_wrapper, [data-action=submit], [data-action=edit]').show();
                        ac.tools.handlebars($(options.show.wrapper).find('.hbt'), $(modal.options.modal).find('.resume_wrapper'), data);
                        $(options.edit.submit).click(function(){
                            $(options.target.text).val(data.client.name);
                            $(options.target.id).val(data.client.id);
                            modal.hide();
                        });
                        context.edit();
                    }
                }
            });
        });
    }
});

ac.crud.transition = Class({
});
