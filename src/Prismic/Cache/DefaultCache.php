<?php
/**
 * This file is part of the Prismic PHP SDK
 *
 * Copyright 2013 Zengularity (http://www.zengularity.com).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Prismic\Cache;

/**
 * The default implementation that is passed in the Api object when created:
 * it is based on APC, and therefore requires APC to be installed on the server.
 */
class DefaultCache implements CacheInterface
{
    /**
     * Returns the value of a cache entry from its key
     *
     * @api
     *
     * @param  string    $key  the key of the cache entry
     * @return \stdClass the value of the entry
     */
    public function get($key)
    {
        return \apc_fetch($key);
    }

    /**
     * Stores a new cache entry
     *
     * @api
     *
     * @param  string    $key   the key of the cache entry
     * @param  \stdClass $value the value of the entry
     * @param  integer   $ttl   the time until this cache entry expires
     */
    public function set($key, $value, $ttl = 0)
    {
        return \apc_store($key, $value, $ttl);
    }

    /**
     * Deletes a cache entry, from its key
     *
     * @api
     *
     * @param  string    $key  the key of the cache entry
     */
    public function delete($key)
    {
        return \apc_delete($key);
    }

    /**
     * Clears the whole cache
     *
     * @api
     */
    public function clear()
    {
        return \apc_clear_cache("user");
    }
}
