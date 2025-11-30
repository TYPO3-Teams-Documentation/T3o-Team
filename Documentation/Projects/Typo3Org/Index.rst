.. include:: ../../Includes.rst.txt
.. highlight:: shell

.. _typo3-org-project:

=========
typo3.org
=========

.. contents:: On this page:
   :backlinks: top
   :class: compactlist
   :local:

The main TYPO3 community website and central hub for the TYPO3 ecosystem.

Repository Information
======================

**Repository URL**: https://git.typo3.org/services/t3o-sites/typo3.org/typo3.org

**Branch Strategy**:

- Main branch: ``develop``
- Feature branches: ``feature/issue-number-description``

**Workflow**: Follow the standard :doc:`../../Workflow/Index`

Project Description
===================

typo3.org serves as the main community hub providing:

**Core Features**

- Community news and announcements
- Event listings and management
- Security bulletins and advisories
- TYPO3 certification information
- Download section for TYPO3 releases
- Community member profiles

**Target Audience**

- TYPO3 developers and integrators
- Agency owners and decision makers
- Community members and contributors
- New users discovering TYPO3

Technical Details
=================

**TYPO3 Version**: 12.4 LTS
**PHP Version**: 8.1+
**Database**: MariaDB

**Key Extensions**

- ``t3olayout``: Common layout and styling
- ``filefill``: Asset loading from production
- ``news``: News and announcement system
- ``events2``: Event management
- ``solr``: Search functionality (optional)

Local Development Setup
=======================

**DDEV Setup (Recommended)**

.. rst-class:: bignums

#. Clone the repository::

    git clone https://git.typo3.org/services/t3o-sites/typo3.org/typo3.org.git
    cd typo3.org

#. Configure authentication::

    cp auth.json.example auth.json
    # Edit auth.json with your GitLab credentials

#. Start environment::

    ddev start
    ddev sync-database

#. Access the site:
   - Frontend: https://typo3.org.ddev.site
   - Backend: https://typo3.org.ddev.site/typo3/ (admin/password)

**Manual Setup**

Follow the :doc:`../../LocalEnvironment/Manual/Index` guide with these project-specific details:

- Database dump: ``https://git.typo3.org/api/v4/projects/133/jobs/artifacts/develop/download?job=Get%20dump%20for%20local%20environment``
- Filefill configuration: See the configuration in :doc:`../../LocalEnvironment/Ddev/Index`

Development Guidelines
======================

**Frontend Development**

- Build assets: ``ddev build-frontend`` (DDEV) or ``npm run build --prefix=vendor/t3o/t3olayout/Build/``
- CSS/SCSS files located in ``vendor/t3o/t3olayout/Build/``
- JavaScript files in the same directory structure

**Content Management**

- News articles: Use the news extension
- Events: Use the events2 extension
- Pages: Standard TYPO3 page management

**Testing**

- Test all changes locally before creating merge requests
- Verify responsive design on different screen sizes
- Check cross-browser compatibility
- Test performance impact of changes

Common Development Tasks
========================

**Adding News Articles**

- Backend → Web → List → News folder
- Create new news record
- Set publication date and author
- Add categories and tags as needed

**Managing Events**

- Backend → Web → List → Events folder
- Create new event record
- Set location, date, and time
- Configure registration if applicable

**Updating Content**

- Most content can be edited directly in the backend
- Static content may require template changes
- Images should be optimized for web use

Special Considerations
======================

**Asset Management**

- Use filefill for production assets
- Optimize images before upload
- Use appropriate file formats (WebP when possible)

**Performance**

- Enable caching in production
- Monitor database query performance
- Optimize images and assets

**Security**

- Keep TYPO3 core and extensions updated
- Follow TYPO3 security best practices
- Monitor security bulletins

Known Issues & Solutions
========================

**Common Problems**

- Asset loading issues → Check filefill configuration
- Database connection errors → Verify credentials in additional.php
- Frontend build failures → Clear npm cache and rebuild

**Performance Issues**

- Slow page loads → Check database queries and caching
- Large images → Optimize and use appropriate formats
- Memory issues → Increase PHP memory limit if needed

Getting Help
============

**Resources**

- Project-specific issues: Repository issue tracker
- General questions: TYPO3 Slack #typo3-org
- TYPO3 documentation: https://docs.typo3.org/

**Contacts**

- Project maintainers: See repository contributors
- General T3O team: Contact via Slack

Next Steps
==========

- **Start Development**: :doc:`../../LocalEnvironment/Index`
- **Understand Workflow**: :doc:`../../Workflow/Index`
- **Explore Other Projects**: :doc:`../Index`
- **Get Help**: :doc:`../../FAQ/Index`