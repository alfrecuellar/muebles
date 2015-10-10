var Class = function(obj)
{
    var instance = function(){
        var object = $.extend(true, {}, obj);

        for (property in object)
        {
            this[property] = object[property];
        }

        if(this.construct)
            this.construct.apply(this, arguments);
    };
    return instance;
};
