
.. include:: ../Includes.txt

.. _Relaunch-2017-typo3-org:

=======================
Relaunch 2017 typo3.org
=======================

.. contents:: On this page:
   :local:
   :class: compactlist
   :backlinks: top

Basissetup
==========

Get you environment working.

Repository
----------

This is the main repository for typo3.org: https://git-t3o.typo3.org/t3o/typo3.org

We are using this :ref:`Gitlab-Workflow`.

docker engine
-------------

-  Get `docker engine` up and running for your machine.
   See https://docs.docker.com/engine/installation/

nginx proxy
-----------

-  Make sure to have an instance of `jwilder/nginx-proxy <https://github.com/jwilder/nginx-proxy>`__
   running on your development box. To do that

   #.  Clone `torvitas/nginx-proxy-configuration <https://github.com/torvitas/docker-nginx-proxy-configuration>`__

   #.  ((... and get it up and running. See :file:`Makefile` and the readme))


Start the dockerized server
---------------------------

Quickstart to get things running::

   # go home
   ➜ cd ~

   # clone repository
   ➜ git clone https://git-t3o.typo3.org/t3o/typo3.org.git

   # go to ./typo3.org/
   ➜ cd typo3.org

   # build and run docker containers
   ➜ make init up log


Find the credentials in the :file:`.envs` file.

Find the page in your browser:

-   https://t3o.typo3.127.0.0.1.xip.io/typo3/sysext/install/Start/Install.php
-   https://t3o.typo3.127.0.0.1.xip.io/typo3/
-   https://t3o.typo3.127.0.0.1.xip.io/

Have a look at :file:`AdditionalConfiguration.php`::

   # this may be necessary
   cp data/typo3/html/typo3conf/AdditionalConfiguration.sample.php \
      data/typo3/html/typo3conf/AdditionalConfiguration.php

Composer
--------

Example::

   ./data/scripts/composer.sh --working-dir=data/typo3/ info

For your convenience there are the following make jobs::

   make composer-install
   make composer-update


phpMyAdmin
----------

See this :ref:`How-to <ter-project-phpMyAdmin>`.

Where do i find all Informations 
================================

GoogleDrive: We store concepts and layout files at our Google Drive:
https://drive.google.com/drive/folders/0B2Cxq-J7cHvVc2YyNzZDU2dXMDA

typo3.org concept:
https://docs.google.com/document/d/1Zj-SDEH-da2RBOsnpsiiZ9-VGiNsgHXceEgfDXbWcT8/edit


Our Issue tracker is the TYPO3 Gitlab at https://git-t3o.typo3.org/t3o



Where do i get needed Data
==========================
TODO (Database / Fileadmin / Asset)


How the Deployments work for all webs
=====================================
TODO


Which Contentelements exists and how they are solved in the Backend/Frontend
============================================================================

All elements are documented at https://stage.typo3.org/index.php?id=60


Which settings can be done in the diffrent Installations concerning the Frontend
================================================================================


Define META menu
----------------

Go to Template extension > "Info/Modify" and set constant **{pageId}**

   tx_t3olayout.page.metamenuid = **{pageId}**

or go to Template extension > "Constant editor", at section Category select "T3O PAGE-SETTINGS" and set [tx_t3olayout.page.metamenuid] constant to **{pageId}**
where **{pageId}** is id of the page with subpages to show

