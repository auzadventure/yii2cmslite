Yii 2 Practical Project Template
================================

[![Latest Stable Version](https://poser.pugx.org/kartik-v/yii2-app-practical/v/stable.svg)](https://packagist.org/packages/kartik-v/yii2-app-practical) 
[![License](https://poser.pugx.org/kartik-v/yii2-app-practical/license.svg)](https://packagist.org/packages/kartik-v/yii2-app-practical)
[![Total Downloads](https://poser.pugx.org/kartik-v/yii2-app-practical/downloads.svg)](https://packagist.org/packages/kartik-v/yii2-app-practical) 
[![Monthly Downloads](https://poser.pugx.org/kartik-v/yii2-app-practical/d/monthly.png)](https://packagist.org/packages/kartik-v/yii2-app-practical)
[![Daily Downloads](https://poser.pugx.org/kartik-v/yii2-app-practical/d/daily.png)](https://packagist.org/packages/kartik-v/yii2-app-practical)

Yii 2 Practical Project Template is a skeleton Yii 2 application based on the 
[yii2-advanced template](https://github.com/yiisoft/yii2-app-advanced/) best for 
developing complex Web applications with multiple tiers. The template allows a 
**practical** method to directly access the frontend from the app root.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

Notes from Auzadventure
-------------------------

This is a build addition from Kartiks yii2 practical. I've added some additional CMS like 
MVCs to jump start development. 

1. Textblock 
Add blocks of text to your app

2. Page
Add Static pages using wysiwug editor 

3. Navmenu
Dynamically change the menu on top with 2 levels 

4. Image 
Image manage to add and remove images to use through the site 

5. Setting Var (non DB local storage)
A very simple local storage system that allows you to save and edit variables without using 
mysql. 




Why yii2-practical?
-------------------

After installing an `app` in the yii2-advanced application you normally would access the
frontend by:

```
http://domain/app/frontend/web
```

However, in many **practical** scenarios (especially on shared and single domain hosts) one 
would want their users to directly access frontend as:

```
http://domain/app
```

The `yii2-app-practical` enables you to achieve just that by carefully moving and rearranging the 
bootstrap files and web components of frontend to work directly out of the app root. The 
`frontend/web` is entirely eliminated and one can directly access the application frontend
this way:

```
http://domain/app
```

All other aspects of the app configuration remain the same as the **yii2-advanced** app. The `common`, `backend` and `console` 
will remain as is. The frontend config, assets, models, controllers, views, widgets and components, will still reside within 
the `frontend` directory. It is just the web access that is moved out to app root.

SOME KEY ADDITIONS
-------------------

1. The template has some security preconfigured for users with Apache web servers. It has a default `.htaccess` security configuration setup.
2. The template has prettyUrl enabled by default and the changes have been made to `.htaccess` as well as `urlManager`
   component config in the common config directory.
3. The template has isolated cookie settings for backend and frontend so that you can seamlessly access frontend and backend from same client. 
   The config files includes special `identity` and `csrf` cookie parameter settings for backend. Edit it according to your needs if necessary.

Detailed documentation on yii2-app-advanced concepts and usage can be referred at [docs/guide/README.md](docs/guide/README.md).

DIRECTORY STRUCTURE
-------------------

```
/
    /                    contains the frontend entry script, favicon, and robots.txt.
    assets/              contains the frontend web runtime assets
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains backend application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains frontend application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
tests                    contains various tests for the "practical" application
    codeception/         contains tests developed with Codeception PHP Testing Framework
```


REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

You can choose to install the application using one of the following methods.

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install the application using the following command:

~~~
php composer.phar global require "fxp/composer-asset-plugin:~1.1.1"
php composer.phar create-project --prefer-dist --stability=dev kartik-v/yii2-app-practical practical
~~~

### Install from an Archive File

Download the [archive file](https://github.com/kartik-v/yii2-app-practical/archive/master.zip) directly to a directory named `practical` that is directly under the Web root.

> Note: When using a archive file method, the vendor folder is not automatically created. You must download the [latest yii2-advanced archive](https://github.com/yiisoft/yii2/releases/download/2.0.6/yii-advanced-app-2.0.6.tgz) and then extract the vendor folder from here. Then you must copy this folder directly under the app root (i.e. `practical` directory).
  
After this is complete, follow the instructions given in "GETTING STARTED".

GETTING STARTED
---------------

After you install the application, you have to conduct the following steps to initialize
the installed application. You only need to do these once for all.

1. Run command `init` to initialize the application with a specific environment.
2. Create a new database and adjust the `components['db']` configuration in `common/config/main-local.php` accordingly.
3. Apply migrations with console command `yii migrate`. This will create tables needed for the application to work.
4. Set document roots of your Web server:

- for frontend `/path/to/yii-application/` and using the URL `http://frontend/`
- for backend `/path/to/yii-application/backend/web/` and using the URL `http://backend/`

To login into the application, you need to first sign up, with any of your email address, username and password.
Then, you can login into the application with same email address and password at any time.

5. Edit the config files as needed. Especially set the correct paths for the user identity cookie in `backend/config/main-local.php`.

MORE DOCUMENTATION
------------------

You can read the [yii2-advanced application guide](https://github.com/yiisoft/yii2-app-advanced/blob/master/docs/guide/README.md) to understand details on working with the advanced application.

TESTING
-------

Take a look at the codeception for the test. 

Honestly, I don't like it. Too buggy and too much work. I have a better working solution using Selenium and Python to run browser tests. 
