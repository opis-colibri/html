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

class Collection extends View
{
    /**
     * Collection constructor.
     */
    public function __construct()
    {
        parent::__construct('html.collection', [
            'items' => [],
        ]);
    }

    /**
     * @param mixed $item
     * @param mixed $entry
     * @return Collection
     */
    public function add($item, $entry = null): self
    {
        if ($entry === null) {
            $this->arguments['items'][] = $item;
        } else {
            $this->arguments['items'][$entry] = $item;
        }
        return $this;
    }

    /**
     * @param Collection $collection
     */
    public function merge(Collection $collection)
    {
        $array1 = $this->arguments['items'];
        $array2 = $collection->arguments['items'];
        $this->arguments['items'] = array_merge($array1, $array2);
    }
}
