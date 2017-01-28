
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


.. _ter-project-phpMyAdmin:

phpMyAdmin
==========

1. Start the :ref:`nginx-proxy`.

2. Start TYPO3 by running `make up` in the clone of https://git-t3o.typo3.org/t3o/ter

3. Use `docker ps` to list the running docker containers. Find the name of the container
   with the database server. It is `ter_db_1` for example.
   Let's name it `DBSERVER` and set `DBSERVER=ter_db_1`.

4. Use `docker network ls` to list networks. `ter_default` is what we are looking for.
   Let's define that as `DBNETWORK=ter_default`.

5. Run phpMyAdmin in a Docker container with the name `phpadmin_ter`. Run as a daemon,
   remove the container after stopping, link to the container with the DB server
   in the appropriate network::

      DBSERVER=ter_db_1
      DBNETWORK=ter_default
      THENAME=phpadmin_ter
      docker run --name ${THENAME} -d --rm  \
         --link=${DBSERVER}:db --network=${DBNETWORK} \
         -p 8181:80  phpmyadmin/phpmyadmin

6. Find the username and password for the database in the :file:`.env` file of the project repository.

7. Direct your browser to the phpMyAdmin login form at http://127.0.0.1:8181

8. Use the values of DATABASE_USER and DATABASE_USER_PASSWORD from the :file:`.env` file
   to login.

9. Stop the container when done, thereby removing it::

      ➜ docker stop phpadmin_ter

Have fun!

