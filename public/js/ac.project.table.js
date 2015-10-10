if (!ac) var ac = {};
if (!ac.project) ac.project = {};

$(function(){
    ac.project.table = new ac.crud.parent({
        entitie : "project",
        relations : {
            client : ac.client.relation
        },
        add : {
            added : function(data){
                return "El proyecto " + data.project.name + " fue creado";
            }
        },
        edit : {
            edited : function(data){
                return "El proyecto " + data.project.name + " fue editado";
            }
        },
        destroy : {
            title : function(data){
                return "Eliminar proyecto";
            },
            msg : function(data){
                return "¿Confirma que quiere eliminar el proyecto " + data.name + "?";
            },
            destroyed : function(data){
                return "El proyecto " + data.name + " fue eliminado";
            }
        }
    });
});
