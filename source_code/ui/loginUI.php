<?php

    class LoginUI {
        public function warningBox($warningContent) {
            echo "<span class=\"warning\">$warningContent</span>";
        }

        public function successBox($content) {
            echo "<span class=\"success\">$content</span>";
        }
    }
?>