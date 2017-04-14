import toastr from 'toastr';
import merge from 'lodash/merge';

export default class Siren
{

    constructor() {
        this.default = {
            closeButton: true,
            debug: false,
            newestOnTop: true,
            progressBar: true,
            positionClass: "toast-top-right",
            preventDuplicates: false,
            onclick: null,
            showDuration: 300,
            hideDuration: 1000,
            timeOut: 5000,
            extendedTimeOut: 1000,
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        };
    }

    error(message, title = 'Error', options = {}) {
        this.__show__('error', options);
    }

    success(message, title = 'Success', options = {}) {
        this.__them__('success', options);
    }

    warning(message, title = 'Warning', options = {}) {
        this.__them__('warning', options);
    }

    info(message, title = 'Info', options = {}) {
        this.__them__('info', options);
    }

    __show__(type, message, title = 'Notification', options = {}) {
        toastr.options = merge(this.defaults, options);
        toastr[type](message, title);
    }
}

export function siren() {
    return new Siren();
}
