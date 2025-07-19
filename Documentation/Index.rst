.. Tip - just do it:
      don't use TABs (= \t, tabulators)
      replace each TAB by *three blanks* (enable RegExp for Search and Replace in your IDE)
      set TAB width and indentation to THREE in your IDE
      set 'Use blanks instead of TABs' in your IDE


.. With the following include we import some definition. We do this in each and every file.
   so we can change the definition at a single place. Use the relative path to the Includes.rst.txt file,
   which may look as well like ../../../Includes.rst.txt for a deeply nested source file.

.. include:: Includes.rst.txt


.. Usually we define 'php' as default highlight language in Includes.txt.
   With the following 'highlight' directive we switch to reStructuredText as default highlight language.

.. highlight:: rst


.. The following, first section (= headline) is the 'Document Title'.


========
t3o team
========


.. The following is 'field list' which is rendered as a horizontal table.
   Think of it as key-value pairs.


:Writing here:    T3O Team - TYPO3.org Development Documentation
:Rendered:        |today|

This documentation covers the development workflow and local environment setup for TYPO3.org projects.

**Main Topics:**

- :doc:`Workflow/Index`: From ticket to merge request to deployment
- :doc:`LocalEnvironment/Index`: DDEV and manual setup instructions
- :doc:`Projects/Index`: Overview of all T3O projects and their repositories
- :doc:`FAQ/Index`: Frequently asked questions and troubleshooting

.. toctree::
   :hidden:

   Workflow/Index
   LocalEnvironment/Index
   Projects/Index
   FAQ/Index


