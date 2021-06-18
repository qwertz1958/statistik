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
use Silalahi\Slim\Logger;
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

    protected $navigation;

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
        if(!$_SESSION['kundenID'] or $_SESSION['kundenID'] == NULL)
        {
            $params = $request->getParams();

            if(isset($params['user']) AND ($params['user'] != NULL) AND isset($params['password']) AND ($params['password'] != NULL))
            {
                $loginResult = $this->checkUserPassword($params['user'], $params['password']);

                if($loginResult == false)
                {
                    $this->logger->write('Fehlgeschlagener Login' , Logger::INFO);
                    $response = $response->withRedirect($this->basisUrl . 'login');
                }
            }else{
                $this->logger->write('Fehlgeschlagener Login' , Logger::INFO);
                $response = $response->withRedirect($this->basisUrl . 'login');
            }
        }

        return $response;
    }

    /**
     * Abfrage MySQL nach Benutzer und Passwort
     * mögliche Reaktionen auf die Abfrage:
     * + kein bekannter Benutzer = false;
     * + Benutzer bekannt = KundenId;
     *
     * @param string $user
     * @param string $password
     * @return int|bool
     * @throws \Throwable
     */
    protected function checkUserPassword(string $user, string $password) : int|bool
    {
        try{
            $loginResult = false;
            $result = $this->grumpyPdo
                ->run("SELECT id FROM kunden WHERE email = ? AND password = ?", [$user, $password])
                ->fetchAll();

            if(count($result) === 1)
                $loginResult = $result['0']['id'];


            return $loginResult;
        }catch (\Throwable $e){
            throw $e;
        }
    }

    /**
     * @return mixed
     */
    public function getNavigation()
    {
        return $this->navigation;
    }
}