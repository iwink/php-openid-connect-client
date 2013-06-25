<?php

namespace InoOicClient\Oic\Authorization;

use InoOicClient\Server\ServerInfo;
use InoOicClient\Client\ClientInfo;
use InoOicClient\Entity\AbstractEntity;
use InoOicClient\Util\ArgumentNormalizer;


/**
 * Authorization request.
 * 
 * @method void setClientInfo(ClientInfo $clientInfo)
 * @method void setResponseType(string|array $responseType)
 * @method void setScope(mixed $scope)
 * @method void setState(string $state)
 * 
 * @method ClientInfo getClientInfo()
 * @method array getResponseType()
 * @method array getScope()
 * @method string getState()
 */
class Request extends AbstractEntity
{

    const CLIENT_INFO = 'client_info';

    protected $allowedProperties = array(
        self::CLIENT_INFO,
        Param::RESPONSE_TYPE,
        Param::SCOPE,
        Param::STATE,
        Param::NONCE
    );


    /**
     * Constructor.
     * 
     * @param ClientInfo $clientInfo
     * @param string $responseType
     * @param string $scope
     * @param string $state
     * @param array $extraParams
     */
    public function __construct(ClientInfo $clientInfo, $responseType, $scope, $state = null, array $extraParams = array())
    {
        $this->setClientInfo($clientInfo);
        $this->setResponseType($responseType);
        $this->setScope($scope);
        $this->setState($state);
        
        foreach ($extraParams as $paramName => $paramValue) {
            $this->setProperty($paramName, $paramValue);
        }
    }


    protected function updateResponseType($responseType)
    {
        return ArgumentNormalizer::StringOrArrayToArray($responseType);
    }


    protected function updateScope($scope)
    {
        return ArgumentNormalizer::StringOrArrayToArray($scope);
    }
}