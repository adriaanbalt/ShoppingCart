<?php
/**
 *
 * Holds various methods to handle getting data from the CMS into the
 * application.
 *
 * @package Data
 * @author Adriaan Scholvinck
 */
class Data
{
    /**
     * Singleton instance
     */
    private static $_instance;

    /**#@+
     * Raw data retrieved from the CMS.
     */
    private $_page_data;
    private $_search_results_data;
    private $_navigation_data;
    private $_impact_data;
    /**#@-*/

    private function __construct() {}
    private function __clone() {}

    /**
     * Create or return the existing instance of this object.
     */
    public static function get_instance()
    {
        if (!self::$_instance) {
            self::$_instance = new Data();
        }

        return self::$_instance;
    }

    /**
     * Get the JSON feed from the CMS for a specific resource determined by
     * the channel and id.
     *
     * @param string $channel The channel the entry belongs to in the CMS.
     * @param string $id The id of the entry to retrieve from the CMS.
     * @return object Data necessary for the view to build out the page.
     */
    public function get_page_data($channel, $id)
    {
        // Avoid asking the CMS for the same data more than once.
        if ($this->_page_data) {
            return $this->_page_data;
        }

        if (is_null($channel) || is_null($id)) {
            return null;
        }

        // Return cached version if available.
        $cache_enabled = Config::get('vars.cms_cache_enabled');
        $language = Config::get('application.language');
        $key = 'cms_page_data-' . $language . '-' . $channel . '-' . $id;

        if ($cache_enabled) {
            if (Cache::has($key)) {
                return Cache::get($key);
            }
        }

        $url = Config::get('vars.cms_base_url');
        $url .= '/' . $language . '/v1';
        $url .= '/' . $channel . '/' . $id;

        $data = json_decode($this->_make_curl_request($url));
        if (empty($data)) {
            // Error in CMS template, throw 500 error
            throw new Red\Exception("Error parsing CMS response for: $url");
        }
        if (isset($data->code) && $data->code == "404") {
            // Entry not found in CMS, have controller throw 404 error
            return null;
        }

        $builder = new Red\Builder;
        switch ($channel) {
            case 'landing':
                if ($id == 'partners') {
                    $page_data = $builder->build_partners_landing($data);
                } else if ($id == 'badge-yourself') {
                    $page_data = $builder->build_badge_landing($data);
                } else if ($id == 'shop') {
                    $page_data = $builder->build_shop_landing($data);
                } else {
                    $page_data = $builder->build_landing($data);
                }
                break;
            case 'article':
            case 'moment':
            case 'partner':
            case 'product':
                $page_data = $builder->build_content_detail($data);
                break;
            default:
                return null;
                break;
        }

        $this->_page_data = $page_data;

        // Cache the object if configured to do so.
        if ($cache_enabled) {
            $ttl_minutes = Config::get('vars.cms_cache_ttl') / 60;
            Cache::put($key, $this->_page_data, $ttl_minutes);
        }

        return $this->_page_data;
    }

    /**
     * Makes a request to the search form and retrieves the values that
     * configurates and construct the search
     *
     * @param string $term String to search for
     * @return array
     * @author Pablo Viquez <pablo.viquez@possible.com>
     */
    protected function _get_search_form_data($term)
    {
        // Construct the url
        $url = Config::get('vars.cms_base_url');
        $url .= '/' . Config::get('application.language') . '/v1';
        $url .= '/searchform';

        // Retrieve the data
        $searchParams = array();
        $formData = $this->_make_curl_request($url);
        if (!$formData) {
            return $searchParams;
        }

        // Parse the result and construct the array
        $matches = array();
        $reg = '/type="hidden" name="(.*?)" value="(.*?)"/';
        $results = preg_match_all($reg, $formData, $matches);

        if ($results > 0) {
            foreach ($matches[1] as $idx => $value) {
                $searchParams[$value] = $matches[2][$idx];
            }

            $searchParams['keywords'] = $term;
        }

        return $searchParams;
    }

