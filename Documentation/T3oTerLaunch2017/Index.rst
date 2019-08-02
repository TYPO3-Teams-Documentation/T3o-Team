
.. include:: ../Includes.txt
.. highlight:: shell

.. _Launch-2017-ter-typo3-org:

=========================
Launch 2017 ter.typo3.org
=========================


.. contents:: On this page:
   :local:
   :class: compactlist
   :backlinks: top


Repository
==========

This is the main repository for typo3.org: https://git-t3o.typo3.org/t3o/ter

We are using this :ref:`Gitlab-Workflow`.


.. _ter-assets:

Current TER dump
================

Here you can find the latest dump of all assets:
https://git-t3o.typo3.org/t3o/ter/builds/artifacts/assets/download?job=dump-assets

How to import:

#. Go to TER root (where composer.json is located)
#. Download the latest dump and unzip
#. Unpack the SQL file: `gunzip assets/db.sql.gz`
#. Import the SQL by CLI `ddev import-db --src=assets/db.sql` or import the SQL (by using a GUI like HeidiSQL/SequelPro or by command if you have direct access to the database)
#. Sync the fileadmin: `rsync -arPze --delete assets/html/fileadmin public/`
#. Clear the caches
#. Remove folder and ZIP file
#. Et voilá

Questions and Answers
=====================

If you encounter problems with the docker or composer environment,
just add your questions (and if you have the answer as well)


make init up throws exception that realurl is not activated
-----------------------------------------------------------

Symptom::

   [ BadFunctionCallException ]
    #1365429656: TYPO3 Fatal Error: Extension key "realurl" is NOT loaded!
    thrown in file typo3/sysext/core/Classes/Utility/ExtensionManagementUtility.php
    in line 132

Solution::

   ➜ cd <docker-container-root-dir>
   ➜ docker-composer exec php bash
   bash-php# rm -rf /var/www/html/typo3temp/
   bash-php# exit
   ➜ make reset


Solr
====

To get the solr connection working, you need to add the "Search - Base Configuration (solr)"
to the root template, and the "Initialize Solr Connections" in the "cache-menu" top right.

