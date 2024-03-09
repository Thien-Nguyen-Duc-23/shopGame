<?php

namespace App\Services\Admin;

use App\Factories\AdminFactory;

class KolPartnerService 
{
    protected $refer;

    public function __construct() {
        $this->refer = AdminFactory::kolPartnerRepository();
    }

    public function store($request) {
        return $this->refer->store($request->all());
    }

    public function update($request) {
        $kolPartner = $this->refer->findKolById($request->id);

        return $kolPartner->update($request->all());
    }
}
