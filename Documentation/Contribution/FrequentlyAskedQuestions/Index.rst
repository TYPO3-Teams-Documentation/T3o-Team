.. include:: ../../Includes.txt
.. highlight:: shell

================================
FAQ - Frequently Asked Questions
================================


.. contents:: On this page:
   :backlinks: top
   :class: compactlist
   :local:


.. _FAQ:

Frequently asked questions
==========================

If you encounter problems with the local environment, just add your questions.
And don't forget to enter answers as well!


In which branch do I work?
--------------------------

For all projects you need to work in a feature branch. Check
:ref:`Gitlab-Workflow` to find out how the branch is created.


`make init up` throws an exception "extension is not activated"
---------------------------------------------------------------

Symptom:
   ::
      [ BadFunctionCallException ]
      #1365429656: TYPO3 Fatal Error: Extension key "ext_key" is NOT loaded!
      thrown in file typo3/sysext/core/Classes/Utility/ExtensionManagementUtility.php
      in line 132

Solution:
   -  Switch to your local environment

   -  Change to the root directory of our project. You should have a
      subdirectory `htdocs` there.

   -  run `bin/typo3cms install:generatepackagestates 0 1`


My PHP version is too old
-------------------------

Symptom:
   `composer` is telling me the PHP version is not up to date

Solution:
   -  Go to your local environment
   -  Update PHP

