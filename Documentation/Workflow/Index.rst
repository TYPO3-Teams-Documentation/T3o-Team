.. include:: ../Includes.rst.txt
.. highlight:: shell

.. _workflow:

========
Workflow
========

.. contents:: On this page:
   :backlinks: top
   :class: compactlist
   :local:

This document describes the complete workflow from ticket creation to deployment for TYPO3.org projects.

Prerequisites
=============

**GitLab Account**
Before you can contribute, you need a GitLab account that corresponds to your TYPO3.org username.
You can manage your TYPO3.org account at `my.typo3.org <https://my.typo3.org/>`_.

**Access Requirements**

- For most projects: TYPO3.org account with GitLab access
- For **extensions.typo3.org (TER)**: Additional signed NDA required due to GDPR (user data protection)

If you don't have access to GitLab, the reason might be that your username is not present in the LDAP environment.
To solve this, log in to https://typo3.org/ once.

**User Roles & Permissions**

- **Contributors**: Can create feature branches, push commits, and create merge requests
- **Maintainers**: Can merge into ``develop`` and ``main`` branches, review and approve merge requests

.. important::
   Only users with **Maintainer** status can merge into ``develop`` and ``main`` branches.
   All other contributors must create merge requests for review.

General workflow
================

.. rst-class:: bignums

#. Log in to `GitLab <https://git.typo3.org>`_

#. If you don't have access to the T3O project, ask one of the project maintainers

#. Look into the different repositories. Priorities are:

   #. Testing and reviewing open merge requests
   #. Solving existing issues
   #. Creating new issues

#. If you have found a merge request or issue, assign it to yourself

#. Work on your local development environment

Issue Workflow (Contributors)
=============================

.. rst-class:: bignums

#. **Find an Issue**: Browse the repository issues and assign one to yourself

#. **Create Feature Branch**: Always branch from ``develop``::

    git checkout develop
    git pull origin develop
    git checkout -b feature/issue-number-description

   Or use GitLab's interface to create a merge request from an issue.

#. **Development**: Work on your local environment (see :doc:`../LocalEnvironment/Index`)

   - Make small, logical commits
   - Push commits regularly to your feature branch
   - Test your changes thoroughly
   - Ensure your branch stays up-to-date with ``develop``

#. **Create Merge Request**:

   - Target: ``develop`` branch (never directly to ``main``)
   - Mark as "Draft" while work is in progress
   - Remove "Draft:" when ready for maintainer review
   - Add clear description of changes and testing done

Coding standards
================

Follow TYPO3 Core coding standards:

- **PHP**: PSR-12 compliant, follow TYPO3 CGL (Coding Guidelines)
- **JavaScript**: Use modern ES6+ syntax
- **CSS/SCSS**: Follow BEM methodology where applicable
- **Commits**: Write clear, descriptive commit messages

.. note::
   Detailed coding standards will be added in future updates.

Merge Request Workflow (Maintainers)
====================================

.. rst-class:: bignums

#. **Review Assignment**: Maintainers review and assign merge requests to themselves

#. **Code Review**: Review the code changes carefully

#. **Local Testing**: Test the code locally on your development environment

#. **Approval Process**:

   - If everything is okay: Approve and merge into ``develop``
   - If improvements are needed: Request changes and assign back to author
   - Ensure all tests pass and code quality standards are met

#. **Merge to Develop**: Maintainer merges approved feature into ``develop`` branch

#. **Release Process**: When ready for production, maintainer merges ``develop`` into ``main``

**Note for Contributors**: You cannot merge your own requests. A maintainer must review and merge all contributions.

Deployment process
==================

After successful merge to the main branch:

- **Staging**: Changes are automatically deployed to staging environment
- **Production**: Production deployment follows the project's release schedule
- **Monitoring**: Monitor for any issues after deployment

Branch Strategy & Permissions
=============================

**Protected Branches**

- ``main``: Production branch - Maintainers only
- ``develop``: Development branch - Maintainers only
- ``master``: For extensions - Maintainers only (legacy naming)

**Contributor Branches**

- **Feature branches**: ``feature/issue-number-description`` - Contributors can create and push
- **Hotfix branches**: ``hotfix/description`` - For critical fixes

**Merge Flow**

.. rst-class:: bignums

#. Contributors create feature branches from ``develop``
#. Contributors create merge requests targeting ``develop``
#. Maintainers review and merge into ``develop``
#. Maintainers merge ``develop`` into ``main`` for releases

.. warning::
   Direct pushes to ``develop`` and ``main`` are restricted to maintainers only.

Getting help
============

If you encounter problems:

- Check the :doc:`../FAQ/Index` for common issues
- Ask in the TYPO3 Slack #typo3-org channel
- Contact project maintainers directly
