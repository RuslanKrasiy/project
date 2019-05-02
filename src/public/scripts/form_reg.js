$('.signup')
.form({
    inline : true,
    on     : 'blur',
    fields: {
    first_name: {
        identifier: 'first-name',
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
        identifier: 'last-name',
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
    },
    }
});