import toastr from 'toastr';
import merge from 'lodash/merge';

export default class Siren
{

    constructor()
    {
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

    /**
     * Override settings
     * @param   {Object} [options={}]                           options to override, see options object
     * @return  {Void}
     */
    setDefaults(options = {})
    {
        this.options = merge(this.options, options);
    }

    /**
     * Show an error message
     *
     * @param   {String}  message                               the message to show
     * @param   {String}  [title='Error']                       the title of the message
     * @param   {Boolean} [important=false]                     flag if the message is important or not
     * @param   {Object}  [options={}]                          option overrides
     * @return  {Void}
     */
    error(message, title = 'Error', important = false, options = {}) {
        this.__show__('error', message, title, important, options);
    }

    /**
     * Show an error message
     *
     * @param   {String}  message                               the message to show
     * @param   {String}  [title='Success']                     the title of the message
     * @param   {Boolean} [important=false]                     flag if the message is important or not
     * @param   {Object}  [options={}]                          option overrides
     * @return  {Void}
     */
    success(message, title = 'Success', important = false, options = {})
    {
        this.__show__('success', message, title, important, options);
    }

    /**
     * Show an error message
     *
     * @param   {String}  message                               the message to show
     * @param   {String}  [title='Warning']                     the title of the message
     * @param   {Boolean} [important=false]                     flag if the message is important or not
     * @param   {Object}  [options={}]                          option overrides
     * @return  {Void}
     */
    warning(message, title = 'Warning', important = false, options = {})
    {
        this.__show__('warning', message, title, important, options);
    }

    /**
     * Show an error message
     *
     * @param   {String}  message                               the message to show
     * @param   {String}  [title='Info']                        the title of the message
     * @param   {Boolean} [important=false]                     flag if the message is important or not
     * @param   {Object}  [options={}]                          option overrides
     * @return  {Void}
     */
    info(message, title = 'Info', important = false, options = {}) {
        this.__show__('info', message, title, important, options);
    }

    /**
     * Show an error message
     *
     * @param   {String}  message                               the message to show
     * @param   {String}  [title='Notice']                      the title of the message
     * @param   {Boolean} [important=false]                     flag if the message is important or not
     * @param   {Object}  [options={}]                          option overrides
     * @return  {Void}
     */
    notice(message, title = 'Notice', important = false, options = {})
    {
        this.info(message, title, important, options);
    }

    /**
     * Show an error message
     *
     * @param   {String} type                                   the type of the message to show
     * @param   {String}  message                               the message to show
     * @param   {String}  [title='Error']                       the title of the message
     * @param   {Boolean} [important=false]                     flag if the message is important or not
     * @param   {Object}  [options={}]                          option overrides
     * @return  {Void}
     */
    __show__(type, message, title = 'Notification', important = false, options = {})
    {
        toastr.options = merge(this.options, options);
        toastr[type](message, title);
    }
}

export function siren()
{
    return new Siren();
}
