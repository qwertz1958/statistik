<?php
/**
 * Kontrolliert den Zugang zur App
 *
 * 21.05.2021
 * Kalle
 * CheckLogin.php
 *
 */


namespace App\Middleware;
use App\Logger\OwnLogger;
use Slim\Http\Request;
use Slim\Http\Response;

class CheckLogin
{
    protected $basisUrl;
    /** @var \GrumpyPdo */
    protected $grumpyPdo;

    protected $kundenId;
    /** @var OwnLogger  */
    protected $logger;

    public function __construct($container){
        $this->basisUrl = $container['config']['basisUrl'];
        $this->grumpyPdo = $container[\GrumpyPdo::class];
        $this->logger = $container[OwnLogger::class];
    }

    /**
     * Kontrolle Login
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
     * @param  callable                                 $next     Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(Request $request, Response $response, $next)
    {
        // Todo: $request->getParams; Kontrolle ob Benutzername und Passwort vorhanden ist
        // schaue in Datenbank nach, neue Methode
        // gibt KundenID zurück, $_SESSION['kundenId'] gespeichert
        // oder gibt false zurück, dann Redirect auf Login - Seite und Logging


        $daten = [
            'loginname' => $_REQUEST['loginname'],
            'password' => $_REQUEST['password']
        ];

        $this->kundenId = $this->grumpyPdo
            ->run("SELECT id FROM kunden WHERE first_name = ? AND password = ?", [$daten['loginname'], $daten['password']])
            ->fetchAll();

        if(($this->kundenId != NULL) AND (!empty($this->kundenId)))
            $_SESSION['kundenId'] = $this->kundenId;






        // Todo: Kontrolle ob $_SESSION['kundenID'] vorhanden ist
        // Es wird über "kundenId" überprüft ob der login erfolgreich war
        // falls nicht soll man auf die login url weitergeleitet werden
        // falls ja soll man auf die eingegebene/aufgerufene gelangen
        if(($_SESSION['kundenId'] == false))
        {
            $_SESSION['url'] = $this->basisUrl . 'login';
            $response = $response->withRedirect($_SESSION['url']);
        }
        else
        {
            $response = $next($request, $response);
        }



        return $response;
    }
}