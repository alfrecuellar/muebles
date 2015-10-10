if (!ac) var ac = {};
if (!ac.resource) ac.resource = {};

$(function(){
    ac.resource.transition = new ac.crud.transition($.extend(true, ac.resource.options, {
    	autoload : ['search', 'add']
    }));
});
