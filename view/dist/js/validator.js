$(function () {
    $('#signup-submit').on('click', function (e) {
            console.log('click');
            var passwordField = $('#signup-password');
            var passwordError = $('#signup-password-error');

            $('#signup-email-error').hide();
            passwordError.hide();
            if (passwordField.val().length < 9) {
                passwordError.fadeIn(300).show();
                return;
            }

            $.ajax({
                type: 'post',
                url: 'signUpValidator',
                dataType: 'json',
                data: {
                    email: $('#signup-email').val(),
                    password: passwordField.val()
                },
                success: function (response) {
                    console.log(response);
                    if (response.email === false) {
                        $('#signup-password').val('');
                        $('#signup-email-error').fadeIn(300).show();
                    } else if (passwordField.val().length < 9   ) {
                        passwordError.fadeIn(300).show();
                    } else {
                        $('#signup-form').submit();
                    }
                },
                error: function (response){
                    console.log('fail');
                }
            });
        }
    );
});
