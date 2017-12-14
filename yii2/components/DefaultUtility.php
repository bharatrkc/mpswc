<?php
namespace app\components;

/**
* Includes all the Utilities that can be used in the projects
* @author Hemant thakur
*/
class DefaultUtility
{
	
	/**
	* this function is used to santize the parameters to avoid the sql injections
	*/
	/**
	* @author Hemant thakur
	*/

    static function mysql_escape_string($string) {
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);
        $string = mysqli_real_escape_string($link, $string);
        mysqli_close($link);
        return $string;
    }
    /**
    *@author Hemant thakur
    */
	static function sanatizeParams($parameter, $strip_tags = true) {
        if (is_array($parameter)) {
            $results = array();
            foreach ($parameter as $key => $value) {
            	/**
            	* check for nested array 
            	*added by Hemant Thakur
            	*/
            	if(is_array($value)){
            		$returnValue[$key]=DefaultUtility::sanatizeParams($value);
            		$results=array_merge($results,$returnValue);
            		continue;
            	}
            	// edit finished
                $value = trim($value);
                if ($strip_tags) {
                    $value = strip_tags($value);
                }
                $value = DefaultUtility::mysql_escape_string($value);
                $results[$key] = $value;
            }
            return $results;
        } else {
            $parameter = trim($parameter);
            if ($strip_tags) {
                $parameter = strip_tags($parameter);
            }
            $parameter = DefaultUtility::mysql_escape_string($parameter);
            return $parameter;
        }
    }
}