<?php
class Registry
{

    private static $instance = null;
    private $register = array();
    private $readOnly = array();
    private function __construct() {}
    public function __destruct() {}
    public static function getInstance()
    {
        if ( self::$instance === null ) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function define( $key, $value )
    {
        if ( !$this->exists( $key ) ) {
            $this->register[$key] = $value;
            $this->readOnly[$key] = true;
        } else {
            die(
                '<p>Error: Constant \'<em>'.$key.'</em>\' is already created '.
                'in Registry!</p>'
            );
        }
    }
    public function __set( $key, $value )
    {
        if ( $this->isConstant( $key ) ) {
            die(
                '<p>Error: Cannot override Constant \'<em>'.$key.
                '</em>\' in Registry!</p>'
            );
        } else {
            $this->register[$key] = $value;
        }
    }
    public function __get( $key )
    {
        return $this->exists( $key ) ?
            $this->register[$key] :
            die(
                '<p>Error: Key \'<em>'.$key.
                '</em>\' not found in Registry!</p>'
            );
    }
    public function __call( $key, $args )
    {
        if ( $this->exists( $key ) && is_callable( $this->register[$key] ) ) {
            return call_user_func_array( $this->register[$key], $args );
        }
        trigger_error( $key.' is not callable.', E_USER_ERROR );
    }
    public function remove( $key )
    {
        if ( $this->isConstant( $key ) ) {
            die(
                '<p>Error: Cannot remove Constant \'<em>'.$key.
                '</em>\' in Registry!</p>'
            );
        } elseif ( $this->exists( $key ) ) {
            unset( $this->register[$key] );
            return true;
        }
        return false;
    }
    public function exists( $key )
    {
        return array_key_exists( $key, $this->register );
    }
    public function isConstant( $key )
    {
        return array_key_exists( $key, $this->readOnly ) &&
               $this->readOnly[$key] === true ? true : false;
    }
    public function __clone()
    {
        trigger_error( 'Cloning of this object is not allowed.', E_USER_ERROR );
    }
}
?>
