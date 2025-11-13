.. include:: ../../Includes.rst.txt
.. highlight:: shell

.. _ddev-setup:

===================
DDEV Setup (Docker)
===================

.. contents:: On this page:
   :backlinks: top
   :class: compactlist
   :local:

DDEV provides a Docker-based development environment with automated setup and database synchronization for TYPO3.org projects.

Prerequisites
=============

**Required Software**
- Docker: `Download Docker <https://www.docker.com/community-edition#/download>`_
- DDEV: `Installation Guide <https://ddev.readthedocs.io/en/latest/#installation>`_
- Node.js 14: Required for frontend asset building (automatically available in DDEV)

**Access Requirements**
- GitLab account corresponding to your TYPO3.org username
- For TER project: Signed NDA required due to GDPR compliance

Installation
============

Clone Repository
----------------

.. rst-class:: bignums

#. Clone your desired project repository::

    # Example for typo3.org
    git clone https://git.typo3.org/services/t3o-sites/typo3.org/typo3.org.git
    cd typo3.org

    # Example for extensions.typo3.org
    git clone https://git.typo3.org/services/t3o-sites/extensions.typo3.org/ter.git
    cd ter

#. Copy the authentication template::

    cp auth.json.example auth.json

#. Edit ``auth.json`` and add your GitLab credentials::

    {
        "http-basic": {
            "git.typo3.org": {
                "username": "gitlabusername",
                "password": "gitlabpassword"
            }
        },
        "gitlab-api": {
            "git.typo3.org": {
                "username": "gitlabusername",
                "token": "gitlab_personal_access_token",
                "project-id": "133",
                "branch": "main",
                "job-name": "Get dump for local environment"
            }
        }
    }

   **Required fields:**
   - ``http-basic``: Basic authentication for Git operations
   - ``gitlab-api``: API access for database synchronization
   - ``project-id``: Project ID for database dumps (varies by project)

Start Environment
-----------------

.. rst-class:: bignums

#. Start the DDEV environment::

    ddev start

#. Sync the database (this will download and import the latest database)::

    ddev sync-database

   .. warning::
      This command will **replace** your existing database with the latest dump from GitLab.
      Any local changes will be lost.

#. Access your local installation:

   - **Frontend**: https://[your-project].ddev.site
   - **Backend**: https://[your-project].ddev.site/typo3/
   - **Backend Login**: Username: ``admin``, Password: ``password`` (created automatically during database import)

Database Synchronization
========================

The ``ddev sync-database`` command:

- Downloads the latest database dump from GitLab CI/CD artifacts
- Drops the existing local database
- Imports the fresh database
- Creates a backend user automatically (admin/password)
- Can be used during development to reset to a clean state

**Database Source URLs:**
Database dump URLs are project-specific and configured in the ``gitlab-api`` section of ``auth.json``. Each project has its own database artifacts from GitLab CI/CD.

**Creating Additional Backend Users**
If you need to create additional backend users, use::

    ddev exec php vendor/bin/typo3 backend:createadmin

Filefill Configuration
======================

DDEV includes automatic filefill configuration that loads assets from production servers.

The configuration is located in ``additional.ddev.php`` and is automatically configured for each project.

**Filefill Configuration**
Each project includes specific filefill configuration for loading assets from production servers. The configuration varies by project and is included in the project's ``additional.ddev.php`` file.

Frontend Development
====================

CSS and JavaScript Assets
--------------------------

To work on frontend assets (uses Node.js 14 automatically)::

    ddev build-frontend

This command compiles all CSS and JavaScript files needed for the frontend.

**Node.js Version in DDEV**
DDEV containers include Node.js 14 by default. You can verify this::

    ddev exec node --version

Mail Testing
------------

All emails are sent to Mailpit during development:

- Access Mailpit: https://[your-project].ddev.site:8026
- No emails will be sent to real addresses

Solr Integration
================

For projects requiring Solr search (like extensions.typo3.org):

**Built-in Solr Server**
- Solr runs automatically in a Docker container
- Access Solr Admin: https://[your-project].ddev.site:8983
- No additional configuration needed

**Usage**
- The Solr server is pre-configured and ready to use
- Indexes are automatically created during database import

Troubleshooting
===============

Common Issues
-------------

**DDEV start fails due to npm processes**
  Remove the ``node_modules`` folder and clear npm cache::

    rm -rf vendor/t3o/t3olayout/Build/node_modules
    ddev exec npm cache clear --force

**Can't login with LDAP user in frontend**
  LDAP login is disabled in local development due to data protection.
  Create a local frontend user instead.

**Database sync fails**
  Check your GitLab credentials in ``auth.json`` and ensure you have access to the project.

**Assets not loading**
  Verify filefill configuration in ``additional.ddev.php`` and check if domains are accessible.

**Port conflicts**
  Stop other local services or configure different ports in ``.ddev/config.yaml``.

Getting Help
============

- Check the :doc:`../../FAQ/Index` for more solutions
- Ask in TYPO3 Slack #t3o-team or #t3o-ter-team channel
- Review DDEV documentation: https://ddev.readthedocs.io/
