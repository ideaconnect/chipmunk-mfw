<?php
namespace IDCT\Framework\Chipmunk;

use IDCT\Framework\Chipmunk\Definitions\Interfaces\FrontendInterface as FrontendInterface;
use IDCT\Framework\Chipmunk\Definitions\Types\Object as Object;
use IDCT\Framework\Chipmunk\Definitions\Types\Page as Page;
/**
 * Frontend short summary.
 *
 * Frontend description.
 *
 * @version 1.0
 * @author Bartosz
 */
class Frontend extends Object implements FrontEndInterface
{
    protected $javascripts = array();
    protected $csses = array();

    protected $state;
    protected $data;

    public function registerJavascript($path) {
        $this->javascripts[] = $path;
    }

    protected function generateJavascripts($targetFilename) {
        $targetContent = "";
        foreach($this->javascripts as $javascript) {
            $targetContent .= file_get_contents($javascript);
        }

        file_put_contents($targetFilename, $targetContent);
        //TODO MINIFY
        return $this;
    }

    public function getJavascriptsPath() {
        $mtimeString = "";
        foreach($this->javascripts as $javascript) {
            $mtimeString .= (string)(filemtime($javascript));
        }

        $fileNameNew = sha1($mtimeString);
        $targetFileName = "js/" . $fileNameNew . ".js";
        if(file_exists($targetFileName) !== true) {
            $this->generateJavascripts($targetFileName);
        }
        return $targetFileName;
    }

    public function registerCss($type, $path) {
        $this->csses[] = array("type" => $type, "path" => $path);

        //TODO concept is to keep SASS files and generate a single CSS file like with javascripts
        return $this;
    }

    public function getCsses() {
        return $this->csses;
    }

    public function prepare($state, Page $page) {

    }

    public function render() {

    }

}
