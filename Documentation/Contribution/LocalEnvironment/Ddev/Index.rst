.. include:: ../../../Includes.txt
.. highlight:: shell

=====================================
Setup ddev environment (docker based)
=====================================

.. contents:: On this page:
   :backlinks: top
   :class: compactlist
   :local:


Local installation of one of the typo3.org sites
================================================

Requirements
------------

All you need is composer, ddev and Docker installed.

Repositories
------------
You can find all needed Repositories at our `Gitlab server
<https://git-t3o.typo3.org/>`__.

To gain access to these repos you need to have a typo3.org account. If you are
not able to login to Gitlab, the reason for this might be, that your Username
is not present in our new LDAP environment. To solve this go to
https://typo3.org/ and log in there once.

You will find a repository for each project (typo3.org, extensions.typo3.org,
my.typo3.org). As these repositories share the same template extension (t3olayout)
you will also find this one and all the others. The extensions will be loaded via
composer. Issues (tickets) can be found in this repositories and you will need
to send pull requests to them directly.

In this example we will guide you through the process of setting up an
installation for typo3.org.

We provide the needed assets for this project (fileadmin and database).
You can download these assets in the pipeline of Gitlab
(link will be provided below) - so you dont have to take care of contents and
stuff at all. This ensures that you will have an installation with the
latest content up and running. The only thing is that you need to have a
backend-user. If this isn't the case on stage.typo3.org or typo3.org you need to
create one using the installtool.

Installation
------------

Preparation
~~~~~~~~~~~

.. rst-class:: bignums

#. Install Docker - `find it here <https://www.docker.com/community-edition#/download>`_

#. Install ddev - `find it here <https://ddev.readthedocs.io/en/latest/#installation>`_

#. Install composer - `find it here <https://getcomposer.org/download/>`_


Clone and prepare files
~~~~~~~~~~~~~~~~~~~~~~~

.. rst-class:: bignums

#. Clone your repository (in case for typo3.org -
   `find it here <https://git-t3o.typo3.org/t3o/typo3.org>`_)

#. cd `path/to/your/repository/`

#. Copy the ./auth.json.example to ./auth.json

#. Edit the ./auth.json file and add your gitlab (git-t3o.typo3.org) account

#. `ddev start`

#. Download and extract the ZIP file with assets and DB dump, see `Download and install assets`_

#. Use `ddev import-db` and follow the wizard to import the SQL file into the database

#. Use `ddev import-files` and follow the wizart to import the fileadmin folder to `html/fileadmin`

#. Browse to `the frontend <https://typo3.org.ddev.local/>`_ or `the backend <https://typo3.org.ddev.local/typo3/>`_


Download and install assets
~~~~~~~~~~~~~~~~~~~~~~~~~~~

Download the `database dump and assets (for e.g. typo3.org website) <https://git-t3o.typo3.org/t3o/typo3.org/builds/artifacts/assets/download?job=dump-assets>`_ from GitLab.
If you need the assets from TER, look to :ref:`ter-assets`.
You need a typo3.org account to access this file.


Build CSS and JS
~~~~~~~~~~~~~~~~

The CSS and JS are built on every start of ddev. If you need to update them, just run `ddev start`.
If you work on CSS and JS, you are able to use the built-in `npm` in the docker container by

.. rst-class:: bignums

#. Run `ddev ssh`

#. Change directory to `typo3conf/ext/t3olayout/Build/`

#. Run `npm watch`

#. Change CSS and JS, the changes are generated live


Get TYPO3 up and running
~~~~~~~~~~~~~~~~~~~~~~~~

As there are no backend users in the dump, you need to setup a local admin account.

.. rst-class:: bignums

#. `ddev ssh`

#. `../bin/typo3cms backend:createadmin` and set your username and password in the prompt.

