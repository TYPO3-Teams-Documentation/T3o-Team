
.. include:: ../../Includes.txt
.. highlight:: shell

.. in general we are using 79 characters at maximum. This is no strict rule.

.. _Gitlab-Workflow:

================
Gitlab Workflows
================

We are using feature branches and merge requests to push changes. Here we
present a short documentation about the workflow.

Terms:

- WIP = Work In Progress
- MR = Merge Request

General Workflow
================

.. rst-class:: bignums

#. Log in to `GitLab <https://git-t3o.typo3.org>`_.

#. If you don't have access to the t3o project, ask one of the masters.

#. Look into the different repositories. Priorities are:

   #. Testing and reviewing open merge requests
   #. Solving issues
   #. Creating issues

#. If you have found a MR or issue, assign it to you.

#. Work!


Issue Workflow
==============

.. rst-class:: bignums

#. Grab an issue and assign it to yourself.

#. Click on the green button on the right to create a merge request. It is
   WIP (Work In Progress) by default if it's not done yet.

#. Go to your local repository and do `git fetch``. Now you should see now the
   new branch with the number of your issue.

#. Switch to the branch.

#. Work!

   - You can do small commits and push them.
   - Every commit will be listed in the MR

#. Create a MR thereby removing the "WIP:" from the title.


Merge Request Workflow
======================

.. rst-class:: bignums

#. Grab a MR and assign it to yourself.

#. Review the code.

#. Test the code locally.

#. *Everything* is okay? Only then do the merge!

#. Something isn't perfect? You want the code to be improved first? Then assign
   it back to the owner again.
