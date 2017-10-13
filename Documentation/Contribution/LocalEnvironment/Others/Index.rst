.. include:: ../../../Includes.txt
.. highlight:: shell

====================
General Installation
====================


.. contents:: On this page:
    :local:
    :class: compactlist
.. include:: ../../../Includes.txt
.. highlight:: shell

====================
General Installation
====================


.. contents:: On this page:
    :local:
    :class: compactlist

    :backlinks: top


Local installation of one of the typo3.org sites
================================================

Requirements
------------

All you need is a local running web server. That can be done directly on the machine or with help of Virtual Machines like
e.g. Vagrant, Docker, XAMPP, MAMP, etc.

If you have a local web server running, be sure you have all requirements needed for using TYPO3 8 LTS:

#. PHP 7 or higher
#. A database (we use MariaDB)
#. If you work with TER, you need a Solr Server (for typo3.org not mandatory)

Repositories
------------
You can find all needed Repositories in our Gitlab:
`https://git-t3o.typo3.org/ <https://git-t3o.typo3.org/>`_

To gain access to this repos you need to have a typo3.org Account. If you are not able to login to Gitlab, the reason for this might be, that your Username is not present in our new LDAP environment. To solve this go to `typo3.org <https://typo3.org>`_
and log in there once. 

You will find a repository for all projects (typo3.org, extensions.typo3.org, my.typo3.org) . As this repositories share a template extension (t3olayout) you will also find this one and all others. The extensions will be loaded via composer. Issues (Tickets) can be found in this repositories and you will need to send pull requests to them directly.

In this example we will go through the process of setting up an installation for typo3.org. 

We provide the needed assets for this project (fileadmin and Database). You can download this assets in the Pipeline of Gitlab (link will be provided below) - so you dont have to take care of contents and stuff at all. This ensures that you will have an installation with the latest content up and running. Only thing is, that you need to have a backend-user. If this doesnt exists on stage.typo3.org or typo3.org you need to create one using the installtool. 

Installation
------------

***********************
Clone and prepare files
***********************

#. Clone your repository (in this case the one for typo3.org - `find it here <https://git-t3o.typo3.org/t3o/typo3.org>`_)
#. Create a new host and point your Document Root to the subdirectory `html` in the repository
#. Create a file `html/typo3conf/AdditionalConfiguration.php` or copy the given `html/typo3conf/AdditionalConfiguration.sample.php` to this name. Edit this file and add the credentials to your local database
#. Run `composer install` in the root of your project

***************************
Download and install assets
***************************

#. Download the database dump and assets from GitLab. They can be found `here <https://git-t3o.typo3.org/t3o/typo3.org/builds/artifacts/assets/download?job=dump-assets>`_. Get this download and copy the folder `fileadmin` to the folder `html`
#. Import the DB.sql provided with the Artefacts into your local DB

***************************
Build CSS and JS
***************************

#. Move to the folder `html/typo3conf/ext/t3olayout/Build/` 
#. run `npm install` on terminal/bash/shell
#. run `npm run build`

For all those who dont want or are not able to build these files using npm the latest version of this files are also included in the asset-download. Simply copy the folders `Images`, `JavaScript` and `Css` to `html/typo3conf/ext/t3olayout/Resources/Public` and you will be able to see the frontend as well.

***************************
Get TYPO3 up and running
***************************

#. Move to the folder `html/` 
#. run `php bin/typo3cms install:generatepackagestates 0 1` on terminal/bash/shell
#. if you need a user to login to the backend you need to go to the installtool. Therefore you need to move to the folder `html/typo3conf` and create a file named `ENABLE_INSTALL_TOOL`. This file can be empty. Then login to `http(s)://yourinstall.local/typo3/install`. The standard Password (provided in `AddtitionalConfiguration`) is `joh316`
#. Scoll down on the tab `important actions` (which is the startpage of the installtool). At the bottom of the page you will find the possibility to create a new Backenduser. Create one an try to login to the backend at `http(s)://yourinstall.local/typo3/`

You can look into our :ref:`FAQ` section for further questions.
    :backlinks: top
