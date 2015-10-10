if (!ac) var ac = {};
if (!ac.client) ac.client = {};

$(function(){
    ac.client.relation = new ac.crud.relation($.extend(true, ac.client.options, {
    	autoload : ['search', 'add']
    }));
});
