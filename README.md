Yii 2 Practical Enterprise Webapp Template
===============================

Yii 2 Practical Enterprise Webapp Template is a skeleton [Yii 2](http://www.yiiframework.com/) web application template for enterprise use ready.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Why this template?
===============================
With this template you will get these features out of the box:
```
-- Customizable user permission
-- Elegant navigation menus (top and side bars) also customizable by permissions.
-- Site wide configurations are editable by web UI
-- Supports for CRUD operations of models with the power of Yii
```

DIRECTORY STRUCTURE
-------------------

```
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
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
tests                    contains various tests for the advanced application
    codeception/         contains tests developed with Codeception PHP Testing Framework
```
