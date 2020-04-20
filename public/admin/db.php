<?php
define('_DBHOST', 'localhost');
define('_DBNAME', 'dev_marham_doctordb');
define('_DBUSER', 'root');
define('_DBPASSWORD', '');
define( 'FORUM_HOST', 'localhost' );
define( 'FORUM_DB', 'dev_marham_new_forum' );
define( 'FORUM_USERNAME', 'root' );
define( 'FORUM_PASSWORD', '');

define('DB_CHARSET', 'UTF8');

//////////////

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=dev_marham_doctordb", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


class Database {
    private static $link = null ;

    private static function getLink ( ) {
        if ( self :: $link ) {
            return self :: $link ;
        }

        try {
			self :: $link = new PDO('mysql:host='. _DBHOST .';dbname='. _DBNAME . ';charset=' . DB_CHARSET, _DBUSER, _DBPASSWORD);
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}

        return self :: $link ;
    }

    public static function __callStatic ( $name, $args ) {
        $callback = array ( self :: getLink ( ), $name ) ;
        return call_user_func_array ( $callback , $args ) ;
    }
}

class ForumDatabase {
    private static $link = null ;

    private static function getLink ( ) {
        if ( self :: $link ) {
            return self :: $link ;
        }

        try {
            self :: $link = new PDO('mysql:host='. FORUM_HOST .';dbname='. FORUM_DB, FORUM_USERNAME, FORUM_PASSWORD);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        return self :: $link ;
    }

    public static function __callStatic ( $name, $args ) {
        $callback = array ( self :: getLink ( ), $name ) ;
        return call_user_func_array ( $callback , $args ) ;
    }
}
