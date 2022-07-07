<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'lingvico_booked_get_css' ) ) {
	add_filter( 'lingvico_filter_get_css', 'lingvico_booked_get_css', 10, 2 );
	function lingvico_booked_get_css( $css, $args ) {

		if ( isset( $css['fonts'] ) && isset( $args['fonts'] ) ) {
			$fonts         = $args['fonts'];
			$css['fonts'] .= <<<CSS

.booked-calendar-wrap .booked-appt-list .timeslot .timeslot-people button,
body #booked-profile-page input[type="submit"],
body #booked-profile-page button,
body .booked-list-view input[type="submit"],
body .booked-list-view button,
body table.booked-calendar input[type="submit"],
body table.booked-calendar button,
body .booked-modal input[type="submit"],
body .booked-modal button {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}
body table.booked-calendar tr.days th, body table.booked-calendar td .date .number, body .booked-calendar-wrap .booked-appt-list .timeslot .spots-available{
    {$fonts['h6_font-family']}
}


CSS;
		}

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS

/* Form fields */
#booked-page-form {
	color: {$colors['text']};
	border-color: {$colors['bd_color']};
}

#booked-profile-page .booked-profile-header {
	background-color: {$colors['bg_color']} !important;
	border-color: transparent !important;
	color: {$colors['text']};
}
#booked-profile-page .booked-user h3, #booked-profile-page .booked-user h3 strong{
	color: {$colors['text_light']};
}
#booked-profile-page .booked-profile-header .booked-logout-button:hover {
	color: {$colors['text_link']};
}

.booked-modal .bm-window p.booked-title-bar {
	color: {$colors['extra_dark']} !important;
	background-color: {$colors['extra_bg_hover']} !important;
}
.booked-modal .bm-window .close i {
	color: {$colors['extra_dark']};
}
.booked-modal .bm-window .close:hover i {
	color: {$colors['text_link']};
}
.booked-modal .bm-window .booked-scrollable {
	color: {$colors['extra_dark']};
	background-color: {$colors['text_link2']} !important;
}
.booked-modal .bm-window .booked-scrollable em {
	color: {$colors['extra_link']};
}
.booked-modal .bm-window #customerChoices {
	background-color: {$colors['extra_bg_hover']};
	border-color: {$colors['extra_bd_hover']};
}
.booked-form .booked-appointments {
	color: {$colors['alter_text']};
	background-color: {$colors['alter_bg_hover']} !important;	
}
.booked-modal .bm-window p.appointment-title {
	color: {$colors['alter_dark']};	
}
body .booked-modal input[type=submit].button-primary, body .booked-modal .booked-forgot-goback, body .booked-modal input[type=submit].button-primary:focus {
   color: {$colors['text_hover']};
   background-color: {$colors['text_link']} !important;	 
}


/* Profile page and tabs */
.booked-calendarSwitcher.calendar,
.booked-calendarSwitcher.calendar select,
#booked-profile-page .booked-tabs {
	background-color: {$colors['alter_bg_color']} !important;
}
#booked-profile-page .booked-tabs li a {
	background-color: {$colors['extra_bg_hover']};
	color: {$colors['extra_dark']};
}
#booked-profile-page .booked-tabs li a i {
	color: {$colors['extra_dark']};
}
#booked-profile-page .booked-tabs li.active a,
#booked-profile-page .booked-tabs li.active a:hover,
#booked-profile-page .booked-tabs li a:hover {
	color: {$colors['extra_dark']} !important;
	background-color: {$colors['text_link']} !important;
}
#booked-profile-page .booked-tab-content {
	background-color: {$colors['bg_color']};
	border-color: {$colors['alter_bd_color']};
}

