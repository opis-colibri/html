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

class LinkCollection extends Collection
{
    /**
     * @param string $entry
     * @param callable $callback
     * @return LinkCollection|Collection
     */
    public function custom(string $entry, callable $callback): self
    {
        $link = new Link();
        $callback($link);
        return $this->add($link, $entry);
    }

    /**
     * @param string $rel
     * @param string $href
     * @return LinkCollection|Collection
     */
    public function link(string $rel, string $href): self
    {
        return $this->add((new Link())->attributes(['rel' => $rel, 'href' => $href]), md5($rel . $href));
    }

    /**
     * @param string $href
     * @return LinkCollection|Collection
     */
    public function icon(string $href): self
    {
        return $this->link('shortcut icon', $href);
    }
}