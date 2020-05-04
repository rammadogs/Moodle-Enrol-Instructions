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

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot .'/course/externallib.php');

use core_course_external;

function getMergeFieldsForCourse($courseid) {
	global $DB;

	$course = $DB->get_record('course', array('id' => $courseid));
	
	return $course;
}

function performMerge($text, $fields) {
	foreach($fields as $field => $value) {
		$text = str_replace('{{' . $field . '}}', $value, $text);
	}
	return $text;
}