<?php
/**
 * Created by PhpStorm.
 * User: Til Anheier
 * Date: 06.10.2019
 * Time: 12:35
 */

namespace ZendFlattenRoute\Model;


interface Route
{
    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return array
     */
    public function getOptions(): array;
}