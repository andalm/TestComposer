<?php namespace App\Library;

class String extends Response
{
  /**
   *
   * @var string data to send in text format
   */
  protected $string = '';

  /**
   *
   * @param string $string data to send in text format
   * @throws Exception thrown when the data is not string format
   */
  public function __construct($string = '')
  {
    if(is_string($string))
    {
      $this->string = $string;
    }
    else
    {
      throw new Exception("The data is not valid!!");
    }
  }

  /**
   *
   * @return string it returns the data contained in the string property
   */
  public function getString()
  {
    return $this->string;
  }

  /**
   *
   * @param string $string it set the string property
   * @throws Exception thrown when the data is not string format
   */
  public function setString($string = '')
  {
    if(is_string($string))
    {
      $this->string = $string;
    }
    else
    {
      throw new Exception("The data is not valid!!");
    }
  }

  /**
   * Implement the abstract method
   */
  public function execute()
  {
    //Maintaining clean the class scope
    call_user_func(function ()
    {
      echo $this->string;
    });
  }
}
