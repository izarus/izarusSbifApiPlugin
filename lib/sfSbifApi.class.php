<?php

class sfSbifApi extends SbifApi
{
  private $cache;

  public function __construct()
  {
    parent::__construct(sfConfig::get('app_sbif_apikey',''));

    $this->cache = new sfFileCache(array('cache_dir' => sfConfig::get('sf_cache_dir')));
  }

  public function getUf($anio=null,$mes=null,$dias=null)
  {
    $params = array();
    if ($anio && $mes && $dias) {
      $fecha=$anio.$mes.$dias;
      $params=array($anio,$mes,'dias',$dias);
    } elseif ($anio && $mes) {
      $fecha=$anio.$mes;
      $params=array($anio,$mes);
    } elseif($anio) {
      $fecha=$anio;
      $params=array($anio);
    } else {
      $fecha=date('Ymd');
      $params=array(date('Y'),date('m'),'dias',date('d'));
    }

    if ($this->cache->has('sbif_uf_'.$fecha)) {
      return unserialize($this->cache->get('sbif_uf_'.$fecha));
    } else {
      $response = json_decode($this->getResource('uf',$params),true);

      if (isset($response['CodigoHTTP']) && isset($response['CodigoError'])) {
        return $response;
      } elseif(is_array($response)) {
        $this->cache->set('sbif_uf_'.$fecha, serialize($response));
        return $response;
      } else {
        return array('CodigoHTTP'=>'-1','CodigoError'=>'-1','Mensaje'=>'Fail to get data');
      }
    }
  }

  public function getDolar($anio=null,$mes=null,$dias=null)
  {
    $params = array();
    if ($anio && $mes && $dias) {
      $fecha=$anio.$mes.$dias;
      $params=array($anio,$mes,'dias',$dias);
    } elseif ($anio && $mes) {
      $fecha=$anio.$mes;
      $params=array($anio,$mes);
    } elseif($anio) {
      $fecha=$anio;
      $params=array($anio);
    } else {
      $fecha=date('Ymd');
      $params=array(date('Y'),date('m'),'dias',date('d'));
    }

    if ($this->cache->has('sbif_dolar_'.$fecha)) {
      return unserialize($this->cache->get('sbif_dolar_'.$fecha));
    } else {
      $response = json_decode($this->getResource('dolar',$params),true);

      if (isset($response['CodigoHTTP']) && isset($response['CodigoError'])) {
        return $response;
      } elseif(is_array($response)) {
        $this->cache->set('sbif_dolar_'.$fecha, serialize($response));
        return $response;
      } else {
        return array('CodigoHTTP'=>'-1','CodigoError'=>'-1','Mensaje'=>'Fail to get data');
      }
    }
  }

  public function getEuro($anio=null,$mes=null,$dias=null)
  {
    $params = array();
    if ($anio && $mes && $dias) {
      $fecha=$anio.$mes.$dias;
      $params=array($anio,$mes,'dias',$dias);
    } elseif ($anio && $mes) {
      $fecha=$anio.$mes;
      $params=array($anio,$mes);
    } elseif($anio) {
      $fecha=$anio;
      $params=array($anio);
    } else {
      $fecha=date('Ymd');
      $params=array(date('Y'),date('m'),'dias',date('d'));
    }

    if ($this->cache->has('sbif_euro_'.$fecha)) {
      return unserialize($this->cache->get('sbif_euro_'.$fecha));
    } else {
      $response = json_decode($this->getResource('euro',$params),true);

      if (isset($response['CodigoHTTP']) && isset($response['CodigoError'])) {
        return $response;
      } elseif(is_array($response)) {
        $this->cache->set('sbif_euro_'.$fecha, serialize($response));
        return $response;
      } else {
        return array('CodigoHTTP'=>'-1','CodigoError'=>'-1','Mensaje'=>'Fail to get data');
      }
    }
  }

  public function getUtm($anio=null,$mes=null)
  {
    $params = array();
    if ($anio && $mes) {
      $fecha=$anio.$mes;
      $params=array($anio,$mes);
    } elseif($anio) {
      $fecha=$anio;
      $params=array($anio);
    } else {
      $fecha=date('Ym');
      $params=array(date('Y'),date('m'));
    }

    if ($this->cache->has('sbif_utm_'.$fecha)) {
      return unserialize($this->cache->get('sbif_utm_'.$fecha));
    } else {
      $response = json_decode($this->getResource('utm',$params),true);

      if (isset($response['CodigoHTTP']) && isset($response['CodigoError'])) {
        return $response;
      } elseif(is_array($response)) {
        $this->cache->set('sbif_utm_'.$fecha, serialize($response));
        return $response;
      } else {
        return array('CodigoHTTP'=>'-1','CodigoError'=>'-1','Mensaje'=>'Fail to get data');
      }
    }
  }
}