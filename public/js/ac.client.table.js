if (!ac) var ac = {};
if (!ac.client) ac.client = {};

$(function(){
    ac.client.table = new ac.crud.parent($.extend(true, ac.client.options, {
    }));
});
