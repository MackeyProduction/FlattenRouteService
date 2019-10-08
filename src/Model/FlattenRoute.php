<?php
namespace ZendFlattenRoute\Model;

class FlattenRoute implements Route
{
    /**
     * @var array $data
     */
    private $data = [
        'type' => null,
        'options' => null,
        'may_terminate' => false,
        'child_routes' => null,
    ];

    public function __construct(array $data)
    {
        $this->data = array_merge($this->data, $data);
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->data['type'];
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->data['type'] = $type;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->data['options'];
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->data['options'] = $options;
    }

    /**
     * @return bool
     */
    public function getMayTerminate(): bool
    {
        return $this->data['may_terminate'];
    }

    /**
     * @param bool $mayTerminate
     */
    public function setMayTerminate(bool $mayTerminate)
    {
        $this->data['may_terminate'] = $mayTerminate;
    }

    /**
     * @return array
     */
    public function getChildRoutes(): array
    {
        return $this->data['child_routes'];
    }

    /**
     * @param array $childRoutes
     */
    public function setChildRoutes(array $childRoutes)
    {
        $this->data['child_routes'] = $childRoutes;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
