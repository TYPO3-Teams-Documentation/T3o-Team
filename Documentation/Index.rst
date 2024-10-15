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


:Writing here:    t3o team - it's about typo3.org and related pages
:Rendered:        |today|

.. toctree::
   :hidden:

   Contribution/Index
   Knowledgebase/Index
   PersonalNotes/Index
   typo3.org/Index
   extensions.typo3.org/Index
   my.typo3.org/Index

