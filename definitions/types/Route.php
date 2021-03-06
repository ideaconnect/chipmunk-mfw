<?php
namespace IDCT\Framework\Chipmunk\Definitions\Types;

use IDCT\Framework\Chipmunk\Definitions\Types\Object;
/**
 * Route short summary.
 *
 * Route description.
 *
 * @version 1.0
 * @author Bartosz
 */
class Route extends Object
{
    protected $raw;
    protected $parts;
    protected $mode;

    public function setRaw($raw) {
        if(is_string($raw)) {
            $this->raw = $raw;
        }

        return $this;
    }

    public function getRaw() {
        return $this->raw;
    }

    public function setParts(array $parts) {
        $this->parts = $parts;

        return $this;
    }

    public function getParts() {
        return $this->parts;
    }

    public function setMode($mode) {
        $this->mode = $mode;

        return $this;
    }

    public function getMode() {
        return $this->mode;
    }



}
