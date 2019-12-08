<?

namespace App\Library\Services;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;

class GenerateXmlFile {

    public function generateXml($filename, $urls) {

        $resultPath = Config::get('constants.options.base_path') . '/storage/sitemaps/' . $filename . '.xml';
        $content = $this->xmlHeader();
        $stream = fopen($resultPath, 'w');
        fwrite($stream, $content);
        foreach ($urls as $url) {

            $content = $url;

            fwrite($stream, $content);
        }

        $footer = $this->xmlFooter();
        fwrite($stream, $footer);
        fclose($stream);
    }

    private function xmlHeader() {

        return '<?xml version="1.0" encoding="UTF-8"?>
            <!-- generated-on="'. Carbon::today()->format('M d Y') .'" -->
            <urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    }

    private function xmlFooter() {

        return "\n</urlset>\n";
    }
}
