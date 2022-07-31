<?php

namespace refaltor\bot\utils;

class JsonConfig
{
    private array $cache;
    private string $filename;

    public function __construct(string $filename)
    {
        $this->cache = json_decode(file_get_contents($filename), true);
        $this->filename = $filename;
    }

    public function set($key, $needle): void {
        $this->cache[$key] = $needle;
    }

    public function get($key): mixed {
        return $this->cache[$key] ?? null;
    }

    public function has($key): bool {
        return isset($this->cache[$key]);
    }

    public function save(): void {
        file_put_contents($this->filename, $this->cache);
    }
}