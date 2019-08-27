# Phyxle Lite
Rapid web development environment, based on [Slim](https://www.slimframework.com) framework (Lite version)

## Features
- Based on [Slim](https://www.slimframework.com) framework
- Template management with [Twig](https://twig.symfony.com) library
- Database management with [Eloquent ORM](https://laravel.com/docs/5.7/eloquent) library
- Mail management with [Swift Mailer](https://swiftmailer.symfony.com) library
- Date and time manipulation with [Carbon](https://carbon.nesbot.com) library
- File system management with [Filesystem](https://github.com/symfony/filesystem) library
- Input validation with [Validation](https://github.com/rakit/validation) library
- Session management with [Slim Session](https://github.com/bryanjhv/slim-session) library

## Install
Install Phyxle Lite using [Composer](https://getcomposer.org) or clone repository using [Git](https://git-scm.com). If you cloned repository, make sure to install [Composer](https://getcomposer.org) packages using `composer install` command.
```
$ composer create-project enindu/phyxle-lite <project name>
```
```
$ git clone https://github.com/enindu/phyxle-lite.git
```

## Controllers
App controllers can be found at `app/Controller/` directory. Every controller class must extends `App\Controller\Base` class.
```php
namespace App\Controller;

use App\Controller\Base;
use Slim\Http\Request;
use Slim\Http\Response;

class Example extends Base
{
  public function method(Request $request, Response $response, array $data)
  {
    // Code goes here
  }
}
```

Get containerized packages in controllers by using `$this->container` variable from `Base` controller.
```php
$package = $this->container->get('package');
```

Manage templates in controllers by using `$this->view` method from `Base` controller. To pass data as [Twig](https://twig.symfony.com) variable, use `$this->data` variable from `Base` controller. For more information, refer [Twig documentation](https://twig.symfony.com/doc/2.x).
```php
$this->data['variable'] = "Some data";

return $this->view($response, 'example.twig');
```

Send mails in controllers by using `$this->mail` method from `Base` controller. For more information, refer [Swift Mailer documentation](https://swiftmailer.symfony.com/docs/introduction.html).
```php
$this->mail([
  'subject' => 'Mail Subject',
  'from'    => ['John Doe' => 'john@example.com'],
  'to'      => ['Brad Peter' => 'brad@example.com'],
  'body'    => 'Mail Body'
]);
```

Manipulate time and data in controllers by using `$this->time` variable from `Base` controller. For more information, refer [Carbon documentation](https://carbon.nesbot.com/docs).
```php
$this->time
```

Manage file system in controllers by using `$this->filesystem` variable from `Base` controller. For more information, refer [Filesystem documentation](https://symfony.com/doc/current/components/filesystem.html).
```php
$this->filesystem
```

Validate form input fields in controllers by using `$this->validator` method from `Base` controller. For more information, refer [Validation documentation](https://github.com/rakit/validation/blob/master/README.md).
```php
$validation = $this->validator($request, [
  'input' => 'required|min:6|max:16'
]);
```

## Routes
App routes can be found at `app/routes.php` file. For more information, refer [Slim documentation](https://www.slimframework.com/docs).
```php
use App\Controller\Example;

$app->get('/example', Example::class . ':method');
```

## Views
App view templates can be found at `resources/views/` directory. Phyxle Lite uses [Twig](https://twig.symfony.com) as template engine. You can extend Twig by adding more filters or functions or global variables that can be found at `app/Extension/` directory. For more information, refer [Twig documentation](https://twig.symfony.com/doc/2.x/).

Define assets by using `asset` filter.
```twig
{{ 'css/example.css'|asset }}
```

Define internal page routes by using `page` filter.
```twig
{{ 'path/to/page'|page }}
```

Here're all global variables available.
```twig
{# Get app name #}
{{ app.name }}

{# Get app description #}
{{ app.description }}

{# Get app keywords #}
{{ app.keywords }}

{# Get app author #}
{{ app.author }}

{# Get app URL #}
{{ app.url }}
```