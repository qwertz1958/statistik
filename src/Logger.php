<?php
/**
 * Simple Logger Class
 *
 * @author Stephan Krauß
 * thanks to:  	https://github.com/joshnesbitt/logger
 *
 * + DEBUG (100): Detailed debug information.
 * + INFO (200): Interesting events. Examples: User logs in, SQL logs.
 *
 * + NOTICE (250): Normal but significant events.
 * + WARNING (300): Exceptional occurrences that are not errors. Examples: Use of deprecated APIs, poor use of an API, undesirable things that are not necessarily wrong.
 * + ERROR (400): Runtime errors that do not require immediate action but should typically be logged and monitored.
 *
 * + CRITICAL (500): Critical conditions. Example: Application component unavailable, unexpected exception.
 *
 * + ALERT (550): Action must be taken immediately. Example: Entire website down, database unavailable, etc. This should trigger the SMS alerts and wake you up.
 * + EMERGENCY (600): Emergency: system is unusable.
 *
 **/

namespace App;

class Logger {
    protected $logfile;
    protected $file;
    protected $function;
    protected $line;

    protected $path;
    protected $stream;
    /** @var GrumpyPdo  */
    protected $grumpyPDO;
    protected $config;
    protected $title;
    protected $category;
    protected $state;
    protected $type;
    protected $project;
    protected $active;
    protected $milestone;

    public function __construct($container)
    {
        // aus Container GrumpyPDO
        // aus Container SMS-Service
        // aus Container Mail Klasse
        $this->config = $container['config'];
        $this->title = $this->config['projektDaten']['titleCritical'];
        $this->category = $this->config['projektDaten']['categoryExtrem'];
        $this->state = $this->config['projektDaten']['state'];
        $this->type = $this->config['projektDaten']['type'];
        $this->project = $this->config['projektDaten']['project'];
        $this->active = $this->config['projektDaten']['active'];
        $this->milestone = $this->config['projektDaten']['milestone'];

        $this->grumpyPDO = $container['GrumpyPdoTaskboard'];


        $this->logfile = date('Y-m-d');
        $this->path = $_SERVER["DOCUMENT_ROOT"] . "/log/" . $this->logfile . ".log";
        $this->open();
    }

    /**
     * @param $string
     * @return bool
     */
    public function debug($string) : bool
    {
        $this->filterBacktrace();
        $this->log($string, 'DEBUG');

        return true;
    }

    /**
     * @param $string
     * @return bool
     */
    public function info($string) : bool
    {
        $this->filterBacktrace();
        $this->log($string, 'INFO');

        return true;
    }

    /**
     * @param $string
     * @return bool
     */
    public function notice($string) : bool
    {
        $this->filterBacktrace();
        $this->log($string, 'NOTICE');

        return true;
    }

    /**
     * @param $string
     * @return bool
     */
    public function warning($string) : bool
    {
        $this->filterBacktrace();
        $this->log($string, 'WARNING');

        return true;
    }

    /**
     * @param $string
     * @return bool
     */
    public function error($string) : bool
    {
        $this->filterBacktrace();
        $this->log($string, 'ERROR');

        return true;
    }

    /**
     * @param $string
     * @return bool
     */
    public function critical($string) : bool
    {
        try{

            $this->filterBacktrace();
            $this->log($string, 'CRITICAL');
            $this->writeInTaskboard($string);



            return true;
        }catch(\Throwable $e){
            $test = 123;
        }

    }

    /**
     * @param $string
     * @return bool
     */
    public function alert($string) : bool
    {
        $this->filterBacktrace();
        $this->log($string, 'ALERT');
        $this->writeInTaskboard($string);

        return true;
    }

    /**
     * @param $string
     * @return bool
     */
    public function emergency($string) : bool
    {
        $this->filterBacktrace();
        $this->log($string, 'EMERGENCY');
        $this->writeInTaskboard($string);

        return true;
    }

    /**
     * baut mesage
     *
     * @param $string
     * @param $level
     * @return bool
     */
    private function log($string, $level) : bool
    {
        $this->write("[". date('H:i:s') . "][" . $level . "][" . $this->file . "][" . $this->function . "] >> " . $string . " << \r\n");

        return true;
    }

    /**
     * in Datei schreiben
     *
     * @param $string
     * @return false|int
     */
    private function write($string)
    {
        return fwrite($this->stream, $string);
    }

    /**
     * öffnen Datei
     *
     * @param string $mode
     */
    private function open($mode="a")
    {
        try{
            $this->stream = fopen($this->path, $mode);

            return;
        }
        catch(\Throwable $e){
            throw $e;
        }
    }

    /**
     * schließen der Datei
     *
     * @return bool
     */
    private function close()
    {
        return fclose($this->stream);
    }

    /**
     * schliesst die Datei
     */
    public function __destruct(){
        $this->close();
    }

    /**
     * @return bool
     */
    protected function filterBacktrace()
    {
        $backtrace = debug_backtrace();

        $this->file = $backtrace[2]['file'];
        $this->line = $backtrace[2]['line'];
        $this->function = $backtrace[2]['function'];

        return true;
    }

    protected function writeInTaskboard(string $message)
    {
        $this->grumpyPDO
            ->run("INSERT INTO tasks (title, category, description, state, type, project, active, milestone) VALUES('$this->title', '$this->category', '$message', '$this->state', '$this->type', '$this->project', '$this->active', '$this->milestone')");
    }
}

?>