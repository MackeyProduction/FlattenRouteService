<?php
namespace ZendFlattenRoute\Model;

class FlattenChildRoute implements Route
{
    /**
     * @var array $data
     */
    private $data = [
        'type' => null,
        'options' => null,
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
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
