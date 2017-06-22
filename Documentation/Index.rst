.. Tip - just do it:
      don't use TABs (= \t, tabulators)
      replace each TAB by *three blanks* (enable RegExp for Search and Replace in your IDE)
      set TAB width and indentation to THREE in your IDE
      set 'Use blanks instead of TABs' in your IDE


.. With the following include we import some definition. We do this in each and every file.
   so we can change the definition at a single place. Use the relative path to the Includes.txt file,
   which may look as well like ../../../Includes.txt for a deeply nested source file.

.. include:: Includes.txt


.. Usually we define 'php' as default highlight language in Includes.txt.
   With the following 'highlight' directive we switch to reStructuredText as default highlight language.

.. highlight:: rst


.. The following, first section (= headline) is the 'Document Title'.


======================
typo3.org-Team At Work
======================


.. The following is 'field list' which is rendered as a horizontal table.
   Think of it as key-value pairs.


:Writing here:    typo3.org-Team
:Buildinfo:       Find information about the documentation build process in `buildinfo <_buildinfo>`_
:Markup:          Have a look at the `warnings.txt <_buildinfo/warnings.txt>`_ to see if there a
                  warnings about the reStructuredText syntax.
:Sitemap:         :ref:`Sitemap`
:Rendered:        |today|

See also:

-  `what the TYPO3 Documentation Team writes
   <https://docs.typo3.org/typo3cms/drafts/github/T3DocumentationStarter/Public-Info-054/>`__


.. toctree::
   :hidden:

   Sitemap/Index
   T3oRelaunch2017/Index
   T3oTerLaunch2017/Index
   NginxProxy/Index
   Knowledgebase/Index
   PersonalNotes/Index
   Linktargets/Index

