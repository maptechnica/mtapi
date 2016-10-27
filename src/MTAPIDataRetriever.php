<?php

namespace MapTechnica\MTAPI;

use Illuminate\Support\Facades\Cache;

class MTAPIDataRetriever implements iMTAPIDataRetriever
{
    /**
     * retrieveData gets the geodata from the MT API.
     *
     * @param string $geotype            (default: null) - cd | county | fsa | place | province | sd | state | zip3 | zip5
     * @param string $geoid              (default: null) - varies by geotype
     * @param string $getType            (default: null) - bounds | centroid | meta | neighbors | related
     * @param string $relatedTo          (default: null) - for a related query, the "to" parameter: cd | county | elsd | place | scsd | unsd | zip3
     * @param string $orderRelatedBy     (default: null) - Sort results by related entities’ distance (default if null), population, or physical size: [null or dist] | pop | size
     * @param string $schoolDistrictType (default: null) elsd | scsd | unsd
     * @param string $lod                (default: 'low') high | med | low
     * @param bool (default: FALSE) TRUE to skip the cache and go directly to the API every call. NOT RECOMMENDED other than for testing.
     *
     * @return JSON string containing results.
     */
    public static function retrieveData($geotype = null, $geoid = null, $getType = null, $relatedTo = null, $orderRelatedBy = null, $schoolDistrictType = null, $lod = 'low', $_skipCache = false)
    {
        $baseURL = self::getAPIURL();

        if ($baseURL == null) {
            return json_encode(['error' => true, 'code' => '000', 'msg' => 'API URL NOT SET']);
        }

        if ($geotype == null) {
            return json_encode(['error' => true, 'code' => '101', 'msg' => 'Missing geotype']);
        }

        if ($geoid == null) {
            return json_encode(['error' => true, 'code' => '101', 'msg' => 'Missing geoid']);
        }

        if ($getType == null) {
            return json_encode(['error' => true, 'code' => '101', 'msg' => 'Missing getType']);
        }

        // Get cached response, if exists. Make API call if it doesn't.
        $cacheKey = implode('|', func_get_args());

        $expiration = config('mtapi.apiCacheExpiration');
        if ($_skipCache) {
            $expiration = 0;
        }

        $results = Cache::remember($cacheKey, $expiration, function () use ($baseURL, $geotype, $geoid, $getType, $relatedTo, $orderRelatedBy, $schoolDistrictType, $lod) {

            // Get boundary info
            $params = [
                'geoid' => $geoid,
            ];

            switch ($geotype) {
                case 'cd':
                    break;
                case 'city':
                case 'place':
                    $geotype = 'place';
                    break;
                case 'province':
                    $params = [
                        'province' => strtoupper($geoid),
                    ];
                    break;
                case 'fsa':
                    $params = [
                        'fsa' => strtoupper($geoid),
                    ];
                    break;
                case 'sd':
                    $geotype = $schoolDistrictType;
                    break;
                case 'state':
                    $params = [
                        'stusps' => strtoupper($geoid),
                    ];
                    break;
                case 'zip3':
                    $params = [
                        'zip3' => $geoid,
                    ];
                    break;
                case 'zip5':
                    $params = [
                        'zip5' => $geoid,
                    ];
                    break;
            }

            if ($lod != 'low') {
                $params['lod'] = $lod;
            }

            if ($getType == 'related' && $relatedTo != null) {
                $params['to'] = $relatedTo;
                if ($orderRelatedBy != null && in_array($orderRelatedBy, ['pop', 'size', 'dist'])) {
                    $params['orderby'] = $orderRelatedBy;
                }
            }

            $constructedURL = $baseURL.$geotype.'/'.$getType.'/?'.http_build_query($params);

            $results = self::curly($constructedURL);

            return $results;
        });

        return $results;
    }

    public static function search($paramsArr)
    {
        $url = env('URL_MTAPI').'search?'.implode('&', $paramsArr);

        $results = self::curly($url);

        return $results;
    }

    public static function getAPIURL()
    {
        // Building something like https://api.maptechnica.com/v1/

        // Get the base URL
        $apiURL = config('mtapi.apiUrl');

        // ensure there is only one trailing slash
        $url = rtrim($apiURL, '/').'/';

        // tack on the version number
        $url .= 'v'.config('mtapi.apiVersion').'/';

        return (string) $url;
    }

    private static function curly($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        // Send the API key along with the headers
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['X-auth-token: '.config('mtapi.apiKey')]);

        //execute the session
        $curl_response = curl_exec($curl);
        //finish off the session
        curl_close($curl);

        return (string) $curl_response;
    }
}
