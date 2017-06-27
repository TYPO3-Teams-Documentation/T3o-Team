
.. include:: ../../Includes.txt
.. highlight:: shell

=========================
Repositories and Workflow
=========================

Repositories
============

See https://git-t3o.typo3.org/


.. _Gitlab-Workflow:

Gitlab Workflow
===============

We are using feature branches and Merge Requests to push changes. Here is a short documentation about the workflow:

General workflow
================

#. Log in to `GitLab<https://git-t3o.typo3.org>`_
#. If you don't have access to the t3o project, ask one of the masters
#. Look into the different repositories. Priorities are:
   #. Testing and reviewing open Merge Requests (MR)
   #. Solving issues
   #. Creating issues
#. If you have found a MR or issue, assign it to you
#. Work


Issue workflow
==============

#. Grab an issue and assign it to yourself
#. Click on the green button on the right to create a Merge Request (which is WIP by default) if it's not done yet
#. Go to your local repository and ``git fetch``. You should see now the new branch with the number of your issue
#. Switch to the branch
#. Work
   - You can do small commits and push them
   - Every commit will be listed in the MR
#. Create a MR (by removing the "WIP:" in the MR title)


Merge Request workflow
======================

#. Grab a MR and assign it to yourself
#. Review the code
#. Test the code on your local development
#. All okay? Merge it
#. You have code improvements or it's not working? Assign it back to the owner
