# Changelog
Created Feb 14, 2018

## Guidelines
The following guidelines must be adhered to when updating the changelog:

- Please add new entries to the bottom of the list.
- Entries must have a title, a date, and a breif description in point form of work performed.
- Entries are to be updated when making a PR.

## Changlog Entries

### 0.1 - Created Changelog and updated Readme
Feb 14, 2018
- Created a changelog
- Updated readme.

### 0.02 - Added tasks model and autoloaded it
Feb 14, 2018
- Created /models/tasks.php
- Pointed tasks to tasks.csv
- Added tasks to autoload

### 0.04 - Added maintenance page
Feb 14, 2018
- Created /views/itemlist.php
- Created /views/oneitem.php
- Create /controllers/Mtce.php
- Changed links

### 0.06 - Pagination
Feb 28, 2018
- Created pagination in controller
- Created views fragments for pagination

### 0.07 - User Roles
Feb 28, 2018
- Added user role validation

### 0.08 - Add completion to homepage
Feb 28, 2018
- Enabled completion of tasks from homepage

### 0.09 - Beef up maintenance page
Feb 28, 2018
- User specific maintenance
- Adde edit when owner

### 0.10 - Added item maintenance
Feb 28, 2018
- Add items
- edit items
- remove items

### 0.11 - Added task.xml
Feb 28, 2018
- create task.xml
- add initial schema
- add half a dozen items

### 0.12 - Tasks now load from XML file
Feb 28, 2018
- fixed task.xml tag matching
- overrode Tasks.php load function to load from xml