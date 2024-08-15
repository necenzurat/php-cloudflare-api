<?php

namespace SergkeiM\CloudFlare\Endpoints\Zones;

use SergkeiM\CloudFlare\Endpoints\AbstractEndpoint;
use SergkeiM\CloudFlare\Contracts\CloudFlareResponse;

class CloudConnector extends AbstractEndpoint
{
    /**
     * @link https://developers.cloudflare.com/api/operations/zone-cloud-connector-rules
     *
     * @param string $zoneId Zone ID.
     *
     * @return CloudFlareResponse Cloud Connector rules response.
     */
    public function get(string $zoneId): CloudFlareResponse
    {
        return $this->getHttpClient()->get("/zones/{$zoneId}/cloud_connector/rules");
    }

    /**
     * @link https://developers.cloudflare.com/api/operations/zone-cloud-conenctor-rules-put
     *
     * @param string $zoneId Zone ID.
     * @param array $values List of Cloud Connector rules.
     *
     * @return CloudFlareResponse Cloud Connector rules response.
     */
    public function update(string $zoneId, array $values): CloudFlareResponse
    {

        $this->requiredParams(['name'], $values);

        return $this->getHttpClient()->put("/zones/{$zoneId}/cloud_connector/rules", $values);
    }
}
