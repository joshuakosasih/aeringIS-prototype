<?php
  function validate_post() {
    $names = func_get_args();
    foreach ($names as $name) {
      if (!array_key_exists($name, $_POST)) {
        return false;
      }
    }

    return true;
  }

  function refill_post($key, $default="") {
    if (array_key_exists($key, $_POST)) {
      return $_POST[$key];
    } else {
      return $default;
    }
  }
?>
