
.. include:: ../Includes.txt

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



Current TER sql dump
====================

Here you can find the latest SQL file (gzipped):
https://www.dropbox.com/s/smaxk9mjh149b6c/ter-latest.sql.gz?dl=0 (MD5: cc0bfdcb33b4d4c0ecdfb6e661e2cab6)

How to import the SQL:

-  Download it from Dropbox, see link above.
-  Unpack the file: `gunzip ter-latest.sql.gz`
-  Copy the file to the fileadmin folder in the docker-container:
   `cp ter-latest.sql /path/to/docker/ter-typo3-org/data/typo3/html/fileadmin/ter-latest.sql`
-  Connect to the db-container: `docker-compose exec db bash`
-  Go to the dir with sql-file: `cd /var/www/html/fileadmin/`
-  Import SQL: `mysql -ut3o -p t3o < ter-latest.sql`


Problems and solutions
======================

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

