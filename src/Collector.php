<?php
/* ===========================================================================
 * Copyright 2018 Zindex Software
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

namespace Opis\Colibri\Modules\Html;

use Opis\Colibri\Collector as AbstractCollector;
use Opis\Colibri\ItemCollectors\RouterGlobalsCollector;
use Opis\Colibri\ItemCollectors\ViewCollector;

class Collector extends AbstractCollector
{
    /**
     * @param ViewCollector $handler
     */
    public function views(ViewCollector $handler)
    {
        $handler->handle('html.{type}', Callback::class . '::viewCallback')
            ->where('type', 'document|link|style|script|collection|meta|attributes');
    }

    /**
     * @param RouterGlobalsCollector $global
     */
    public function routerGlobals(RouterGlobalsCollector $global)
    {
        $global->bind('htmldoc', Callback::class . '::bindHtmlDoc');
    }
}
