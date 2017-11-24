.. include:: ../../../Includes.txt
.. highlight:: shell

===========================
Setup own local environment
===========================

.. contents:: On this page:
   :backlinks: top
   :class: compactlist
   :local:


Local installation of one of the typo3.org sites
================================================

Requirements
------------

All you need is a local running web server. That can be done directly on the
machine or with help of Virtual Machines like Vagrant, Docker, XAMPP, MAMP, etc.

If you have a local web server running, be sure you have all requirements
needed for using TYPO3 8 LTS:

#. PHP 7 or higher

#. A database (we are using MariaDB)

#. If you want to work on the TER project you do need a Solr Server.
   This is optional for the typo3.org project.


Repositories
------------
You can find all needed Repositories at our `Gitlab server
<https://git-t3o.typo3.org/>`__.

To gain access to these repos you need to have a typo3.org Account. If you are
not able to login to Gitlab, the reason for this might be, that your Username
is not present in our new LDAP environment. To solve this go to
https://typo3.org/ and log in there once.

You will find a repository for each project (typo3.org, extensions.typo3.org,
my.typo3.org). As these repositories share the same template extension (t3olayout)
you will also find this one and all the others. The extensions will be loaded via
composer. Issues (Tickets) can be found in this repositories and you will need
to send pull requests to them directly.

In this example we will guide you through the process of setting up an
installation for typo3.org.

We provide the needed assets for this project (fileadmin and Database).
You can download these assets in the Pipeline of Gitlab
(link will be provided below) - so you dont have to take care of contents and
stuff at all. This ensures that you will have an installation with the
latest content up and running. The only thing is that you need to have a
backend-user. If this isn't the case on stage.typo3.org or typo3.org you need to
create one using the installtool.

Installation
------------

Clone and prepare files
~~~~~~~~~~~~~~~~~~~~~~~

.. rst-class:: bignums

#. Clone your repository (in case for typo3.org -
   `find it here <https://git-t3o.typo3.org/t3o/typo3.org>`_)

#. Create a new host and point your Document Root to the subdirectory
   :file:`html` in the repository

#. Create a file :file:`html/typo3conf/AdditionalConfiguration.php` or copy
   the given :file:`html/typo3conf/AdditionalConfiguration.sample.php` to this
   name. Edit this file and add the credentials to your local database.

#. Run `composer install` in the root of your project



Download and install assets
~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. rst-class:: bignums

#. Download the `database dump and assets
   <https://git-t3o.typo3.org/t3o/typo3.org/builds/artifacts/assets/download?job=dump-assets>`__
   from GitLab. Get this download and copy the folder :file:`fileadmin` into
   the folder :file:`html`.

#. Import the :file:`DB.sql` provided with the Artefacts into your local DB



Build CSS and JS
~~~~~~~~~~~~~~~~

.. rst-class:: bignums

#. Move to the folder :file:`html/typo3conf/ext/t3olayout/Build/`

#. run `npm install` on terminal/bash/shell

#. run `npm run build`

   For all those who don't want to do this or are not able to build these files
   using npm the latest version of these files are also included in the
   asset-download. Copy the folders :file:`Images`, :file:`JavaScript` and
   :file:`Css` to :file:`html/typo3conf/ext/t3olayout/Resources/Public`
   and you will be able to see the frontend as well.


Get TYPO3 up and running
~~~~~~~~~~~~~~~~~~~~~~~~

.. rst-class:: bignums

#. Move to the folder :file:`html/`

#. Run `php bin/typo3cms install:generatepackagestates 0 1`
   on terminal/bash/shell

#. If you need a user to login to the backend you need to go to the
   installtool. Therefore you need to move to the folder
   :file:`html/typo3conf` and create a file named :file:`ENABLE_INSTALL_TOOL`.
   This file can be empty. Then login to
   `http(s)://yourinstall.local/typo3/install`.
   The standard password (provided in :file:`AdditionalConfiguration.php`) is
   `joh316`

#. Scroll down to the tab 'important actions'. That is the start page of the
   installtool. At the bottom of the page you will find the possibility to
   create a new backend user. Create one and login to the backend at
   `http(s)://yourinstall.local/typo3/`

