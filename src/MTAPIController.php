<?php

namespace MapTechnica\MTAPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

use MTAPI;

class MTAPIController extends Controller
{
    public function index(MTAPI $mtapi)
    {
        $data['pageTitle'] = 'MTAPI Test';
        
        $data['mtapi'] = $mtapi;
        
        return view('MapTechnicaAPI::mtapi', $data);
    }
    
    public function checkInstallation(MTAPI $mtapi)
    {
        $_continue    = true;
        $_errors      = false;
        $errors       = [];
        
        // Check that the config file has been published
        if(!file_exists(config_path().'/mtapi.php'))
        {
            $errors[] = 'Config file not published! From a terminal, navigate to your site directory and fire this command:<div><code>php artisan vendor:publish</code></div>';
            $_continue = false;
        }
        
        if($_continue)
        {
            // Check config variables
            $url     = config('mtapi.apiUrl');
            if($url==null)
            {
                $errors[] = 'URL is null! Open <code>config/mtapi.php</code> and set <code>apiUrl</code> to the URL associated with your API key.<br><br><a class="btn btn-default" href="https://my.maptechnica.com/my-api-keys" target="_blank">Go to my API Keys</a>';
                $_continue = false;
            }
            
            $version = config('mtapi.apiVersion');
            
            if(!is_numeric($version))
            {
                $errors[] = 'Version is invalid! Open <code>config/mtapi.php</code> and set <code>apiVersion</code> to the version associated with your API key.<br><br><a class="btn btn-default" href="https://my.maptechnica.com/my-api-keys" target="_blank">Go to my API Keys</a><br><br><strong>Tip:</strong> Do not include the "v" in your config variable.';
                $_continue = false;
            }
            

        }

        if($_continue)
        {
            // Ping the url to see if it's live
            
            $url = $mtapi::getAPIURL().'zip5/meta';
            
            $expecteds=['200', '301'];
            
            $test = self::testResponse($url, $expecteds);
            
            if($test!==true)
            {
                $errStr = 'The API server could not be reached. Attempted:<br><br><code><a class="alert-link" href="'.$url.'" target="_blank">'.$url.'</a></code>';
                
                if($test!=false)
                {
                    $errStr .= '<br><br><strong>HTTP error code:</strong> <code>'.$test.'</code>';
                }
                
                $errStr .= '<br><br><a class="btn btn-default" href="https://my.maptechnica.com/my-api-keys" target="_blank">Go to my API Keys</a>';
                
                $errors[] = $errStr;
                $_continue = false;
            }
        }                

        if($_continue)
        {
            // So far, so good.  Let's actually get some data now.
            $json = $mtapi::retrieveData(
                $geotype            = 'zip5',
                $geoid              = '90210',
                $getType            = 'meta'
            );
            
            $obj = json_decode($json);
            
            if(isset($obj->error))
            {
                $url = $mtapi::getAPIURL().$geotype.'/'.$getType.'/'.$geoid;
                $errors[] = 'The package was not set up correctly. The API returned the following error:<br><br><code>'.$obj->msg.'</code><br><br>URL attempted:<br><br><code>'.$url.'</code>';
            }
            
        }
        
        if(!empty($errors))
        {
            $_errors = true;
        }
        
        $_tested=true;
        
        return view('MapTechnicaAPI::mtapi', compact('_tested', '_errors', 'errors'));
        
    }
    
    public function tester(Request $request, MTAPI $mtapi)
    {
        
    }
    
    private static function testResponse($url, $expecteds)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
        curl_setopt($ch, CURLOPT_NOBODY, true);    // we don't need body
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT,10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $_asExpected = in_array($httpcode, $expecteds);

        if(!$_asExpected)
        {
            return $httpcode;
        }
        
        return true;
    }

}
