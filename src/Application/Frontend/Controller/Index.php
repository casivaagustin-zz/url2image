<?php

namespace Application\Frontend\Controller;

use Symfony\Component\HttpFoundation\Response;

class Index extends \Towel\Controller\BaseController {

  /**
   * Shows capture form.
   *
   * @param $request
   * @return string
   */
  public function index($request) {
    return $this->twig()->render('url_form.twig');
  }

  /**
   * Does the screen capture
   * @param $request
   * @return string|Response
   */
  public function capture($request) {

    $url = $request->get('url');
    $panthom_bin = '/Users/agustin/Downloads/phantomjs';

    $capture = new \Application\Frontend\Lib\Capture($url, $panthom_bin);
    $capture->capture();

    if ($capture->done()) {
      return new Response(
        $capture->getContent(),
        200,
        ['Content-Type' => 'image/jpg']
      );
    }

    return $this->twig()->render('error_caputure.twig', array('output' => $capture->getOutput()));
  }

}