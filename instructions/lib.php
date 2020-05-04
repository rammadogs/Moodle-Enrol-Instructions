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

require_once("$CFG->dirroot/enrol/instructions/locallib.php");

class enrol_instructions_plugin extends enrol_plugin {

    public function allow_enrol($instance) {
        return false;
    }

    public function allow_unenrol($instance) {
        return false;
    }

    public function show_enrolme_link($instance) {
        return true;
    }

    public function get_description_text($instance) {
        return $instance->customtext1;
    }

    public function use_standard_editing_ui() {
        return true;
    }

    //We'll only allow one instance for any course at any one time
    public function can_add_instance($courseid) {
        $instances = enrol_get_instances($courseid, false);
        foreach($instances as $current) {
            if($current->enrol == "instructions")
                return false;
        }
        return true;
    }

    public function can_delete_instance($instance) {
        return true;
    }

    /**
     * Adds form elements to add/edit instance form.
     *
     * @since Moodle 3.1
     * @param object $instance enrol instance or null if does not exist yet
     * @param MoodleQuickForm $mform
     * @param context $context
     * @return void
     */
    public function edit_instance_form($instance, MoodleQuickForm $mform, $context) {

        $mform->addElement('htmleditor', 'customtext1', get_string('label_message_to_user', 'enrol_instructions'));

    }

    public function add_default_instance($course) {
        $fields = array(
            'customtext1' => ""
        );
        return $this->add_instance($course, $fields);
    }

    public function enrol_page_hook(stdClass $instance) {

        $mergeFields = getMergeFieldsForCourse($instance->courseid);

        $header = performMerge($this->get_config('header', ""), $mergeFields);
        $body = performMerge($instance->customtext1, $mergeFields);
        $footer = performMerge($this->get_config('footer', ""), $mergeFields);

        $html = "";

        $html .= html_writer::start_tag("div", ['id ' => 'enrol_instructions', 'class' => 'ei-message-area']);
        {
            $html .= html_writer::tag("div", $header, ['class' => 'ei-message-header']);
            $html .= html_writer::tag("div", $body, ['class' => 'ei-message-body']);
            $html .= html_writer::tag("div", $footer, ['class' => 'ei-message-footer']);
        }
        $html .= html_writer::end_tag("div");

        return $html;
    }

}