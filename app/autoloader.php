<?php

define( 'APP_ENV', 'local' );

define( 'APP_DEBUG', false);

define( 'ABSPATH', dirname(__FILE__) );

define( 'BASEPATH', '/MarhamNewWeb/public/web/admin/' );

define( 'PATH', '/MarhamNewWeb/public/' );

define( 'CONNECT_PATH', '/MarhamConnectWeb/public/' );

define( 'HOSPITAL_IMAGE_FETCH_PATH', 'assets/hospitals/' );

define( 'HOSPITAL_IMAGE_UPLOAD_PATH', '../../assets/hospitals/' );

define( 'DOCTOR_IMAGE_FETCH_PATH', 'assets/doctors/' );

define( 'CAREER_FILES_PATH', 'assets/careers/' );

define( 'DOCTOR_CONNECT_IMAGE_FETCH_PATH', '/../../../..' . CONNECT_PATH . DOCTOR_IMAGE_FETCH_PATH );

define( 'DOCTOR_IMAGE_UPLOAD_PATH', '../../../..' . CONNECT_PATH . 'assets/doctors/' );

define( 'DOCTOR_TRAINING_VIDEO_UPLOAD_PATH', '../../../../MarhamConnectWeb/public/assets/doctor_trainings/' );

define( 'FREE_MEDICAL_SERVICES_IMAGE_FETCH_PATH', 'assets/free_medical_services/' );

define( 'FREE_MEDICAL_SERVICES_IMAGE_UPLOAD_PATH', '../../assets/free_medical_services/' );

define( 'ONLINE_CONSULTATIONS_FILES_FETCH_PATH', 'assets/online_consultations/' );

define( 'DEALS_IMAGE_FETCH_PATH', 'assets/deals/' );

define( 'DEALS_IMAGE_UPLOAD_PATH', 'assets/deals/' );

define( 'FORUM_FILES_FETCH_PATH', 'assets/files/' );

define( 'BASEURL_S3_MARHAM', 'http://localhost/MarhamNewWeb/public/' );

define( 'BASEURL_S3_CONNECT', 'http://localhost/MarhamConnectWeb/public/' );

define( 'PAYMENT_EVIDENCES_PATH', 'assets/payment_evidences/' );

define( 'TRANSFORMATION_DIET_PLAN_UPLOAD_PATH', '../../assets/transformations/' );

define( 'BASEURL', 'http://'.$_SERVER['HTTP_HOST'] );//REQUEST_SCHEME

define( 'BASEURL_CONNECT', 'http://localhost/MarhamConnectWeb/public' );

define( 'SMS_BASE_URL', 'http://bsms.its.com.pk/api.php' );

define( 'SMS_KEY', 'b4a18580da5f6dae0c39d2e98f2280fc' );

define( 'SMS_SENDER', '8764' );

date_default_timezone_set('Asia/Karachi');

/**

 * Include the database file

 */

require_once( ABSPATH . '/db.php' );

/**

 * Include the business helper file

 */

require_once( ABSPATH . '/helper.php' );

/**

 * Include the business logic file

 */

require_once( ABSPATH . '/business_logic.php' );

