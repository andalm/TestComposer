<?php namespace App\Library;

class JSon extends Response
{
  /**
   *
   * @var array data all data to encode in json format
   */
  protected $data = array();

  /**
   *
   * @param array $data datos a codificar
   */
  public function __construct($data = array())
  {
    $this->data = $data;
  }

  /**
   *
   * @return array get the data property
   */
  public function getData()
  {
    return $this->data;
  }

  /**
   *
   * @param array $data set the data property
   */
  public function setData($data = array())
  {
    if(is_array($data))
    {
      $this->data = $data;
    }
    else
    {
      throw new Exception('Data received are not valid!');
    }
  }

  /**
   *
   * @return string all data encoded in json format
   */
  public function enconde()
  {
    return json_encode($this->data);
  }

  /**
   * Implement the abstract method
   */
  public function execute()
  {
    //Maintaining clean the class scope
    call_user_func(function ()
    {
      echo $this->enconde();
    });
  }
}
