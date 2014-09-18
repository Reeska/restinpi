<?php
namespace rpi\core;

class Zone {
    /**
     * @var Model
     */
    private $model;
    private $name;
    
    public function __construct(Model $model, $name) {
        $this->model = $model;
        $this->name = $name;
    }
    
    /**
     * Add content to this zone.
     * 
     * @param Content|string|array $content
     * @param int $order
     * @return Zone
     */
    public function add($content, $order = null) {
        $this->model->addContent($this->name, $content, $order);
        return $this;
    }
    
    /**
     * Get zone's model.
     * @return Model
     */
    public function end() {
        return $this->model;
    }
}