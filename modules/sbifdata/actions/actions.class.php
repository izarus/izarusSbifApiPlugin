<?php

class SbifdataActions extends sfActions
{
  public function preExecute()
  {
    $this->cache = new sfFileCache(array('cache_dir' => sfConfig::get('sf_cache_dir')));
    $this->anio = $this->getRequest()->getParameter('anio',null);
    $this->mes = $this->getRequest()->getParameter('mes',null);
    $this->dias = $this->getRequest()->getParameter('dias',null);
  }

  public function executeGetUfActual()
  {
    $this->anio = date('Y');
    $this->mes = date('m');
    $this->dias = date('d');
    $this->forward('sbifdata','getUf');
  }
  public function executeGetDolarActual()
  {
    $this->anio = date('Y');
    $this->mes = date('m');
    $this->dias = date('d');
    $this->forward('sbifdata','getDolar');
  }
  public function executeGetEuroActual()
  {
    $this->anio = date('Y');
    $this->mes = date('m');
    $this->dias = date('d');
    $this->forward('sbifdata','getEuro');
  }
  public function executeGetUtmActual()
  {
    $this->anio = date('Y');
    $this->mes = date('m');
    $this->forward('sbifdata','getUtm');
  }

  public function executeGetUf(sfWebRequest $request)
  {
    $api = new sfSbifApi();
    return $this->renderJson($api->getUf($this->anio,$this->mes,$this->dias));
  }

  public function executeGetDolar(sfWebRequest $request)
  {
    $api = new sfSbifApi();
    return $this->renderJson($api->getDolar($this->anio,$this->mes,$this->dias));
  }

  public function executeGetEuro(sfWebRequest $request)
  {
    $api = new sfSbifApi();
    return $this->renderJson($api->getEuro($this->anio,$this->mes,$this->dias));
  }

  public function executeGetUtm(sfWebRequest $request)
  {
    $api = new sfSbifApi();
    return $this->renderJson($api->getUtm($this->anio,$this->mes));
  }
}