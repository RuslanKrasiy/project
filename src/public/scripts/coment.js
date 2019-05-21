$("#coment").click(function(){
    $.post("prueba.php",
    {
        comenta:"1",
        texto:$("#texto").val(),
        codAnuncio:$("#codAnuncio").val()
    },
    function(data,status){
        
    });
    $("textarea").val(" ");
  });