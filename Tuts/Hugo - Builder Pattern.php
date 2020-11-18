<?php

class CarBuilder
{
    protected $wheels = 4;
    protected $fuel = 100.0;
    protected $engine = null;

    public function wheels(int $wheels): self
    {
        // Validate input...

        $this->wheels = $wheels;

        return $this;
    }

    public function fuel(float $fuel): self
    {
        // Validate input ...

        $this->fuel = $fuel;

        return $this;
    }

    public function engine(Engine $engine): self
    {
        // Validate input ...

        $this->engine = $engine;

        return $this;
    }

    public function build(): CarInterface
    {
        return new CarInstance(
            $this->engine,
            $this->wheels,
            $this->fuel
        );
    }
}
