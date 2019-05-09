$('.login')
.form({
    inline : true,
    on     : 'blur',
    fields: {
        email: {
            identifier: 'email',
            rules: [
            {
                type   : 'empty',
                prompt : 'Please enter your correct email'
            }
            ]
        },
    
        password: {
            identifier: 'password',
            rules: [
            {
                type   : 'empty',
                prompt : 'Please enter a password'
            }
            ]
        }
    }
});
