$('.ui.form')
.form({
    inline : true,
    on     : 'blur',
    fields: {
    oldPwd: {
        identifier: 'oldPwd',
        rules: [
        {
            type   : 'empty',
            prompt : 'Por favor introduce contraseña'
        }
        ]
    },
    nuevoPwd: {
        identifier: 'nuevoPwd',
        rules: [
        {
            type   : 'empty',
            prompt : 'Por favor introduce contraseña'
        },
        {
            type   : 'minLength[6]',
            prompt : 'Minino {ruleValue} caracteres'
        }
        ]
    },
    repitPwd: {
        identifier  : 'repitPwd',
        rules: [
          {
            type   : 'match[nuevoPwd]',
            prompt : 'Repite tu contraseña'
          },
          {
            type   : 'empty',
            prompt : 'Por favor introduce contraseña'
          }
        ]
      },
      userEmail: {
        identifier  : 'userEmail',
        rules: [
          {
            type   : 'email',
            prompt : 'Por favor introduce correo electronico'
          }
        ]
      }
    }  
});