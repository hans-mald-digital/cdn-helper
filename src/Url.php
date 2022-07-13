<?php

namespace CdnHelper;

class Url
{
    /**
     * @var string $url
     */
    protected $url;

    /**
     * @var string $path
     */
    protected $path;

    /**
     * @var null|string $dimensions
     */
    protected $dimensions;

    /**
     * @var null|string $mode
     */
    protected $mode;

    /**
     * CdnUrl constructor.
     * @param string $path
     * @param string|null $dimensions
     * @param string|null $mode
     * @param string|null $url
     */
    public function __construct(string $path, ?string $dimensions = null, ?string $mode = 'crop', ?string $url = null)
    {
        $this->url = $url ?? config()->get('cdn_helper.url');
        $this->path = $path;
        $this->dimensions = $dimensions;
        $this->mode = $mode;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $url = rtrim($this->url, '/') . '/';

        $regexUrl = str_replace('/', '\/', rtrim($this->url, '/'));
        $path = preg_replace('/^' . $regexUrl . '\/?/', '', ltrim($this->path, '/'));

        if (!$this->dimensions) {
            return $url . $path;
        }

        return $url . 'size:' . $this->dimensions . ',mode:' . $this->mode . '/' . $path;
    }
}
