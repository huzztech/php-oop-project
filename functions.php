<?php


	function baseurl(){


		// output: /myproject/index.php
	    $currentPath = $_SERVER['PHP_SELF']; 
	    
	    // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
	    $pathInfo = pathinfo($currentPath); 
	    
	    // output: localhost
	    $hostName = $_SERVER['HTTP_HOST']; 
	    
	    // output: http://
	    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
	    
	    // return: http://localhost/myproject/
	    return $protocol.$hostName.$pathInfo['dirname']."/";



	    



	}


	function url($additional_path){


		//$baseurl = baseurl();

		$baseurl = base_path;

		$completepath = $baseurl.$additional_path;

		return $completepath;

	}


	function cleaninput($value){

			$value	= trim(strip_tags(addslashes($value)));			
			return $value;		
		}


		function random_string($length) {
				$key = '';
				$keys = array_merge(range(0, 9), range('a', 'z'));
				
				for ($i = 0; $i < $length; $i++) {
					$key .= $keys[array_rand($keys)];
				}
				
				return $key;
			}
		
		function random_stringcode($length) {
				$key  = '';
				$keys = array_merge(range(0, 9));
				
				for ($i = 0; $i < $length; $i++) {
					$key .= $keys[array_rand($keys)];
				}
				
				return $key;
			}


		function encryptdata($data)
		{			
			 //return $data;
			
			 $code = base64_encode($data);
			 $randomcode = random_string(53).$code.random_string(64);
			 return $randomcode;
			
			 
		}
		
		
		
		function decryptdata($data)
		{
			//return $data;
			
			$val1 	=  $data;
			$worlst =  substr($val1 , 53);
			$worlst =  substr($worlst ,0 , -64);
			$worlst =  base64_decode($worlst);
			return $worlst;		
			
		}






?>