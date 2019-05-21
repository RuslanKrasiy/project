$('#tipoCuenta').change(function(){
    if(this.value=="cliente"){
        $("#fecha-nac").empty();
    }else if(this.value=="profesional"){
        var main=$("#fecha-nac");
        var mes=['','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio',
        'Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        var label1=$("<label></label>").text("Fecha de nacimiento");
        var div1=$("<div></div>").attr("class","three fields");
        var div2=$("<div></div>").attr("class","two wide required field");
        var select1=$("<select></select>").attr({"class":"ui search dropdown","name":"day"});
        var option=$("<option></option>").attr("value"," ").text("Dia");
        select1.append(option);
            for(var i=1;i<32;i++){
                //$form.="<option value='$i'>$i</option>";
                var option2=$("<option></option>").attr("value",i).text(i);
                select1.append(option2);
            }
        div2.append(select1);
        var div3=$("<div></div>").attr("class","two wide required field");
        var select2=$("<select></select>").attr({"class":"ui search dropdown","name":"month"});
        var option3=$("<option></option>").attr("value"," ").text("Mes");
        select2.append(option3);
        for(var i=1;i<mes.length;i++){
            //$form.="<option value='$i'>$i</option>";
            var option4=$("<option></option>").attr("value",i).text(mes[i]);
            select2.append(option4);
        }
        div3.append(select2);
        var div4=$("<div></div>").attr("class","two wide required field");
        var select3=$("<select></select>").attr({"class":"ui search dropdown","name":"year"});
        var option5=$("<option></option>").attr("value"," ").text("Año");
        select1.append(option5);
            for(var i=2010;i>1955;i--){
                //$form.="<option value='$i'>$i</option>";
                var option6=$("<option></option>").attr("value",i).text(i);
            select3.append(option6);
            }
        div4.append(select3);
        div1.append(div2);
        div1.append(div3);
        div1.append(div4);
        main.append(label1);
        main.append(div1);
        console.log(main);
        //main.show();
    } 
});

$('.signup')
.form({
    inline : true,
    on     : 'blur',
    fields: {
    first_name: {
        identifier: 'nombre',
        rules: [
        {
            type   : 'empty',
            prompt : 'Por favor introduzca tu nombre'
        },
        {
            type   : 'minLength[3]',
            prompt : 'Minimo 3 caracteres'
        },
        {
            type   : 'maxLength[15]',
            prompt : 'Maximo 15 caracteres'
        }
        ]
    },
    last_name: {
        identifier: 'apellido',
        rules: [
        {
            type   : 'empty',
            prompt : 'Por favor introduzca tu apellido'
        },
        {
            type   : 'minLength[3]',
            prompt : 'Minimo 3 caracteres'
        },
        {
            type   : 'maxLength[15]',
            prompt : 'Maximo 15 caracteres'
        }
        ]
    },
    ciudad: {
        identifier: 'ciudad',
        rules: [
        {
            type   : 'empty',
            prompt : 'Elige la ciudad'
        }
        ]
    },
    email: {
        identifier: 'email',
        rules: [
        {
            type   : 'empty',
            prompt : 'Por favos introduzca correo electronico'
        },
        {
            type    : "email",
            prompt  :  "Corre electronico no valido."
        }
        ]
    },
    email2: {
        identifier  : 'email2',
        rules: [
          {
            type   : 'match[email]',
            prompt : 'Por favor repite tu correo electronico'
          },
          {
            type   : 'empty',
            prompt : 'Por favor confirma tu correo electronico'
          }
        ]
      },
    
    password: {
        identifier: 'password',
        rules: [
        {
            type   : 'empty',
            prompt : 'Por favor introdusca contraseña'
        },
        {
            type   : 'minLength[6]',
            prompt : 'Minino {ruleValue} caracteres'
        }
        ]
    },
    password2: {
        identifier  : 'password2',
        rules: [
          {
            type   : 'match[password]',
            prompt : 'Repite tu contraseña'
          },
          {
            type   : 'empty',
            prompt : 'Por favor repite la contraseña'
          }
        ]
      },

    day: {
        identifier: 'day',
        rules: [
        {
            type   : 'empty',
            prompt : 'Introduza dia'
        }
        ]
    },
    month: {
        identifier: 'month',
        rules: [
        {
            type   : 'empty',
            prompt : 'Introduzca mes'
        }
        ]
    },
    year: {
        identifier: 'year',
        rules: [
        {
            type   : 'empty',
            prompt : 'Introduzca año'
        }
        ]
    }
    
    
    }
});