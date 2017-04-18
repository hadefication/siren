import toastr from 'toastr';
import merge from 'lodash/merge';

export default class Siren
{

    constructor() {
        this.options = {
            closeButton: true,
            debug: false,
            newestOnTop: true,
            progressBar: true,
            positionClass: "toast-top-right",
            preventDuplicates: true,
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

    setDefaults(options = {}) {
        this.options = merge(this.options, options);
    }

    error(message, title = 'Error', options = {}) {
        this.__show__('error', message, title, options);
    }

    success(message, title = 'Success', options = {}) {
        this.__show__('success', message, title, options);
    }

    warning(message, title = 'Warning', options = {}) {
        this.__show__('warning', message, title, options);
    }

    info(message, title = 'Info', options = {}) {
        this.__show__('info', message, title, options);
    }

    __show__(type, message, title = 'Notification', options = {}) {
        toastr.options = merge(this.options, options);

        console.log([type, message, title, options]);

        toastr[type](message, title);
    }
}

export function siren() {
    return new Siren();
}
