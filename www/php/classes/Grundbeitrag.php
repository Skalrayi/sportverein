<?php

class Grundbeitrag
{
    private int $id;
    private string $personengruppe;
    private float $beitrag;

    public function __construct(int $id, string $personengruppe, float $beitrag)
    {
        $this->id = $id;
        $this->personengruppe = $personengruppe;
        $this->beitrag = $beitrag;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getPersonengruppe(): string {
        return $this->personengruppe;
    }

    public function setPersonengruppe(string $personengruppe): void {
        $this->personengruppe = $personengruppe;
    }

    public function setBeitrag(float $beitrag): void {

    }
}