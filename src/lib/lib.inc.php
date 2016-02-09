<?php

// pdl classes

  include_once('classes/pdl/Content.class.php');
  include_once('classes/pdl/ProductId.class.php');
  include_once('classes/pdl/Product.class.php');
  include_once('classes/pdl/ProductSummary.class.php');
  include_once('classes/pdl/Event.class.php');
  include_once('classes/pdl/EventSummary.class.php');

  include_once('classes/pdl/ProductStorage.class.php');
  include_once('classes/pdl/ProductIndexCallback.class.php');
  include_once('classes/pdl/ProductIndexQuery.class.php');
  include_once('classes/pdl/ProductIndex.class.php');


// fdsn classes
  include_once ('classes/fdsn/Formatter.class.php');
  include_once ('classes/fdsn/AbstractFeed.class.php');
  include_once ('classes/fdsn/FDSNQuery.class.php');
  include_once ('classes/fdsn/FDSNIndex.class.php');
  include_once ('classes/fdsn/FDSNIndexCallback.class.php');
  include_once ('classes/fdsn/FDSNEventWebService.class.php');

  include_once ('classes/fdsn/AtomFeed.class.php');
  include_once ('classes/fdsn/CSVFeed.class.php');
  include_once ('classes/fdsn/TextFeed.class.php');
  include_once ('classes/fdsn/GeoJSONFeed.class.php');
  include_once ('classes/fdsn/KMLFeed.class.php');
  include_once ('classes/fdsn/QuakemlFeed.class.php');


// functions

  if (!function_exists("safefloatval")) {
    function safefloatval($value=null) {
      if ($value === null) {
        return null;
      } else {
        return floatval($value);
      }
    }
  }

  if (!function_exists("safeintval")) {
    function safeintval($value=null) {
      if ($value === null) {
        return null;
      } else {
        return intval($value);
      }
    }
  }

  if (!function_exists("safe_json_encode")) {
    // from http://stackoverflow.com/questions/10199017/how-to-solve-json-error-utf8-error-in-php-json-decode
    function safe_json_encode($value){
      $encoded = json_encode($value);
      switch (json_last_error()) {
        case JSON_ERROR_NONE:
          return $encoded;
        case JSON_ERROR_DEPTH:
          return 'Maximum stack depth exceeded'; // or trigger_error() or throw new Exception()
        case JSON_ERROR_STATE_MISMATCH:
          return 'Underflow or the modes mismatch'; // or trigger_error() or throw new Exception()
        case JSON_ERROR_CTRL_CHAR:
          return 'Unexpected control character found';
        case JSON_ERROR_SYNTAX:
          return 'Syntax error, malformed JSON'; // or trigger_error() or throw new Exception()
        case JSON_ERROR_UTF8:
          $clean = utf8ize($value);
          return safe_json_encode($clean);
        default:
          return 'Unknown error'; // or trigger_error() or throw new Exception()
      }
    }

    function utf8ize($mixed) {
      if (is_array($mixed)) {
          foreach ($mixed as $key => $value) {
              $mixed[$key] = utf8ize($value);
          }
      } else if (is_string ($mixed)) {
          return utf8_encode($mixed);
      }
      return $mixed;
    }
  }
