<?php

namespace Mitosis\Framework\Contracts\Requests;

use Illuminate\Database\Eloquent\Model;
use Konekt\Concord\Contracts\BaseRequest;

interface CreateMedia extends BaseRequest
{
    /**
     * Returns the model media need(s) to be added for
     *
     * @return null|Model
     */
    public function getFor();
}
