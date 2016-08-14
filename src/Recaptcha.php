<?php

namespace PheRum\Recaptcha;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ReCaptcha\ReCaptcha as GoogleReCaptcha;

class Recaptcha
{
    /**
     * @var array
     */
    protected $config;
    
    /**
     * @var GoogleReCaptcha
     */
    protected $recaptcha;
    
    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        
        $this->recaptcha = new GoogleReCaptcha($this->config['private_key']);
    }
    
    /**
     * @param array $options
     *
     * @return mixed
     */
    public function render($options = [])
    {
        $mergedOptions = array_merge($this->config['options'], $options);
        
        $data = [
            'public_key' => $this->config['public_key'],
            'lang'       => array_only($mergedOptions, 'lang') ? $mergedOptions['lang'] : null,
            'options'    => $this->buildOptions($mergedOptions),
        ];
        
        return view('pherum::recaptcha', $data)->render();
    }
    
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    public function verify(Request $request)
    {
        return $this->recaptcha->verify($request->get('g-recaptcha-response'), $request->ip())->isSuccess();
    }
    
    /**
     * @param array $options
     *
     * @return array
     */
    protected function filterOptions(array $options = [])
    {
        return array_only($options, [
            'data-theme',
            'data-type',
            'data-size',
            'data-tabindex',
            'data-expired-callback',
        ]);
    }
    
    /**
     * @param array $options
     *
     * @return array|string
     */
    protected function buildOptions(array $options = [])
    {
        $options = $this->filterOptions($options);
        
        $options = Collection::make($options)->reject(function ($value)
        {
            return empty($value);
        })->map(function ($value, $key)
        {
            return $key . '="' . $value . '"';
        })->implode(', ');
        
        return $options;
    }
}
