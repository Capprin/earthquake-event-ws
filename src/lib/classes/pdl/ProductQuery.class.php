<?php

//Stores all the information that can be queried for a product
class ProductQuery {
  
  //Detail search parameters
  public $source;
  public $type;
  public $code;

  //Summary search parameters (optional)
  public $updateTime;
  public $maxUpdateTime;
  public $minUpdateTime;
  public $time;
  public $startTime;
  public $endTime;
  public $latitude;
  public $longitude;
  public $maxLatitude;
  public $maxLongitude;
  public $minLatitude;
  public $minLongitude;

  //path search term (to be implemented)

}

?>