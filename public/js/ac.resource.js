if (!ac) var ac = {};
if (!ac.resource) ac.resource = {};

ac.resource.options = {
    entitie : "resource",
    add : {
        added : function(data){
            return "El material " + data.resource.name + " fue creado";
        }
    },
    edit : {
        edited : function(data){
            return "El material " + data.resource.name + " fue editado";
        }
    },
    destroy : {
        title : function(data){
            return "Eliminar material";
        },
        msg : function(data){
            return "¿Confirma que quiere eliminar el material " + data.name + "?";
        },
        destroyed : function(data){
            return "El material " + data.name + " fue eliminado";
        }
    }
};
