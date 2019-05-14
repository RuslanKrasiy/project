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
            prompt : 'Please enter your name'
        },
        {
            type   : 'minLength[3]',
            prompt : 'Please enter your name min 3'
        },
        {
            type   : 'maxLength[15]',
            prompt : 'Please enter your name max 15'
        }
        ]
    },
    last_name: {
        identifier: 'apellido',
        rules: [
        {
            type   : 'empty',
            prompt : 'Please enter your name'
        },
        {
            type   : 'minLength[3]',
            prompt : 'Please enter your name min 3'
        },
        {
            type   : 'maxLength[15]',
            prompt : 'Please enter your name max 15'
        }
        ]
    },
    ciudad: {
        identifier: 'ciudad',
        rules: [
        {
            type   : 'empty',
            prompt : 'Please enter Ciudad'
        }
        ]
    },
    email: {
        identifier: 'email',
        rules: [
        {
            type   : 'empty',
            prompt : 'Please enter your correct email'
        },
        {
            type    : "email",
            prompt  :  "MAL"
        }
        ]
    },
    email2: {
        identifier  : 'email2',
        rules: [
          {
            type   : 'match[email]',
            prompt : 'Please put the same value in both fields'
          }
        ]
      },
    
    password: {
        identifier: 'password',
        rules: [
        {
            type   : 'empty',
            prompt : 'Please enter a password'
        },
        {
            type   : 'minLength[6]',
            prompt : 'Your password must be at least {ruleValue} characters'
        }
        ]
    },
    password2: {
        identifier  : 'password2',
        rules: [
          {
            type   : 'match[password]',
            prompt : 'Please put the same value in both fields'
          }
        ]
      },

    day: {
        identifier: 'day',
        rules: [
        {
            type   : 'empty',
            prompt : 'Please enter your birthday'
        }
        ]
    },
    month: {
        identifier: 'month',
        rules: [
        {
            type   : 'empty',
            prompt : 'Please enter your month'
        }
        ]
    },
    year: {
        identifier: 'year',
        rules: [
        {
            type   : 'empty',
            prompt : 'Please enter your year'
        }
        ]
    }
    
    
    }
});