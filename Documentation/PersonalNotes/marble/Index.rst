
.. include:: ../../Includes.txt
.. highlight:: shell

===============
Martin (marble)
===============


Start Docker-TER machine on Thinkbook
=====================================

#. Shutdown Apache2 to free ports 80 and 443
#. Shutdown MySQL
#. Repository is https://git-t3o.typo3.org/t3o/ter
#. Clone is  `~//Repositories/git-t3o.typo3.org/t3o/ter`

#. Start proxy:

   1. Check ports::

      ➜  cd ~/Repositories/github.com/torvitas
      # is_ports_are_free.sh is a script by marble
      ➜  ./is_ports_are_free.sh 
      is_ports_are_free 127.0.0.1 80 443
      80 unused
      443 unused
      all ports are free
      
   2. Start proxy::
   
      ➜  cd ~/Repositories/github.com/torvitas/nginx-proxy
      make init up log
   


#. Do::
      cd ~//Repositories/git-t3o.typo3.org/t3o/ter
      git reset --hard
      git pull
      git branch -va
