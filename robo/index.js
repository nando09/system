function post(urlApi, data, success, error){
	$.ajax({
     type: "POST",
     dataType: 'json',
	 url: urlApi,
     data: JSON.stringify(data),// now data come in this function
     contentType: "application/json; charset=utf-8",
     crossDomain: true,
     success: function (data, status, jqXHR) {
         success(data, status, jqXHR);
     },
     error: function (jqXHR, status) {
         error(jqXHR, status)        
     }
  });
}

function inicialize(){
    obj = {
        nome: $("nome").val()
    };

    post('index.php', obj, 
        function (data, status, jqXHR){
            console.log('success',data, status, jqXHR);
        },function (jqXHR, status){
            console.log('error', jqXHR, status);
    });
}
function get(urlApi, data, success, error){
    $.ajax({
     type: "GET",
     dataType: 'json',
     url: urlApi,
     data: JSON.stringify(data),// now data come in this function
     contentType: "application/json; charset=utf-8",
     crossDomain: true,
     success: function (data, status, jqXHR) {
         success(data, status, jqXHR);
     },
     error: function (jqXHR, status) {
         error(jqXHR, status)        
     }
  });
}