.. include:: ../Includes.txt

=====================
Log of Thomas Löffler
=====================


News migration
==============

Status before
-------------

- TYPO3 4.5
- tt_news
- DAM
- irre_ttnews (for content elements)

Status after
------------

- TYPO3 8 LTS
- news
- FAL

Steps of migration
------------------

#. Upgrade to TYPO3 6.2
#. Use `dam_falmigration <https://typo3.org/extensions/repository/view/dam_falmigration>` for assets
#. Install `news <https://github.com/georgringer/news>` and `news_ttnewsimport <https://github.com/fsaris/news_ttnewsimport>`
#. Due to the fact that we have all the same assets on the new server, we only need to get the uid from the unique identifier `file_identifier`
#. Build mapping tables with (news_uid, file_uid and file_identifier) as well as (content_uid, file_uid and file_identifier)
#. Migrate content elements (related with `irre_ttnews`) to the built-in possibility in `news`
#. Move records of `sys_file_reference` only from news and depending content elements to new server
#. Move news records and mapping table to new server
#. Get uid of asset on new server from the `file_identifier`
#. Replace old uids in `sys_file_reference` with the new ones
#. Update news and content records with the number of related assets
