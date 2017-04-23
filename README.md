# Siren

Toast style application messages for [Laravel]() using [toastr]().

## Installation
1. Install by running `composer require hadefication/siren`.
2. Add the service provider and facade to your `config/app.php`.

```
'providers' => [
    ...
    Hadefication\Siren\SirenServiceProvider::class,
    ...
],

'aliases' = [
    ...
    'Siren' => Hadefication\Siren\SirenFacade::class,
    ...
]
```

## Usage
- To collect messages, you can either use the facade `Siren` or the nifty little helper function called `siren()`. This then will give you access to all of the methods that siren can offer. To collect an error message, use `siren()->error($message, $title, $important)` where `$message` will obviously the message you want to convey and same goes to `$title` then `$important` will determine if your message will stay until it's closed (set to `true`) or will auto-close after a number of seconds. See example below for the type of message that can be collected using siren.

```
// Example

$message = 'This is a message';
$title = 'Notification';
$important = false;

// Error
siren()->error($message, $title, $important);
// or
\Siren::error($message, $title, $important);

// Success
siren()->success($message, $title, $important);
// or
\Siren::success($message, $title, $important);

// Warning
siren()->warning($message, $title, $important);
// or
\Siren::warning($message, $title, $important);

// Notice or Info
siren()->notice($message, $title, $important);
// or
\Siren::notice($message, $title, $important);
```
- Next is you need to include the companion javascript library by either requiring it to your `app.js` or adding it directly to your view. You may need to copy `vendor/src/resources/assets/dist/siren.js` to your public path if your going for the later option. Luckily, [Laravel Elixir]() or [Laravel Mix]() can do that for you! Once the javascript library is added, you will then have `siren` global variable at your disposal, see **Javascript** section for more details.

```
// app.js
require('vendor/src/resources/assets/dist/siren.js');

// direct
<script src="{{ asset('path/to/siren.js') }}"></script>
```
- To show the toast messages, you need to add `siren()->render()` or `\Siren::render()` at the tail of your layout's view. It's important that this method will be the last one to be called.

```
    {!! siren()->render() !!}
    // or
    {!! \Siren::render() !!}
```

## Javascript
The companion javascript library uses this cool plugin called [toastr]() to render the toast style message. Once the javascript library is referenced, then you will be able to access `siren` variable, this variable will then give you access to all methods that this library has to offer.
- `siren.setDefaults(options)` - will let you override the default settings of toastr. `options` param will be the overrides that you want.

```
// Overridable options
{
    closeButton: true,
    debug: false,
    newestOnTop: true,
    progressBar: true,
    positionClass: "toast-top-right",
    preventDuplicates: true,
    showDuration: 300,
    hideDuration: 1000,
    timeOut: 5000,
    extendedTimeOut: 1000,
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut"
}

// Example
// Override close button to be hidden
siren.setDefaults({
    closeButton: false,
})
```
- `siren.error(message, title, important, options)` - will show an error toast message. `message` will obviously the message to show and same goes to `title` then `important` will be the flag if you want the message to stay until closed or auto-closed after a period of time and finally the `options` param will give you the "option" to override the defaults of toastr. These will also be the same for other message types. See example below for more details.

```
// Error
// Will show close button to the toast message and will show the toast for 10 second
siren.error('This is a test', 'Error', false, {closeButton: true, timeOut: 10000});

// Success
siren.success('This is a success message', 'Success');

// Warning
siren.warning('Warning message here', 'Warning!');

// Notice
siren.success('A notice message here', 'Notification', true);
```
