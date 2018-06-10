$(function () {
    $('#login-submit').on('click', function (e) {
            e.preventDefault();
            var emailField = $('#login-email');
            var passwordField = $('#login-password');
            var loginError = $('#login-error');

            loginError.hide();

            $.ajax({
                type: 'post',
                url: 'loginValidator',
                dataType: 'json',
                data: {
                    email: emailField.val(),
                    password: passwordField.val()
                },
                success: function (response) {
                    if (response.valid === false) {
                        $('#login-password').val('');
                        $('#login-error').fadeIn(300).show();
                    } else {
                        $('#login-form').submit();
                    }
                },
                error: function (response) {
                    console.log('fail');
                }
            });
        }
    );
});