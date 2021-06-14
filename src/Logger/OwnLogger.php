<?php
/**
 * Beschreibung:
 *
 * 14.06.2021
 * arise
 * OwnLogger.php
 */


namespace App\Logger;


use Silalahi\Slim\Logger;

class OwnLogger extends Logger
{
    /**
     * Write to log
     *
     * @param mixed $object Object
     * @param int   $level  Level
     *
     * @return void
     */
    public function write($object, $level)
    {
        // Determine label
        $label = "DEBUG";
        switch($level) {
            case self::CRITICAL:
                $label = 'CRITICAL';
                break;
            case self::ERROR:
                $label = 'ERROR';
                break;
            case self::WARN:
                $label = 'WARN';
                break;
            case self::INFO:
                $label = 'INFO';
                break;
        }

        // Get formatted log message
        $message = str_replace(
            array("%label%", "%date%", "%message%"),
            array($label, date("c"), (string)$object),
            $this->settings['message_format']
        );

        if ( ! $this->resource) {
            $filename = $this->settings['name'];
            $filename .= date($this->settings['name_format']);
            if (! empty($this->settings['extension'])) {
                $filename .= '.' . $this->settings['extension'];
            }
            $this->resource = fopen($this->settings['path'] . DIRECTORY_SEPARATOR . $filename, 'a');
        }

        // Output to resource
        fwrite($this->resource, $message . PHP_EOL);
    }
}