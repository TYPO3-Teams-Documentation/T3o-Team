.. include:: ../Includes.rst.txt
.. highlight:: shell

.. _projects:

========
Projects
========

.. contents:: On this page:
   :backlinks: top
   :class: compactlist
   :local:

This section provides an overview of all TYPO3.org projects, their repositories, and specific requirements.

.. toctree::
   :titlesonly:

   Typo3Org/Index
   ExtensionsTypo3Org/Index
   VotingTypo3Org/Index
   MyTypo3Org/Index

Project overview
================

The TYPO3 Organization maintains several web projects, each with its own repository and specific requirements:

.. list-table:: Project Overview
   :header-rows: 1
   :widths: 25 35 25 15

   * - Project
     - Repository
     - Description
     - Special Requirements
     - SQL-Dump Project ID
   * - **typo3.org**
     - `typo3.org <https://git.typo3.org/services/t3o-sites/typo3.org/typo3.org>`_
     - Main community hub
     - None
     - 133
   * - **extensions.typo3.org**
     - `ter <https://git.typo3.org/services/t3o-sites/extensions.typo3.org/ter>`_
     - TYPO3 Extension Repository
     - Solr, Signed NDA
     - 134
   * - **voting.typo3.org**
     - *URL to be provided*
     - TYPO3 Community Voting
     - None
     - None
   * - **my.typo3.org**
     - *URL to be provided*
     - User account management
     - None
     - None

Common architecture
===================

All projects share similar architecture:

**Technology Stack**

- TYPO3 CMS 12.4 LTS
- PHP 8.1+
- MariaDB/MySQL database
- Composer for dependency management

**Extensions**

- ``t3olayout``: Common layout extension for all projects
- ``filefill``: Asset loading from production (by Nicole Cordes)
- Project-specific extensions as needed

**Development Workflow**

- GitLab-based development
- Feature branches from ``develop`` branch
- Merge requests for code review
- CI/CD pipelines for testing and deployment

Database synchronization
========================

Each project provides database dumps via GitLab CI/CD artifacts:

**Available Databases**

- **typo3.org**: ``https://git.typo3.org/api/v4/projects/133/jobs/artifacts/develop/download?job=Get%20dump%20for%20local%20environment``
- **Other projects**: URLs will be provided later

**DDEV Integration**
All projects support the ``ddev sync-database`` command for automated database synchronization.

Access requirements
===================

**Standard Access**

- TYPO3.org account
- GitLab access (username must match TYPO3.org username)
- Account management via `my.typo3.org <https://my.typo3.org/>`_

**Special Access Requirements**

- **extensions.typo3.org**: Signed NDA required due to GDPR compliance (user data protection)

If you can't access GitLab, log in to https://typo3.org/ once to sync your account with LDAP.

Filefill configuration
======================

Each project has specific filefill configuration for asset loading:

**typo3.org Configuration**

..  literalinclude:: ../LocalEnvironment/_codesnippets/filefill.php
    :caption: Filefill configuration for typo3.org
    :language: php

**Other Projects**: Configurations will be provided later.

Branch strategy
===============

**Website Projects**

- Main branch: ``develop``
- Feature branches: ``feature/issue-number-description``
- Hotfix branches: ``hotfix/description``

**Extensions**

- Main branch: ``master``
- Feature branches: ``feature/issue-number-description``

Getting started
===============

**For New Contributors**

.. rst-class:: bignums

#. Choose a project from the list above
#. Check access requirements
#. Follow the :doc:`../LocalEnvironment/Index` guide
#. Read the project-specific documentation
#. Check the :doc:`../Workflow/Index` for contribution guidelines

**For Experienced Contributors**

.. rst-class:: bignums

#. Check project-specific repositories for open issues
#. Review merge requests that need testing
#. Follow the established :doc:`../Workflow/Index`

Next steps
==========

- **Project Details**: Click on individual projects above for specific information
- **Setup Environment**: :doc:`../LocalEnvironment/Index`
- **Contribution Guide**: :doc:`../Workflow/Index`
- **Need Help?**: :doc:`../FAQ/Index`
