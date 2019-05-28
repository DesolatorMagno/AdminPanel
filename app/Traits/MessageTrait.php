<?php
namespace App\Traits;

trait MessageTrait
{
    public $typeFieldName = "message_type";
    public $messageFielName = "message";

    public function success($message = null)
    {
        return $this->message($message, 'success');
    }

    public function info($message = null)
    {
        return $this->message($message, 'info');
    }

    public function warning($message = null)
    {
        return $this->message($message, 'warning');
    }

    public function error($message = null)
    {
        return $this->message($message, 'error');
    }

    public function question($message = null)
    {
        return $this->message($message, 'question');
    }

    public function message($message = null, $type = null)
    {
        if ($message && $type) {
            \Session::flash($this->typeFieldName, $type);
            \Session::flash($this->messageFielName, $message);
        }
    }
}
