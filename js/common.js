$(document).ready(function () {
    $('.form_reg').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'reg.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function (data) {
                data = JSON.parse(data);
                if (data.status === 0) {
                    $('.reg_errors').html(data.errors[0]);
                } else if ( data.status ){
                    $('.reg_errors').html('');
                    window.location.href = '/index.php';
                }
            }
        })
    }), $('.form_auth').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'auth.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function (data) {
                data = JSON.parse(data);
                if (data.status === 0) {
                    $('.reg_errors').html(data.errors[0]);
                } else if ( data.status ){
                    window.location.href = '/index.php';
                }
            }
        })
    }), $('.logout').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'auth.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function (data) {
                data = JSON.parse(data);
                if (data.status ) {
                    window.location.href = '/index.php';
                }
            }
        })
    })
});

