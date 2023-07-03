<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Default Template
	|--------------------------------------------------------------------------
	|
	| This option controls the template used by the root to display data.
	|
	*/

	'template' => '',

	/*
	|--------------------------------------------------------------------------
	| Urls used to retrieve Classes
	|--------------------------------------------------------------------------
	|
	| This option sets the url where to retrieve course names.
	|
	*/

	'courses_urls' => [
        'http://webing.unipv.eu/home/education/list-of-classes-taught-in-english/' # List of Classes Taught in English
    ],

	/*
	|--------------------------------------------------------------------------
	| Urls used to retrieve Lecturers
	|--------------------------------------------------------------------------
	|
	| This option sets the url where to retrieve the lectures.
	|
	*/

	'lectures_urls' => [
        'http://www-3.unipv.it/ingserv/orario2223/2sem/classi/CE_E1.htm',
        # Computer Engineering - 1 year - Embedded IoT Systems
        'http://www-3.unipv.it/ingserv/orario2223/2sem/classi/CE_C1.htm',
        # Computer Engineering - 1 year - Computer Science and Multimedia
        'http://www-3.unipv.it/ingserv/orario2223/2sem/classi/CE_D1.htm',
        # Computer Engineering - 1 year - Data Science
        'http://www-3.unipv.it/ingserv/orario2223/2sem/classi/CE_I1.htm',
        # Computer Engineering - 1 year - Intelligent control systems
        'http://www-3.unipv.it/ingserv/orario2223/2sem/classi/CE_E2.htm',
        # Computer Engineering - 2 year - Embedded and control systems
        'http://www-3.unipv.it/ingserv/orario2223/2sem/classi/CE_C2.htm',
        # Computer Engineering - 2 year - Computer Science and Multimedia
        'http://www-3.unipv.it/ingserv/orario2223/2sem/classi/CE_D2.htm',
        # Computer Engineering - 2 year - Data Science
        'http://www-3.unipv.it/ingserv/orario2223/2sem/classi/IA_R1.htm',
        # Industrial Automation Engineering - 1 year - Robotics and Mechatronics
        'http://www-3.unipv.it/ingserv/orario2223/2sem/classi/IA_I1.htm',
        # Industrial Automation Engineering - 1 year - Industrial Technologies and Management
        'http://www-3.unipv.it/ingserv/orario2223/2sem/classi/IA_R2.htm',
        # Industrial Automation Engineering - 2 year - Robotics and Mechatronics
        'http://www-3.unipv.it/ingserv/orario2223/2sem/classi/IA_I2.htm',
        # Industrial Automation Engineering - 2 year - Industrial Technologies and Management
    ],
];
