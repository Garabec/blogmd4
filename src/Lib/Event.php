<?php
namespace Lib;

class Event extends \Symfony\Component\EventDispatcher\Event
{
  protected
    $value      = null,
    $subject    = null,
    $parameters = null;

  /**
   * Constructs a new Event.
   *
   * @param mixed   $subject      The subject
   * @param string  $name         The event name
   * @param array   $parameters   An array of parameters
   */
  public function __construct($subject, $parameters = array())
  {
    $this->subject = $subject;
    $this->parameters = $parameters;
  }

  /**
   * Returns the subject.
   *
   * @return mixed The subject
   */
  public function getSubject()
  {
    return $this->subject;
  }

  /**
   * Returns the event parameters.
   *
   * @return array The event parameters
   */
  public function getParameters()
  {
    return $this->parameters;
  }

    /**
   * Sets the return value for this event.
   *
   * @param mixed $value The return value
   */
  public function setReturnValue($value)
  {
    $this->value = $value;
  }

  /**
   * Returns the return value.
   *
   * @return mixed The return value
   */
  public function getReturnValue()
  {
    return $this->value;
  }

}