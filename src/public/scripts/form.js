console.log("<<ENTRA>>");
/*$('.form').submit(function(event){
    var json;
    console.log("<<<FORM>>>",$(this).serialize());
    event.preventDefault();
    $.ajax({
        type : $(this).attr("method"),
        url : $(this).attr('action'),
        //data :new FormData(this),
        data:$(this).serialize(),
        cache : false,
        contentType: "application/json; charset=utf-8",
        datatype: 'text',
 
        success : function(data){
            //console.log("<<RESULT>>",data);
            json = JSON.parse(data);
            //console.log(json);
            if(json.url)
                window.location.href = "/"+json.url;
            else
                alert(json.status +" - "+ json.message);
        },
    });
});*/