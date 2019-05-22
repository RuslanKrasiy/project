$("#coment").click(function(){
    $.post("compr.php",
    {
        comenta:"1",
        texto:$("#texto").val(),
        codAnuncio:$("#codAnuncio").val()
    },
    function(data,status){
        
    });
    $("textarea").val(" ");
  });