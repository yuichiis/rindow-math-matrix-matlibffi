<?php
namespace RindowTest\Math\Matrix\Drivers\MatlibFFI\ReleaseTest;

use PHPUnit\Framework\TestCase;
use Rindow\Math\Buffer\FFI\BufferFactory;
use Rindow\OpenBLAS\FFI\OpenBLASFactory;
use Rindow\Matlib\FFI\MatlibFactory;
use Rindow\OpenCL\FFI\OpenCLFactory;
use Rindow\CLBlast\FFI\CLBlastFactory;
use FFI;

class ReleaseTest extends TestCase
{
    public function testFFINotLoaded()
    {
        $buffer = new BufferFactory();
        $openblas = new OpenBLASFactory();
        $matlib = new MatlibFactory();
        $opencl = new OpenCLFactory();
        $clblast = new CLBlastFactory();
        $this->assertTrue(extension_loaded('ffi'));
    }

    public function testFFILoaded()
    {
        $mo = new \Rindow\Math\Matrix\MatrixOperator();
        if($mo->isAdvanced()) {
            echo "Advanced mode\n";
        } else {
            echo "NOT Advanced mode\n";
        }
        $matlib = new MatlibFactory();
        var_dump($matlib->config());
        $this->assertTrue($mo->isAdvanced());
    }
}
