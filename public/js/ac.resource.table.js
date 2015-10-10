if (!ac) var ac = {};
if (!ac.resource) ac.resource = {};

$(function(){
    ac.resource.table = new ac.crud.parent($.extend(true, ac.resource.options, {
    }));
});
