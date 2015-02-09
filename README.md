OphMiCdarecord
==============

This module is designed to provide a base inteface to any CDA record that might be provided for a patient. 

Configuration
-------------

This module is namespaced. as a result setting the module config in core should read as follows:

'OphMiCdarecord' => array(
	'class' => '\OEModule\OphMiCdarecord\OphMiCdarecordModule',
),

Migration
---------

./yiic migrate --migrationPath=application.modules.OphMiCdarecord.migrations

Roadmap
-------

Done
----

1. allow CRUD through UI for creating event. 
1. Apply XSLT to CDA for viewing.

Upcoming
--------
1. Define CDA record as a measurement
1. Create FHIR API for receiving CDA and automatically creating event (will need to define episode/firm rules, although will initially only need to worry about single case of each)
	i) Will need to have the event active but not add-able (core change)
1. Update CRUD UI to reflect automatic event creation (turn off update, only allow create for admin, change delete behaviour to ensure that it removes measurement as well as event)
1. Implement hooks for child module to leverage base structure but perform specific data parsing from CDA document into clinical data (at patient or event level)

Unresolved
----------

1. Image handling within CDA data. Currently considering a couple of different approaches:
	1. provide images as separate attachments through api and use internal references within CDA to point to them where necessary.
	1. parse the CDA before storage to define appropriate internal references while generating and storing images internally as protected files.

