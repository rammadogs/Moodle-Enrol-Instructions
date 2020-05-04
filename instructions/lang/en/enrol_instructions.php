<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Instructions enrolment plugin.
 *
 * @package    enrol_instructions
 * @copyright  2020 Ben Ramcharan (Rammas) {@link https://github.com/rammadogs/Moodle-Enrol-Instructions}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

//plugin name and description
$string['pluginname'] = 'Enrolment instructions';
$string['pluginname_desc'] = 'This simple plugin does not enrol any users in the course. Its sole purpose in existing in a course is to customise the "Enrolment Options" page and provide instructions on that page for the user to enrol in the course.';

//permission descriptions
$string['instructions:config'] = "Configure Enrollment Instructions instances.";

//config form field labels
$string['label_message_to_user'] = "Message";

//blanket settings form field labels
$string['settings_label_header'] = "Header";
$string['settings_desc_header'] = "A header to be shown above the message for every instance of the Enrollment Instructions plugin on the site.";
$string['settings_label_footer'] = "Footer";
$string['settings_desc_footer'] = "A footer to be shown below the message for every instance of the Enrollment Instructions plugin on the site.";
