<?php
namespace ZfcDatagrid\Column\Action;

class Icon extends AbstractAction
{

    protected $iconClass;

    protected $iconLink;

    /**
     * Set the icon class (CSS)
     * - used for HTML if provided, overwise the iconLink is used
     *
     * @param string $name
     * @return Icon
     */
    public function setIconClass($name)
    {
        $this->iconClass = (string) $name;

        return $this;
    }

    /**
     *
     * @return string
     */
    public function getIconClass()
    {
        return $this->iconClass;
    }

    /**
     *
     * @return boolean
     */
    public function hasIconClass()
    {
        if ($this->getIconClass() != '') {
            return true;
        }
        
        return false;
    }

    /**
     * Set the icon link (is used, if no icon class is provided)
     *
     * @param string $httpLink
     * @return Icon
     */
    public function setIconLink($httpLink)
    {
        $this->iconLink = (string) $httpLink;

        return $this;
    }

    /**
     * Get the icon link
     *
     * @return string
     */
    public function getIconLink()
    {
        return $this->iconLink;
    }

    /**
     *
     * @return boolean
     */
    public function hasIconLink()
    {
        if ($this->getIconLink() != '') {
            return true;
        }
        
        return false;
    }

    /**
     *
     * @return string
     */
    protected function getHtmlType()
    {
        if ($this->hasIconClass() === true) {
            // a css class is provided, so use it
            return '<i class="' . $this->getIconClass() . '"></i>';
        } elseif ($this->hasIconLink() === true) {
            // no css class -> use the icon link instead
            return '<img src="' . $this->getIconLink() . '" />';
        }
        
        throw new \InvalidArgumentException('Either a link or a class for the icon is required');
    }
}
