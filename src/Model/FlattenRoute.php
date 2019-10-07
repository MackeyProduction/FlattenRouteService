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
     * @return array
     */
    public function getOptions(): array
    {
        return $this->data['options'];
    }

    public function getMayTerminate(): bool
    {
        return $this->data['may_terminate'];
    }

    public function getChildRoutes(): array
    {
        return $this->data['child_routes'];
    }

    public function toArray()
    {
        return $this->data;
    }
}
