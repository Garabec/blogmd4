<?php

namespace Lib;

interface ExportInterface
{
    public function createDocument($filename, array $data);
    public function download();
    public function open();
}