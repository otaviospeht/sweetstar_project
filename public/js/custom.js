moment.locale('pt-br');

const cookie = {
    get: (cname) => {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return undefined;
    },
    set: (cname, cvalue, exdays) => {
        let d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
};

const helper = {
    startLoading: () => {
        NProgress.start();
        $('#loading').show();
    },
    stopLoading: () => {
        NProgress.done();
        $('#loading').hide();
    }
};

$.ajaxSetup({
    beforeSend() {
        loading();
    },
    complete() {
        hideLoading()
    }
});

$(() => {
    $(`a[href^="/carrinho/add"]`).on('click', function(e) {
        e.preventDefault();

        let _url = $(this).attr('href');

        $.ajax({
            url: _url,
            method: 'POST',
            beforeSend() {},
            complete() {},
            success(res) {
                $.Notification.notify('success', 'top right', 'Sucesso', res);
            },
            error(res) {
                if(res.status === 400) {
                    $.Notification.notify('warning', 'top right', 'Aviso!', res.responseJSON);

                    return false;
                }

                $.Notification.notify('error', 'top right', 'Ocorreu um erro desconhecido.');
            }
        });
    });
});