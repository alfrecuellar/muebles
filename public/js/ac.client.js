if (!ac) var ac = {};
if (!ac.client) ac.client = {};

ac.client.options = {
    entitie : "client",
    add : {
        added : function(data){
            return "El cliente " + data.client.name + " fue creado";
        }
    },
    edit : {
        edited : function(data){
            return "El cliente " + data.client.name + " fue editado";
        }
    },
    destroy : {
        title : function(data){
            return "Eliminar cliente";
        },
        msg : function(data){
            return "¿Confirma que quiere eliminar el cliente " + data.name + "?";
        },
        destroyed : function(data){
            return "El cliente " + data.name + " fue eliminado";
        }
    }
};