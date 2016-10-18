<?php

namespace MapTechnica\MTAPI;

interface iMTAPIDataRetriever
{
    public static function retrieveData($geotype=null, $geoid=null, $getType=null, $relatedTo=null, $orderRelatedBy=null, $schoolDistrictType=null, $lod='low');
    
    public static function search($paramsArr);
}

