<?php
/* ===========================================================================
 * Copyright 2018 The Opis Project
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================================ */

namespace OpisColibri\Html;

use Opis\Colibri\View;

class Meta extends View
{

    /**
     * Meta constructor.
     */
    public function __construct()
    {
        parent::__construct('html.meta', [
            'attributes' => new Attributes(),
        ]);
    }

    /**
     * @param string $name
     * @param null $value
     * @return Meta
     */
    public function attribute(string $name, $value = null): self
    {
        /** @var Attributes $attributes */
        $attributes = $this->arguments['attributes'];
        $attributes->add($name, $value);
        return $this;
    }

    /**
     * @param array $attributes
     * @return Meta
     */
    public function attributes(array $attributes): self
    {
        foreach ($attributes as $name => $value) {
            if (is_numeric($name)) {
                $name = $value;
                $value = null;
            }

            $this->attribute($name, $value);
        }
        return $this;
    }
}
