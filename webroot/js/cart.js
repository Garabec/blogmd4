$(document).ready(function(){

$("a[id|='add']").on('click', function() {
    
            id = $(this).attr('id').split('-');
            
            id = id[1];
            
            $.get("/book/addCart/" + id, alert('Product ' + id + ' added'));
            
        });
        
});