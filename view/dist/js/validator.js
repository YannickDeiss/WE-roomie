$(function () {
    $('#signup-form').on('click', function (e) {
            let passwordField = $('#signup-password');
            let passwordError = $('#signup-password-error');

            $('#signup-email-error').hide();
            passwordError.hide();
            e.preventDefault();
            if (passwordField.val().length <= 10) {
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
                    if (response.email === false) {
                        passwordError.fadeIn(300).show();
                        $('#signup-password').val('');
                        console.log('not submitted');
                    } else {
                        $('#signup-form').submit();
                        console.log('submitted');
                    }
                }
            });
        }
    );
});
