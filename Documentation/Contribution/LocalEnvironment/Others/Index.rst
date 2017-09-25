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


Installation
------------

#. Clone your repository
#. Point your Document Root to the subdirectory `htdocs` in the repository
#. Create a file `htdocs/typo3conf/AdditionalConfiguration.php` or copy the given `htdocs/typo3conf/AdditionalConfiguration.sample.php` to this name
#. Edit this file and add the credentials to your local database
#. Run `composer install`
#. Either grab the assets (CSS and JS) from GitLab or "gulp" it on your own.
#. Download the database dump and assets from GitLab
#. Start to work

You can look into our :ref:`FAQ` section for further questions.
