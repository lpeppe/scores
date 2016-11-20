<?php
class SCORES_CLASS_FeedHandler
{
    private static $classInstance;

    public static function getInstance()
    {
        if ( self::$classInstance === null )
        {
            self::$classInstance = new self();
        }

        return self::$classInstance;
    }

    public function testFunction( OW_Event $e ) {
        echo 'this is a test';
    }
}