    /**
     * Get the JSON feed from the CMS for the search results determined
     * by the provided search terms.
     *
     * @param string $terms The search terms to use in the query to the CMS.
     * @return object Data necessary for the view to build out the page.
     */
    public function get_search_data($terms)
    {
        // Avoid asking the CMS for the same data more than once.
        if ($this->_search_results_data) {
            return $this->_search_results_data;
        }

        // Validate the terms are correct
        $data = null;
        if (strlen(trim($terms)) < 3) {
            $data = new stdClass;
            $data->terms = htmlentities($terms);
        }

        // Format terms appropriately
        $terms = preg_replace('/[\ ]+/', '|', $terms);

        if (is_null($data)) {
            $url = Config::get('vars.cms_base_url');
            $url .= '/' . Config::get('application.language') . '/v1';
            $url .= '/search/' . $terms;

            $searchParams = $this->_get_search_form_data($terms);
            $data = json_decode($this->_make_curl_request($url, $searchParams, 'POST'));

            if (empty($data)) {
                // Error in CMS template, throw 500 error
                throw new Red\Exception("Error parsing CMS response for: $url");
            }
        }

        $builder = new Red\Builder;
        $this->_search_results_data = $builder->build_search_results($data);

        return $this->_search_results_data;
    }

    /**
     * Get the JSON feed from the CMS for the impact map data.
     *
     * @param string $lang The language to use in the request to the CMS.
     * @return object Data necessary for the view to build out the page.
     */
    public function get_impact_data($lang)
    {
        // Avoid asking the CMS for the same data more than once.
        if ($this->_impact_data) {
            return $this->_impact_data;
        }

        // Return cached version if available.
        $cache_enabled = Config::get('vars.cms_cache_enabled');
        $key = 'impact_data-' . $lang;

        if ($cache_enabled) {
            if (Cache::has($key)) {
                return Cache::get($key);
            }
        }

        $url = Config::get('vars.cms_base_url');
        $url .= '/' . $lang . '/v1/impact';

        $data = json_decode($this->_make_curl_request($url));
        if (empty($data)) {
            // Error in CMS template, throw 500 error
            throw new Red\Exception("Error parsing CMS response for: $url");
        }

        $this->_impact_data = $data;

        // Cache the object if configured to do so.
        if ($cache_enabled) {
            $ttl_minutes = Config::get('vars.cms_cache_ttl') / 60;
            Cache::put($key, $this->_impact_data, $ttl_minutes);
        }

        return $this->_impact_data;
    }

    /**
     * Get the data necessary to build the navigation from the CMS and save
     * them to the public navigation class members.
     *
     */
    public function get_navigation()
    {
        // Avoid asking the CMS for the same data more than once.
        if ($this->_navigation_data) {
            return $this->_navigation_data;
        }

        // Return cached version if available.
        $cache_enabled = Config::get('vars.cms_cache_enabled');
        $lang = Config::get('application.language');
        $cur_uri = str_replace('/', '_', URI::current());
        $key = 'navigation_data-' . $lang . '-' . $cur_uri;

        if ($cache_enabled) {
            if (Cache::has($key)) {
                return Cache::get($key);
            }
        }

        // Get navigation from cms
        $url = Config::get('vars.cms_base_url') . '/' . $lang . '/v1/navigation';
        $data = json_decode($this->_make_curl_request($url));
        $builder = new Red\Builder;
        $this->_navigation_data = $builder->build_navigation($data);

        // Cache the object if configured to do so.
        if ($cache_enabled) {
            $ttl_minutes = Config::get('vars.cms_cache_ttl') / 60;
            Cache::put($key, $this->_navigation_data, $ttl_minutes);
        }

        return $this->_navigation_data;
    }

    /**
     * Helper method to handle the dirty work of making a cURL request.
     *
     * @param string $url The URL that cURL should make the request to.
     * @param array $params Parameters that should be included in the request.
     * @param string $method The request method cURL should use. Default: GET.
     * @param array $headers Add any additional HTTP headers in the request.
     * @return string The body of the response from the web service.
     */
    private function _make_curl_request($url, $params = array(), $method = 'GET', $headers = array())
    {
        $headers[] = 'Authorization: Basic cHJldmlldzpKbzFuUjNkMjAxNSE=';

        if (count($params) > 0 && $method == 'GET') {
            $url .= '?' . http_build_query($params);
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        if (count($headers) > 0) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }

        $body = curl_exec($ch);

        return $body;
    }
}
