<?php

class SbifApi
{
  protected $api_key;
  protected $format = 'json';
  const URI_API_SBIF = 'http://api.sbif.cl/api-sbifv3/recursos_api';

  public function __construct($api_key)
  {
    if (!function_exists('curl_init')) {
      throw new Exception("CURL not detected");
    }

    $this->api_key = $api_key;
  }

  public function setFormat($format)
  {
    if (!in_array($format, array('json','xml'))) {
      throw new Exception("Invalid Format");
    } else {
      $this->format = $format;
    }
  }

  public function setApiKey($api_key)
  {
    $this->api_key = $api_key;
  }

  public function getFormat()
  {
    return $this->format;
  }

  public function getApiKey()
  {
    return $this->api_key;
  }

  public function getResource($resource, $params=array())
  {
    $url = $this->buildQuery($resource,$params);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_HEADER,0);
    curl_setopt($ch, CURLOPT_VERBOSE,0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_TIMEOUT,10);
    $result=curl_exec($ch);
    curl_close($ch);
    return $result;
  }

  protected function buildQuery($resource,$params=array())
  {
    $url = self::URI_API_SBIF;

    $url .= '/'.$resource;

    foreach ($params as $param) {
      $url .= '/'.$param;
    }

    $url .= '?apikey='.$this->api_key;
    $url .= '&formato='.$this->format;

    return $url;
  }

}