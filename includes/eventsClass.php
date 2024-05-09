<?php
class Event {
    private $name;
    private $date;
    private $administrator;
    private $phone;
    private $address;

    public function __construct($name, $date, $administrator, $phone, $address) {
        $this->name = $name;
        $this->date = $date;
        $this->administrator = $administrator;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function getName() {
        return $this->name;
    }

    public function getDate() {
        return $this->date;
    }

    public function getAdministrator() {
        return $this->administrator;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getAddress() {
        return $this->address;
    }
}
?>
