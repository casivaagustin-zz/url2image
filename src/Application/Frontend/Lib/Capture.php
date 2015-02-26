<?php

namespace Application\Frontend\Lib;

class Capture {

  private $phantomBin = '/Users/agustin/Downloads/phantomjs';
  private $shotsDir = '/tmp';
  private $output = '';
  private $url = '';

  public function __construct($url, $phantomBin = null, $shotsDir = null) {
    $this->url = $url;
    if (!empty($phantomBin)) {
      $this->phantomBin = $phantomBin;
    }
    if (!empty($shotsDir)) {
      $this->shotsDir = $shotsDir;
    }
    $this->hash = md5($this->url);
    $this->time = time();
    $this->output = 'without execute';
  }

  public function getPath() {
    return $this->shotsDir . '/screen-' . $this->hash . '-' . $this->time . '.jpg';
  }

  public function capture() {
    $path = $this->getPath();
    $script = dirname(__FILE__) . '/capture.js';
    $command = 'cd /tmp;' . $this->phantomBin . ' ' . $script . " '" . $this->url . "' '" . $path . "'";
    exec($command, $output);
    $this->serializeOutput($output);
  }

  public function getType() {
    return mime_content_type($this->getPath());
  }

  public function getContent() {
    return file_get_contents($this->getPath());
  }

  public function getOutput() {
    return $this->output;
  }

  /**
   * Verifies if the Screenshots was created.
   *
   * @return bool
   */
  public function done() {
    if (file_exists($this->getPath())) {
      return true;
    }
    return false;
  }

  private function serializeOutput($output) {
    $this->output = '';

    foreach($output as $line) {
      $this->output .= $line . "\n";
    }
  }


}