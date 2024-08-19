<?php

namespace CloudFlare\Endpoints\Tunnel;

use CloudFlare\Endpoints\AbstractEndpoint;
use CloudFlare\Contracts\CloudFlareResponse;

class Routes extends AbstractEndpoint
{
    /**
     * Lists and filters private network routes in an account.
     *
     * @link https://developers.cloudflare.com/api/operations/tunnel-route-list-tunnel-routes
     *
     * @param string $accountId Account identifier.
     * @param array $params Array containing the necessary params.
     *
     * @return \CloudFlare\Contracts\CloudFlareResponse List tunnel routes response
     */
    public function list(string $accountId, array $params = []): CloudFlareResponse
    {
        return $this->getHttpClient()->get("/accounts/{$accountId}/teamnet/routes", $params);
    }

    /**
     * Fetches routes that contain the given IP address.
     *
     * @link https://developers.cloudflare.com/api/operations/tunnel-route-get-tunnel-route-by-ip
     *
     * @param string $accountId Account identifier.
     * @param string $ip IP
     * @param string $virtualNetworkId UUID of the virtual network.
     *
     * @return \CloudFlare\Contracts\CloudFlareResponse Get tunnel route by IP response
     */
    public function getByIP(string $accountId, string $ip, string $virtualNetworkId = null): CloudFlareResponse
    {

        $params = [];

        if(!is_null($virtualNetworkId)) {
            $params['virtual_network_id'] = $virtualNetworkId;
        }

        return $this->getHttpClient()->get("/accounts/{$accountId}/teamnet/routes/ip/{$ip}", $params);
    }

    /**
     * Routes a private network through a Cloudflare Tunnel.
     *
     * @link https://developers.cloudflare.com/api/operations/tunnel-route-create-a-tunnel-route
     *
     * @param string $accountId Account identifier.
     * @param string $network The private IPv4 or IPv6 range connected by the route, in CIDR notation.
     * @param string $virtualNetworkId UUID of the virtual network.
     * @param string $comment Optional remark describing the route.
     *
     * @return \CloudFlare\Contracts\CloudFlareResponse Create a tunnel route response
     */
    public function create(string $accountId, string $network, string $virtualNetworkId = null, string $comment = null): CloudFlareResponse
    {

        $values = [
            'network' => $network,
        ];

        if(!is_null($virtualNetworkId)) {
            $values['virtual_network_id'] = $virtualNetworkId;
        }

        if(!is_null($comment)) {
            $values['comment'] = $comment;
        }

        return $this->getHttpClient()->post("/accounts/{$accountId}/teamnet/routes", $values);

    }

    /**
     * Get a private network route in an account.
     *
     * @link https://developers.cloudflare.com/api/operations/tunnel-route-get-tunnel-route
     *
     * @param string $accountId Account identifier.
     * @param string $routeId UUID of the route.
     *
     * @return \CloudFlare\Contracts\CloudFlareResponse Get a tunnel route response
     */
    public function details(string $accountId, string $routeId): CloudFlareResponse
    {
        return $this->getHttpClient()->get("/accounts/{$accountId}/teamnet/routes/{$routeId}");
    }

    /**
     * Updates an existing private network route in an account.
     *
     * @param string $accountId Account identifier.
     * @param string $routeId UUID of the route.
     * @param array $values The fields that are meant to be updated
     *
     * @return \CloudFlare\Contracts\CloudFlareResponse Update a tunnel route response
     */
    public function update(string $accountId, string $routeId, array $values = []): CloudFlareResponse
    {
        return $this->getHttpClient()->patch("/accounts/{$accountId}/teamnet/routes/{$routeId}", $values);
    }

    /**
     * Deletes a private network route from an account.
     *
     * @link https://developers.cloudflare.com/api/operations/tunnel-route-delete-a-tunnel-route
     *
     * @param string $accountId Account identifier.
     * @param string $routeId UUID of the route.
     *
     * @return \CloudFlare\Contracts\CloudFlareResponse Delete a tunnel route response
     */
    public function delete(string $accountId, string $routeId): CloudFlareResponse
    {
        return $this->getHttpClient()->delete("/accounts/{$accountId}/teamnet/routes/{$routeId}");
    }
}