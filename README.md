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

1. allow CRUD through UI for creating event.
2. Apply XSLT to CDA for viewing.
3. Define CDA record as a measurement
4. Create FHIR API for receiving CDA and automatically creating event (will need to define episode/firm rules, although will initially only need to worry about single case of each)
	i) Will need to have the event active but not add-able (core change)
5. update CRUD UI to reflect automatic event creation (turn off update, only allow create for admin, change delete behaviour to ensure that it removes measurement as well as event)
