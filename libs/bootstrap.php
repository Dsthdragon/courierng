<?php

class bootstrap {

  private $_url = null;
  private $_controller = null;
  private $_controllerPath = 'controllers/';
  private $_modelPath = 'models/';
  private $_errorFile = 'errorPage.php';
  private $_defaultFile = 'index.php';
  private $_defaultModelFile = 'index_model.php';
  private $_generalModelFile = 'general_model.php';

  /**
   *  Start the bootstrap
   *
   *  return boolean
   */

  public function init()
  {
    // Set the protected $_url
		$this->_getUrl();

    // Loadthe default controller if no url is set
    if(empty($this->_url[0])){
      $this->_loadDefaultController();
      return false;
		}

    $this->_loadExistingController();
    $this->_callControllerMethod();
  }

  /**
   * (optional) Set a custom path to controller
   * @param string $path
   */
  public function setControllerPath($path)
  {
    $this->_controllerPath = trim($path, '/').'/';
  }

  /**
   * (optional) Set a custom path to model
   * @param string $path
   */
  public function setModelPath($path)
  {
    $this->_modelPath = trim($path, '/').'/';
  }

  /**
   * (optional) Set a custom path to error file
   * @param string $path using the file for the controller e.g index.php
   */
  public function setErrorFile($path)
  {
    $this->_errorFile = trim($path, '/');
  }

  /**
   * (optional) Set a custom path to Default file
   * @param string $path using the file for the controller e.g index.php
   */
  public function setDefaultFile($path)
  {
    $this->_defaultFile = trim($path, '/');
  }

  /**
   * (optional) Set a custom path to Default Model file
   * @param string $path using the file for the model e.g index_model.php
   */
  public function setDefaultModelFile($path)
  {
    $this->_defaultModelFile = trim($path, '/');
  }

  /**
   * Fetch the $_GET from url
   */
  private function _getUrl()
  {
    $url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$this->_url = explode('/', $url);
  }

  /**
   * THis load if there no GET passed
   */
  private function _loadDefaultController()
  {
    require $this->_controllerPath.$this->_defaultFile;
    $this->_controller = new index();
    $this->_controller->generalModel($this->_modelPath);
    $this->_controller->defaultModel($this->_modelPath);
		$this->_controller->index();
  }

  /**
   * This load and existing controller if there is a GET parameter passed
   * return boolean|string
   */
  private function _loadExistingController()
  {
    $file = $this->_controllerPath. $this->_url[0] . '.php';

		if (file_exists($file)) {
			require $file;
		  $this->_controller = new $this->_url[0];
    $this->_controller->generalModel($this->_modelPath);
      $this->_controller->loadModel($this->_url[0], $this->_modelPath);
		} else {
			$this->_error();
      return false;
		}

  }

  /**
   * If a method is passed is passed in the get url parameter
   *
   * http://localhost/controller/method/(param)/(param)/(param)
   * url[0] = controller
   * url[1] = method
   * url[2] = param
   * url[3] = param
   * url[4] = param
   */
  private function _callControllerMethod()
  {

    $length = count($this->_url);


    // Make sure the method been called exists
    if($length > 1)
    {
      if (!method_exists($this->_controller, $this->_url[1]))
      {
        $this->_error();
    	}
    }


    // Determine what to load
    switch ($length)
    {
      case 5:
        // controller->Method(param, param, param)
        $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
        break;

      case 4:
        // controller->Method(param, param)
        $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
        break;

      case 3:
        // controller->Method(param)
        $this->_controller->{$this->_url[1]}($this->_url[2]);
        break;

      case 2:
        $this->_controller->{$this->_url[1]}();
        break;

      default:
        $this->_controller->index();
        break;
    }
  }

  /**
   * Display an error if nothing exist
   *
   * return boolean
   */
	private function _error() {
		require $this->_controllerPath.$this->_errorFile;
		$this->_controller = new errorPage();
		$this->_controller->index();
    exit;
	}

}
