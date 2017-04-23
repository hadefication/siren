# Siren

Toast style application messages for [Laravel]() using [toastr]().

## Installation
1. Install by running `composer require hadefication/siren`.
2. Add the service provider and facade to your `config/app.php`

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
