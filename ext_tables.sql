#
# SQL definitions
#

CREATE TABLE tt_content (
	`header` varchar(255) NOT NULL DEFAULT '',
	`subheader` varchar(255) NOT NULL DEFAULT '',
	`bodytext` text,
	`image` int(11) unsigned NOT NULL DEFAULT '0',
	`date` int(11) NOT NULL DEFAULT 0,
	`header_link` varchar(255) NOT NULL DEFAULT '',
	`layout` int(11) unsigned DEFAULT '0' NOT NULL,
);
