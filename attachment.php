<?php

/*
Attachment Page
*/

get_header();

echo wp_get_attachment_image(get_the_ID(), 'full');

get_footer();