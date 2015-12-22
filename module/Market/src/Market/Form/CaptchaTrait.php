<?php
namespace Market\Form;

trait CaptchaTrait
{
    protected $captchaOptions;    
    
    public function getCaptchaOptions()
    {
        return $this->captchaOptions;
    }
    
    public function setCaptchaOptions($captchaOptions)
    {
        $this->captchaOptions = $captchaOptions;
    }
}