/* Calendar */
body table.booked-calendar td .date{
    background-color: {$colors['input_bg_color']};
}
body table.booked-calendar td:hover .date{
     background-color: {$colors['text_hover']};
     color: {$colors['extra_dark']};
}
table.booked-calendar tbody tr td.today .date{
     background-color: {$colors['text_hover']}!important;
     color: {$colors['text_dark']}!important;
}
body table.booked-calendar td.today .date span{
    color: {$colors['extra_dark']}!important; 
}
table.booked-calendar thead tr {
	background-color: {$colors['extra_bg_color']} !important;
}
table.booked-calendar thead tr th {
	color: {$colors['text_dark']} !important;
	border-color: {$colors['alter_bd_color']} !important;
}
table.booked-calendar thead th i {
	color: {$colors['text_dark']} !important;
}
table.booked-calendar thead th a:hover i {
	color: {$colors['text_link']} !important;
}
table.booked-calendar thead th a:hover{
	border-color: {$colors['text_link']} !important;
}
table.booked-calendar thead th a{
   border-color: {$colors['text_dark']} !important; 
}
body table.booked-calendar tr.week td.active .date, body table.booked-calendar tr.week td.active:hover .date{
    background-color: {$colors['text_hover']} !important;
}
body table.booked-calendar tr.week td.active .date .number{
    background-color: transparent!important;
    color: {$colors['extra_dark']} !important;
}
body #booked-profile-page input[type=submit].button-primary:hover, 
body table.booked-calendar input[type=submit].button-primary:hover, 
body .booked-list-view button.button:hover, 
body .booked-list-view input[type=submit].button-primary:hover, 
body .booked-modal input[type=submit].button-primary:hover,
body table.booked-calendar th, 
body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button:hover, 
body #booked-profile-page .booked-profile-header, 
body #booked-profile-page .appt-block .google-cal-button > a:hover{
     background-color:{$colors['text_hover']}!important;
}
body .booked-modal .bm-window a.booked-forgot-password:hover{
     color: {$colors['text_link']};
}


body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button[disabled]:hover{
   background-color:transparent!important;  
}

table.booked-calendar thead th .monthName a {
	color: {$colors['extra_link']};
}
table.booked-calendar thead th .monthName a:hover {
	color: {$colors['extra_hover']};
}
body table.booked-calendar thead{
    background-color: {$colors['bg_color']} !important;
}

table.booked-calendar tbody tr {
	background-color: {$colors['alter_bg_color']} !important;
}
table.booked-calendar tbody tr td {
	color: {$colors['alter_text']} !important;
	border-color: {$colors['alter_bd_color']} !important;
}
table.booked-calendar tbody tr td:hover {
	color: {$colors['alter_dark']} !important;
}
body table.booked-calendar td:hover .date span{
    background: transparent;
}
table.booked-calendar tr td.next-month .date span, table.booked-calendar tr td.prev-month .date span{
   color: {$colors['alter_bd_hover']} !important; 
}
table.booked-calendar tbody td.today .date span {
	border-color: {$colors['alter_link']};
}
table.booked-calendar tbody td.today:hover .date span {
	background-color: {$colors['alter_hover']} !important;
	color: {$colors['inverse_link']} !important;
}
body table.booked-calendar thead th{
   background-color: {$colors['bg_color']} !important; 
}

body table.booked-calendar td.prev-date .date,
body table.booked-calendar td.prev-date:hover .date,
body table.booked-calendar td.prev-date:hover .date span, 
body table.booked-calendar td.next-month .date, 
body table.booked-calendar td.prev-month .date{
    background-color: {$colors['extra_hover3']} !important; 
    color: {$colors['extra_link3']} !important;
}
table.booked-calendar tbody td.today:hover .date, body table.booked-calendar td.today:hover .date span{
     background-color: {$colors['text_hover']}!important;
     color: {$colors['extra_dark']}!important;
}


.booked-calendar-wrap .booked-appt-list h2 {
	color: {$colors['text_dark']};
}
.booked-calendar-wrap .booked-appt-list .timeslot {
	border-color: {$colors['alter_bd_color']};	
}
.booked-calendar-wrap .booked-appt-list .timeslot:hover {
	background-color: transparent;	
}
.booked-calendar-wrap .booked-appt-list .timeslot .timeslot-title {
	color: {$colors['text_link']};
}
.booked-calendar-wrap .booked-appt-list .timeslot .timeslot-time {
	color: {$colors['text_dark']};
}
.booked-calendar-wrap .booked-appt-list .timeslot .spots-available {
	color: {$colors['text']};
}


body .booked-modal input[type="submit"] {
      color: {$colors['bg_color']} !important;
}
body .booked-modal input[type="submit"]:hover {
      background-color: {$colors['text_link']} !important;
}
body .booked-modal button.cancel {
    color: {$colors['bg_color']} !important; 
    background-color: {$colors['text_hover']} !important;
}

body .booked-modal button.cancel:hover {
    background-color: {$colors['text_link']} !important;
}



CSS;
		}

		return $css;
	}
}

